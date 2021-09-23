<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            METODOS DE PAGOS
        </h2>
    </x-slot>

    <div class="container py-9">
        <x-table-responsive>

           
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>                         
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                NOMBRE DEL TITULAR
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                CELULAR DEL TITULAR
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                TIPO
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ESTADO
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                CODIGO QR
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($methods as $method)                                                  
                            <tr>                        
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                      {{$method->name}}
                                    </div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                     {{$method->celular}}
                                    </div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{$method->description}}
                                    </div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        @if ($method->status != 0)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 opacity-75 text-white">
                                                ACTIVO
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 opacity-75 text-white">
                                                INACTIVO
                                            </span>                                            
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        
                                        @if ($method->qr != null)
                                            <img class="w-24 h-24" src="{{Storage::url($method->qr)}}" alt="">    
                                        @else
                                            <div class="w-24 h-24 border">

                                            </div>
                                        @endif
                                        
                                    </div>
                                </td>
                                <td class="py-2">
                                    <span class="flex">                            

                                        @can('admin.payment.edit')                                                                                    
                                            @livewire('admin.show-methods-payment', ['method' => $method->id],key(time()))
                                        @endcan
                                                                                                                                                                                                                                                                                                                                                                                                
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
           
            
        </x-table-responsive>
    </div>

    <style>
        .toggle-path {
            transition: background 0.3s ease-in-out;
        }
        .toggle-circle {
            top: 0.2rem;
            left: 0.25rem;
            transition: all 0.3s ease-in-out;
        }
        input:checked ~ .toggle-circle {
            transform: translateX(100%);
        }
        input:checked ~ .toggle-path {
            background-color:#81E6D9;
        }
    </style>
</x-admin-layout>