<div x-data>
    {{-- @if ($quantity != 0)
        <p class="text-gray-700 mb-4"><span class="font-semibold text-lg">Stock disponible :</span>{{$quantity}}</p>    
    @else
        
    @endif --}}
    

    <div>
        <p class="text-xl text-gray-700">Talla :</p>

        <select wire:model ="size_id" class="form-control w-full">
            <option value="" disabled selected>Seleccione una talla</option>
                @foreach ($sizes as $size)
                    <option value="{{$size->id}}">{{$size->name}}</option>
                @endforeach
        </select>     
    </div>

    
    <div class="mt-2">
        <p class="text-xl text-gray-700">Color :</p>

        <select wire:model ="color_id" class="form-control w-full">
            <option value="" disabled selected>Seleccione un Color</option>
                @foreach ($colors as $color)
                    <option class="capitalize" value="{{$color->id}}">{{__($color->name)}}</option>
                @endforeach
        </select>     
    </div>

    <p class="text-gray-700 my-4"><span class="font-semibold text-lg">Stock disponible: </span>
        @if ($quantity)
            {{$quantity}}
        @else
            {{$product->stock}}
        @endif
    </p>

    <div class="flex">
        <div class="mr-4">

            {{-- BOTON DISMINUIR -> METODO DECREMENT DEFINIDO EN EL COMPONENTE LIVEWIRE --}}
            <x-jet-secondary-button 
                    disabled {{-- DESHABILITAMOS EL BOTON YA QUE POR DEFECTO EL VALOR DE QTY ES 1 --}}
                    x-bind:disabled="$wire.qty <= 1" {{-- DESHABILITAMOS EL BOTON SI LA VARIABLE QTY ES MENOR O IGUAL A 1 --}}
                    wire:loading.attr="disabled" {{-- DESHABILITAMOS EL BOTON PARA EVITAR UN VALOR NEGATIVO --}}
                    wire:target="decrement" {{-- DESAHIBILITAMOS SOLO CUANDO SE EJECUTE EL METODO DECREMENT --}}
                    wire:click="decrement"> {{-- SE EJECUTA EL METODO DECREMENT SI SE HACE CLICK SOBRE EL BOTON --}}
                -
            </x-jet-secondary-button>

            <span class="mx-2 text-gray-700">{{$qty}}</span>
            
            {{-- BOTON INCREMENTAR -> METODO INCREMENT DEFINIDO EN EL COMPONENTE LIVEWIRE --}}
            <x-jet-secondary-button 
                    x-bind:disabled="$wire.qty >= $wire.quantity" {{-- DESHABILITAMOS SI LA CANTIDAD QUE COMPRA ES IGUAL AL STOCK DISPONIBLE --}}
                    wire:loading.attr="disabled" {{-- DESAHABILITAMOS MIENTRAS SE EJECUTE UN PROCESO --}}
                    wire:target="increment" {{-- LE DECIMOS QUE EL PROCESO ES INCREMENT --}}
                    wire:click="increment"> {{-- EJECUTA EL METODO INCREMENT CUANDO SE HAGA CLICK SOBRE EL BOTON --}}
                +
            </x-jet-secondary-button>
        </div>
        

        {{-- BOTON CARRITO DE COMPRAS -> COMPONENTE QUE HEMOS CREADO --}}
        <div class="flex-1">
            <x-button 
                    wire:click="addItem"
                    wire:loading.attr="disabled"
                    wire:target="addItem"
                    x-bind:disabled="!$wire.quantity" color="orange" class="w-full">
                Agregar al carrito de compras
            </x-button>       
        </div>

        
    </div>

    {{-- <div class="mt-4">
        @if ($quantity != 0)
            <p class="text-gray-700 mb-4"><span class="font-semibold text-lg">Stock disponible :</span>{{$quantity}}</p>    
        @else
            
        @endif
    </div> --}}
</div>
