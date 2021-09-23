<div>
    <div class="bg-white my-12 shadow-lg rounded-lg p-6">
        {{-- COLOR --}}
        <div class="mb-6">
            <x-jet-label value="COLOR" class="mb-3" />

            <div class="grid grid-cols-6 gap-6">
                @foreach ($colors as $color)
                    <label class="cursor-pointer">
                        <input wire:model.defer="color_id" class="uppercase" type="radio" name="color_id" value="{{$color->id}}">
                        <span class="ml-1 text-gray-700 uppercase ">
                            {{__($color->name)}}
                        </span>
                    </label>
                @endforeach
            </div>
            <x-jet-input-error for="color_id" />
        </div>

        {{-- CANTIDAD --}}
        <div>
            <x-jet-label value="Cantidad" />
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

    @if ($product->colors->count())
            
        <div class="bg-white shadow-lg rounded-lg p-6">
            <table>
                <thead>
                    <tr>
                        <th class="px-4 py-2 w-1/3">COLOR</th>
                        <th class="px-4 py-2 w-1/3">STOCK</th>
                        <th class="px-4 py-2 w-1/3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product_colors as $product_color)
                        <tr wire:key="product_color-{{$product_color->pivot->color_id}}">
                            <td class="uppercase px-4 py-2">
                                {{-- ACCEDER A LA TABLA PIVOT --}}
                                {{-- {{$product_color->pivot}} --}}
                                {{__($colors->find($product_color->pivot->color_id)->name)}}
                            </td>
                            <td class="px-4 py-2">
                                {{$product_color->pivot->quantity}} UNIDADES                            
                            </td>
                            <td class="px-4 py-2 flex">
                                <x-jet-secondary-button 
                                        wire:loading.attr="disabled"
                                        wire:target="edit"
                                        wire:click="edit({{$product_color->pivot->id}})" class="ml-auto mr-2">
                                    ACTUALIZAR
                                </x-jet-secondary-button>

                                <x-jet-danger-button wire:click="$emit('deletePivot',{{$product_color->pivot->id}})">
                                    ELIMINAR
                                </x-jet-danger-button>
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
                    Cantidad
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

    {{-- @push('script')
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

                    Livewire.emitTo('admin.color-product','delete',pivot)
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
