<div class="container py-12">

    <div class="container">    

        <div class="container flex items-center mb-3  bg-white py-4 rounded-lg shadow-lg">
            <h2 class="font-semibold text-sm xl:text-xl text-gray-600 uppercase ">
                DISTRITOS DE LA PROVINCIA : <p class="font-bold">{{$city->name}}</p>
            </h2>

            @can('admin.districts.create')                            
                <x-jet-button class="ml-auto rounded-full transform hover:scale-105" wire:click="$set('openCreateDistricts',true)">
                    NUEVO DISTRITO
                </x-jet-button>         
            @endcan   
        </div>

        <x-table-responsive>
            @if ($districts->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-full">
                                Nombre de la marca
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($districts as $district)
                            <tr class="hover:bg-gray-200 hover:text-red-600">
                                <td class="py-2" wire:key="{{$district->id}}">
                                    
                                    <a class="uppercase hover:underline hover:text-blue-600 ml-4">
                                        
                                        {{ $district->name }}
                                    </a>

                                </td>
                                <td class="py-2">
                                    <span class="flex">                                          
                                        @can('admin.districts.edit')                                                                                    
                                            <div wire:click="edit('{{$district->id}}')" class="flex divide-x divide-gray-300 font-semibold text-right">
                                                <svg class="cursor-pointer focus:outline-none w-7 mr-2 border-gray-900 bg-yellow-500 text-white border rounded-lg p-1 transform  hover:bg-yellow-700 hover:scale-110"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                        @endcan                                  
                                               
                                        @can('admin.districts.delete')                                                                                    
                                            <div wire:click="$emit('deleteDistrict','{{$district->id}}')" class="cursor-pointer w-7 mr-2 border-gray-900 bg-red-500 text-white border rounded-lg p-1 transform hover:bg-red-700 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>                                        
                                        @endcan

                                    </span>
                                </td>
                            </tr>
                        @endforeach

                        <!-- More people... -->
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No se encontraron categorias coincidente..!
                </div>
            @endif
            {{-- @if ($products->hasPages())
                        <div class="px-6 py-4">
                            {{$products->links()}}
                        </div>                
                    @endif --}}

        </x-table-responsive>

    </div>    
        
    <x-jet-dialog-modal wire:model="openCreateDistricts">
        <x-slot name="title">
            CREAR NUEVO DISTRITO
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">             
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model.defer="createForm.name" type="text" class="w-full" />
                <x-jet-input-error for="createForm.name" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-button wire:click="save">
                CREAR DISTRITO
            </x-jet-button>

            <x-jet-secondary-button wire:click="cancelar">
                CANCELAR
            </x-jet-secondary-button>

        </x-slot>
    </x-jet-dialog-modal>

    <div class="container py-12">

        
    
        {{-- MODAL PARA EDITAR DISTRITO --}}
        <x-jet-dialog-modal wire:model="editForm.open">
            <x-slot name="title">
                EDITAR DISTRITO
            </x-slot>
    
            <x-slot name="content">
                <div class="space-y-3">                
    
                    <div>
                        <x-jet-label>
                            Nombre
                        </x-jet-label>
    
                        <x-jet-input wire:model="editForm.name" class="w-full mt-1" type="text" />
    
                        <x-jet-input-error for="editForm.name" />
                    </div>
                    
                </div>
                
            </x-slot>
    
            <x-slot name="footer">
                <x-jet-danger-button 
                            wire:click="update"
                            wire:target="update"
                            wire:loading.attr="disabled">
                    ACTUALIZAR
                </x-jet-danger-button>
                
            </x-slot>
        </x-jet-dialog-modal>
    
    </div>

    @push('script')   
        {{-- <script>
            Livewire.on('deleteDistrict', DistrictId =>{            
                        Swal.fire({
                        title: 'Desea Eliminar el Distrito?',
                        text: "No podra recuperar el registro!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Si, Eliminar!'
                        }).then((result) => {
                        if (result.isConfirmed) {

                            Livewire.emitTo('admin.city-component','delete',DistrictId)
    
                        }
                        })
                    })
        </script> --}}
        
        <script>
            Livewire.on('deleteDistrict',DistrictId =>{

            
            Swal.fire({
            title: 'Desea Eliminar el Distrito?',            
            showCancelButton: true,           
            cancelButtonColor: '#d33',
            confirmButtonText: `Si, Eliminar`,
            cancelButtonText: 'Cancelar',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Livewire.emitTo('admin.city-component','delete',DistrictId)
            }
            })
        })
        </script>
    @endpush
</div>
