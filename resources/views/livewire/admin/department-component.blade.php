<div class="container py-12">

    <div class="container">    
        <div class="container flex items-center mb-3  bg-white py-4 rounded-lg shadow-lg">

            <span class="font-semibold lg:text-xl text-sm text-gray-600 uppercase ">DEPARTAMENTOS</span>                  
                
            </h2>

            @can('admin.departments.create')                            
                <x-jet-button class="ml-auto rounded-full text-sm capitalize transform hover:scale-105" wire:click="$set('openCreateDepartamento',true)">
                    NUEVO DEPART
                </x-jet-button>            
            @endcan
        </div>

        <x-table-responsive>
            @if ($departments->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-full">
                                Nombre del departamento
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($departments as $department)
                            <tr class="hover:bg-gray-200 hover:text-red-600">
                                <td class="py-2" wire:key="{{$department->id}}">
                                    
                                    @can('admin.cities.index')
                                        <a href="{{route('admin.departments.show',$department)}}" class="uppercase hover:underline hover:text-blue-600 ml-4">                                            
                                            {{ $department->name }}
                                        </a>    
                                    @else
                                        <a class="uppercase hover:underline hover:text-blue-600 ml-4">
                                            {{ $department->name }}
                                        </a>
                                        
                                    @endcan
                                    

                                </td>
                                <td class="py-2">
                                    <span class="flex">        
                                        
                                        @can('admin.cities.index')                                                                                    
                                            <a href="{{route('admin.departments.show',$department)}}" class="cursor-pointer w-7 mr-2 border-gray-900 bg-blue-500 text-white border rounded-lg p-1 transform hover:text-white hover:bg-blue-700 hover:scale-110">                                        
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>                                       
                                            </a>
                                        @endcan
                                                                          
                                        @can('admin.departments.edit')                                                                                    
                                            <div wire:click="edit('{{$department->id}}')" class="flex divide-x divide-gray-300 font-semibold text-right">
                                                <svg class="cursor-pointer focus:outline-none w-7 mr-2 border-gray-900 bg-yellow-500 text-white border rounded-lg p-1 transform  hover:bg-yellow-700 hover:scale-110"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                        @endcan
                                        
                                        @can('admin.departments.delete')                                                                                    
                                            <div wire:click="$emit('deleteDepartment','{{$department->id}}')" class="cursor-pointer w-7 mr-2 border-gray-900 bg-red-500 text-white border rounded-lg p-1 transform hover:bg-red-700 hover:scale-110">
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


    {{-- MODAL PARA CREAR DEPARTAMENTO --}}
    <div class="container">
        <x-jet-dialog-modal wire:model="openCreateDepartamento">
            <x-slot name="title">
                NUEVO DEPARTAMENTO
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
                    CREAR DEPARTAMENTO
                </x-jet-button>

                <x-jet-secondary-button wire:click="cancelar">
                    CANCELAR
                </x-jet-secondary-button>
            </x-slot>

        </x-jet-dialog-modal>
    </div>

    {{-- FORMULARIO CREAR DEPARTAMENTO --}}
    {{-- <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Agregar nuevo departamento
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder agregar un departamento
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">             
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model.defer="createForm.name" type="text" class="w-full" />
                <x-jet-input-error for="createForm.name" />
            </div>
        </x-slot>

        <x-slot name="actions">

            <x-jet-button>
                Agregar
            </x-jet-button>
            
        </x-slot>

    </x-jet-form-section> --}}

    {{-- LISTA DEPARTAMENTOS --}}
    {{-- <x-jet-action-section>
        <x-slot name="title">
            LISTA DE DEPARTAMENTOS
        </x-slot>

        <x-slot name="description">
            Aqui encontrara todas los departamentos agregadas
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
                    @foreach ($departments as $department)
                        <tr>
                            <td class="py-2">                           
                                <a href="{{route('admin.departments.show',$department)}}" class="uppercase hover:underline hover:text-blue-600">
                                    {{$department->name}}                                    
                                </a>
                            </td>
                            <td class="py-2">
                                <span>
                                    <div class="flex divide-x divide-gray-300 font-semibold">
                                        <a wire:click="edit({{$department}})" class="pr-2 hover:text-blue-600 cursor-pointer" >Editar</a>
                                        <a wire:click="$emit('deleteDepartment',{{$department}})" class="pl-2 hover:text-rojo-600 cursor-pointer">Eliminar</a>
                                    </div>
                                    
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-jet-action-section> --}}

    {{-- MODAL PARA EDITAR DEPARTAMENTO --}}
    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            EDITAR DEPARTAMENTO
        </x-slot>

        <x-slot name="content">
            <div class="space-y-3">                

                <div>
                    <x-jet-label>
                        Nombre
                    </x-jet-label>

                    <x-jet-input wire:model.defer="editForm.name" class="w-full mt-1" type="text" />

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

            <x-jet-secondary-button wire:click="cancelar">
                CANCELAR
            </x-jet-secondary-button>
            
        </x-slot>
    </x-jet-dialog-modal>


    @push('script')   
        {{-- <script>
            Livewire.on('deleteDepartment', departmentId =>{            
                        Swal.fire({
                        title: 'Desea Eliminar el Departamento?',
                        text: "No podra recuperar el registro!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Si, Eliminar!'
                        }).then((result) => {
                        if (result.isConfirmed) {

                            Livewire.emitTo('admin.department-component','delete',departmentId)
    
                        }
                        })
                    })
        </script> --}}

        <script>
            Livewire.on('deleteDepartment',departmentId =>{

            
            Swal.fire({
            title: 'Desea Eliminar el Departamento?',            
            showCancelButton: true,           
            cancelButtonColor: '#d33',
            confirmButtonText: `Si, Eliminar`,
            cancelButtonText: 'Cancelar',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Livewire.emitTo('admin.department-component','delete',departmentId)
            }
            })
        })
        </script>
    @endpush

</div>
