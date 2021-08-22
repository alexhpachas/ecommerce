{{-- VISTA DEL COMPONENTE CATEGORY-FILTER MOSTRAR PRODUCTOS POR CATEGORIA  --}}
<div>    
    <div class="bg-white rounded-lg shadow-lg mb-4">
        <div class="px-6 py-2 flex justify-between items-center ">
            <h1 class="font-semibold uppercase text-gray-700">{{$category->name}}</h1>

            {{-- BOTONES VISTA GRID O LISTA --}}
            <div class="grid grid-cols-2 border border-gray-400 divide-x divide-gray-400 text-gray-400">            
                <i wire:click="$set('view','grid')" class="fas fa-border-all p-3 cursor-pointer {{$view == 'grid' ? 'text-orange-500' : ''}}" ></i>
                <i wire:click="$set('view','lista')" class="fas fa-th-list p-3 cursor-pointer {{$view == 'lista' ? 'text-orange-500' : ''}}" ></i>
            </div>
        </div>
       
    </div>
    
    
    {{-- PRODUCTOS QUE SE MUESTRAN EN UNA DETERMINADA CATEGORIA --}}

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <aside>    
            <h2 class="font-semibold text-center mb-2">Sub Categorias</h2>
            <ul class="divide-y divide-gray-300">

                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2 text-sm">
                        <a wire:click="$set('subcategoria','{{$subcategory->name}}')" class="cursor-pointer hover:text-orange-500 capitalize {{$subcategoria == $subcategory->name ? 'text-orange-500 font-semibold' : ''}}" >{{$subcategory->name}}</a>
                    </li>                    
                @endforeach
            </ul>
       
            <h2 class="font-semibold text-center mb-2">Marcas</h2>
            <ul class="divide-y divide-gray-300">

                @foreach ($category->brands as $brand)
                    <li class="py-2 text-sm">
                        <a wire:click="$set('marca','{{$brand->name}}')" class="cursor-pointer hover:text-orange-500 capitalize {{$marca == $brand->name ? 'text-orange-500 font-semibold' : ''}}">{{$brand->name}}</a>
                    </li>                    
                @endforeach
            </ul>

            {{-- BOTON ELIMINAR FILTRO DE BUSQUEDA --}}

            <x-jet-danger-button class="mt-4" wire:click="limpiar"> 
                ELIMINAR FILTRO
            </x-jet-danger-button>  
        </aside>

        <div class="grid-cols-1 md:col-span-2 lg:col-span-4">   

            {{-- LISTADO DE PRODUCTO EN VISTA MODO GRID --}}

            @if ($view=='grid')                            

                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                    <li class="bg-white rounded-xl shadow }}">
                        <a class="cursor-pointer" href="{{route('products.show',$product)}}">
                        <article >
                            <figure>
                                @if ($product->images->count())
                                    <img class="h-48 w-full object-cover object-center" src="{{ Storage::url($product->images->first()->url) }}" alt="">    
                                @else
                                    <img class="h-48 w-full object-cover object-center" src="{{ asset('img/product-default.png') }}" alt="">    
                                @endif
                                
                            </figure>

                            <div class="my-4 mx-6">
                                <h1 class="text-lg font-semibold">

                                    <a href="{{route('products.show',$product)}}">
                                        {{ Str::limit($product->name, 20) }}
                                    </a>
                                </h1>

                                <p class="font-bold text-trueGray-700"> S/. {{ $product->price }}</p>
                            </div>
                        </article>
                    </a>
                    </li>                    
                    @endforeach 
                </ul>

            @else

                {{-- LISTADO DE PRODUCTOS EN VISTA MODO LISTA --}}

                <ul>
                    @foreach ($products as $product)
                        {{-- PRODUCTS-LIST COMPONENTE QUE HEMOS CREADO --}}
                        <x-products-list :product="$product">
                            
                        </x-products-list>
                        
                    @endforeach
                </ul>

                
            @endif

            <div class="mt-4">
                {{$products->links()}}
            </div>

        </div>

    </div>
</div>
