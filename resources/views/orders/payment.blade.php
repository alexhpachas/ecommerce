<x-app-layout>
    {{-- <div class="container py-8">
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden : </span>Order-{{$order->id}}</p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-3 gap-6 text-gray-700">
                <div >
                    <p class="text-lg font-semibold uppercase">Envío</p>

                    @if ($order->envio_type == 1)
                        <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                        <p class="text-sm">Calle falsa 123</p>
                    @else
                        <p class="text-sm">Los productos serán enviados a :</p>
                        <p class="text-sm">{{$order->address}}</p>
                        <p>{{$order->department->name}} - {{$order->city->name}} - {{$order->district->name}}</p>
                        
                    @endif
                </div>

                <div>
                    <p class="text-lg font-semibold uppercase">Datos de contacto</p>
                    <p class="text-sm">Persona que recibira el producto: {{$order->contact}}</p>
                    <p class="text-sm">Telefono de contacto: {{$order->phone}}</p>
                    
                </div>

            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
            <p class="text-xl font-semibold mb-4">Resumen</p>

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
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover object-center mr-4" src="{{$item->options->image}}" alt="">

                                    <article>
                                        <h1 class="font-bold">{{$item->name}}</h1>

                                        <div class="flex text-sx">
                                            @isset ($item->options->color)
                                                Color: {{__($item->options->color)}}                                                                                            
                                            @endisset
                                            
                                            @isset ($item->options->size)
                                               - {{$item->options->size}}
                                            @endisset
                                        </div>
                                    </article>
                                </div>
                            </td>

                            <td class="text-center">
                                S/. {{$item->price}}
                            </td>
                            <td class="text-center">
                                {{$item->qty}}
                            </td>
                            <td class="text-center justify-items-end {{$loop->last ? 'border-b-2' : ''}} ">
                               S/. {{$item->price * $item->qty}}                               
                            </td>
    
                    @endforeach 

                    
                </tbody>

            </table>
            
        </div>
      
        <table>
            <tbody class="flex">
                <div class="flex justify-end">
                    <tr>
                        <td class="justify-end">
                            <p class="text-xs">Subtotal : S/. {{$order->total - $order->shipping_cost}}</p>
                        </td>
                    </tr>
                </div>
            </tbody>
        </table>

        <div class="container bg-white rounded-lg shadow-lg p-6 flex justify-between items-center">

            <img class="h-10" src="{{asset('img/VI_MA_DI.png')}}" alt="">

            <div class="text-gray-700">
                <p class="text-xs">Subtotal : S/. {{$order->total - $order->shipping_cost}}</p>

                <p class="text-sm">Envío : S/. {{$order->shipping_cost}}</p>

                <p class="text-lg font-semibold uppercase">Total : S/. {{$order->total}}</p>
            </div>
        </div>

    </div> --}}

    <div class="container py-8 grid grid-cols-5 gap-6">

        <div class="col-span-3">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="">
                    <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden : </span>Order-{{$order->id}}</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-3 mb-6 mt-4 text-center">
                <div class="grid grid-cols-2 gap-3 text-gray-700">
                    <div >
                        <p class="text-lg font-semibold uppercase border-b-2 bg-gray-200 text-center">Datos de Envío</p>
    
                        @if ($order->envio_type == 1)
                            <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                            <p class="text-sm">Calle falsa 123</p>
                        @else
                            <p class="text-sm font-semibold">Los productos serán enviados a :</p>
                            <p class="text-sm uppercase">{{$order->address}}</p>
                            <p>{{$order->department->name}} - {{$order->city->name}} - {{$order->district->name}}</p>
                            <p class="text-sm font-semibold">Referencia: </p>
                            <p>{{$order->references}}</p>
                            
                        @endif
                    </div>
    
                    <div>
                        <p class="text-lg font-semibold uppercase border-b-2 bg-gray-200 text-center">Datos de contacto</p>
                        <p class="text-sm font-semibold">Persona que recibira el producto:</p>
                        <p class="text-sm font-uppercase">{{$order->contact}}</p>
                        <p class="text-sm font-semibold">Telefono de contacto:</p>
                        <p class="text-sm uppercase">{{$order->phone}}</p>
                        
                    </div>
    
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
                <p class="text-xl font-semibold mb-4 border-b-2 text-center">Resumen de compra</p>
    
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
                                        <img class="h-15 w-20 object-cover object-center mr-4" src="{{$item->options->image}}" alt="">
    
                                        <article>
                                            <h1 class="font-bold">{{$item->name}}</h1>
    
                                            <div class="flex text-sx">
                                                @isset ($item->options->color)
                                                    Color: {{__($item->options->color)}}                                                                                            
                                                @endisset
                                                
                                                @isset ($item->options->size)
                                                   - {{$item->options->size}}
                                                @endisset
                                            </div>
                                        </article>
                                    </div>
                                </td>
    
                                <td class="text-center">
                                    S/. {{$item->price}}
                                </td>
                                <td class="text-center">
                                    {{$item->qty}}
                                </td>
                                <td class="text-center justify-items-end {{$loop->last ? 'border-b-2' : ''}} ">
                                   S/. {{$item->price * $item->qty}}                               
                                </td>
        
                        @endforeach 
    
                        
                    </tbody>
    
                </table>
                
            </div>

        </div>

        

        <div class="col-span-2">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="text-center text-lg bg-gray-100 border-b-2 mb-3 font-bold">
                    RESUMEN DE PAGO
                </div>                


                <div class="text-gray-700 px-5 bg-gray-100">
                    <p class="flex justify-between items-center">
                        Subtotal
                        <span class="font-semibold">S/. {{$order->total - $order->shipping_cost}}</span>
                    </p>
                    
                    <p class="flex justify-between items-center">
                        Costo de envío
                        <span class="font-semibold">                            
                                S/. {{$order->shipping_cost}}                        
                        </span>
                    </p>
    
                    <hr class="mt4 mb-3">
    
                    <p class="flex justify-between items-center font-semibold">
                        <span class="text-lg"> Total</span>
                        
                            S/. {{$order->total + $order->shipping_cost}}    
                       
                        
                    </p>
    
                </div>
            </div>

            <div class="container bg-white rounded-lg shadow-lg p-6 flex justify-between items-center mt-4">

                <img class="h-15" src="{{asset('img/VI_MA_DI.png')}}" alt="">
    
            
            </div>
        </div>

    </div>
</x-app-layout>