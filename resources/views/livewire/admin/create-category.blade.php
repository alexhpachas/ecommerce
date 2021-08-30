<div>       

    {{-- LISTA DE CATEGORIAS --}}
    <div class="container">    
        
        <div class="container flex items-center mb-3  bg-white py-4 rounded-lg shadow-lg">

            <span class="font-semibold lg:text-xl text-gray-600 sm:text-sm">LISTA DE CATEGORIAS</span>
           

            @can('admin.categories.create')                            
                <x-jet-button class="ml-auto rounded-full sm:text-sm transform hover:scale-105" wire:click="$set('openCreate',true)">
                    NUEVA CATEGORIA
                </x-jet-button>                                                   
            @endcan
        </div> 

        <x-table-responsive>
            @if ($categories->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-full">
                                Nombre de categoria
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($categories as $category)
                            <tr class="hover:bg-gray-200 hover:text-red-600">
                                <td class="py-2 sm:text-sm">
                                    <span class="inline-block w-8 text-center ml-4">
                                        {!! $category->icon !!}
                                    </span>

                                    @can('admin.categories.show')                                                                            
                                        <a href="{{ route('admin.categories.show', $category) }}"
                                            class="lg:uppercase capitalize sm:text-sm hover:underline hover:text-blue-600">
                                            {{ $category->name }}
                                        </a>
                                    @else
                                        <a class="lg:uppercase capitalize sm:text-sm hover:underline hover:text-blue-600">>
                                            {{ $category->name }}
                                        </a>
                                        
                                    @endcan

                                </td>
                                <td class="py-2">
                                    <span class="flex">


                                        @can('admin.categories.show')                                                                                    
                                            <a href="{{ route('admin.categories.show', $category) }}" class="cursor-pointer w-7 lg:mr-2 mr-1 border-gray-900 bg-blue-500 text-white border rounded-lg p-1 transform hover:text-white hover:bg-blue-700 hover:scale-110">                                        
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>                                       
                                            </a>
                                        @endcan                                          
                                        
                                        @can('admin.categories.edit')                                                                                    
                                            <div wire:click="edit('{{ $category->slug }}')" class="flex divide-x divide-gray-300 font-semibold text-right lg:mr-2 mr-1">
                                                <svg class="cursor-pointer focus:outline-none w-7 border-gray-900 bg-yellow-500 text-white border rounded-lg p-1 transform  hover:bg-yellow-700 hover:scale-110"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                        @endcan

                                        @can('admin.categories.delete')                                                                                    
                                            <div wire:click="$emit('deleteCategory','{{ $category->slug }}')" class="cursor-pointer w-7 lg:mr-2 border-gray-900 bg-red-500 text-white border rounded-lg p-1 transform hover:bg-red-700 hover:scale-110">
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

    {{-- MODAL PARA CREAR CATEGORIA --}}
    <x-jet-dialog-modal wire:model="openCreate">
        <x-slot name="title">
            CREAR NUEVA CATEGORIA
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model="createForm.name" class="w-full mt-1" type="text" />

                <x-jet-input-error for="createForm.name" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-jet-label>
                    Slug
                </x-jet-label>

                <x-jet-input wire:model="createForm.slug" class="w-full mt-1 bg-gray-100" disabled type="text" />

                <x-jet-input-error for="createForm.slug" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-jet-label>
                    Icono
                </x-jet-label>

                <x-jet-input wire:model.defer="createForm.icon" class="w-full mt-1" type="text" />

                <x-jet-input-error for="createForm.icon" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-jet-label>
                    Marcas
                </x-jet-label>

                <div class="grid grid-cols-4 mt-3">
                    @foreach ($brands as $brand)
                        <x-jet-label>
                            <x-jet-checkbox wire:model.defer="createForm.brands" name="brands[]"
                                value="{{ $brand->id }}" />
                            {{ $brand->name }}

                        </x-jet-label>
                    @endforeach

                </div>
                <x-jet-input-error for="createForm.brands" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-jet-label>
                    Imagen
                </x-jet-label>

                <input  wire:model="createForm.image" class="mt-1" accept="image/*" type="file" id="create-Image{{ $rand }}">                
                <x-jet-input-error for="createForm.image" />
            </div>
            

        </x-slot>

        <x-slot name="footer">
            <x-jet-action-message class="mr-3 text-red-600" on="saved">
                Registro Creado
            </x-jet-action-message>            

            <x-jet-button wire:click="save">
                CREAR CATEGORIA
            </x-jet-button>

            <x-jet-secondary-button wire:click="cancelar">
                CANCELAR
            </x-jet-secondary-button>            
        </x-slot>
    </x-jet-dialog-modal>

    {{-- MODAL PARA EDITAR CATEGORIA --}}
    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            EDITAR CATEGORIA
        </x-slot>

        <x-slot name="content">
            <div class="space-y-3">

                <div>
                    @if ($editImage)
                        <img class="w-full h-64 object-cover object-center" src="{{ $editImage->temporaryUrl() }}"
                            alt="">
                    @else
                        <img class="w-full h-64 object-cover object-center" src="{{ Storage::url($editForm['image']) }}"
                            alt="">
                    @endif

                </div>

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
                    <x-jet-label>
                        Icono
                    </x-jet-label>

                    <x-jet-input wire:model.defer="editForm.icon" class="w-full mt-1" type="text" />

                    <x-jet-input-error for="editForm.icon" />
                </div>

                <div>
                    <x-jet-label>
                        Marcas
                    </x-jet-label>

                    <div class="grid grid-cols-4">
                        @foreach ($brands as $brand)
                            <x-jet-label>
                                <x-jet-checkbox wire:model.defer="editForm.brands" name="brands[]"
                                    value="{{ $brand->id }}" />
                                {{ $brand->name }}

                            </x-jet-label>
                        @endforeach

                    </div>
                    <x-jet-input-error for="editForm.brands" />
                </div>

                <div>
                    <x-jet-label>
                        Imagen
                    </x-jet-label>

                    <input wire:model="editImage" class="mt-1" accept="image/*" type="file" id="edit-Image{{ $randEdit }}">

                    <x-jet-input-error for="editImage" />
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="update" wire:target="editImage,update" wire:loading.attr="disabled">
                ACTUALIZAR
            </x-jet-danger-button>

            <x-jet-secondary-button wire:click="cancelar">
                CANCELAR
            </x-jet-secondary-button>

        </x-slot>
    </x-jet-dialog-modal>




    {{-- FORMULARIO CREAR CATEGORIA --}}
    {{-- <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            <div class="mb-4">
                CREAR NUEVA CATEGORIA   
            </div>
        </x-slot>

        <x-slot name="description">
            Completa la información necesaria para poder crear una nueva categoría
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
                <x-jet-label>
                    Icono
                </x-jet-label>

                <x-jet-input wire:model.defer="createForm.icon" class="w-full mt-1" type="text" />

                <x-jet-input-error for="createForm.icon" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Marcas
                </x-jet-label>

                <div class="grid grid-cols-4 mt-3">
                    @foreach ($brands as $brand)
                        <x-jet-label>
                            <x-jet-checkbox wire:model.defer="createForm.brands" name="brands[]" value="{{$brand->id}}" />
                                {{$brand->name}}
                        
                        </x-jet-label>
                    @endforeach

                </div>
                <x-jet-input-error for="createForm.brands" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Imagen
                </x-jet-label>

                <input wire:model="createForm.image" class="mt-1" accept="image/*" type="file" id="{{$rand}}">

                <x-jet-input-error for="createForm.image" />
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
</div>
