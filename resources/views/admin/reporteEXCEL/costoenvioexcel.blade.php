<table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>

            </tr>
            <tr>
                <th align="center">
                    <h1>REPORTE COSTO POR ENVÍO</h1>
                </th>
            </tr>

            <tr class="cabecera">
                <th  scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    CODIGO
                </th>
                <th width="25"  scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    DEPARTAMENTO
                </th>

                <th width="25"  scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    CIUDAD
                </th>

                <th width="20"  scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    COSTO
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
