<div class="flex-1 relative" x-data>

    <form action="{{ route('search') }}" autocomplete="off">

        <div class="flex">
            
            <select class="flex rounded-tl-full text-sm lg:text-base rounded-bl-full border-2 border-gray-700 w-28 lg:max-w-screen-lg" onchange="location = this.options[this.selectedIndex].value;">
                <option value="" disabled selected>Todas </option>
                @foreach ($categories as $category)
                    <option value="{{route('categories.show',$category)}}"><a href="">{{$category->name}}</a></option>
                @endforeach
            </select>

            <x-jet-input name="name" wire:model="search" type="text" class="w-full border-2 border-gray-700" placeholder="¿Estas Buscando algún producto?" />    
        </div>
        
        <button class="absolute top-0 right-0 w-12 h-full bg-orange-500 flex items-center justify-center rounded-r-md ">
            <x-search size="35" color='white' />
        </button>
    </form>

    <div class="absolute w-full mt-1 hidden" :class="{ 'hidden' : !$wire.open}" @click.away="$wire.open = false">
        <div class="bg-white rounded-lg shadow">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)
                    <a href="{{route('products.show',$product)}}" class="flex">
                        @if ($product->images->count())                                                    
                            <img class="h-12 w-16 object-cover" src="{{Storage::url($product->images->first()->url)}}" alt="">

                            <div class="ml-4 text-gray-700">
                                <p class="text-lg font-semibold leading-5">{{$product->name}}</p>
                                <p>Categoria: {{$product->subcategory->category->name}}</p>
                            </div>
                        @else
                            <p class="text-lg leading-5">
                                No existe ningún producto con los parametros especificados
                            </p>                        
                        @endif
                    </a>                    
                @empty
                    <p class="text-lg leading-5">
                        No existe ningún producto con los parametros especificados
                    </p>
                    
                @endforelse

            </div>
        </div>

    </div>
</div>
