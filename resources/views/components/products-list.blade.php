@props(['product'])
<li class="mb-4">
    <article class="flex bg-white rounded-lg shadow-lg">
        <figure>
            <img class="h-48 w-56 object-cover object-center" src="{{Storage::url($product->images->first()->url)}}" alt="">
        </figure>

        <div class="flex-1 py-4 px-6 flex flex-col">
            <div class="flex justify-between">

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

            <div class="mt-auto mb-6">
                <x-danger-enlace href="{{route('products.show',$product)}}">
                    Detalles del producto
                </x-danger-enlace>
            </div>

        </div>
    </article>
</li>