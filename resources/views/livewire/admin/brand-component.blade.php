<div class="container py-12">

    {{-- FORMULARIO PARA CREAR UNA MARCA --}}
    <x-jet-form-section submit="save" class="mb-6">
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
    </x-jet-form-section>
    
    {{-- LISTA DE MARCAS --}}
    <x-jet-action-section>
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
    </x-jet-action-section>

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

            <x-jet-secondary-button >
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
