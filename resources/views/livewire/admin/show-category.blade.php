<div class="container py-12">
    
    {{-- LISTA DE CATEGORIAS --}}
    <div class="container py-9">    
        {{-- CABECERA DE LAS CATEGORIAS --}}
        <div class="container flex items-center mb-3  bg-white py-4 rounded-lg shadow-lg">
           
                
                <span class="font-bold text-gray-600 uppercase xl:text-xl text-sm text-center">{{$category->name}}</span>
        

            @can('admin.subcategories.create')
                <x-jet-button class="ml-auto rounded-full sm:text-sm transform hover:scale-105" wire:click="$set('openSubcategoryCreate',true)">
                    NUEVA SUBCATEGORIA
                </x-jet-button>    
            @endcan
            

        </div>
        <x-table-responsive>
            @if ($subcategories->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-full">
                                Nombre de Subcategoria
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($subcategories as $subcategory)
                            <tr class="hover:bg-gray-200 hover:text-red-600">
                                <td class="py-2">
                                    

                                    <a class="uppercase text-sm lg:text-lg   ml-4">
                                        {{ $subcategory->name }}
                                    </a>

                                </td>
                                <td class="py-2">
                                    <span class="flex">                                          
                                                         
                                        @can('admin.subcategories.edit')                                                                                    
                                            <div wire:click="edit('{{$subcategory->id}}')" class="flex divide-x divide-gray-300 font-semibold text-right">
                                                <svg class="cursor-pointer focus:outline-none w-7 mr-2 border-gray-900 bg-yellow-500 text-white border rounded-lg p-1 transform  hover:bg-yellow-700 hover:scale-110"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                        @endcan

                                        @can('admin.subcategories.delete')                                                                                    
                                            <div wire:click="$emit('deleteSubcategory','{{$subcategory->id}}')" class="cursor-pointer w-7 mr-2 border-gray-900 bg-red-500 text-white border rounded-lg p-1 transform hover:bg-red-700 hover:scale-110">
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
            
        </x-table-responsive>
    </div>



    {{-- MODAL PARA CREAR SUBCATEGORIA --}}
    <x-jet-dialog-modal wire:model="openSubcategoryCreate">
        <x-slot name="title">
            CREAR NUEVA SUBCATEGORIA
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model="createForm.name" class="w-full mt-1" type="text" />

                <x-jet-input-error for="createForm.name" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Slug
                </x-jet-label>

                <x-jet-input wire:model="createForm.slug" class="w-full mt-1 bg-gray-100" disabled type="text" />

                <x-jet-input-error for="createForm.slug" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-3">
                <div class="flex items-center">
                    <p>¿Esta sub categoria necesita espedicificar color?</p>

                    <div class="ml-auto">

                        {{-- TOGGLE --}}
                        <div class="flex justify-items-start">
                            <label for="toogleButton" class="flex items-center cursor-pointer">                                
                                <div class="relative">
                                    <input wire:model.defer="createForm.color" name="estadoVisita" id="toogleButton" type="checkbox" class="hidden" />
                                    
                                    <div class="toggle-path bg-gray-200 w-9 h-5 rounded-full shadow-inner">

                                    </div>
                                    
                                    <div class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">

                                    </div>
                                </div>                                
                            </label>
                        </div>
                        {{-- FIN TOOGLE --}}                        
                    </div>

                    <x-jet-input-error for="createForm.color" />
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4 mt-3">
                <div class="flex items-center">
                    <p>¿Esta sub categoria necesita espedicificar Talla?</p>

                    <div class="ml-auto">                                
                        {{-- TOOGLE --}}
                        <div class="flex justify-items-start">                                                            
                            <label for="toogleButton2" class="flex items-center cursor-pointer">                                
                                <div class="relative">
                                    <input wire:model.defer="createForm.size" name="estadoVisita" id="toogleButton2" type="checkbox" class="hidden" />
                                        
                                    <div class="toggle-path bg-gray-200 w-9 h-5 rounded-full shadow-inner">

                                    </div>
                                        
                                    <div class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">

                                    </div>
                                </div>
                            </label>
                        </div>                                                    
                    </div>
                </div>
                <x-jet-input-error for="createForm.size" />
            </div>
            
        </x-slot>

        <x-slot name="footer">            
            
            <x-jet-button wire:click="save">
                CREAR SUBCATEGORIA
            </x-jet-button>

            <x-jet-secondary-button wire:click="cancelar">
                CANCELAR
            </x-jet-secondary-button>
            
        </x-slot>
    </x-jet-dialog-modal>    
    
    {{-- FORMULARIO CREAR CATEGORIAS --}}
    {{-- <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            <div class="mb-4">
                CREAR NUEVA SUBCATEGORIA   
            </div>
        </x-slot>

        <x-slot name="description">
            Completa la información necesaria para poder crear una nueva subcategoría
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model="createForm.name" class="w-full mt-1" type="text" />

                <x-jet-input-error for="createForm.name" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Slug
                </x-jet-label>

                <x-jet-input wire:model="createForm.slug" class="w-full mt-1 bg-gray-100" disabled type="text" />

                <x-jet-input-error for="createForm.slug" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <div class="flex items-center">
                    <p>¿Esta sub categoria necesita espedicificar color?</p>

                    <div class="ml-auto">

                       
                        <div class="flex justify-items-start">
                            <label for="toogleButton" class="flex items-center cursor-pointer">                                
                                <div class="relative">
                                    <input wire:model.defer="createForm.color" name="estadoVisita" id="toogleButton" type="checkbox" class="hidden" />
                                    
                                    <div class="toggle-path bg-gray-200 w-9 h-5 rounded-full shadow-inner">

                                    </div>
                                    
                                    <div class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">

                                    </div>
                                </div>                                
                            </label>
                        </div>
                        

                        <label>
                            <input wire:model.defer="createForm.color" type="radio" value="1" name="color">                            
                            Si
                        </label>

                        <label>                            
                            <input wire:model.defer="createForm.color" type="radio" value="0" name="color">
                            No
                        </label>
                    </div>

                    <x-jet-input-error for="createForm.color" />
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <div class="flex items-center">
                    <p>¿Esta sub categoria necesita espedicificar Talla?</p>

                    <div class="ml-auto">
                        
                        <label>
                            <input wire:model.defer="createForm.size" type="radio" value="1" name="size">                            
                            Si
                        </label>

                        <label>                            
                            <input wire:model.defer="createForm.size" type="radio" value="0" name="size">
                            No
                        </label>
                              

                        
                        <div class="flex justify-items-start">                                                            
                            <label for="toogleButton2" class="flex items-center cursor-pointer">                                
                                <div class="relative">
                                    <input wire:model.defer="createForm.size" name="estadoVisita" id="toogleButton2" type="checkbox" class="hidden" />
                                        
                                    <div class="toggle-path bg-gray-200 w-9 h-5 rounded-full shadow-inner">

                                    </div>
                                        
                                    <div class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">

                                    </div>
                                </div>
                            </label>
                        </div>                                                    
                    </div>
                </div>
                <x-jet-input-error for="createForm.size" />
            </div>
                            
        </x-slot>

        <x-slot name="actions">

            <x-jet-action-message class="mr-3 text-red-600" on="saved">
                Registro Creado
            </x-jet-action-message>

            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section> --}}

    {{-- LISTA SUB CATEGORIAS --}}
    {{-- <x-jet-action-section>
        <x-slot name="title">
            LISTA DE SUBCATEGORIAS
        </x-slot>

        <x-slot name="description">
            Aqui encontrara todas las subcategorias agregadas
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
                    @foreach ($subcategories as $subcategory)
                        <tr>
                            <td class="py-2">                               

                                <span  class="uppercase ">
                                    {{$subcategory->name}}                                    
                                </span>
                            </td>
                            <td class="py-2">
                                <span>
                                    <div class="flex divide-x divide-gray-300 font-semibold">
                                        <a wire:click="edit('{{$subcategory->id}}')" class="pr-2 hover:text-blue-600 cursor-pointer" >Editar</a>
                                        <a wire:click="$emit('deleteSubcategory','{{$subcategory->id}}')" class="pl-2 hover:text-rojo-600 cursor-pointer">Eliminar</a>
                                    </div>
                                    
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-jet-action-section> --}}

    {{-- MODAL EDITAR --}}
    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            EDITAR CATEGORIA
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

                <div>
                    <x-jet-label>
                        Slug
                    </x-jet-label>

                    <x-jet-input wire:model="editForm.slug" class="w-full mt-1 bg-gray-100" disabled type="text" />

                    <x-jet-input-error for="editForm.slug" />
                </div>

                <div>
                    <div class="flex items-center">
                        <p>¿Esta sub categoria necesita espedicificar color?</p>
    
                        <div class="ml-auto">
    
                            {{-- TOGGLE --}}
                            <div class="flex justify-items-start">
                                <label for="toogleButtonEdit" class="flex items-center cursor-pointer">                                
                                    <div class="relative">
                                        <input wire:model.defer="editForm.color" name="estadoVisita" id="toogleButtonEdit" type="checkbox" class="hidden" />
                                        
                                        <div class="toggle-path bg-gray-200 w-9 h-5 rounded-full shadow-inner">
    
                                        </div>
                                        
                                        <div class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
    
                                        </div>
                                    </div>                                
                                </label>
                            </div>
                            {{-- FIN TOOGLE --}}                                
                        </div>
    
                        <x-jet-input-error for="editForm.color" />
                    </div>
                </div>
    
                <div>
                    <div class="flex items-center">
                        <p>¿Esta sub categoria necesita espedicificar Talla?</p>
    
                        <div class="ml-auto">                                                       
                                      
                            {{-- TOOGLE --}}
                            <div class="flex justify-items-start">                                                            
                                <label for="toogleButton2Edit" class="flex items-center cursor-pointer">                                
                                    <div class="relative">
                                        <input wire:model.defer="editForm.size" name="estadoVisita" id="toogleButton2Edit" type="checkbox" class="hidden" />
                                            
                                        <div class="toggle-path bg-gray-200 w-9 h-5 rounded-full shadow-inner">
    
                                        </div>
                                            
                                        <div class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
    
                                        </div>
                                    </div>
                                </label>
                            </div>                                                                
                        </div>
                    </div>
                    <x-jet-input-error for="editForm.size" />
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

    @push('script')        
        <script>
            Livewire.on('deleteSubcategory', subcategoryId =>{            
                        Swal.fire({
                        title: 'Desea Eliminar la SubCategoria?',
                        text: "No podra recuperar el registro!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Si, Eliminar!'
                        }).then((result) => {
                        if (result.isConfirmed) {

                            Livewire.emitTo('admin.show-category','delete',subcategoryId)
                            Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Eliminado Correctamente',
                            showConfirmButton: false,
                            timer: 1500
                            })
                        }
                        })
                    })
        </script>
    @endpush
</div>
