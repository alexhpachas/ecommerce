<div class="container py-12">

    <div class="container">    

        <div class="container flex items-center mb-3  bg-white py-4 rounded-lg shadow-lg">

            <span class="font-semibold lg:text-xl text-gray-600 sm:text-sm uppercase">LISTA DE MARCAS</span>            

            @can('admin.brands.create')                            
                <x-jet-button class="ml-auto rounded-full transform sm:text-xs hover:scale-105" wire:click="$set('openMarcaCreate',true)">
                    NUEVA MARCA
                </x-jet-button>         
            @endcan   
        </div>

        <x-table-responsive>
            @if ($brands->count())
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
                        @foreach ($brands as $brand)
                            <tr class="hover:bg-gray-200 hover:text-red-600">
                                <td class="py-2" wire:key="{{$brand->id}}">
                                    
                                    <a class="uppercase hover:underline hover:text-blue-600 ml-4">
                                        
                                        {{ $brand->name }}
                                    </a>

                                </td>
                                <td class="py-2">
                                    <span class="flex">                                          
                                        @can('admin.brands.edit')                                                                                    
                                            <div wire:click="edit('{{$brand->id}}')" class="flex divide-x divide-gray-300 font-semibold text-right">
                                                <svg class="cursor-pointer focus:outline-none w-7 mr-2 border-gray-900 bg-yellow-500 text-white border rounded-lg p-1 transform  hover:bg-yellow-700 hover:scale-110"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                        @endcan                                  
                                               
                                        @can('admin.brands.delete')                                                                                    
                                            <div wire:click="$emit('deleteBrand','{{$brand->id}}')" class="cursor-pointer w-7 mr-2 border-gray-900 bg-red-500 text-white border rounded-lg p-1 transform hover:bg-red-700 hover:scale-110">
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


    {{-- MODAL PARA CREAR MARCA --}}
    <x-jet-dialog-modal wire:model="openMarcaCreate">
        <x-slot name="title">
            <div class="text-center border-b-2">
                CREAR NUEVA MARCA
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model="createForm.name" class="w-full" type="text" />

                <x-jet-input-error for="createForm.name" />
            </div>
            
        </x-slot>

        <x-slot name="footer">            
            <x-jet-button wire:click="save">
                CREAR MARCA
            </x-jet-button>

            <x-jet-secondary-button wire:click="cancelar">
                CANCELAR
            </x-jet-secondary-button>
            
        </x-slot>
    </x-jet-dialog-modal>

    {{-- FORMULARIO PARA CREAR UNA MARCA --}}
    {{-- <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            CREAR NUEVA MARCA
        </x-slot>

        <x-slot name="description">
            En esta seccion podrá crear una nueva marca
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model="createForm.name" class="w-full" type="text" />

                <x-jet-input-error for="createForm.name" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-button>
                Agregar
            </x-jet-button>
            
        </x-slot>
    </x-jet-form-section> --}}
    
    {{-- LISTA DE MARCAS --}}
    {{-- <x-jet-action-section>
        <x-slot name="title">
            LISTA DE MARCAS
        </x-slot>

        <x-slot name="description">
            Aqui encontrara todas las marcas agregadas            
        </x-slot>

        <x-slot name="content">
            <table class=" text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2 w-full">Nombre</th>
                        <th class="py-2">Accion</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach ($brands as $brand)
                        <tr>
                            <td class="py-2">                               

                                <a class="uppercase ">
                                    {{$brand->name}}                                    
                                </a>
                            </td>
                            <td class="py-2">
                                <span>
                                    <div class="flex divide-x divide-gray-300 font-semibold">
                                        <a wire:click="edit('{{$brand->id}}')" class="pr-2 hover:text-blue-600 cursor-pointer" >Editar</a>
                                        <a wire:click="$emit('deleteBrand','{{$brand->id}}')" class="pl-2 hover:text-rojo-600 cursor-pointer">Eliminar</a>
                                    </div>
                                    
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-jet-action-section> --}}

    {{-- MODAL PARA EDITAR --}}
    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            EDITAR MARCA
        </x-slot>

        <x-slot name="content">
            <x-jet-label>
                Nombre
            </x-jet-label>

            <x-jet-input wire:model="editForm.name" type="text" class="w-full" />

            <x-jet-input-error for="editForm.name" />
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button 
                        wire:loading.attr="disabled"
                        wire:target="update"
                        wire:click="update">
                Actualizar
            </x-jet-danger-button>

            <x-jet-secondary-button wire:click="cancelar" >
                Cancelar
            </x-jet-secondary-button>
            
        </x-slot>
    </x-jet-dialog-modal>

    @push('script')        
        <script>
            Livewire.on('deleteBrand', brandId =>{            
                        Swal.fire({
                        title: 'Desea Eliminar la Marca?',
                        text: "No podra recuperar el registro!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Si, Eliminar!'
                        }).then((result) => {
                        if (result.isConfirmed) {

                            Livewire.emitTo('admin.brand-component','delete',brandId)
                            
                        }
                        })
                    })
        </script>
    @endpush
</div>
