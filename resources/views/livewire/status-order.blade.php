<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 flex items-center">

        <div class="relative items-center ">
            <div class="{{$order->status >= 2 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-500'}} flex rounded-full h-12 w-12 items-center justify-center">
                <i class="fa fa-check text-white"></i>
            </div>

            <div class="absolute -left-1.5 mt-0.5">
                Recibido
            </div>
        </div>

        <div class="{{$order->status >= 3 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-500'}} flex-1 h-1"></div>

        <div class="relative">
            <div class="{{$order->status >= 3 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-500'}} flex rounded-full h-12 w-12 items-center justify-center">
                <i class="fa fa-truck text-white"></i>
            </div>

            <div class="absolute -left-0.5 mt-0.5">
                Enviado
            </div>
        </div>

        <div class="{{$order->status >= 4 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-500'}} flex-1 h-1"></div>

        <div class="relative">
            <div class="{{$order->status >= 4 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-500'}} flex rounded-full h-12 w-12 items-center justify-center">
                <i class="fa fa-check text-white"></i>
            </div>

            <div class="absolute -left-2.5 mt-0.5">
                Entregado
            </div>
        </div>


    </div>


    <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
        
            <p class="text-gray-700 uppercase">
                <span class="font-semibold">Número de orden :</span>
                Order-{{ $order->id }}
            </p>

            <form wire:submit.prevent="update">
                <div class="flex space-x-5 mt-2 text-center lg:justify-center">
                    <x-jet-label class="cursor-pointer">
                        <input wire:model="status" class="mr-1" type="radio" name="status" value="2">
                            RECIBIDO
                    </x-jet-label>

                    <x-jet-label class="cursor-pointer">
                        <input wire:model="status" class="mr-1" type="radio" name="status" value="3">
                            ENVIADO
                    </x-jet-label>

                    <x-jet-label class="cursor-pointer">
                        <input wire:model="status" class="mr-1" type="radio" name="status" value="4">
                            ENTREGADO
                    </x-jet-label>

                    <x-jet-label class="cursor-pointer">
                        <input wire:model="status" class="mr-1" type="radio" name="status" value="5">
                            ANULADO
                    </x-jet-label>
                </div>

                <div class="flex mt-2">
                    <x-jet-button class="ml-auto">
                        Actualizar
                    </x-jet-button>
                </div>

            </form>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-3 mb-6 mt-4 text-center">
        <div class="grid grid-cols-2 gap-3 text-gray-700">
            <div>
                <p class="text-lg font-semibold uppercase border-b-2 bg-gray-200 text-center">Datos de Envío</p>

                @if ($order->envio_type == 1)
                    <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                    <p class="text-sm">Calle falsa 123</p>
                @else
                    <p class="text-sm font-semibold">Los productos serán enviados a :</p>
                    <p class="text-sm uppercase">{{ $envio->address }}</p>
                    <p>{{ $envio->department }} - {{ $envio->city }} - {{ $envio->district }}
                    </p>
                    <p class="text-sm font-semibold">Referencia: </p>
                    <p>{{ $envio->references }}</p>

                @endif
            </div>

            <div>
                <p class="text-lg font-semibold uppercase border-b-2 bg-gray-200 text-center">Datos de contacto
                </p>
                <p class="text-sm font-semibold">Persona que recibira el producto:</p>
                <p class="text-sm font-uppercase">{{ $order->contact }}</p>
                <p class="text-sm font-semibold">Telefono de contacto:</p>
                <p class="text-sm uppercase">{{ $order->phone }}</p>

            </div>

        </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
        <p class="text-xl font-semibold mb-4 border-b-2 text-center">RESUMEN DE COMPRA</p>

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody class="divide-x divide-gray-200">
                @foreach ($items as $item)
                    <tr class="items-center ">
                        <td>
                            <div class="flex items-center">
                                <img class="h-15 w-20 object-cover object-center mr-4"
                                    src="{{ $item->options->image }}" alt="">

                                <article>
                                    <h1 class="font-bold ">{{ $item->name }}</h1>

                                    <div class="flex ">
                                        @isset($item->options->color)
                                            Color: {{ __($item->options->color) }}
                                        @endisset

                                        @isset($item->options->size)
                                            - {{ $item->options->size }}
                                        @endisset
                                    </div>
                                </article>
                            </div>
                        </td>

                        <td class="text-center">
                            S/. {{ $item->price }}
                        </td>
                        <td class="text-center">
                            {{ $item->qty }}
                        </td>
                        <td class="text-center justify-items-end {{ $loop->last ? 'border-b-2' : '' }} ">
                            S/. {{ $item->price * $item->qty }}
                        </td>

                @endforeach


            </tbody>            

        </table>  
          
    </div>

    <div class="order-1 lg:order-2 xl:col-span-2">
        <div class="bg-white rounded-lg shadow-lg p-4 -mt-5">
           

            <div class="text-gray-700 px-5 bg-gray-100 mt-2">
                <p class="flex justify-between items-center lg:mr-4">
                    Subtotal
                    <span class="font-semibold">S/. {{ $order->total - $order->shipping_cost }}</span>
                </p>

                <p class="flex justify-between items-center mt-1 lg:mr-4">
                    Costo de envío
                    <span class="font-semibold">
                        S/. {{ $order->shipping_cost }}
                    </span>
                </p>

                <hr class="mt4 mb-3">

                <p class="flex justify-between items-center font-semibold lg:mr-4">
                    <span class="text-lg"> Total</span>

                    <span class="font-bold text-red-600">S/. {{ $order->total }}</span>
                </p>

            </div>

            

        </div>

</div>