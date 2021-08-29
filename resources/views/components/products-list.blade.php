@props(['product'])
<li class="mb-4 bg-white rounded-lg shadow-lg">
    <article class="md:flex ">
        <figure>
            @if ($product->images->count())
                <img class="h-48 w-full md:w-56 object-cover object-center" src="{{Storage::url($product->images->first()->url)}}" alt="">  
            @else
                <img class="h-48 w-full md:w-56 object-cover object-center" src="{{ asset('img/product-default.png')}}" alt="">  
            @endif
            
        </figure>

        <div class="flex-1 py-4 px-6 flex flex-col">
            <div class="lg:flex justify-between">

                <div>
                    <h1 class="text-lg font-semibold text-gray-700">{{$product->name}}</h1>
                    <p class="text-lg font-semibold text-gray-700 "> S/. {{$product->price}}</p>
                </div>

                <div class="flex items-center">
                    <ul class="flex text-sm">
                        <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                        <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                        <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                        <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                        <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                    </ul>

                    <span class="text-sm text-gray-700">(24)</span>

                </div>

            </div>

            {{-- BOTON DETALLES DEL PRODUCTO --}}

            <div class="mt-4 md:mt-auto mb-6">
                <x-danger-enlace href="{{route('products.show',$product)}}">
                    Detalles del producto
                </x-danger-enlace>
            </div>

        </div>
    </article>
</li>