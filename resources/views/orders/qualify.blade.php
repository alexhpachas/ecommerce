<x-app-layout>


    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
    
    <div class="flex container py-12 w-full">
       
        <div class="w-full" x-data="setup()">
            <ul class="flex items-center my-4 ">
                <template x-for="(tab, index) in tabs" :key="index">
                    <li class="cursor-pointer bg-white py-2 px-4 text-gray-500 border"
                        :class="activeTab===index ? 'text-green-500 ' : ''" @click="activeTab = index" x-text="tab">
                    </li>
                </template>
            </ul>

            <div class="w-full bg-white py-6 -mt-4 text-left mx-auto border">
                <div x-show="activeTab===0">
                    <div class="container ">

                        <div class="grid-cols-1 md:col-span-2 lg:col-span-4">
                            <ul>
                                @foreach ($items as $item)
                                    <li class="mb-4 bg-white rounded-lg border-2 border-gray-200">
                                        <article class="md:flex ">
                                            <figure>
                                                @if ($item->options->image)
                                                    <img class="h-48 w-full md:w-56 object-cover object-center"
                                                        src="{{ $item->options->image }}" alt="">
                                                @else
                                                    <img class="h-48 w-full md:w-56 object-cover object-center"
                                                        src="{{ asset('img/product-default.png') }}" alt="">
                                                @endif

                                            </figure>

                                            <div class="flex-1 py-4 px-6 flex flex-col">
                                                <div class="lg:flex justify-between">

                                                    <div class="flex-1 flex-col justify-start">
                                                        <h1 class="flex mr-auto text-lg font-semibold text-gray-700">
                                                            {{ $item->name }}
                                                        </h1>
                                                        <p class="flex mr-auto text-lg font-semibold text-gray-700 ">
                                                            S/. {{ $item->price }}                                                            
                                                        </p>

                                                        <p class="flex mt-6 text-sm font-semibold text-gray-700">
                                                            {!!$item->options->description!!}
                                                        </p>                                                        
                                                    </div>  
                                                    
                                                    {{-- {{$item->rowId}}
                                                    {{$item->options->qualified}} --}}
                                              

                                                    @php
                                                        $qualification = $item->options->qualification
                                                    @endphp

                                                    <div class="text-center justify-center items-center">     

                                                        @if ($item->options->qualified != 0)
                                                            @livewire('qualify-products', ['order' => $order->id , 'item'=> $item->id,'qualified' => $item->options->qualified,'rowId'=>$item->rowId], key($order->id))      
                                                        @else
                                                            @livewire('qualify-products', ['order' => $order->id , 'item'=> $item->id,'qualified' => $item->options->qualified,'rowId'=>$item->rowId], key($order->id))      
                                                        @endif                                                            

                                                        <div
                                                        
                                                            class="flex mt-2 items-center text-center justify-center mb-2">
                                                            <ul class="flex text-sm">
                                                                <div wire:model="qualification" class="cursor-pointer {{$qualification >= 1 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                    @if ($qualification >= 1 )
                                                                        <i class="fas fa-star"></i>                        
                                                                    @else
                                                                        <i class="fas fa-star"></i>                        
                                                                    @endif                    
                                                                </div>
                                                
                                                                <div wire:model="qualification" class="cursor-pointer {{$qualification >= 2 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                    @if ($qualification >= 2 )
                                                                        <i class="fas fa-star"></i>                        
                                                                    @else
                                                                        <i class="fas fa-star"></i>                                              
                                                                    @endif                    
                                                                </div>
                                                
                                                                <div wire:model="qualification" class="cursor-pointer {{$qualification >= 3 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                    @if ($qualification >= 3 )
                                                                        <i class="fas fa-star"></i>                        
                                                                    @else
                                                                        <i class="fas fa-star"></i>                                              
                                                                    @endif                    
                                                                </div>
                                                
                                                                <div wire:model="qualification" class="cursor-pointer {{$qualification >= 4 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                    @if ($qualification >= 4 )
                                                                        <i class="fas fa-star"></i>                        
                                                                    @else
                                                                        <i class="fas fa-star"></i>                                          
                                                                    @endif                    
                                                                </div>
                                                
                                                                <div wire:model="qualification" class="cursor-pointer {{$qualification == 5 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                    @if ($qualification == 5 )
                                                                        <i class="fas fa-star "></i>                       
                                                                    @else
                                                                        <i class="fas fa-star"></i>                                               
                                                                    @endif                    
                                                                </div>  
                                                            </ul>
                                                        </div>
                                                            @foreach ($qualifications as $qualificatio)
                                                                @if ($qualificatio->product_id == $item->id)
                                                                    <textarea disabled class="text-sm form-control " name="" id="" cols="20" rows="3">{{$qualificatio->comment}}</textarea>                                                                   
                                                                @endif
                                                                
                                                            @endforeach                                                                                                              
                                                            
                                                        
                                                    </div>

                                                </div>
                                            </div>
                                        </article>
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function setup() {
            return {
                activeTab: 0,
                tabs: [
                    "COMPRA ORDER-{{ $order->id }}  -  FECHA DE COMPRA {{ $order->created_at->format('d-m-Y')}}",

                ]
            };
        };
    </script>


   
</x-app-layout>


