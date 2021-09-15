<table class="min-w-full divide-y divide-gray-200">
    
    @php
        $total=0;        
    @endphp
    <thead class="bg-gray-50">
        <tr>

        </tr>
        <tr>
            <th align="center">
                <h1>VENTAS POR ENVIAR 
                    @if ($fechaInicio != null & $fechaFin != null)
                        DEL {{$fechaInicio}} AL {{$fechaFin}}
                    @endif
                </h1>
            </th>
        </tr>

        <tr class="cabecera">
            <th width="10" scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                VENTA
            </th>
            <th width="8"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ITEMS
            </th>
            <th width="15"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                CLIENTE
            </th>
            <th width="28"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                CONTACTO
            </th> 
            <th width="12"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                CELULAR
            </th>   
            <th width="13"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                FECHA
            </th> 
            <th width="17"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                DEPARTAMENTO
            </th>      
            <th width="15"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                CIUDAD
            </th>       
             <th width="20"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                DISTRITO
            </th>     
            <th width="23"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                DIRECCION
            </th>    
            <th width="26"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                REFERENCIA
            </th>
            <th width="11"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ESTADO
            </th> 
            <th width="8"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ENVIO
            </th>  
            <th width="8"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                COSTO
            </th>  
            <th width="11"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                SUBTOTAL
            </th>  
            <th width="11"  scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                TOTAL
            </th>  
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($ventasEnvios as $ventasEnvio)
                        @php
                            $direccionEnvio = json_decode($ventasEnvio->envio);
                        @endphp                                        
                        <tr class="cuerpo hover:bg-gray-100 hover:text-red-500 cursor-pointer">
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="flex items-center">

                                    <div class="">
                                        <div class="text-sm font-medium">
                                            ORDER-{{ $ventasEnvio->id }}
                                        </div>

                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap uppercase">
                                <div class="text-sm">{{ $ventasEnvio->cant_total }}</div>
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap uppercase">
                                <div class="text-sm">{{ $ventasEnvio->user->name }}</div>
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap uppercase">
                                <div class="text-sm">{{ $ventasEnvio->contact }}</div>
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm">{{ $ventasEnvio->phone }}</div>
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm">{{ $ventasEnvio->created_at->format('d/m/Y') }}</div>
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap uppercase">
                                @if (isset($direccionEnvio->department))
                                    <div class="text-sm">{{ $direccionEnvio->department }}</div>    
                                @endif                                
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap uppercase">
                                @if (isset($direccionEnvio->city))
                                    <div class="text-sm">{{ $direccionEnvio->city }}</div>    
                                @endif                                  
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap uppercase">
                                @if (isset($direccionEnvio->district))
                                    <div class="text-sm">{{ $direccionEnvio->district }}</div>    
                                @endif                                
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap uppercase">
                                @if (isset($direccionEnvio->address))
                                    <div class="text-sm">{{ $direccionEnvio->address }}</div>    
                                @endif                                
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap uppercase">
                                @if (isset($direccionEnvio->references))
                                    <div class="text-sm">{{ $direccionEnvio->references }}</div>    
                                @endif 
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap">
                                @switch($ventasEnvio->status)
                                    @case(1)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-500 opacity-75 text-white">
                                            POR PAGAR
                                        </span>

                                    @break
                                    @case(2)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 opacity-75 text-white">
                                            PAGADO
                                        </span>

                                    @break
                                    @case(3)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 opacity-75 text-black">
                                            ENVIADO
                                        </span>

                                    @break
                                    @case(4)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-500 opacity-75 text-white">
                                            ENTREGADO
                                        </span>

                                    @break
                                    @case(5)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 opacity-75 text-white">
                                            ANULADO
                                        </span>

                                    @break
                                    @case(6)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-500 opacity-75 text-white">
                                            RESERVADO
                                        </span>

                                    @break
                                    @default

                                @endswitch
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm">
                                    @switch($ventasEnvio->envio_type)
                                        @case(1)
                                            <span>NO</span>
                                        @break
                                        @case(2)
                                            <span class="text-red-600 font-semibold">SI</span>
                                        @break
                                        @default

                                    @endswitch
                                </div>
                            </td>
                            <td align="right" class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm">S/ {{ number_format($ventasEnvio->shipping_cost)}}</div>
                            </td>
                            <td align="right" class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm">S/ {{ number_format($ventasEnvio->total - $ventasEnvio->shipping_cost,2) }}</div>
                            </td>   
                            {{-- <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm">S/.{{ ($ventasEnvio->total - $ventasEnvio->shipping_cost -($ventasEnvio->total - $ventasEnvio->shipping_cost)/1.18)}}</div>
                            </td> --}}
                            <td align="right" class="px-6 py-2 whitespace-nowrap text-sm text-red-500">
                                S/ {{ number_format($ventasEnvio->total,2) }}
                            </td>
                            
                        </tr>
                        @php
                        
                            $total = $total + $ventasEnvio->total;
                        @endphp

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
                                    TOTAL
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
