<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte precio por envío</title>
    

</head>



<body>

    

   
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
                                   {{--  @php
                                        $departamento = \App\Models\Department::find($ciudade->department_id);
                                    @endphp
                                     {{$departamento->name}} --}}
                                </div>
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
    

</body>



</html>
