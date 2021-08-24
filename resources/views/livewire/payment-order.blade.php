<div>

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
                                                @isset($item->options->color)
                                                    Color: {{__($item->options->color)}}                                                                                            
                                                @endisset
                                                
                                                @isset($item->options->size)
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

    @php
        // SDK de Mercado Pago  siempre poner base_path('/vendor/autoload.php');
        require base_path('/vendor/autoload.php');
        // Agrega credenciales   config -> nos posiciona en la carpeta config -> luego le damos el archivo services con el punto
        // le decimos que quiero ingresar a mercadopago(esta dentro del archivo services.php) -> luego con el punto le decimos
        //que quiero acceder al token
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
        
        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();
        
        $shipments = new MercadoPago\Shipments();
        
        $shipments->cost = $order->shipping_cost;
        $shipments->mode = 'not_specified';
        
        $preference->shipments = $shipments;
        
        foreach ($items as $product) {
            //cada q itere no lo almacenamos en $item xk entrara en conflicto con la variable $item de mercado pago es un variable propia
            // Crea un ítem en la preferencia
            $item = new MercadoPago\Item();
            $item->title = $product->name;
            $item->quantity = $product->qty;
            $item->unit_price = $product->price;
        
            $products[] = $item;
        }
        
        $preference->back_urls = [
            'success' => route('orders.pay', $order),
            'failure' => 'http://www.tu-sitio/failure',
            'pending' => 'http://www.tu-sitio/pending',
        ];
        $preference->auto_return = 'approved';
        
        $preference->items = $products;
        $preference->save();
        
    @endphp


    <div class="container py-8 grid grid-cols-5 gap-6">

        <div class="col-span-3">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="text-center">
                    <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden :
                        </span>Order-{{ $order->id }}</p>
                </div>
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
                                            <h1 class="font-bold">{{ $item->name }}</h1>

                                            <div class="flex text-sx">
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

        </div>



        <div class="col-span-2">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="text-center text-lg bg-gray-100 border-b-2 font-bold">
                    RESUMEN DE PAGO
                </div>

                <div class="text-gray-700 px-5 bg-gray-100 mt-4">
                    <p class="flex justify-between items-center">
                        Subtotal
                        <span class="font-semibold">S/. {{ $order->total - $order->shipping_cost }}</span>
                    </p>

                    <p class="flex justify-between items-center mt-1">
                        Costo de envío
                        <span class="font-semibold">
                            S/. {{ $order->shipping_cost }}
                        </span>
                    </p>

                    <hr class="mt4 mb-3">

                    <p class="flex justify-between items-center font-semibold">
                        <span class="text-lg"> Total</span>

                        S/. {{ $order->total }}
                    </p>

                </div>

                <img class="h-15" src="{{ asset('img/VI_MA_DI.png') }}" alt="">

            </div>

            {{-- BOTON MERCADO PAGO --}}
            <div class="container bg-white rounded-lg shadow-lg p-6 flex  items-center mt-4 mb-4">
                <div class="cho-container w-full">

                </div>
            </div>

            <div class="container  rounded-lg content-center">

                <div id="paypal-button-container" class="w-full">

                </div>

            </div>

        </div>

    </div>


    @push('script')
        {{-- CDN PARA MERCADO PAGO --}}

        <script src="https://sdk.mercadopago.com/js/v2"></script>


        {{-- SCRIPT PARA MERCADO PAGO --}}
        <script>
            // Agrega credenciales de SDK
            const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
                locale: 'es-AR'
            });

            // Inicializa el checkout
            mp.checkout({
                preference: {
                    id: '{{ $preference->id }}'
                },
                render: {
                    container: '.cho-container', // Indica el nombre de la clase donde se mostrará el botón de pago
                    label: 'Pagar', // Cambia el texto del botón de pago (opcional)
                }
            });
        </script>

        {{-- SCRIPT PAYPAL --}}
        <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}">
            //AQUI ESPECIFICAMOS ID PAYPAL SIMILAR A MERCADO PAGO
        </script>

        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: "{{ $order->total }}"
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    // This function captures the funds from the transaction.
                    return actions.order.capture().then(function(details) {
                        // This function shows a transaction success message to your buyer.
                        Livewire.emit('payOrder');
                    });
                }
            }).render('#paypal-button-container');
            //This function displays Smart Payment Buttons on your web page.
        </script>

    @endpush

</div>
