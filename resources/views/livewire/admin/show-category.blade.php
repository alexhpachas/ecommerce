<div class="container py-12">

    {{-- FORMULARIO CREAR CATEGORIAS --}}
    <x-jet-form-section submit="save" class="mb-6">
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

        <x-slot name="actions">

            <x-jet-action-message class="mr-3 text-red-600" on="saved">
                Registro Creado
            </x-jet-action-message>

            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    {{-- LISTA SUB CATEGORIAS --}}
    <x-jet-action-section>
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
    </x-jet-action-section>

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
    
                            <label>
                                <input wire:model.defer="editForm.color" type="radio" value="1" name="color">                            
                                Si
                            </label>
    
                            <label>                            
                                <input wire:model.defer="editForm.color" type="radio" value="0" name="color">
                                No
                            </label>
                        </div>
    
                        <x-jet-input-error for="editForm.color" />
                    </div>
                </div>
    
                <div>
                    <div class="flex items-center">
                        <p>¿Esta sub categoria necesita espedicificar Talla?</p>
    
                        <div class="ml-auto">
                            
                            <label>
                                <input wire:model.defer="editForm.size" type="radio" value="1" name="size">                            
                                Si
                            </label>
    
                            <label>                            
                                <input wire:model.defer="editForm.size" type="radio" value="0" name="size">
                                No
                            </label>
                                  
    
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
                        title: 'Desea Eliminar la Sub Categoria?',
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
