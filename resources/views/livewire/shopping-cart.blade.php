<div class="container py-8">
    
    <section class=" bg-white rounded-lg shadow-lg p-6 text-gray-700"> 
        <div class="flex border-b border-red-300 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />            
            </svg>

            <h1 class="text-4xl font-semibold ml-3 text-red-600 mb-6 ">Mi Carrito</h1>
        </div>       

        {{-- SI HAY PRODUCTOS EN EL CARRITO DE COMPRAS ARMAMOS LA TABLA --}}
        @if (Cart::count())                    
        
            <table class="table-auto w-full ">
                <thead class="rounded-lg border-b-8 border-t-8">
                    <tr class="bg-gray-200 text-xl ">
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th></th>
                    </tr>

                </thead>

                <tbody>
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td>
                                <div class="flex mt-1 items-center">
                                    <img class="h-15 w-20 object-cover object-center mr-4" src="{{$item->options->image}}" alt="">

                                    <div>
                                        <p class="font-bold">{{$item->name}}</p>

                                        @if ($item->options->color)
                                            <span class="mr-1">Color: {{__($item->options->color)}}</span>
                                                                                                                        
                                        @endif

                                        @if ($item->options->size)
                                            <span class="mx-1">-</span>
                                            <span>{{__($item->options->size)}}</span>
                                        @endif
                                    </div>
                                </div>
                                
                            </td>

                            <td class="text-center">
                                <span>{{$item->price}}</span>
                                {{-- <a wire:click="delete('{{$item->rowId}}')" 
                                   wire:target="delete"
                                   wire:loading.attr="hidden"
                                   
                                   class="cursor-pointer hover:text-red-600">
                                    <i class="fas fa-trash"></i>
                                </a> --}}
                            </td>


                            <td>
                                <div class="flex justify-center">

                                    @if ($item->options->size)

                                        @livewire('update-cart-item-size', ['rowId' => $item->rowId], key($item->rowId))

                                    @elseif($item->options->color)

                                        @livewire('update-cart-item-color', ['rowId' => $item->rowId], key($item->rowId))
                                    
                                    @else

                                        @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                        
                                    @endif

                                </div>

                            </td>

                            <td class="text-center {{-- {{$loop->last ? 'border-b-2' :''}} --}}">
                                S/. {{$item->price * $item->qty}}
                            </td>

                            <td class="text-center">
                                <div>
                                <a wire:click="delete('{{$item->rowId}}')" 
                                   wire:target="delete"
                                   wire:loading.attr="hidden"                                   
                                   
                                   class="cursor-pointer hover:text-red-600">
                                   <i class="fas fa-times-circle"></i>
                                </a>
                            </div>
                               
                                    
                                 
                                <div wire:loading wire:target="delete">
                                    <span class="inline-flex items-center border border-transparent text-base leading-6 font-medium rounded-md   duration-150">
                                        <svg class="animate-spin h-4 w-4 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        
                                      </span>
                                    
                                </div>
                            </td>
                            
                        </tr>
                        
                    @endforeach
                    

                </tbody>
            </table>

            {{-- PROBANDO ESTO --}}

            {{-- <div class="container flex justify-end">
                <p class="text-gray-700">
                    <span class="font-semibold text-lg">Total: </span> S/.{{Cart::subtotal()}}
                </p>

            </div> --}}

        {{-- BOTON ELIMINAR CARRITO DE COMPRAS --}}
            <a wire:click="destroy" class="text-sm cursor-pointer hover:underline hover:text-red-600 mt-3 inline-block">
                <i class="fas fa-trash"></i>
                Borrar carrito de compras
            </a>

        {{-- SI NO HAY PRODUCTOS EN EL CARRITO DE COMPRAS MOSTRAMOS UN MENSAJE --}}
        @else
            <div class="flex flex-col items-center">
                <x-cart />                                    

                <p class="text-gray-700 font-bold text-2xl ml-4">
                    Su carrito está vacio.
                </p>
                <p class="text-gray-700"> Para seguir comprando, navegar por las categorías en el sitio, o busque su producto.</p>

                <x-button-enlace color="gray" href="/" class="mt-4">
                    SEGUIR COMPRANDO
                </x-button-enlace>
            </div>                    
        @endif        
    </section>

    {{-- SI EXISTE PRODUCTOS EN EL CARRITO MOSTRAMOS EL BOTON PARA QUE PUEDA CONTINUAR CON EL PROCESO DE COMPRA --}}
    @if (Cart::count())
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-700">
                        <span class="font-semibold text-lg">Total: </span> S/.{{Cart::subtotal()}}
                    </p>

                </div>

                <div>
                    <x-button-enlace href="{{route('orders.create')}}">
                        Continuar
                    </x-button-enlace>
                </div>

            </div>
        </div>
        
    @else
        
    @endif
</div>
