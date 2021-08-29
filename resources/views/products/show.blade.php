<x-app-layout>

    {{-- DISEÑO DE NUESTRA VISTA DETALLE PRODUCTO --}}
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">

            {{-- PLUGINS FLEXSLIDER PARA MOSTRAR DETALLE DE PRODUCTO MAS INFO -> http://flexslider.woothemes.com/thumbnail-controlnav.html --}}
            <div>                                                    
                <div class="flexslider">
                    <ul class="slides">
                        @if ($product->images->count())
                            @foreach ($product->images as $image)                                            
                                <li data-thumb="{{Storage::url($image->url)}}">
                                    <img src="{{Storage::url($image->url)}}" />
                                </li>                                                           
                            @endforeach
                        @else
                            <li data-thumb="{{asset('img/product-default.png')}}">
                                <img src="{{asset('img/product-default.png')}}" />
                            </li>  
                                
                        @endif
                    </ul>
                </div>

                <div class="-mt-10 text-gray-700">
                    <h2 class="font-bold text-lg">Descripción</h2>
                    {!!$product->description!!}
                </div>
                
            </div>

            {{-- MOSTRAMOS LOS DATOS DEL PRODUCTO QUE VAMOS A COMPRAR --}}
            <div>
                <h1 class="text-2xl text-gray-700 font-semibold">{{$product->name}}</h1>

                <div class="flex">
                    <p class="text-trueGray-700 font-semibold">Marca : <a class="underline capitalize hover:text-orange-500" href="">{{$product->brand->name}}</a></p>
                    <p class="text-trueGray-700 mx-6">5 <i class="fas fa-star text-sm text-yellow-400"></i></p>
                    <a class="text-orange-500 hover:text-orange-700 underline" href="">39 Reseñas</a>
                </div>

                <p class="text-gray-700 text-2xl font-semibold my-4">S/. {{$product->price}}</p>

                <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-greenLime-600">
                            <i class="fas fa-truck text-sm text-white"></i>
                        </span>

                        <div class="ml-4">
                            <p class="text-lg font-semibold text-greenLime-600">Se hacen envíos a todo el Perú</p>
                            <p>Recibelo el {{Date::now()->addDay(7)->locale('es')->format('l j F')}}</p>
                        </div>                                               
    
                    </div>
    
                </div>

                {{-- MOSTRAMOS EL COMPONENTE DEACUERDO A SI EL PRODUCTO TIENE TALLA O COLOR O NO TIENE NADA --}}

                @if ($product->subcategory->size)

                    @livewire('add-cart-item-size', ['product' => $product])

                @elseif($product->subcategory->color)

                    @livewire('add-cart-item-color', ['product' => $product])

                @else
                
                    @livewire('add-cart-item', ['product' => $product])
                
                @endif

            </div>

            

        </div>

    </div>

    {{-- SCRIPT PARA FLEX SLIDER --}}
    
    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
        
    @endpush
</x-app-layout>
