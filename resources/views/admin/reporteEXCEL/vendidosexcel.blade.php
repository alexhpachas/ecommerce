<table class="min-w-full divide-y divide-gray-200">
    
    @php
        $total=0;        
    @endphp
    <thead class="bg-gray-50">
        <tr>

        </tr>
        <tr>
            <th align="center">
                <h1>REPORTE DE PRODUCTOS VENDIDOS         
                    @if ($fechaInicio != null & $fechaFin != null)
                        -       DEL {{$fechaInicio}} AL {{$fechaFin}}
                    @endif
                </h1>
            </th>
        </tr>

        <tr class="cabecera">
            <th width="12" scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                FECHA
            </th>
            <th width="12"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                VENTA
            </th>
            <th width="25"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                CLIENTE
            </th>
            <th width="25"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                PRODUCTO
            </th>   
            <th width="10"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                COLOR
            </th> 
            <th width="10"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                TALLA
            </th> 
            <th width="10"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ENVÍO
            </th> 
            <th width="10"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                PRECIO
            </th>      
            <th width="8"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ITEMS
            </th>       
             <th width="13"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                SUBTOTAL
            </th>     
            <th width="17"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                COSTO ENVIO
            </th>    
            <th width="13"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                TOTAL
            </th> 
            
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($ventas as $venta)            
            @php
                 $contenido_venta = json_decode($venta->content);
            @endphp
            @foreach ($contenido_venta as $contenido)                                                                                                                                            
                    <tr class="cuerpo hover:bg-gray-100 hover:text-red-500 cursor-pointer uppercase">
                        <td class="px-6 py-2 whitespace-nowrap text-sm ">
                            <p>{{$venta->created_at->format('d/m/Y')}}</p>
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap">
                        <div class="flex items-center">
                            {{-- <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                            </div> --}}
                            <div class="">
                            <div class="text-sm ">
                                <p>ORDER-{{$venta->id}}</p>
                            </div>                      
                            </div>
                        </div>
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap">
                            <div class="text-sm ">{{$venta->user->name}}</div>                        
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap">
                            <div class="text-sm ">{{$contenido->name}}</div>                        
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap">
                            @if (isset($contenido->options->color))
                                <p>{{__($contenido->options->color)}}</p>    
                            @endif                        
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm ">
                            @if (isset($contenido->options->size))
                                <p>{{$contenido->options->size}}</p>
                            @endif
                        </td> 
                        <td class="px-6 py-2 whitespace-nowrap">
                            @switch($venta->envio_type)
                                @case(1)
                                    <span>NO</span>
                                    @break
                                @case(2)
                                    <span>SI</span>
                                    @break
                                @default
                                    
                            @endswitch
                                                    
                        </td>
                        <td align="right" class="px-6 py-2 whitespace-nowrap">
                            <div class="text-sm ">S/ {{number_format($contenido->price)}}</div>                        
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap">
                        <div class="text-sm ">{{$contenido->qty}}</div>                        
                        </td>
                        <td align="right" class="px-6 py-2 whitespace-nowrap">
                            <div class="text-sm ">S/ {{number_format($contenido->qty * $contenido->price,2)}}</div>                        
                        </td>

                        <td align="right" class="px-6 py-2 whitespace-nowrap">
                            <div class="text-sm ">S/ {{number_format($venta->shipping_cost,2)}}</div>                        
                        </td>
                        <td align="right" class="px-6 py-2 whitespace-nowrap">
                            <div class="text-sm text-green-600 font-bold ">S/ {{number_format($venta->shipping_cost + $contenido->qty * $contenido->price,2)}}</div>                        
                        </td>                                                                       
                    </tr>

                    @php
                        
                        $total = $total + $venta->shipping_cost + $contenido->qty * $contenido->price;
                    @endphp                                        
                @endforeach
                @if ($loop->last)
                    <tr>

                    </tr>
                    <tr>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>     
                        <td style="background-color: #DCE6F1; color: red">
                            <b>
                                TOTAL VENTAS
                            </b>
                        </td>                    
                        <td style="background-color: #DCE6F1; color: red" align="right" class="three-decimals">
                            <b>S/ {{number_format($total,2) }}</b> 
                        </td>
                    </tr>
                    @endif
            @endforeach

    </tbody>
</table>
