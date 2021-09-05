<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte precio por envío</title>
    <link rel="icon" href="{{asset('img/icono.ico')}}" />

</head>

<div align="center" style="font-size: 25px">
    SISTEMA MUNDO DETALLES
</div>
<table>
    <tr>
        <th>
            <div width="30%" style="padding-left: 10%; margin-bottom: 3%">
                <img src="{{ asset('img/logo.png') }}" width="150" height="85">
            </div>

        </th>
        <th>
            <div width="70%" align="center" style="vertical-align: top; padding-top: 10px">

                <h2 style="font-size: 16px"><strong>{{$titulo}}</strong></h2>
                <p style="font-size: 14px"><strong>Usuario : {{ $usuario }}</strong></p>
                <p style="font-size: 14px; text-transform: uppercase;"><strong>{{$departamento}} - SEGUN FECHA :{{date('d-m-Y')}}</strong></p>
                {{-- <p style="font-size: 14px"><strong>Fecha :{{date('d-m-Y')}}</strong></p>    --}}
                                                
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
                        font-size: 14px;
                        text-transform: uppercase;
                        background-color: #dddddd;
                    }

                    tr.cuerpo {
                        font-size: 14px;
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
                        CODIGO
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        NOMBRE DEL DEPARTAMENTO
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        CIUDAD
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        COSTO DE ENVÍO
                    </th>                    
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($ciudades as $ciudade)
                        <tr class="cuerpo hover:bg-gray-100 hover:text-red-500 cursor-pointer">
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div class="text-sm font-medium ">
                                            {{ $ciudade->id }}
                                        </div>

                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap uppercase">
                                <div class="text-sm ">
                                    @php
                                        $departamento = \App\Models\Department::find($ciudade->department_id);
                                    @endphp
                                     {{$departamento->name}}
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap uppercase">
                                <div class="text-sm ">
                                    {{$ciudade->name}}
                                </div>
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap uppercase">
                                <div class="text-sm font-bold text-red-600">S/. {{ $ciudade->cost }}</div>
                            </td>
        
                        </tr>
                    @endforeach

                <!-- More people... -->
            </tbody>
        </table>
    </x-table-responsive>      

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
