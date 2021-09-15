<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Ventas por enviar</title>

</head>

<div align="center" style="font-size: 25px">
    SISTEMA MUNDO DETALLES
</div>
<table>
    <tr>
        <th>
            <div width="30%" style="padding-left: 10%; margin-bottom: 3%">
                <img width="150" height="85" src="https://mundodetalles.com.pe/img/LOGO.png" />
            </div>

        </th>
        <th>
            <div width="70%" align="center" style="vertical-align: top; padding-top: 10px">

                <h2 style="font-size: 16px"><strong>{{$titulo}}</strong></h2>
                <p style="font-size: 14px"><strong>Usuario : {{ $usuario }}</strong></p>

                @if ($fechaInicio != null & $fechaFin != null )
                    <p style="font-size: 14px"><strong>Fecha de consulta : {{ $fechaInicio }} al {{ $fechaFin }} </strong></p>    
                @else
                    <p style="font-size: 14px"><strong>Fecha :{{date('d-m-Y')}}</strong></p>   

                @endif

                    
                
                
            </div>
        </th>
    </tr>



</table>

<body>

    @php
        $total = 0;
    @endphp

    <x-table-responsive class="mt-3">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <style>
                    table {
                    
                    border-collapse: collapse;
                    width: 100%;
                    }
                    
                    td, th {
                    text-align: left;
                    padding: 2px;
                    
                    }
    
                    tr.cabecera {
                        font-size: 10px;
                        text-transform: uppercase;
                        background-color: #dddddd;
                    }

                    tr.cuerpo {
                        font-size: 11px;
                        text-transform: uppercase;
                        
                    }

                    #Footer{                            
                        border-top: 2px solid rgba(0, 0, 0, 0.24);  
                        /*  poner footer abajo */
                        position: fixed;
                        left: 0;
                        bottom: 0;
                        width: 100%;
                    }
                    
                </style>

                <tr class="cabecera">
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        COMPRA
                    </th>
                    {{-- <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        CANT
                    </th> --}}

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        CLIENTE
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        CONTACTO
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        CELULAR
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        FECHA
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        DEPART.
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        CIUDAD
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        DISTRITO
                    </th> 
                    {{-- <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        IGV
                    </th>    --}}                     
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        DIRECCION
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        REF
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ESTADO
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ENVIO
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        P.ENVIO
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        SUBTOTAL
                    </th>

                    <th scope="col"
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
                                            ORDER: {{ $ventasEnvio->id }}
                                        </div>

                                    </div>
                                </div>
                            </td>
                            {{-- <td class="px-6 py-2 whitespace-nowrap uppercase">
                                <div class="text-sm">{{ $ventasEnvio->cant_total }}</div>
                            </td> --}}

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
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm">S/. {{ $ventasEnvio->shipping_cost}}</div>
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm">S/.{{ $ventasEnvio->total - $ventasEnvio->shipping_cost }}</div>
                            </td>   
                            {{-- <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm">S/.{{ ($ventasEnvio->total - $ventasEnvio->shipping_cost -($ventasEnvio->total - $ventasEnvio->shipping_cost)/1.18)}}</div>
                            </td> --}}
                            <td class="px-6 py-2 whitespace-nowrap text-sm text-red-500">
                                S/. {{ $ventasEnvio->total }}
                            </td>
                            
                        </tr>
                        @php
                        
                            $total = $total + $ventasEnvio->total;
                        @endphp
                        
                @endforeach
                
              
            </tbody>
        </table>
    </x-table-responsive>  

    <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
        <tr class="cuerpo">
            <td width="70%">
                
            </td>
            <td width="14%">
                <b>
                    Total: S/ {{$total}}
                </b>
            </td>
        </tr>
    </table>



</body>

<footer id='Footer'>
    <section class="footer">
        <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
            <tr>
                <td width="40%">
                    <span>Mundo Detalles</span>
                </td>
                <td width="50%" class="text-center">
                    Athantyc System
                </td>
                <td class="text-center" width="10%">
                    Pagina :<span class="pagenum"></span>

                </td>
            </tr>

        </table>
    </section>
</footer>

</html>
