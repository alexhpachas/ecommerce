<div class="flex items-center" x-data>
    {{-- {{$quantity}} --}}
    {{-- BOTON DISMINUIR -> METODO DECREMENT DEFINIDO EN EL COMPONENTE LIVEWIRE --}}
    <x-jet-secondary-button class="rounded-full" 
                disabled {{-- DESHABILITAMOS EL BOTON YA QUE POR DEFECTO EL VALOR DE QTY ES 1 --}}
                x-bind:disabled="$wire.qty <= 1" {{-- DESHABILITAMOS EL BOTON SI LA VARIABLE QTY ES MENOR O IGUAL A 1 --}}
                wire:loading.attr="disabled" {{-- DESHABILITAMOS EL BOTON PARA EVITAR UN VALOR NEGATIVO --}}
                wire:target="decrement" {{-- DESAHIBILITAMOS SOLO CUANDO SE EJECUTE EL METODO DECREMENT --}}
                wire:click="decrement"> {{-- SE EJECUTA EL METODO DECREMENT SI SE HACE CLICK SOBRE EL BOTON --}}
    -
    </x-jet-secondary-button>

    <span class="mx-2 text-gray-700">{{$qty}}</span>

    {{-- BOTON INCREMENTAR -> METODO INCREMENT DEFINIDO EN EL COMPONENTE LIVEWIRE --}}
    <x-jet-secondary-button class="rounded-full" 
                x-bind:disabled="$wire.quantity ==0" {{-- DESHABILITAMOS SI LA CANTIDAD QUE COMPRA ES IGUAL AL STOCK DISPONIBLE --}}
                wire:loading.attr="disabled" {{-- DESAHABILITAMOS MIENTRAS SE EJECUTE UN PROCESO --}}
                wire:target="increment" {{-- LE DECIMOS QUE EL PROCESO ES INCREMENT --}}
                wire:click="increment"> {{-- EJECUTA EL METODO INCREMENT CUANDO SE HAGA CLICK SOBRE EL BOTON --}}
        +
    </x-jet-secondary-button>
</div>