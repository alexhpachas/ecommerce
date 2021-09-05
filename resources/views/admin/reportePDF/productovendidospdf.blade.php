<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Productos Vendidos</title>

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
                        font-size: 12px;
                        text-transform: uppercase;
                        background-color: #dddddd;
                    }

                    tr.cuerpo {
                        font-size: 12px;
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
                        FECHA
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        VENTA
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        CLIENTE
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        PRODUCTO
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        COLOR
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        TALLA
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ENVIO
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        PRECIO
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        CANTIDAD
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        SUBTOTAL
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        P.ENVIO
                    </th> 
                    <th scope="col"
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
                        <td class="px-6 py-2 whitespace-nowrap">
                            <div class="text-sm ">S/. {{$contenido->price}}</div>                        
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap">
                        <div class="text-sm ">{{$contenido->qty}}</div>                        
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap">
                            <div class="text-sm ">S/. {{$contenido->qty * $contenido->price}}</div>                        
                        </td>

                        <td class="px-6 py-2 whitespace-nowrap">
                            <div class="text-sm ">S/. {{$venta->shipping_cost}}</div>                        
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap">
                            <div class="text-sm text-green-600 font-bold ">S/. {{$venta->shipping_cost + $contenido->qty * $contenido->price}}</div>                        
                        </td>                                                                       
                    </tr>

                    @php
                        
                        $total = $total + $venta->shipping_cost + $contenido->qty * $contenido->price;
                    @endphp
                @endforeach
            @endforeach

                <!-- More people... -->
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
                    <span>Sistema Mundo Detalles</span>
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
