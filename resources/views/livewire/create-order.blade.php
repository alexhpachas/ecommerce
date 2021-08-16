<div class="container py-8 grid grid-cols-5 gap-6">

    {{-- PRIMERA COLUMNA  DATOS DE LA VENTA --}}
    <div class="col-span-3">

        {{-- DATOS DEL COMPRADOR --}}
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="mb-4">
                <x-jet-label value="Ingrese nombre de contacto" />                
                <x-jet-input wire:model.defer="contact" class="w-full" type="text" placeholder="Ingrese nombre de la persona que recibirá el producto" />  
                
                <x-jet-input-error for="contact" />
            </div>

            <div>
                <x-jet-label value="Ingrese telefono de contacto" />                
                <x-jet-input wire:model.defer="phone" class="w-full" type="text" placeholder="Ingrese un numero de telefono de contacto" /> 
                
                <x-jet-input-error for="phone" />
            </div>

        </div>

        {{-- DATOS DE ENVIOS --}}
        <div x-data = "{ envio_type : @entangle('envio_type') }">
            <p class="text-gray-700 font-semibold text-lg mb-3 mt-6">Envíos</p>
        
            <label class="bg-white rounded-lg shadow-lg px-6 py-4 flex items-center mb-4">

                <input x-model="envio_type" type="radio" class="text-gray-700" name="envio_type" value="1">

                <span class="ml-2 text-gray-700">
                    Recojo en tienda(Calle falsa 123)
                </span>

                <span class="font-semibold text-gray-700 ml-auto">
                    Gratis
                </span>

            </label>

            {{-- ENVIO A DOMICILIO --}}

            <div class="bg-white rounded-lg shadow-lg ">            
                <label class="px-6 py-4 flex items-center">
                    <input x-model="envio_type" type="radio" class="text-gray-700"  name="envio_type" value="2">

                    <span class="ml-2 text-gray-700">
                        Envío a domicilio
                    </span>
                </label>

                {{-- SELECTS DEPARTAMENTOS CUIDADES Y DISTRITOS --}}
                <div class="px-6 pb-6 grid grid-cols-2 gap-6 hidden" :class="{ 'hidden': envio_type != 2}">                    

                    {{-- DEPARTAMENTO --}}
                    <div>
                        <x-jet-label value="Departamento" />
                        <select wire:model="department_id" class="form-control w-full">
                            <option value="" disabled selected>Seleccione un departamento</option>
                            @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>                                
                            @endforeach
                        </select>

                        <x-jet-input-error for="department_id" />

                    </div>

                    {{-- CUIDADES --}}                    
                    <div>
                        <x-jet-label value="Cuidad" />
                        <select wire:model="city_id" class="form-control w-full">
                            <option value="" disabled selected>Seleccione una Cuidad</option>
                            @foreach ($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>                                
                            @endforeach
                        </select>

                        <x-jet-input-error for="city_id" />

                    </div>    
                    
                    {{-- DISTRITO --}}                    
                    <div>
                        <x-jet-label value="Distrito" />
                        <select wire:model="district_id" class="form-control w-full">
                            <option value="" disabled selected>Seleccione un distrito</option>
                            @foreach ($districts as $district)
                                <option value="{{$district->id}}">{{$district->name}}</option>                                
                            @endforeach
                        </select>

                        <x-jet-input-error for="district_id" />

                    </div> 

                    <div class="w-full">
                        <x-jet-label value="Direccion" />
                        <x-jet-input class="w-full" wire:model="address" type="text" />

                        <x-jet-input-error for="address" />
                    </div>

                    <div class="col-span-2">
                        <x-jet-label value="Referencia" />
                        <x-jet-input class="w-full" wire:model="references" type="text" />

                        <x-jet-input-error for="references" />
                    </div>

                </div>
            </div>
        </div>

        {{-- BOTON DE CONTINUAR CON LA COMPRA --}}
        <div>

            <x-jet-button 
                    wire:loading.attr="disabled"
                    wire:target="create_order"
                    wire:click="create_order" 
                    class="mt-6 mb-4">
                Continuar con la compra
            </x-jet-button>

            <hr>

            <p class="text-sm text-gray-700 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit omnis provident nihil porro optio dolorum. Fugiat molestiae accusantium ipsam ipsa ad consequuntur officia voluptate aliquam esse quas voluptatem, doloribus rerum! <a class="font-semibold text-orange-500" href="">Politicas y privacidad</a></p>
        </div>
    </div>

    {{-- SEGUNDA COLUMNA RESUMEN DE PRODUCTO Y RESUMEN DE PAGO --}}
    <div class="col-span-2">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4 object-center " src="{{$item->options->image}}" alt="">
                        
                        <article class="flex-1">
                            <h1 class="font-bold">{{$item->name}}</h1>
                            <div class="flex items-center">
                                <p>Cant: {{$item->qty}}</p>
                                @isset($item->options['color'])
                                    <p class="mx-2">- Color: {{-- {{$item->options['color']}} --}} <i class="fas fa-circle text-{{$item->options['color']}}-600 {{$item->options['color'] == 'white' ? 'text-white rounded-full border-2' : ''}}"></i></p>
                                @endisset

                                @isset($item->options['size'])
                                    <p>{{$item->options['size']}} </p>
                                @endisset
                            </div>

                            <p>S/. {{$item->price}}</p>
                        </article>
                    </li>                
                @empty 
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700 ">
                            No tiene agregado ningún item en el carrito
                        </p>
                    </li>                    
                @endforelse
            </ul>

            <hr class="mt-4 mb-3">

            <div class="text-gray-700 px-5 bg-gray-100">
                <p class="flex justify-between items-center">
                    Subtotal
                    <span class="font-semibold">S/. {{Cart::subtotal()}}</span>
                </p>
                
                <p class="flex justify-between items-center">
                    Costo de envío
                    <span class="font-semibold">
                        @if ($this->envio_type == 1 || $this->shipping_cost == 0)
                            Gratis
                        @else
                            S/. {{$shipping_cost}}
                        @endif
                    </span>
                </p>

                <hr class="mt4 mb-3">

                <p class="flex justify-between items-center font-semibold">
                    <span class="text-lg"> Total</span>
                    @if ($this->envio_type == 1)
                        S/. {{Cart::subtotal()}}    
                    @else
                    S/. {{Cart::subtotal() + $shipping_cost}}
                    @endif
                    
                </p>

            </div>

        </div>
    </div>
    



</div>
