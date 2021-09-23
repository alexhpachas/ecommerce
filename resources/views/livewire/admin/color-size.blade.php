<div class="mt-4">

    {{-- FORMULARIO PARA COLOR Y STOCK A UNA TALLA--}}

    <div class="bg-gray-100 shadow-lg rounded-lg p-6">        
        <div class="mb-6">
            <x-jet-label value="Color" />

            <div class="grid grid-cols-6 gap-6">
                @foreach ($colors as $color)
                    <label class="cursor-pointer uppercase">
                        <input wire:model.defer="color_id"  type="radio" name="color_id" value="{{$color->id}}">
                        <span class="ml-1 text-gray-700 uppercase ">
                            {{__($color->name)}}
                        </span>
                    </label>
                @endforeach
            </div>
            <x-jet-input-error for="color_id" />
        </div>

        {{-- INPUT DE CANTIDAD --}}
        <div>
            <x-jet-label value="Stock" />
            <x-jet-input wire:model.defer="quantity" class="w-full" type="number" placeholder="Ingrese una cantidad" />            

            <x-jet-input-error for="quantity" />
        </div>

        <div class="flex justify-end items-center mt-3">

            <x-jet-action-message class="mr-3 text-red-500" on="saved">
                Agregado
            </x-jet-action-message>

            <x-jet-button 
                    wire:loading.attr="disabled"
                    wire:target="save"
                    wire:click="save"
                    >
                Agregar
            </x-jet-button>
        </div>
    </div>



    {{-- LISTA DE LOS COLORES Y STOCK --}}

    @if ($size_colors->count())
            
        <div class="mt-8">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2 w-1/3">COLOR</th>
                        <th class="px-4 py-2 w-1/3">STOCK</th>
                        <th class="px-4 py-2 w-1/3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($size_colors as $size_color)
                        <tr wire:key="size_color-{{$size_color->pivot->color_id}}">
                            <td class="uppercase px-4 py-2 text-sm">                            
                                {{__($colors->find($size_color->pivot->color_id)->name)}}
                            </td>
                            <td class="px-4 py-2 text-sm">
                                {{$size_color->pivot->quantity}} UNIDAD                            
                            </td>
                            <td class="px-4 py-2 flex">
                                
                                {{-- BOTON ACTUALIZAR --}}                                
                                <div wire:loading.attr="disabled" wire:target="edit({{$size_color->pivot->id}})" wire:click="edit({{$size_color->pivot->id}})" class="flex divide-x divide-gray-300 font-semibold text-right ml-auto">
                                    <svg class="cursor-pointer focus:outline-none w-7 mr-2 bg-yellow-500 text-white border rounded-lg p-1 transform  hover:bg-yellow-700 hover:scale-110"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </div>

                            
                                
                                {{-- BOTON ELIMINAR --}}
                                <div wire:loading.attr="disabled" wire:target="editDelete({{$size_color->pivot->id}})" wire:click="editDelete({{$size_color->pivot->id}})" class=" cursor-pointer w-7 mr-2 bg-red-500 text-white border rounded-lg p-1 transform hover:bg-red-700 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </div>
                                                                                         
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    
    @endif

    {{-- MODAL PARA ACTUALIZAR EL STOCK --}}

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            <div class="text-center text-gray-700 font-semibold border-b-2">
                ACTUALIZAR COLOR
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label>
                    Color
                </x-jet-label>

                <select wire:model="pivot_color_id" class=" form-control w-full uppercase">
                    <option value="" disabled selected>Seleccione un color</option>

                    @foreach ($colors as $color)
                    <option value="{{$color->id}}">{{ucfirst(__($color->name))}}</option>
                    @endforeach
                </select>
                
            </div>

            <div>
                <x-jet-label>
                    Stock
                </x-jet-label>

                <x-jet-input wire:model="pivot_quantity" class="w-full" type="number" placeholder="Ingrese cantidad">

                </x-jet-input>
            </div>
        </x-slot>

        <x-slot name="footer">            
            <x-jet-danger-button                     
                    wire:click="$set('open',false)">
                CANCELAR
            </x-jet-danger-button>

            <x-jet-button 
                    wire:loading.attr="disabled"
                    wire:target="update"
                    wire:click="update">
                ACTUALIZAR
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>


    {{-- MODAL PARA ELIMINAR EL STOCK --}}

    <x-jet-dialog-modal wire:model="openDelete">
        <x-slot name="title">
            <div class="text-center text-gray-700 font-semibold border-b-2">
                ELIMINAR COLOR
            </div>
        </x-slot>

        <x-slot name="content">
            <p class="font-bold">ESTA SEGURO QUE DESEA ELIMINAR ESTE REGISTRO?</p>
            <span class="text-sm">Si elimina no podra recuperar el Registro</span>
        </x-slot>

        <x-slot name="footer">            
            <x-jet-danger-button                     
                    wire:click="$set('openDelete',false)">
                CANCELAR
            </x-jet-danger-button>

            <x-jet-button 
                    wire:loading.attr="disabled"
                    wire:target="updateDelete"
                    wire:click="updateDelete">
                ELIMINAR
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>


    @push('script')
        <script>
            Livewire.on('deletePivot', pivot =>{            
                Swal.fire({
                title: 'Desea Eliminar el Color?',
                text: "No podra recuperar el registro!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emitTo('admin.color-size','delete',pivot)
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
