<div>
    <div class="flex lg:mb-1 mb-3 lg:mr-5">
        {{-- <div class="cursor-pointer hover:border-2 border-red-600">
            <img class="lg:h-10 lg:w-9 h-30 w-20" src="{{asset('img/metodo_pago/soles.png')}}" alt="">
        </div> --}}

        <div wire:click="$set('openLukita',true)" class="cursor-pointer hover:border-2 border-red-600 {{$lukita->status == 0 ? 'hidden' : ''}}">
            <img class="lg:h-10 lg:w-11 h-32 w-24" src="{{asset('img/metodo_pago/lukita.png')}}" alt="">
        </div>

        <div wire:click="$set('openTunki',true)" class=" cursor-pointer hover:border-2 border-red-600 {{$tunki->status == 0 ? 'hidden' : ''}}">
            <img class="lg:h-10 lg:w-11 h-32 w-24" src="{{asset('img/metodo_pago/tunki.png')}}" alt="">
        </div>

        <div wire:click="$set('openYape',true)" class=" cursor-pointer hover:border-2 border-red-600 {{$yape->status == 0 ? 'hidden' : ''}}">
            <img class="lg:h-10 lg:w-11 h-32 w-24" src="{{asset('img/metodo_pago/yape.png')}}" alt="">
        </div>
        <div wire:click="$set('openPlim',true)" class=" cursor-pointer hover:border-2 border-red-600 {{$plim->status == 0 ? 'hidden' : ''}}">
            <img class="lg:h-10 lg:w-11 h-32 w-24" src="{{asset('img/metodo_pago/plin2.png')}}" alt="">
        </div>        
    </div>


    {{-- MODLA PAGO YAPE --}}
    <x-jet-dialog-modal wire:model="openYape" >
        <x-slot name="title">
            <div class="flex border-b-2 text-purple-700 text-center items-center justify-center text-4xl">
                PAGA AQUI CON YAPE
                <img class="w-12 h-12" src="{{asset('img/cel.png')}}" alt="">                                 
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="container">
                <div class="">
                    <div class="relative">
                        <img class="h-40 w-full" src="{{asset('img/yape_logo.jpg')}}" alt="">    
                    </div>

                    <div class="flex">
                        <div class="flex">
                            <img class="w-36 h-40" src="{{ Storage::url($yape->qr)}}" alt="">
                            
                        </div>  
                        <div class="flex-1 mt-1.5 justify-center text-center">
                            <article class="bg-white shadow-lg py-4 px-6 border">
                                <p class="font-bold text-green-700 text-xl"><span class="ml-auto">ORDER-{{$orderId}}</span></p>
                                <h1 class="font-bold text-gray-700 text-2xl">{{$yape->name}}</h1>                                                             
                                <p class="font-bold text-gray-700 text-2xl"><span class="ml-auto">{{$yape->celular}}</span></p>   
                                <p class="font-bold text-red-700 text-xl"><span class="ml-auto">TOTAL S/. {{$total}}</span></p>   
                                                            
                            </article>
                            
                        </div>                
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">

            {{-- <x-jet-secondary-button wire:click="aceptar" class=" w-full bg-purple-600 justify-center text-white hover:text-red-500">
                ACEPTAR
            </x-jet-secondary-button> --}}
            
        </x-slot>
    </x-jet-dialog-modal>


    {{-- MODAL PAGO PLIM --}}

    <x-jet-dialog-modal wire:model="openPlim" >
        <x-slot name="title">
            <div class="flex border-b-2 text-purple-700 text-center items-center justify-center text-4xl">
                {{-- PAGA AQUI CON PLIM --}}
                <img class="w-full h-20" src="{{asset('img/cabecera_plim.png')}}" alt=""> 
                
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="container">
                <div class="">
                    <div class="relative">
                        <img class="h-40 w-full" src="{{asset('img/PLIM.jpg')}}" alt="">    
                    </div>

                    <div class="flex">
                        <div class="flex">
                            <img class="w-36 h-40" src="{{ Storage::url($plim->qr)}}" alt="">
                        </div>  
                        <div class="flex-1 mt-1.5 justify-center text-center">
                            <article class="bg-white shadow-lg py-4 px-6 border">
                                <p class="font-bold text-green-700 text-xl"><span class="ml-auto">ORDER-{{$orderId}}</span></p>
                                <h1 class="font-bold text-gray-700 text-2xl">{{$plim->name}}</h1>                                                             
                                <p class="font-bold text-gray-700 text-2xl"><span class="ml-auto">{{$plim->celular}}</span></p>   
                                <p class="font-bold text-red-700 text-xl"><span class="ml-auto">TOTAL S/. {{$total}}</span></p>   
                                                            
                            </article>
                            
                        </div>                
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">

            {{-- <x-jet-secondary-button wire:click="aceptar" class=" w-full bg-purple-600 justify-center text-white hover:text-red-500">
                ACEPTAR
            </x-jet-secondary-button> --}}
            
        </x-slot>
    </x-jet-dialog-modal>


    {{-- MODAL PAGO LUKITA --}}

    <x-jet-dialog-modal wire:model="openLukita" >
        <x-slot name="title">
            <div class="flex border-b-2 text-green-500 text-center items-center justify-center text-4xl">
                PAGA AQUI CON LUKITA                                
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="container">
                <div class="">
                    <div class="relative">
                        <img class="h-40 w-full" src="{{asset('img/lukita.png')}}" alt="">    
                    </div>

                    <div class="flex">
                        <div class="flex">
                            <img class="w-36 h-40" src="{{ Storage::url($lukita->qr)}}" alt="">
                        </div>  
                        <div class="flex-1 mt-1.5 justify-center text-center">
                            <article class="bg-white shadow-lg py-4 px-6 border">
                                <p class="font-bold text-green-700 text-xl"><span class="ml-auto">ORDER-{{$orderId}}</span></p>   
                                <h1 class="font-bold text-gray-700 text-2xl">{{$lukita->name}}</h1>                                                             
                                <p class="font-bold text-gray-700 text-2xl"><span class="ml-auto">{{$lukita->celular}}</span></p>   
                                <p class="font-bold text-red-700 text-xl"><span class="ml-auto">TOTAL S/. {{$total}}</span></p>                                                               
                            </article>                            
                        </div>                
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">

            {{-- <x-jet-secondary-button wire:click="aceptar" class=" w-full bg-purple-600 justify-center text-white hover:text-red-500">
                ACEPTAR
            </x-jet-secondary-button> --}}
            
        </x-slot>
    </x-jet-dialog-modal>


    {{-- MODAL PAGO TUNKI --}}
    <x-jet-dialog-modal wire:model="openTunki" >
        <x-slot name="title">
            <div class="flex border-b-2 text-red-500 text-center items-center justify-center text-4xl">
                PAGA AQUI CON TUNKI                             
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="container">
                <div class="">
                    <div class="relative">
                        <img class="h-40 w-full" src="{{asset('img/tunki.jpg')}}" alt="">    
                    </div>

                    <div class="flex">
                        <div class="flex">
                            <img class="w-36 h-40" src="{{ Storage::url($tunki->qr)}}" alt="">
                        </div>  
                        <div class="flex-1 mt-1.5 justify-center text-center">
                            <article class="bg-white shadow-lg py-4 px-6 border">
                                <p class="font-bold text-green-700 text-xl"><span class="ml-auto">ORDER-{{$orderId}}</span></p>
                                <h1 class="font-bold text-gray-700 text-2xl">{{$tunki->name}}</h1>                                                             
                                <p class="font-bold text-gray-700 text-2xl"><span class="ml-auto">{{$tunki->celular}}</span></p>   
                                <p class="font-bold text-red-700 text-xl"><span class="ml-auto">TOTAL S/. {{$total}}</span></p>                                                               
                            </article>                            
                        </div>                
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">

            {{-- <x-jet-secondary-button wire:click="aceptar" class=" w-full bg-purple-600 justify-center text-white hover:text-red-500">
                ACEPTAR
            </x-jet-secondary-button> --}}
            
        </x-slot>
    </x-jet-dialog-modal>

    <style>
        .jetstream-modal{
            z-index: 999;
        }

    </style>
</div>
