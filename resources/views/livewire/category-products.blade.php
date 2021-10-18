<div wire:init="loadProducts">

    @if (count($products))

        <div class="glider-contain ">
            <ul class="glider-{{ $category->id }}">
                @foreach ($products as $product)
                    <li
                        class="bg-white rounded-xl shadow hover:shadow-inner hover:bg-gray-200 hover:border-b-2 hover:border-red-500 {{ $loop->last ? '' : 'sm:mr-4' }}">
                        <article>
                            <a href="{{ route('products.show', $product) }}">
                                <figure>
                                    @if ($product->images->count())
                                        <img class="h-48 w-full object-cover object-center"
                                            src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                    @else
                                        <img class="h-48 w-full object-cover object-center"
                                            src="{{ asset('img/product-default.png') }}" alt="">
                                    @endif
                                </figure>
                            </a>

                            <div class="my-4 mx-6 item">
                                <h1 class="text-lg font-semibold">

                                    <a href="{{ route('products.show', $product) }}">
                                        {{ Str::limit($product->name, 20) }}
                                    </a>

                                </h1>
                                <div class="flex text-center items-center content-center">
                                    <p class="font-bold text-sm text-gray-400 line-through  float-left"> S/.
                                        {{ $product->price }}</p>
                                    <span class="font-bold text-red-500 ml-4"> S/. {{ $product->price }}</span>
                                </div>

                                {{-- <a href="{{route('products.show',$product)}}">
                                    <x-boton class="w-full justify-center" href="dsa">
                                        Comprar Ahora
                                    </x-boton>
                                </a> --}}
                            </div>

                        </article>
                    </li>
                @endforeach
            </ul>

            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>

    @else
        <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-lg">
            {{-- <div class="rounded animate-spin ease duration-300 w-10 h-10 border-2 border-indigo-500">
                
            </div> --}}
            
            <x-loading>
                
            </x-loading>


        </div>


    @endif
</div>
