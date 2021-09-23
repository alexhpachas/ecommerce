<div>
    <div class="bg-white shadow-lg rounded-lg p-6 mt-12">
        {{-- FORMULARIO PARA AGREGAR NUEVA TALLA --}}
        <div>
            <x-jet-label class="mb-3">
                Talla
            </x-jet-label>

            <x-jet-input wire:model="name" class="w-full uppercase" type="text" placeholder="Ingrese una talla" />

            <x-jet-input-error for="name" />
        </div>

        <div class="flex justify-end items-center mt-4">
            <x-jet-button 
                    wire:loading.attr="disabled"
                    wire:targer="save"
                    wire:click="save">
                Crear Talla
            </x-jet-button>
        </div>        
    </div>

    {{-- TALLAS DISPONIBLES --}}

    <ul class="mt-12 space-y-4">

        @foreach ($sizes as $size)
            <li wire:key="size-{{$size->id}}" class="bg-white shadow-lg rounded-lg p-6 ">
                <div class="flex items-center">
                    <span class="text-xl font-medium uppercase ">{{$size->name}}</span>
                    
                    
                    <div class="ml-auto">
                        {{-- BOTON EDITAR STOCK --}}
                        <x-jet-button 
                                wire:loading.attr="disabled"
                                wire:target="edit({{$size->id}})"
                                wire:click="edit({{$size->id}})" class="bg-yellow-300">
                            <i class="fas fa-edit"> </i>
                        </x-jet-button>
                        
                        {{-- BOTON ELIMINAR STOCK--}}
                        <x-jet-danger-button wire:click="$emit('deleteSize',{{$size}})">
                            <i class="fas fa-trash"> </i>
                        </x-jet-danger-button>
                        
                    </div>               
                </div>

                @livewire('admin.color-size', ['size' => $size], key('color-size'.$size->id))
                
            </li>
        @endforeach
    </ul>


    {{-- MODAL PARA EDITAR TALLA --}}

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            EDITAR TALLA
        </x-slot>

        <x-slot name="content">
            <x-jet-label>
                Talla
            </x-jet-label>

            <x-jet-input wire:model="name_edit" type="text" class="w-full uppercase" />

            <x-jet-input-error for="name_edit" />
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button 
                        wire:loading.attr="disabled"
                        wire:target="update"
                        wire:click="update">
                ACTUALIZAR
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="$set('open',false)">
                CANCELAR
            </x-jet-danger-button>                    
        </x-slot>
    </x-jet-dialog-modal>


    {{-- @push('script')
        <script>
            Livewire.on('deleteSize', sizeId =>{            
                Swal.fire({
                title: 'Desea Eliminar la Talla?',
                text: "No podra recuperar el registro!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emitTo('admin.size-product','delete',sizeId)
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
        
    @endpush --}}


</div>
