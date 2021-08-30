<div class="bg-white shadow-xl rounded-lg p-6 mb-4">
    <p class=" text-2xl text-center font-semibold mb-2">Estado del producto</p>

    <div class="flex">
        <label class="mr-8 cursor-pointer">
            <input wire:model.defer="status" type="radio" name="status" value="1">
            NO PUBLICAR PRODUCTO EN LA TIENDA
        </label>

        <label class="cursor-pointer"> 
            <input wire:model.defer="status" type="radio" name="status" value="2">
            PUBLICAR PRODUCTO EN LA TIENDA
        </label>        
    </div>


    @can('admin.products.public', Model::class)
        <div class="flex justify-end">
            <x-jet-button 
                    wire:loading.attr="disabled"
                    wire:target="save"
                    wire:click="save">
                ACTUALIZAR
            </x-jet-button>
        </div>            
    @endcan
    


    {{-- TOGLLE BOTON --}}
    {{-- <div>
                
        <div class="flex justify-items-start mt-3">
            <div class="px-2">
                @if ($status==2)
                    Producto Publicado
                @else
                    Producto NO Publicado
                @endif
            </div>
            <label for="toogleButton" class="flex items-center cursor-pointer">
                
                
                <div class="relative">
                    <input wire:model="status" name="estadoVisita" id="toogleButton" type="checkbox" class="hidden" />
                    
                    <div
                        class="toggle-path bg-gray-200 w-9 h-5 rounded-full shadow-inner"
                    ></div>
                    
                    <div
                        class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0"
                    ></div>
                </div>
            </label>

        </div>

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

    </div> --}}
</div>
