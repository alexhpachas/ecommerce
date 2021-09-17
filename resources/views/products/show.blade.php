<x-app-layout>

    <style>
        /* Tab content - closed */
        .tab-content {
            max-height: 0;
            -webkit-transition: max-height .35s;
            -o-transition: max-height .35s;
            transition: max-height .35s;
        }

        /* :checked - resize to full height */
        .tab input:checked~.tab-content {
            max-height: 60.3vh;
        }

        ::-webkit-scrollbar {
        width: 10px;
        }

        /* Label formatting when open */
        .tab input:checked+label {
            /*@apply text-xl p-1 border-l-2 border-indigo-500 bg-gray-100 text-indigo*/
            font-size: 1rem;
            /*.text-xl*/
            font-weight: bold;
            /* padding: 1rem; */
            /*.p-5*/
            border-left-width: 2px;
            /*.border-l-2*/
            border-color: #6574cd;
            /*.border-indigo*/
            background-color: #f8fafc;
            /*.bg-gray-100 */
            color: #E6600F;
            /*.text-indigo*/
        }

        /* Icon */
        .tab label::after {
            float: right;
            right: 0;
            top: 0;
            display: block;
            width: 1.5em;
            height: 1.5em;
            line-height: 1.5;
            font-size: 1.25rem;
            text-align: center;
            -webkit-transition: all .35s;
            -o-transition: all .35s;
            transition: all .35s;
        }

        /* Icon formatting - closed */
        .tab input[type=checkbox]+label::after {
            content: "+";
            font-weight: bold;
            /*.font-bold*/
            border-width: 1px;
            /*.border*/
            border-radius: 9999px;
            /*.rounded-full */
            border-color: #b8c2cc;
            /*.border-grey*/
        }

        .tab input[type=radio]+label::after {
            content: "\25BE";
            font-weight: bold;
            /*.font-bold*/
            border-width: 1px;
            /*.border*/
            border-radius: 9999px;
            /*.rounded-full */
            border-color: #b8c2cc;
            /*.border-grey*/
        }

        /* Icon formatting - open */
        .tab input[type=checkbox]:checked+label::after {
            transform: rotate(315deg);
            background-color: #6574cd;
            /*.bg-indigo*/
            color: #f8fafc;
            /*.text-grey-lightest*/
        }

        .tab input[type=radio]:checked+label::after {
            transform: rotateX(180deg);
            background-color: #6574cd;
            /*.bg-indigo*/
            color: #f8fafc;
            /*.text-grey-lightest*/
        }

    </style>

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

                {{-- <div class="-mt-10 text-gray-700">
                    <h2 class="font-bold text-lg">Descripción</h2>
                    {!!$product->description!!}
                </div> --}}

                {{-- DESCRIPTION DEL PRODUCTO --}}

               
                    <div class="rounded-lg p-3 w-full -mt-6">                       
                       <div class="shadow-md bg-white rounded-lg w-full container">                                                    
                          <div class="tab bg-white w-full overflow-hidden border-t">
                             <input class="absolute opacity-0" id="tab-multi-three" type="checkbox" name="tabs">
                             <label class="block p-5 leading-normal cursor-pointer font-bold" for="tab-multi-three">DESCRIPCIÓN</label>
                             
                             <div class="tab-content overflow-hidden  bg-white border-indigo-500 leading-normal">
                                <p class="p-5">
                                    
                                    {!!$product->description!!}
                                </p>
                             </div>
                          </div>
                       </div>
                    </div>
                           

                {{-- FIN --}}
                
            </div>

            {{-- MOSTRAMOS LOS DATOS DEL PRODUCTO QUE VAMOS A COMPRAR --}}
            <div>
                <h1 class="text-2xl text-gray-700 font-semibold">{{$product->name}}</h1>

                <div class="flex">
                    <p class="text-trueGray-700 font-semibold">Marca : <a class="underline capitalize hover:text-orange-500" href="">{{$product->brand->name}}</a></p>
                    <p class="text-trueGray-700 mx-6">
                        @if ($qualifications->count())
                            {{round($qualifications->sum('qualification')/$qualifications->count(),1)}}      
                        @else 
                            0
                        @endif
                        
                    <i class="fas fa-star text-sm text-yellow-400"></i></p>
                    <a class="text-orange-500 hover:text-orange-700 underline" href="">{{$qualifications->count()}} Reseñas</a>
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


                {{-- ICONOS DE CALIFICACIÓN DEL PRODUCTO --}}                
                
                <label class="block p-1 leading-normal cursor-pointer font-bold mt-11" for="tab-multi-ten">CALIFICACIÓN DEL PRODUCTO</label>
                <div class="flex flex-1 mt-3">                    
                    <div class="grid grid-cols-6 w-full ">
                        <div class="col-span-1 mt-5 items-center text-center content-center justify-center ">
                            <p class="flex ml-4 items-center text-center content-center font-semibold text-2xl lg:text-5xl justify-center">
                                
                                @if ($qualifications->count())
                                                                                        
                                    {{round($qualification = $qualifications->sum('qualification')/$qualifications->count(),1)}}  
                                    @php
                                        $totalRegistro = $qualifications->count();
                                    @endphp
                                @else                                                                                                                                 
                                    {{$qualification = 0}}
                                    @php
                                        $totalRegistro = 1;
                                    @endphp
                                @endif
                            </p>
                            <div class="flex ml-4 lg:space-x-1 justify-center">
                                <div class="{{$qualification >= 1 ? 'text-yellow-400' : 'text-gray-300'}}">
                                    @if ($qualification >= 1 )
                                        <i class="fas fa-star fa-xs"></i>                        
                                    @else
                                        <i class="fas fa-star fa-xs"></i>                        
                                    @endif                    
                                </div>
                
                                <div class="{{$qualification >= 2 ? 'text-yellow-400' : 'text-gray-300'}}">
                                    @if ($qualification >= 2 )
                                        <i class="fas fa-star fa-xs"></i>                        
                                    @else
                                        <i class="fas fa-star fa-xs"></i>                                              
                                    @endif                    
                                </div>
                
                                <div class="{{$qualification >= 3 ? 'text-yellow-400' : 'text-gray-300'}}">
                                    @if ($qualification >= 3 )
                                        <i class="fas fa-star fa-xs"></i>                        
                                    @else
                                        <i class="fas fa-star fa-xs"></i>                                              
                                    @endif                    
                                </div>
                
                                <div class="{{$qualification >= 4 ? 'text-yellow-400' : 'text-gray-300'}}">
                                    @if ($qualification >= 4 )
                                        <i class="fas fa-star fa-xs"></i>                        
                                    @else
                                        <i class="fas fa-star fa-xs"></i>                                          
                                    @endif                    
                                </div>
                
                                <div class="{{$qualification == 5 ? 'text-yellow-400' : 'text-gray-300'}}">
                                    @if ($qualification == 5 )
                                        <i class="fas fa-star fa-xs "></i>                       
                                    @else
                                        <i class="fas fa-star fa-xs"></i>                                               
                                    @endif                    
                                </div>                                    
                            </div>

                            <p class="flex text-center ml-2 text-sm lg:justify-center">
                                
                                @if ($qualifications->count())
                                    {{$qualifications->count()}} Reseñas    
                                @else
                                    0 Reseñas
                                @endif
                                
                            </p>
                        </div>
                        
                                                                              
                        <div class="col-span-5 ml-5 flex flex-col items-center justify-center ">
                            <div class="flex items-center flex-1 w-full">
                                <div class="lg:w-10 w-20">
                                    <span class="">5</span> <i class="ml-1  fas fa-star fa-xs text-yellow-400"></i>                                                                                                                      
                                </div>

                                @php
                                    $calificacionCinco=0;
                                @endphp

                                @if ($qualifications->count())                                                            
                                    @forelse ($qualifications as $qualification)
                                        @if ($qualification->qualification == 5)
                                            
                                            @php
                                                $calificacionCinco = $calificacionCinco + 1
                                            @endphp                                                           
                                        @endif
                                    @empty
                                        @php
                                            $calificacionCinco = 0;
                                        @endphp
                                    @endforelse
                                    
                                @endif

                                
                                 
                                <div class="relative pt-1 w-full ">
                                    <div class="ml-3 overflow-hidden h-2 text-xs flex rounded bg-gray-400">
                                        <div style="width:{{$calificacionCinco * 100 / $totalRegistro}}%"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap rounded text-white justify-center bg-greenLime-600">
                                        </div>
                                    </div>
                                </div>  
                                <span class="ml-3">                                                                                                                                                                                             
                                    {{$calificacionCinco}}                                                                
                                </span>                                                                                                                                                                                
                            </div>

                            <div class="flex items-center flex-1 w-full">
                                <div class="lg:w-10 w-20">
                                    <span class="">4</span> <i class="ml-1  fas fa-star fa-xs text-yellow-400"></i>                                                                                                                      
                                </div>

                                @php
                                    $calificacionCuatro=0;
                                @endphp

                                @if ($qualifications->count())
                                    @forelse ($qualifications as $qualification)
                                        @if ($qualification->qualification == 4)                                                                        
                                            @php
                                                $calificacionCuatro = $calificacionCuatro + 1;
                                            @endphp                                                                  
                                        @endif
                                    @empty
                                        @php
                                            $calificacionCuatro = 0;
                                        @endphp
                                    @endforelse                                                                
                                @endif
                                

                                <div class="relative pt-1 w-full ">
                                    <div class="ml-3 overflow-hidden h-2 text-xs flex rounded bg-gray-400">
                                        <div style="width:{{$calificacionCuatro * 100 / $totalRegistro}}%"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap rounded text-white justify-center bg-greenLime-600">
                                        </div>
                                    </div>
                                </div>
                                                                                             
                                <span class="ml-3">                                                                
                                    {{$calificacionCuatro}}
                                </span>                                                                                                                                                                                
                            </div>

                            <div class="flex items-center flex-1 w-full">
                                <div class="lg:w-10 w-20">
                                    <span class="">3</span> <i class="ml-1  fas fa-star fa-xs text-yellow-400"></i>                                                                                                                      
                                </div>

                                @php
                                    $calificacionTres=0;
                                @endphp

                                @if ($qualifications->count())
                                    @forelse ($qualifications as $qualification)
                                        @if ($qualification->qualification == 3)                                                                        
                                            @php
                                                $calificacionTres = $calificacionTres + 1;
                                            @endphp                                                                   
                                        @endif
                                    @empty
                                        @php
                                            $calificacionTres = 0;
                                        @endphp
                                    @endforelse                                                                
                                @endif
                                
                                 
                                <div class="relative pt-1 w-full ">
                                    <div class="ml-3 overflow-hidden h-2 text-xs flex rounded bg-gray-400">
                                        <div style="width:{{$calificacionTres * 100 / $totalRegistro}}%"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap rounded text-white justify-center bg-greenLime-600">
                                        </div>
                                    </div>
                                </div>   
                                <span class="ml-3">                                                                
                                    {{$calificacionTres}}
                                </span>                                                                                                                                                                                
                            </div>

                            <div class="flex items-center flex-1 w-full">
                                <div class="lg:w-10 w-20">
                                    <span class="">2</span> <i class="ml-1  fas fa-star fa-xs text-yellow-400"></i>                                                                                                                      
                                </div>
                                @php
                                    $calificacionDos=0;
                                @endphp

                                @if ($qualifications->count())
                                    @forelse ($qualifications as $qualification)
                                        @if ($qualification->qualification == 2)                                                                        
                                            @php
                                                $calificacionDos = $calificacionDos + 1;
                                            @endphp                                                                                                                                         
                                        @endif
                                    @empty
                                        @php
                                            $calificacionDos = 0;
                                        @endphp
                                    @endforelse                                                                 
                                @endif
                                                                                                                                                        
                                <div class="relative pt-1 w-full ">
                                    <div class="ml-3 overflow-hidden h-2 text-xs flex rounded bg-gray-400">
                                        <div style="width:{{$calificacionDos * 100 / $totalRegistro}}%"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap rounded text-white justify-center bg-greenLime-600">
                                        </div>
                                    </div>
                                </div> 
                                <span class="ml-3">
                                    {{$calificacionDos}}
                                </span>                                                                                                                                                                                
                            </div>

                            <div class="flex items-center flex-1 w-full">
                                <div class="lg:w-10 w-20">
                                    <span class="">1</span> <i class="ml-1  fas fa-star fa-xs text-yellow-400"></i>                                                                                                                      
                                </div>
                                @php
                                    $calificacionUno=0;
                                @endphp

                                @if ($qualifications->count())
                                    @forelse ($qualifications as $qualification)
                                        @if ($qualification->qualification == 1)
                                            @php
                                                $calificacionUno = $calificacionUno + 1;
                                            @endphp                                                                                                                                      
                                        @endif                                                                    
                                    @empty
                                        @php
                                            $calificacionUno = 0;
                                        @endphp 
                                    @endforelse                                                                 
                                @endif                                                                                                                       
                                 
                                <div class="relative pt-1 w-full ">
                                    <div class="ml-3 overflow-hidden h-2 text-xs flex rounded bg-gray-400">
                                        <div style="width:{{$calificacionUno * 100 / $totalRegistro}}%"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap rounded text-white justify-center bg-greenLime-600">
                                        </div>
                                    </div>
                                </div>   
                                <span class="ml-3">
                                    {{$calificacionUno}}
                                </span>                                                                                                                                                                                
                            </div>                                                                                                                                                                               
                        </div>                                                                                                                                                            

                    </div>
                    
                    
                </div>

                {{-- FIN --}}
                               
                    <script type="text/javascript">
                        function visualiza_primero() {
                            document.getElementById('contenido').style.maxHeight='60.3vh';                            
                            document.getElementById('primero').style.visibility='visible';
                            document.getElementById('primero').style.display='block';
                            document.getElementById('segundo').style.visibility='hidden';
                            document.getElementById('segundo').style.display='none';
                            var $verMas = 1

                        };    

                        function visualiza_segundo() {
                            document.getElementById('contenido').style.maxHeight='700vh';
                            document.getElementById('segundo').style.visibility='visible';
                            document.getElementById('segundo').style.display='block';
                            document.getElementById('primero').style.visibility='hidden';
                            document.getElementById('primero').style.display='none';
                        };      
                    </script>                                         
                
               
                @php
                    $verMas = 0;
                @endphp

                <script>
   
                    function verMas()
                        {
                            document.getElementById('contenido').style.maxHeight ='600vh';                    
                        }
                </script>

                {{-- <div class="lg:mt-12">
                    <div class="flex flex-1">
                        
                            <div class="w-full  p-2">                                
                                <div class="">
                                    <div class="tab w-full overflow-hidden border-t">
                                        <input class="absolute opacity-0" id="tab-multi-ten" type="radio" name="tabs2">
                                        <label class="block p-1 leading-normal cursor-pointer font-bold" for="tab-multi-ten">RESEÑAS DEL PRODUCTO</label>
                                        <div id='contenido' class="tab-content  {{$verMas == 1 ? 'overflow-x-auto h-30' : ''}} border-l-2 bg-gray-100  leading-normal">
                                            @if ($qualifications->count())                                                                                            
                                            @foreach ($qualifications as $qualificat)
                                                                                            
                                                <div class=" bg-gray-100 flex items-center border-b-2 mt-3 ">
                                                    
                                                    <div class=" w-full px-4 mb-4 ">
                                                    
                                                        <div class="flex items-center space-x-4 py-1">
                                                            <div class="">
                                                                <img class="w-12 h-12 rounded-full" src="{{$qualificat->user()->first()->profile_photo_url}}" alt="" />
                                                            </div>
                                
                                                            <div class="text-sm font-semibold">{{$qualificat->user()->first()->name}} 
                                
                                                            </div>
                                                        </div> 
                                                        @php
                                                            $qualification = $qualificat->qualification;
                                                        @endphp
                                                        
                                                        <div class="flex">
                                                            <div class="{{$qualification >= 1 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                @if ($qualification >= 1 )
                                                                    <i class="fas fa-star fa-xs"></i>                        
                                                                @else
                                                                    <i class="fas fa-star fa-xs"></i>                        
                                                                @endif                    
                                                            </div>
                                            
                                                            <div class="{{$qualification >= 2 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                @if ($qualification >= 2 )
                                                                    <i class="fas fa-star fa-xs"></i>                        
                                                                @else
                                                                    <i class="fas fa-star fa-xs"></i>                                              
                                                                @endif                    
                                                            </div>
                                            
                                                            <div class="{{$qualification >= 3 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                @if ($qualification >= 3 )
                                                                    <i class="fas fa-star fa-xs"></i>                        
                                                                @else
                                                                    <i class="fas fa-star fa-xs"></i>                                              
                                                                @endif                    
                                                            </div>
                                            
                                                            <div class="{{$qualification >= 4 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                @if ($qualification >= 4 )
                                                                    <i class="fas fa-star fa-xs"></i>                        
                                                                @else
                                                                    <i class="fas fa-star fa-xs"></i>                                          
                                                                @endif                    
                                                            </div>
                                            
                                                            <div class="{{$qualification == 5 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                @if ($qualification == 5 )
                                                                    <i class="fas fa-star fa-xs "></i>                       
                                                                @else
                                                                    <i class="fas fa-star fa-xs"></i>                                               
                                                                @endif                    
                                                            </div>    
                                                            
                                                            <span class="ml-2 text-sm mt-1">{{$qualificat->created_at}}</span>
                                                        </div>
                                                                                                                                                                                                                                                                                                                                                    
                                                        <article class="mt-4 text-md content-center text-gray-600">
                                                            {{$qualificat->comment}}
                                                        </article>
                                                    
                                                    </div>
                                
                                                </div>
                                            @endforeach
                                        @endif                                           
                                            <div class="flex flex-1">
                                                <div class="grid grid-cols-6 w-full ">
                                                    <div class="col-span-1 mt-5 items-center text-center content-center justify-center ">
                                                        <p class="flex ml-4 items-center text-center content-center font-semibold text-2xl lg:text-5xl justify-center">
                                                            
                                                            @if ($qualifications->count())
                                                                                                                    
                                                                {{round($qualification = $qualifications->sum('qualification')/$qualifications->count(),1)}}  
                                                                @php
                                                                    $totalRegistro = $qualifications->count();
                                                                @endphp
                                                            @else                                                                                                                                 
                                                                {{$qualification = 0}}
                                                                @php
                                                                    $totalRegistro = 1;
                                                                @endphp
                                                            @endif
                                                        </p>
                                                        <div class="flex ml-4 lg:space-x-1 justify-center">
                                                            <div class="{{$qualification >= 1 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                @if ($qualification >= 1 )
                                                                    <i class="fas fa-star fa-xs"></i>                        
                                                                @else
                                                                    <i class="fas fa-star fa-xs"></i>                        
                                                                @endif                    
                                                            </div>
                                            
                                                            <div class="{{$qualification >= 2 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                @if ($qualification >= 2 )
                                                                    <i class="fas fa-star fa-xs"></i>                        
                                                                @else
                                                                    <i class="fas fa-star fa-xs"></i>                                              
                                                                @endif                    
                                                            </div>
                                            
                                                            <div class="{{$qualification >= 3 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                @if ($qualification >= 3 )
                                                                    <i class="fas fa-star fa-xs"></i>                        
                                                                @else
                                                                    <i class="fas fa-star fa-xs"></i>                                              
                                                                @endif                    
                                                            </div>
                                            
                                                            <div class="{{$qualification >= 4 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                @if ($qualification >= 4 )
                                                                    <i class="fas fa-star fa-xs"></i>                        
                                                                @else
                                                                    <i class="fas fa-star fa-xs"></i>                                          
                                                                @endif                    
                                                            </div>
                                            
                                                            <div class="{{$qualification == 5 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                @if ($qualification == 5 )
                                                                    <i class="fas fa-star fa-xs "></i>                       
                                                                @else
                                                                    <i class="fas fa-star fa-xs"></i>                                               
                                                                @endif                    
                                                            </div>                                    
                                                        </div>

                                                        <p class="flex text-center ml-2 text-sm lg:justify-center">
                                                            
                                                            @if ($qualifications->count())
                                                                {{$qualifications->count()}} Reseñas    
                                                            @else
                                                                0 Reseñas
                                                            @endif
                                                            
                                                        </p>
                                                    </div>
                                                    
                                                                                                          
                                                    <div class="col-span-5 ml-5 flex flex-col items-center justify-center ">
                                                        <div class="flex items-center flex-1 w-full">
                                                            <div class="lg:w-10 w-20">
                                                                <span class="">5</span> <i class="ml-1  fas fa-star fa-xs text-yellow-400"></i>                                                                                                                      
                                                            </div>

                                                            @php
                                                                $calificacionCinco=0;
                                                            @endphp

                                                            @if ($qualifications->count())                                                            
                                                                @forelse ($qualifications as $qualification)
                                                                    @if ($qualification->qualification == 5)
                                                                        
                                                                        @php
                                                                            $calificacionCinco = $calificacionCinco + 1
                                                                        @endphp                                                           
                                                                    @endif
                                                                @empty
                                                                    @php
                                                                        $calificacionCinco = 0;
                                                                    @endphp
                                                                @endforelse
                                                                
                                                            @endif

                                                            
                                                             
                                                            <div class="relative pt-1 w-full ">
                                                                <div class="ml-3 overflow-hidden h-2 text-xs flex rounded bg-gray-400">
                                                                    <div style="width:{{$calificacionCinco * 100 / $totalRegistro}}%"
                                                                        class="shadow-none flex flex-col text-center whitespace-nowrap rounded text-white justify-center bg-greenLime-600">
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                            <span class="ml-3">                                                                                                                                                                                             
                                                                {{$calificacionCinco}}                                                                
                                                            </span>                                                                                                                                                                                
                                                        </div>

                                                        <div class="flex items-center flex-1 w-full">
                                                            <div class="lg:w-10 w-20">
                                                                <span class="">4</span> <i class="ml-1  fas fa-star fa-xs text-yellow-400"></i>                                                                                                                      
                                                            </div>

                                                            @php
                                                                $calificacionCuatro=0;
                                                            @endphp

                                                            @if ($qualifications->count())
                                                                @forelse ($qualifications as $qualification)
                                                                    @if ($qualification->qualification == 4)                                                                        
                                                                        @php
                                                                            $calificacionCuatro = $calificacionCuatro + 1;
                                                                        @endphp                                                                  
                                                                    @endif
                                                                @empty
                                                                    @php
                                                                        $calificacionCuatro = 0;
                                                                    @endphp
                                                                @endforelse                                                                
                                                            @endif
                                                            

                                                            <div class="relative pt-1 w-full ">
                                                                <div class="ml-3 overflow-hidden h-2 text-xs flex rounded bg-gray-400">
                                                                    <div style="width:{{$calificacionCuatro * 100 / $totalRegistro}}%"
                                                                        class="shadow-none flex flex-col text-center whitespace-nowrap rounded text-white justify-center bg-greenLime-600">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                                                                         
                                                            <span class="ml-3">                                                                
                                                                {{$calificacionCuatro}}
                                                            </span>                                                                                                                                                                                
                                                        </div>

                                                        <div class="flex items-center flex-1 w-full">
                                                            <div class="lg:w-10 w-20">
                                                                <span class="">3</span> <i class="ml-1  fas fa-star fa-xs text-yellow-400"></i>                                                                                                                      
                                                            </div>

                                                            @php
                                                                $calificacionTres=0;
                                                            @endphp

                                                            @if ($qualifications->count())
                                                                @forelse ($qualifications as $qualification)
                                                                    @if ($qualification->qualification == 3)                                                                        
                                                                        @php
                                                                            $calificacionTres = $calificacionTres + 1;
                                                                        @endphp                                                                   
                                                                    @endif
                                                                @empty
                                                                    @php
                                                                        $calificacionTres = 0;
                                                                    @endphp
                                                                @endforelse                                                                
                                                            @endif
                                                            
                                                             
                                                            <div class="relative pt-1 w-full ">
                                                                <div class="ml-3 overflow-hidden h-2 text-xs flex rounded bg-gray-400">
                                                                    <div style="width:{{$calificacionTres * 100 / $totalRegistro}}%"
                                                                        class="shadow-none flex flex-col text-center whitespace-nowrap rounded text-white justify-center bg-greenLime-600">
                                                                    </div>
                                                                </div>
                                                            </div>   
                                                            <span class="ml-3">                                                                
                                                                {{$calificacionTres}}
                                                            </span>                                                                                                                                                                                
                                                        </div>

                                                        <div class="flex items-center flex-1 w-full">
                                                            <div class="lg:w-10 w-20">
                                                                <span class="">2</span> <i class="ml-1  fas fa-star fa-xs text-yellow-400"></i>                                                                                                                      
                                                            </div>
                                                            @php
                                                                $calificacionDos=0;
                                                            @endphp

                                                            @if ($qualifications->count())
                                                                @forelse ($qualifications as $qualification)
                                                                    @if ($qualification->qualification == 2)                                                                        
                                                                        @php
                                                                            $calificacionDos = $calificacionDos + 1;
                                                                        @endphp                                                                                                                                         
                                                                    @endif
                                                                @empty
                                                                    @php
                                                                        $calificacionDos = 0;
                                                                    @endphp
                                                                @endforelse                                                                 
                                                            @endif
                                                                                                                                                                                    
                                                            <div class="relative pt-1 w-full ">
                                                                <div class="ml-3 overflow-hidden h-2 text-xs flex rounded bg-gray-400">
                                                                    <div style="width:{{$calificacionDos * 100 / $totalRegistro}}%"
                                                                        class="shadow-none flex flex-col text-center whitespace-nowrap rounded text-white justify-center bg-greenLime-600">
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                            <span class="ml-3">
                                                                {{$calificacionDos}}
                                                            </span>                                                                                                                                                                                
                                                        </div>

                                                        <div class="flex items-center flex-1 w-full">
                                                            <div class="lg:w-10 w-20">
                                                                <span class="">1</span> <i class="ml-1  fas fa-star fa-xs text-yellow-400"></i>                                                                                                                      
                                                            </div>
                                                            @php
                                                                $calificacionUno=0;
                                                            @endphp

                                                            @if ($qualifications->count())
                                                                @forelse ($qualifications as $qualification)
                                                                    @if ($qualification->qualification == 1)
                                                                        @php
                                                                            $calificacionUno = $calificacionUno + 1;
                                                                        @endphp                                                                                                                                      
                                                                    @endif                                                                    
                                                                @empty
                                                                    @php
                                                                        $calificacionUno = 0;
                                                                    @endphp 
                                                                @endforelse                                                                 
                                                            @endif                                                                                                                       
                                                             
                                                            <div class="relative pt-1 w-full ">
                                                                <div class="ml-3 overflow-hidden h-2 text-xs flex rounded bg-gray-400">
                                                                    <div style="width:{{$calificacionUno * 100 / $totalRegistro}}%"
                                                                        class="shadow-none flex flex-col text-center whitespace-nowrap rounded text-white justify-center bg-greenLime-600">
                                                                    </div>
                                                                </div>
                                                            </div>   
                                                            <span class="ml-3">
                                                                {{$calificacionUno}}
                                                            </span>                                                                                                                                                                                
                                                        </div>                                                                                                                                                                               
                                                    </div>                                                                                                                                                            

                                                </div>
                                                
                                                
                                            </div>
                                            
                                            <p id="primero" class="text-red-500 cursor-pointer mt-3 ml-3" style="visibility:visible; display:block;" id="segundo" onclick="visualiza_segundo()">Ver todas las reseñas</p>
                                            <p id="segundo" class="text-red-500 cursor-pointer mt-3 ml-3" style="visibility:hidden; display:none;" id="segundo" onclick="visualiza_primero()">Ver Menos</p>

                                            @if ($qualifications->count())                                                                                            
                                                @foreach ($qualifications as $qualificat)
                                                                                                
                                                    <div class=" bg-gray-100 flex items-center border-b-2 mt-3 ">
                                                        
                                                        <div class=" w-full px-4 mb-4 ">
                                                        
                                                            <div class="flex items-center space-x-4 py-1">
                                                                <div class="">
                                                                    <img class="w-12 h-12 rounded-full" src="{{$qualificat->user()->first()->profile_photo_url}}" alt="" />
                                                                </div>

                                                                <div class="text-sm font-semibold">{{$qualificat->user()->first()->name}} 

                                                                </div>
                                                            </div> 
                                                            @php
                                                                $qualification = $qualificat->qualification;
                                                            @endphp
                                                            
                                                            <div class="flex">
                                                                <div class="{{$qualification >= 1 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                    @if ($qualification >= 1 )
                                                                        <i class="fas fa-star fa-xs"></i>                        
                                                                    @else
                                                                        <i class="fas fa-star fa-xs"></i>                        
                                                                    @endif                    
                                                                </div>
                                                
                                                                <div class="{{$qualification >= 2 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                    @if ($qualification >= 2 )
                                                                        <i class="fas fa-star fa-xs"></i>                        
                                                                    @else
                                                                        <i class="fas fa-star fa-xs"></i>                                              
                                                                    @endif                    
                                                                </div>
                                                
                                                                <div class="{{$qualification >= 3 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                    @if ($qualification >= 3 )
                                                                        <i class="fas fa-star fa-xs"></i>                        
                                                                    @else
                                                                        <i class="fas fa-star fa-xs"></i>                                              
                                                                    @endif                    
                                                                </div>
                                                
                                                                <div class="{{$qualification >= 4 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                    @if ($qualification >= 4 )
                                                                        <i class="fas fa-star fa-xs"></i>                        
                                                                    @else
                                                                        <i class="fas fa-star fa-xs"></i>                                          
                                                                    @endif                    
                                                                </div>
                                                
                                                                <div class="{{$qualification == 5 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                                    @if ($qualification == 5 )
                                                                        <i class="fas fa-star fa-xs "></i>                       
                                                                    @else
                                                                        <i class="fas fa-star fa-xs"></i>                                               
                                                                    @endif                    
                                                                </div>    
                                                                
                                                                <span class="ml-2 text-sm mt-1">{{$qualificat->created_at}}</span>
                                                            </div>
                                                                                                                                                                                                                                                                                                                                                        
                                                            <article class="mt-4 text-md content-center text-gray-600">
                                                                {{$qualificat->comment}}
                                                            </article>
                                                        
                                                        </div>

                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                    </div>
                </div>    --}}                                                 
            </div>                                      
        </div>      
        
        {{-- LISTA DE RESEÑAS --}}        
        @if ($qualifications->count())                    
        <div class="lg:mt-8 mt-4">
            <div class="flex flex-1">                
                <div class="w-full  p-2">                                
                    <div class="">
                        <div class="tab w-full overflow-hidden border-t">
                            <input class="absolute opacity-0" id="tab-multi-ten" type="radio" name="tabs2">
                            <label class="block p-1 leading-normal cursor-pointer font-bold" for="tab-multi-ten">RESEÑAS DEL PRODUCTO</label>
                            <div id='contenido' class="tab-content {{-- overflow-hidden --}} {{$verMas == 1 ? 'overflow-x-auto h-30' : ''}} border-l-2 bg-gray-100  leading-normal">
                                <p id="primero" class="text-red-500 cursor-pointer mt-3 ml-3" style="visibility:visible; display:block;" id="segundo" onclick="visualiza_segundo()">Ver todas las reseñas</p>
                                <p id="segundo" class="text-red-500 cursor-pointer mt-3 ml-3" style="visibility:hidden; display:none;" id="segundo" onclick="visualiza_primero()">Ver Menos</p>                                    
                                @if ($qualifications->count())                                                                                            
                                    @foreach ($qualifications as $qualificat)
                                                                                        
                                        <div class=" bg-gray-100 flex items-center border-b-2 mt-3 ">
                                                
                                            <div class=" w-full px-4 mb-4 ">
                                                
                                                <div class="flex items-center space-x-4 py-1">
                                                    <div class="">
                                                        <img class="w-12 h-12 rounded-full" src="{{$qualificat->user()->first()->profile_photo_url}}" alt="" />
                                                    </div>
                            
                                                    <div class="text-sm font-semibold">{{$qualificat->user()->first()->name}} 
                            
                                                    </div>
                                                </div> 

                                                    @php
                                                        $qualification = $qualificat->qualification;
                                                    @endphp
                                                    
                                                <div class="flex">
                                                <div class="{{$qualification >= 1 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                    @if ($qualification >= 1 )
                                                            <i class="fas fa-star fa-xs"></i>                        
                                                    @else
                                                        <i class="fas fa-star fa-xs"></i>                        
                                                    @endif                    
                                                </div>
                                        
                                                <div class="{{$qualification >= 2 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                    @if ($qualification >= 2 )
                                                        <i class="fas fa-star fa-xs"></i>                        
                                                    @else
                                                        <i class="fas fa-star fa-xs"></i>                                              
                                                    @endif                    
                                                </div>
                                        
                                                <div class="{{$qualification >= 3 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                    @if ($qualification >= 3 )
                                                        <i class="fas fa-star fa-xs"></i>                        
                                                    @else
                                                        <i class="fas fa-star fa-xs"></i>                                              
                                                    @endif                    
                                                </div>
                                        
                                                <div class="{{$qualification >= 4 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                    @if ($qualification >= 4 )
                                                        <i class="fas fa-star fa-xs"></i>                        
                                                    @else
                                                        <i class="fas fa-star fa-xs"></i>                                          
                                                    @endif                    
                                                </div>
                                        
                                                <div class="{{$qualification == 5 ? 'text-yellow-400' : 'text-gray-300'}}">
                                                    @if ($qualification == 5 )
                                                        <i class="fas fa-star fa-xs "></i>                       
                                                    @else
                                                        <i class="fas fa-star fa-xs"></i>                                               
                                                    @endif                    
                                                </div>    
                                                        
                                                <span class="ml-2 text-sm mt-1">{{$qualificat->created_at}}</span>
                                                </div>
                                                                                                                                                                                                                                                                                                                                                
                                                <article class="mt-4 text-md content-center text-gray-600">
                                                    {{$qualificat->comment}}
                                                </article>
                                                
                                            </div>
                            
                                        </div>
                                    @endforeach
                                @endif                                                                                                                                                      
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
        </div>          
        @endif
    </div>

    {{-- SCRIPT PARA FLEX SLIDER --}}
    
    @push('script')

        <script>
            /* Optional Javascript to close the radio button version by clicking it again */
            var myRadios = document.getElementsByName('tabs2');
            var setCheck;
            var x = 0;
            for (x = 0; x < myRadios.length; x++) {
                myRadios[x].onclick = function() {
                    if (setCheck != this) {
                        setCheck = this;
                    } else {
                        this.checked = false;
                        setCheck = null;
                    }
                };
            }
        </script>

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
