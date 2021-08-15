<x-app-layout>

    <div class="container py-8">
        @foreach ($categories as $category)
            <section class="mb-8 ">
                <div class="flex items-center">
                    <h1 class="text-lg uppercase font-semibold text-gray-700">
                        {{ $category->name }}  
                    </h1>

                    <a href="{{route('categories.show',$category)}}" class="ml-2 text-orange-400 hover:underline hover:text-orange-600 font-semibold "> ver mas</a>
                </div>                
            </section>

            @livewire('category-products', ['category' => $category])

        @endforeach

    </div>


    @push('script')
        <script>
            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    draggable: true,
                    dots: '.glider-' + id + ' ~ .dots',
                    arrows: {
                        prev: '.glider-' + id + ' ~ .glider-prev',
                        next:  '.glider-' + id + ' ~ .glider-next'
                    },
                    responsive: [
                        {
                            breakpoint: 640,
                            settings: {
                                slidesToScroll: 2,
                                slidesToShow: 2.5,
                            }                            
                        },

                        {
                            breakpoint: 768,
                            settings: {
                                slidesToScroll: 3,
                                slidesToShow: 3.5,
                            }                            
                        },

                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToScroll: 4,
                                slidesToShow: 4.5,
                            }                            
                        },

                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToScroll: 5,
                                slidesToShow: 4.5,
                            }                            
                        },
                    ]
                });

            })
        </script>
    @endpush

</x-app-layout>
