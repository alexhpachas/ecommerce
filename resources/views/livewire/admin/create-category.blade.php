<div>       

    {{-- LISTA DE CATEGORIAS --}}
    <div class="container">    
        
        <div class="container flex items-center mb-3  bg-white py-4 rounded-lg shadow-lg">

            <span class="font-semibold lg:text-xl text-gray-600 sm:text-sm">CATEGORIAS</span>
           

            @can('admin.categories.create')                            
                <x-jet-button class="ml-auto rounded-full sm:text-sm transform hover:scale-105" wire:click="$set('openCreate',true)">
                    NUEVA CATEGORIA
                </x-jet-button>                                                   
            @endcan
        </div> 

        <x-table-responsive>
            @if ($categories->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-full">
                                Nombre de categoria
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($categories as $category)
                            <tr class="hover:bg-gray-200 hover:text-red-600">
                                <td class="py-2 sm:text-sm">
                                    <span class="inline-block w-8 text-center ml-4">
                                        {!! $category->icon !!}
                                    </span>

                                    @can('admin.categories.show')                                                                            
                                        <a href="{{ route('admin.categories.show', $category) }}"
                                            class="lg:uppercase capitalize sm:text-sm hover:underline hover:text-blue-600">
                                            {{ $category->name }}
                                        </a>
                                    @else
                                        <a class="lg:uppercase capitalize sm:text-sm hover:underline hover:text-blue-600">
                                            {{ $category->name }}
                                        </a>
                                        
                                    @endcan

                                </td>
                                <td class="py-2">
                                    <span class="flex">


                                        @can('admin.categories.show')                                                                                    
                                            <a href="{{ route('admin.categories.show', $category) }}" class="cursor-pointer w-7 lg:mr-2 mr-1 border-gray-900 bg-blue-500 text-white border rounded-lg p-1 transform hover:text-white hover:bg-blue-700 hover:scale-110">                                        
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>                                       
                                            </a>
                                        @endcan                                          
                                        
                                        @can('admin.categories.edit')                                                                                    
                                            <div wire:click="edit('{{ $category->slug }}')" class="flex divide-x divide-gray-300 font-semibold text-right lg:mr-2 mr-1">
                                                <svg class="cursor-pointer focus:outline-none w-7 border-gray-900 bg-yellow-500 text-white border rounded-lg p-1 transform  hover:bg-yellow-700 hover:scale-110"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                        @endcan

                                        @can('admin.categories.delete')                                                                                    
                                            <div wire:click="$emit('deleteCategory','{{ $category->slug }}')" class="cursor-pointer w-7 lg:mr-2 border-gray-900 bg-red-500 text-white border rounded-lg p-1 transform hover:bg-red-700 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>
                                        @endcan
                                    </span>
                                </td>
                            </tr>
                        @endforeach

                        <!-- More people... -->
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No se encontraron categorias coincidente..!
                </div>
            @endif
            {{-- @if ($products->hasPages())
                        <div class="px-6 py-4">
                            {{$products->links()}}
                        </div>                
                    @endif --}}

        </x-table-responsive>
    </div>

    {{-- MODAL PARA CREAR CATEGORIA --}}
    <x-jet-dialog-modal wire:model="openCreate">
        <x-slot name="title">
            CREAR NUEVA CATEGORIA
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model="createForm.name" class="w-full mt-1" type="text" />

                <x-jet-input-error for="createForm.name" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-jet-label>
                    Slug
                </x-jet-label>

                <x-jet-input wire:model="createForm.slug" class="w-full mt-1 bg-gray-100" disabled type="text" />

                <x-jet-input-error for="createForm.slug" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-jet-label>
                    Iconos
                </x-jet-label>
                <style>
                    select {
                        font-family: 'FontAwesome', 'sans-serif';
                        }
                </style>
                {{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" /> --}}
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

                
                
                <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

                <select wire:model="createForm.icon">
                    <option value="fab fa-500px">&#xf26e;</option>
                        <option value="fab fa-accessible-icon">&#xf368;</option>
                        <option value="fab fa-accusoft">&#xf369;</option>
                        <option value="fab fa-acquisitions-incorporated">&#xf6af;</option>
                        <option value="fas fa-ad">&#xf641;</option>
                        <option value="fas fa-address-book">&#xf2b9;</option>
                        <option value="fas fa-address-card">&#xf2bb;</option>
                        <option value="fas fa-adjust">&#xf042;</option>
                        <option value="fab fa-adn">&#xf170;</option>
                        <option value="fab fa-adversal">&#xf36a;</option>
                        <option value="fab fa-affiliatetheme">&#xf36b;</option>
                        <option value="fas fa-air-freshener">&#xf5d0;</option>
                        <option value="fab fa-airbnb">&#xf834;</option>
                        <option value="fab fa-algolia">&#xf36c;</option>
                        <option value="fas fa-align-center">&#xf037;</option>
                        <option value="fas fa-align-justify">&#xf039;</option>
                        <option value="fas fa-align-left">&#xf036;</option>
                        <option value="fas fa-align-right">&#xf038;</option>
                        <option value="fab fa-alipay">&#xf642;</option>
                        <option value="fas fa-allergies">&#xf461;</option>
                        <option value="fab fa-amazon">&#xf270;</option>
                        <option value="fab fa-amazon-pay">&#xf42c;</option>
                        <option value="fas fa-ambulance">&#xf0f9;</option>
                        <option value="fas fa-american-sign-language-interpreting">&#xf2a3;</option>
                        <option value="fab fa-amilia">&#xf36d;</option>
                        <option value="fas fa-anchor">&#xf13d;</option>
                        <option value="fab fa-android">&#xf17b;</option>
                        <option value="fab fa-angellist">&#xf209;</option>
                        <option value="fas fa-angle-double-down">&#xf103;</option>
                        <option value="fas fa-angle-double-left">&#xf100;</option>
                        <option value="fas fa-angle-double-right">&#xf101;</option>
                        <option value="fas fa-angle-double-up">&#xf102;</option>
                        <option value="fas fa-angle-down">&#xf107;ángulo hacia abajo</option>
                        <option value="fas fa-angle-left">&#xf104;</option>
                        <option value="fas fa-angle-right">&#xf105; ángulo a la derecha</option>
                        <option value="fas fa-angle-up">&#xf106;ángulo hacia arriba</option>
                        <option value="fas fa-angry">&#xf556;Cochea enojada</option>
                        <option value="fab fa-angrycreative">&#xf36e;Creativo enojado</option>
                        <option value="fab fa-angular">&#xf420;Angular</option>
                        <option value="fas fa-ankh">&#xf644;Ankh</option>
                        <option value="fab fa-app-store">&#xf36f;Tienda de aplicaciones</option>
                        <option value="fab fa-app-store-ios">&#xf370;iOS Tienda de aplicaciones</option>
                        <option value="fab fa-apper">&#xf371;Apper Systems AB</option>
                        <option value="fab fa-apple">&#xf179;manzana</option>
                        <option value="fas fa-apple-alt">&#xf5d1;Fruit manzana</option>
                        <option value="fab fa-apple-pay">&#xf415;manzana Pay</option>
                        <option value="fas fa-archive">&#xf187;Archivo</option>
                        <option value="fas fa-archway">&#xf557;Arco</option>   
                        <option value="fas fa-arrow-alt-circle-down">&#xf358; Círculo de flecha alternativo hacia abajo</option>
                        <option value="fas fa-arrow-alt-circle-left">&#xf359;Círculo de flecha alternativo a la izquierda</option>
                        <option value="fas fa-arrow-alt-circle-right">&#xf35a;Círculo de flecha alternativo a la derecha</option>
                        <option value="fas fa-arrow-alt-circle-up">&#xf35b;Círculo de flecha alternativo hacia arriba</option>
                        <option value="fas fa-arrow-circle-down">&#xf0ab;Círculo de flecha hacia abajo</option>
                        <option value="fas fa-arrow-circle-left"><&#xf0a8;Círculo de flecha a la izquierda</option>
                        <option value="fas fa-arrow-circle-right">&#xf0a9;Círculo de flecha a la derecha</option>
                        <option value="fas fa-arrow-circle-up">&#xf0aa;Círculo de flecha hacia arriba</option>
                        <option value="fas fa-arrow-down">&#xf063;flecha abajo</option>
                        <option value="fas fa-arrow-left">&#xf060;flecha izquierda</option>
                        <option value="fas fa-arrow-right">&#xf061;flecha derecha</option>
                        <option value="fas fa-arrow-up">&#xf062;flecha arriba</option>
                        <option value="fas fa-arrows-alt">&#xf0b2;Flechas alternativas</option>
                        <option value="fas fa-arrows-alt-h">&#xf337;Flechas alternativas Horizontal</option>
                        <option value="fas fa-arrows-alt-v"> Flechas alternativas Vertical&#xf338;</option>
                        <option value="fab fa-artstation">&#xf77a;Artstation</option>
                        <option value="fas fa-assistive-listening-systems">&#xf2a2; Sistemas de audición asistida</option>
                        <option value="fas fa-asterisk">&#xf069;asterisco</option>
                        <option value="fab fa-asymmetrik">&#xf372;Asymmetrik, Ltd.</option>
                        <option value="fas fa-at">&#xf1fa;A</option>
                        <option value="fas fa-atlas">&#xf558;Alas</option>
                        <option value="fab fa-atlassian">&#xf77b;Alassian</option>
                        <option value="fas fa-atom">&#xf5d2;Aom</option>
                        <option value="fab fa-audible"> Audible&#xf373;</option>
                        <option value="fas fa-audio-description">&#xf29e;Descripción de audio   </option>
                        <option value="fab fa-autoprefixer">&#xf41c;Autoprefixer   </option>
                        <option value="fab fa-avianex">&#xf374;avianex</option>
                        <option value="fab fa-aviato">&#xf421;Aviato</option>
                        <option value="fas fa-award">&#xf559;Premio</option>
                        <option value="fab fa-aws">&#xf375;Amazonas Web Services (AWS)</option>
                        <option value="fas fa-baby">&#xf77c;Bebé</option>
                        <option value="fas fa-baby-carriage">&#xf77d;Bebé Cocheriage   </option>
                        <option value="fas fa-backspace">&#xf55a;Retroceso</option>
                        <option value="fas fa-backward">&#xf04a;hacia atrás</option>
                        <option value="fas fa-bacon">&#xf7e5;Tocino</option>
                        <option value="fas fa-bahai">&#xf666;Bahá'í</option>
                        <option value="fas fa-balance-scale">&#xf24e;Balanza</option>
                        <option value="fas fa-balance-scale-left">&#xf515;Balanza (Left-Weighted)</option>
                        <option value="fas fa-balance-scale-right">&#xf516;Balanza (Right-Weighted)</option>
                        <option value="fas fa-ban">&#xf05e;prohibición</option>
                        <option value="fas fa-band-aid">&#xf462;Apósito adhesivo</option>
                        <option value="fab fa-bandcamp">&#xf2d5;Campamento de la banda</option>
                        <option value="fas fa-barcode">&#xf02a;código de barras</option>
                        <option value="fas fa-bars">&#xf0c9;Barras</option>
                        <option value="fas fa-baseball-ball">&#xf433;Pelota de beisbol</option>
                        <option value="fas fa-basketball-ball">&#xf434;Pelota de baloncesto</option>
                        <option value="fas fa-bath">&#xf2cd;Bañera</option>
                        <option value="fas fa-battery-empty">&#xf244;Batería vacía</option>
                        <option value="fas fa-battery-full">&#xf240;Bateria llena</option>
                        <option value="fas fa-battery-half">&#xf242;Batería 1/2 llena</option>
                        <option value="fas fa-battery-quarter">&#xf243;Batería 1/4 llena</option>
                        <option value="fas fa-battery-three-quarters">&#xf241;Batería 3/4 llena</option>
                        <option value="fab fa-battle-net">&#xf835;Battle.net</option>
                        <option value="fas fa-bed">&#xf236;Cama</option>
                        <option value="fas fa-beer">&#xf0fc;cerveza</option>
                        <option value="fab fa-behance">&#xf1b4;Behance</option>
                        <option value="fab fa-behance-square">&#xf1b5;Plaza Behance</option>
                        <option value="fas fa-bell">&#xf0f3;campana</option>
                        <option value="fas fa-bell-slash">&#xf1f6;Barra de campana</option>
                        <option value="fas fa-bezier-curve">&#xf55b;Curva de Bezier</option>
                        <option value="fas fa-bible">&#xf647;Biblia</option>
                        <option value="fas fa-bicycle">&#xf206;Bicicleta</option>
                        <option value="fas fa-biking">&#xf84a;Andar en bicicleta</option>
                        <option value="fab fa-bimobject">&#xf378;BIMobject</option>
                        <option value="fas fa-binoculars">&#xf1e5;Prismáticos</option>
                        <option value="fas fa-biohazard">&#xf780;Riesgo biológico</option>
                        <option value="fas fa-birthday-cake">&#xf1fd;Pastel de cumpleaños</option>
                        <option value="fab fa-bitbucket">&#xf171;Bitbucket</option>
                        <option value="fab fa-bitcoin">&#xf379;Bitcoin</option>
                        <option value="fab fa-bity">&#xf37a;Bity</option>
                        <option value="fab fa-black-tie">&#xf27e;Font Awesome Black Tie</option>
                        <option value="fab fa-blackberry">&#xf37b;Mora</option>
                        <option value="fas fa-blender">&#xf517;Licuadora</option>
                        <option value="fas fa-blender-phone">&#xf6b6;Licuadora Phone</option>
                        <option value="fas fa-blind">&#xf29d;Ciego</option>
                        <option value="fas fa-blog">&#xf781;Blog</option>
                        <option value="fab fa-blogger">&#xf37c;Blogger</option>
                        <option value="fab fa-blogger-b">&#xf37d;Blogger B</option>
                        <option value="fab fa-bluetooth">&#xf293;Bluetooth</option>
                        <option value="fab fa-bluetooth-b">&#xf294;Bluetooth</option>
                        <option value="fas fa-bold">&#xf032;negrita</option>
                        <option value="fas fa-bolt">&#xf0e7;Rayo</option>
                        <option value="fas fa-bomb">&#xf1e2;Bomba</option>
                        <option value="fas fa-bone">&#xf5d7;Hueso</option>
                        <option value="fas fa-bong">&#xf55c;Bong</option>
                        <option value="fas fa-book">&#xf02d;libro</option>
                        <option value="fas fa-book-dead">&#xf6b7;Libro de los Muertos</option>
                        <option value="fas fa-book-medical">&#xf7e6;Libro médico</option>
                        <option value="fas fa-book-open">&#xf518;Libro abierto</option>
                        <option value="fas fa-book-reader">&#xf5da;Lector de libros</option>
                        <option value="fas fa-bookmark">&#xf02e;libromark</option>
                        <option value="fab fa-bootstrap">&#xf836;Oreja</option>
                        <option value="fas fa-border-all">&#xf84c;Bordear todo</option>
                        <option value="fas fa-border-none">&#xf850;Borde Ninguno</option>
                        <option value="fas fa-border-style">&#xf853;Estilo de borde</option>
                        <option value="fas fa-bowling-ball">&#xf436;Bola de boliche</option>
                        <option value="fas fa-box">&#xf466;Caja</option>
                        <option value="fas fa-box-open">&#xf49e;Caja Open</option>
                        <option value="fas fa-box-tissue">&#xf95b;Tissue Caja</option>
                        <option value="fas fa-boxes">&#xf468;Cajaes</option>
                        <option value="fas fa-braille">&#xf2a1;Braille</option>
                        <option value="fas fa-brain">&#xf5dc;Cerebro</option>
                        <option value="fas fa-bread-slice">&#xf7ec;Rebanada de pan</option>
                        <option value="fas fa-briefcase">&#xf0b1;Maletín</option>
                        <option value="fas fa-briefcase-medical">&#xf469;Medical Maletín</option>
                        <option value="fas fa-broadcast-tower">&#xf519;Torre de transmisión</option>
                        <option value="fas fa-broom">&#xf51a;Escoba</option>
                        <option value="fas fa-brush">&#xf55d;Cepillo</option>
                        <option value="fab fa-btc">&#xf15a;BTC</option>
                        <option value="fab fa-buffer">&#xf837;Buffer</option>
                        <option value="fas fa-bug">&#xf188;Insecto</option>
                        <option value="fas fa-building">&#xf1ad;edificio</option>
                        <option value="fas fa-bullhorn">&#xf0a1;megáfono</option>
                        <option value="fas fa-bullseye">&#xf140;Diana</option>
                        <option value="fas fa-burn">&#xf46a;Quemar</option>
                        <option value="fab fa-buromobelexperte">&#xf37f;Büromöbel-Experte GmbH & Co.</option>
                        <option value="fas fa-bus">&#xf207;Autobús</option>
                        <option value="fas fa-bus-alt">&#xf55e;Autobús Alt</option>
                        <option value="fas fa-business-time">&#xf64a;Autobúsiness Time</option>
                        <option value="fab fa-buy-n-large">&#xf8a6;Compre n grande</option>
                        <option value="fab fa-buysellads">&#xf20d;BuySellAnuncios</option>
                        <option value="fas fa-calculator">&#xf1ec;Calculadora</option>
                        <option value="fas fa-calendar">&#xf133;Calendario</option>
                        <option value="fas fa-calendar-alt">&#xf073;Calendario alternativoio</option>
                        <option value="fas fa-calendar-check">&#xf274;Calendario Cheque</option>
                        <option value="fas fa-calendar-day">&#xf783;Calendario with Day Focus</option>
                        <option value="fas fa-calendar-minus">&#xf272;Calendario Minus</option>
                        <option value="fas fa-calendar-plus">&#xf271;Calendario Plus</option>
                        <option value="fas fa-calendar-times">&#xf273;Calendario Times</option>
                        <option value="fas fa-calendar-week">&#xf784;Calendario with Week Focus</option>
                        <option value="fas fa-camera">&#xf030;cámara</option>
                        <option value="fas fa-camera-retro">&#xf083;Cámara retro</option>
                        <option value="fas fa-campground">&#xf6bb;Terreno de camping</option>
                        <option value="fab fa-canadian-maple-leaf">&#xf785;Hoja de arce canadiense</option>
                        <option value="fas fa-candy-cane">&#xf786;Bastón de caramelo</option>
                        <option value="fas fa-cannabis">&#xf55f;Canabis</option>
                        <option value="fas fa-capsules">&#xf46b;Cápsulas</option>
                        <option value="fas fa-car">&#xf1b9;Coche</option>
                        <option value="fas fa-car-alt">&#xf5de;Alternate Coche</option>
                        <option value="fas fa-car-battery">&#xf5df;Coche Battery</option>
                        <option value="fas fa-car-crash">&#xf5e1;Coche Crash</option>
                        <option value="fas fa-car-side">&#xf5e4;Coche Side</option>
                        <option value="fas fa-caravan">&#xf8ff;Cocheavan</option>
                        <option value="fas fa-caret-down">&#xf0d7;Cocheet Down</option>
                        <option value="fas fa-caret-left">&#xf0d9;Cocheet Left</option>
                        <option value="fas fa-caret-right">&#xf0da;Cocheet Right</option>
                        <option value="fas fa-caret-square-down">&#xf150;Cocheet Square Down</option>
                        <option value="fas fa-caret-square-left">&#xf191;Cocheet Square Left</option>
                        <option value="fas fa-caret-square-right">&#xf152;Cocheet Square Right</option>
                        <option value="fas fa-caret-square-up">&#xf151;Cocheet Square Up</option>
                        <option value="fas fa-caret-up">&#xf0d8;Cocheet Up</option>
                        <option value="fas fa-carrot">&#xf787;Cocherot</option>
                        <option value="fas fa-cart-arrow-down">&#xf218;Shopping Cochet Arrow Down</option>
                        <option value="fas fa-cart-plus">&#xf217;Anunciod to Shopping Cochet</option>
                        <option value="fas fa-cash-register">&#xf788;Caja registradora</option>
                        <option value="fas fa-cat">&#xf6be;Gato</option>
                        <option value="fab fa-cc-amazon-pay">&#xf42d;Amazonas Pay Credit Coched</option>
                        <option value="fab fa-cc-amex">&#xf1f3;American Express Credit Coched</option>
                        <option value="fab fa-cc-apple-pay">&#xf416;manzana Pay Credit Coched</option>
                        <option value="fab fa-cc-diners-club">&#xf24c;Diner's Club Credit Coched</option>
                        <option value="fab fa-cc-discover">&#xf1f2;Discover Credit Coched</option>
                        <option value="fab fa-cc-jcb">&#xf24b;JCB Credit Coched</option>
                        <option value="fab fa-cc-mastercard">&#xf1f1;MasterCoched Credit Coched</option>
                        <option value="fab fa-cc-paypal">&#xf1f4;Paypal Credit Coched</option>
                        <option value="fab fa-cc-stripe">&#xf1f5;Stripe Credit Coched</option>
                        <option value="fab fa-cc-visa">&#xf1f0;Visa Credit Coched</option>
                        <option value="fab fa-centercode">&#xf380;Código central</option>
                        <option value="fab fa-centos">&#xf789;Centos</option>
                        <option value="fas fa-certificate">&#xf0a3;certificado</option>
                        <option value="fas fa-chair">&#xf6c0;Silla</option>
                        <option value="fas fa-chalkboard">&#xf51b;Pizarra</option>
                        <option value="fas fa-chalkboard-teacher">&#xf51c;Pizarra Teacher</option>
                        <option value="fas fa-charging-station">&#xf5e7;Estación de carga</option>
                        <option value="fas fa-chart-area">&#xf1fe;Gráfico de área</option>
                        <option value="fas fa-chart-bar">&#xf080;Gráfico de barras</option>
                        <option value="fas fa-chart-line">&#xf201;Gráfico de linea</option>
                        <option value="fas fa-chart-pie">&#xf200;Gráfico circular</option>
                        <option value="fas fa-check">&#xf00c;Cheque</option>
                        <option value="fas fa-check-circle">&#xf058;Cheque Circulo</option>
                        <option value="fas fa-check-double">&#xf560;Double Cheque</option>
                        <option value="fas fa-check-square">&#xf14a;Cheque Square</option>
                        <option value="fas fa-cheese">&#xf7ef;Queso</option>
                        <option value="fas fa-chess">&#xf439;Ajedrez</option>
                        <option value="fas fa-chess-bishop">&#xf43a;Ajedrez Bishop</option>
                        <option value="fas fa-chess-board">&#xf43c;Ajedrez Board</option>
                        <option value="fas fa-chess-king">&#xf43f;Ajedrez King</option>
                        <option value="fas fa-chess-knight">&#xf441;Ajedrez Knight</option>
                        <option value="fas fa-chess-pawn">&#xf443;Ajedrez Pawn</option>
                        <option value="fas fa-chess-queen">&#xf445;Ajedrez Queen</option>
                        <option value="fas fa-chess-rook">&#xf447;Ajedrez Rook</option>
                        <option value="fas fa-chevron-circle-down">&#xf13a;Círculo de Chevron hacia abajo</option>
                        <option value="fas fa-chevron-circle-left">&#xf137;Círculo de Chevron a la izquierda</option>
                        <option value="fas fa-chevron-circle-right">&#xf138;Círculo de Chevron a la derecha</option>
                        <option value="fas fa-chevron-circle-up">&#xf139;Chevron Circulo Up</option>
                        <option value="fas fa-chevron-down">&#xf078;chevron-down</option>
                        <option value="fas fa-chevron-left">&#xf053;chevron-left</option>
                        <option value="fas fa-chevron-right">&#xf054;chevron-right</option>
                        <option value="fas fa-chevron-up">&#xf077;chevron-up</option>
                        <option value="fas fa-child">&#xf1ae;Niño</option>
                        <option value="fab fa-chrome">&#xf268;Cromo</option>
                        <option value="fab fa-chromecast">&#xf838;Cromocast</option>
                        <option value="fas fa-church">&#xf51d;Iglesia</option>
                        <option value="fas fa-circle">&#xf111;Circulo</option>
                        <option value="fas fa-circle-notch">&#xf1ce;Circulo Notched</option>
                        <option value="fas fa-city">&#xf64f;Ciudad</option>
                        <option value="fas fa-clinic-medical">&#xf7f2;Clinica Medica</option>
                        <option value="fas fa-clipboard">&#xf328;Portapapeles</option>
                        <option value="fas fa-clipboard-check">&#xf46c;Portapapeles with Cheque</option>
                        <option value="fas fa-clipboard-list">&#xf46d;Portapapeles List</option>
                        <option value="fas fa-clock">&#xf017;Reloj</option>
                        <option value="fas fa-clone">&#xf24d;Clon</option>
                        <option value="fas fa-closed-captioning">&#xf20a;Subtítulos</option>
                        <option value="fas fa-cloud">&#xf0c2;Nube</option>
                        <option value="fas fa-cloud-download-alt">&#xf381;Alternate Nube Download</option>
                        <option value="fas fa-cloud-meatball">&#xf73b;Nube with (a chance of) Meatball</option>
                        <option value="fas fa-cloud-moon">&#xf6c3;Nube with Moon</option>
                        <option value="fas fa-cloud-moon-rain">&#xf73c;Nube with Moon and Rain</option>
                        <option value="fas fa-cloud-rain">&#xf73d;Nube with Rain</option>
                        <option value="fas fa-cloud-showers-heavy">&#xf740;Nube with Heavy Showers</option>
                        <option value="fas fa-cloud-sun">&#xf6c4;Nube with Sun</option>
                        <option value="fas fa-cloud-sun-rain">&#xf743;Nube with Sun and Rain</option>
                        <option value="fas fa-cloud-upload-alt">&#xf382;Alternate Nube Upload</option>
                        <option value="fab fa-cloudscale">&#xf383;cloudscale.ch</option>
                        <option value="fab fa-cloudsmith">&#xf384;Nubesmith</option>
                        <option value="fab fa-cloudversify">&#xf385;cloudversify</option>
                        <option value="fas fa-cocktail">&#xf561;Cóctel</option>
                        <option value="fas fa-code">&#xf121;Código</option>
                        <option value="fas fa-code-branch">&#xf126;Código Branch</option>
                        <option value="fab fa-codepen">&#xf1cb;Códigopen</option>
                        <option value="fab fa-codiepie">&#xf284;Pastel de codie</option>
                        <option value="fas fa-coffee">&#xf0f4;café</option>
                        <option value="fas fa-cog">&#xf013;diente</option>
                        <option value="fas fa-cogs">&#xf085;dientes</option>
                        <option value="fas fa-coins">&#xf51e;Monedas</option>
                        <option value="fas fa-columns">&#xf0db;Columnas</option>
                        <option value="fas fa-comment">&#xf075;comentario</option>
                        <option value="fas fa-comment-alt">&#xf27a;Comentario alternativo</option>
                        <option value="fas fa-comment-dollar">&#xf651;Comentario dólar</option>
                        <option value="fas fa-comment-dots">&#xf4ad;Puntos de comentario</option>
                        <option value="fas fa-comment-medical">&#xf7f5;Chat médico alternativo</option>
                        <option value="fas fa-comment-slash">&#xf4b3;Barra inclinada de comentarios</option>
                        <option value="fas fa-comments">&#xf086;comentarios</option>
                        <option value="fas fa-comments-dollar">&#xf653;Comentarios Dollar</option>
                        <option value="fas fa-compact-disc">&#xf51f;Disco compacto</option>
                        <option value="fas fa-compass">&#xf14e;Brújula</option>
                        <option value="fas fa-compress">&#xf066;Comprimir</option>
                        <option value="fas fa-compress-alt">&#xf422;Alternate Comprimir</option>
                        <option value="fas fa-compress-arrows-alt">&#xf78c;Alternate Comprimir Arrows</option>
                        <option value="fas fa-concierge-bell">&#xf562;Conserje Bell</option>
                        <option value="fab fa-confluence">&#xf78d;Confluencia</option>
                        <option value="fab fa-connectdevelop">&#xf20e;Conectar Desarrollar</option>
                        <option value="fab fa-contao">&#xf26d;Contao</option>
                        <option value="fas fa-cookie">&#xf563;Galleta</option>
                        <option value="fas fa-cookie-bite">&#xf564;Galleta Bite</option>
                        <option value="fas fa-copy">&#xf0c5;Copiar</option>
                        <option value="fas fa-copyright">&#xf1f9;Copiarright</option>
                        <option value="fab fa-cotton-bureau">&#xf89e;Oficina de algodón</option>
                        <option value="fas fa-couch">&#xf4b8;Sofá</option>
                        <option value="fab fa-cpanel">&#xf388;cPanel</option>
                        <option value="fab fa-creative-commons">&#xf25e;Creative Commons</option>
                        <option value="fab fa-creative-commons-by">&#xf4e7;Atribución Creative Commons</option>
                        <option value="fab fa-creative-commons-nc">&#xf4e8;Creative Commons no comercial</option>
                        <option value="fab fa-creative-commons-nc-eu">&#xf4e9;Creative Commons no comercial (Signo de euro)</option>
                        <option value="fab fa-creative-commons-nc-jp">&#xf4ea;Creative Commons no comercial (Yen Sign)</option>
                        <option value="fab fa-creative-commons-nd">&#xf4eb;Creative Commons sin obras derivadas</option>
                        <option value="fab fa-creative-commons-pd">&#xf4ec;Dominio público de Creative Commons</option>
                        <option value="fab fa-creative-commons-pd-alt">&#xf4ed;Alternate Dominio público de Creative Commons</option>
                        <option value="fab fa-creative-commons-remix">&#xf4ee;Remix de Creative Commons</option>
                        <option value="fab fa-creative-commons-sa">&#xf4ef;Compartir Creative Commons Alike</option>
                        <option value="fab fa-creative-commons-sampling">&#xf4f0;Muestreo Creative Commons</option>
                        <option value="fab fa-creative-commons-sampling-plus">&#xf4f1;Muestreo Creative Commons +</option>
                        <option value="fab fa-creative-commons-share">&#xf4f2;Compartir Creative Commons</option>
                        <option value="fab fa-creative-commons-zero">&#xf4f3;Creative Commons CC0</option>
                        <option value="fas fa-credit-card">&#xf09d;Tarjeta de crédito</option>
                        <option value="fab fa-critical-role">&#xf6c9;Rol critico</option>
                        <option value="fas fa-crop">&#xf125;cosecha</option>
                        <option value="fas fa-crop-alt">&#xf565;Cultivo alternativo</option>
                        <option value="fas fa-cross">&#xf654;Cruzar</option>
                        <option value="fas fa-crosshairs">&#xf05b;Cruzarhairs</option>
                        <option value="fas fa-crow">&#xf520;Cuervo</option>
                        <option value="fas fa-crown">&#xf521;Cuervon</option>
                        <option value="fas fa-crutch">&#xf7f7;Muleta</option>
                        <option value="fab fa-css3">&#xf13c;Logotipo de CSS 3</option>
                        <option value="fab fa-css3-alt">&#xf38b;Logotipo CSS3 alternativo</option>
                        <option value="fas fa-cube">&#xf1b2;Cubo</option>
                        <option value="fas fa-cubes">&#xf1b3;Cubos</option>
                        <option value="fas fa-cut">&#xf0c4;Cortar</option>
                        <option value="fab fa-cuttlefish">&#xf38c;Cortartlefish</option>
                        <option value="fab fa-d-and-d">&#xf38d;Calabozos y Continuares</option>
                        <option value="fab fa-d-and-d-beyond">&#xf6ca;D&D má</option>allá</option>
                        <option value="fab fa-dailymotion">&#xf952;dailymotion</option>
                        <option value="fab fa-dashcube">&#xf210;DashCubo</option>
                        <option value="fas fa-database">&#xf1c0;Base de datos</option>
                        <option value="fas fa-deaf">&#xf2a4;Sordo</option>
                        <option value="fab fa-delicious">&#xf1a5;Delicioso</option>
                        <option value="fas fa-democrat">&#xf747;Demócrata</option>
                        <option value="fab fa-deploydog">&#xf38e;deploy.dog</option>
                        <option value="fab fa-deskpro">&#xf38f;Deskpro</option>
                        <option value="fas fa-desktop">&#xf108;Escritorio</option>
                        <option value="fab fa-dev">&#xf6cc;DEV</option>
                        <option value="fab fa-deviantart">&#xf1bd;deviantART</option>
                        <option value="fas fa-dharmachakra">&#xf655;Dharmachakra</option>
                        <option value="fab fa-dhl">&#xf790;DHL</option>
                        <option value="fas fa-diagnoses">&#xf470;Diagnósticos</option>
                        <option value="fab fa-diaspora">&#xf791;Diáspora</option>
                        <option value="fas fa-dice">&#xf522;Dado</option>
                        <option value="fas fa-dice-d20">&#xf6cf;Dado D20</option>
                        <option value="fas fa-dice-d6">&#xf6d1;Dado D6</option>
                        <option value="fas fa-dice-five">&#xf523;Dado Five</option>
                        <option value="fas fa-dice-four">&#xf524;Dado Four</option>
                        <option value="fas fa-dice-one">&#xf525;Dado One</option>
                        <option value="fas fa-dice-six">&#xf526;Dado Six</option>
                        <option value="fas fa-dice-three">&#xf527;Dado Three</option>
                        <option value="fas fa-dice-two">&#xf528;Dado Two</option>
                        <option value="fab fa-digg">&#xf1a6;Logotipo de Digg</option>
                        <option value="fab fa-digital-ocean">&#xf391;Océano digital</option>
                        <option value="fas fa-digital-tachograph">&#xf566;Tacógrafo digital</option>
                        <option value="fas fa-directions">&#xf5eb;Direcciones</option>
                        <option value="fab fa-discord">&#xf392;Discordia</option>
                        <option value="fab fa-discourse">&#xf393;Discurso</option>
                        <option value="fas fa-disease">&#xf7fa;Enfermedad</option>
                        <option value="fas fa-divide">&#xf529;Dividir</option>
                        <option value="fas fa-dizzy">&#xf567;Cara mareada</option>
                        <option value="fas fa-dna">&#xf471;ADN</option>
                        <option value="fab fa-dochub">&#xf394;DocHub</option>
                        <option value="fab fa-docker">&#xf395;Estibador</option>
                        <option value="fas fa-dog">&#xf6d3;Perro</option>
                        <option value="fas fa-dollar-sign">&#xf155;Signo de dólar</option>
                        <option value="fas fa-dolly">&#xf472;Muñequita</option>
                        <option value="fas fa-dolly-flatbed">&#xf474;Muñequita Flatbed</option>
                        <option value="fas fa-donate">&#xf4b9;Donar</option>
                        <option value="fas fa-door-closed">&#xf52a;Puerta cerrada</option>
                        <option value="fas fa-door-open">&#xf52b;Puerta abierta</option>
                        <option value="fas fa-dot-circle">&#xf192;Círculo de puntos</option>
                        <option value="fas fa-dove">&#xf4ba;Paloma</option>
                        <option value="fas fa-download">&#xf019;Descargar</option>
                        <option value="fab fa-draft2digital">&#xf396;Draft2digital</option>
                        <option value="fas fa-drafting-compass">&#xf568;Drafting Brújula</option>
                        <option value="fas fa-dragon">&#xf6d5;Continuar</option>
                        <option value="fas fa-draw-polygon">&#xf5ee;Dibujar polígono</option>
                        <option value="fab fa-dribbble">&#xf17d;Regate</option>
                        <option value="fab fa-dribbble-square">&#xf397;Regate Square</option>
                        <option value="fab fa-dropbox">&#xf16b;Dropbox</option>
                        <option value="fas fa-drum">&#xf569;Tambor</option>
                        <option value="fas fa-drum-steelpan">&#xf56a;Tambor Steelpan</option>
                        <option value="fas fa-drumstick-bite">&#xf6d7;Tamborstick with Bite Taken Out</option>
                        <option value="fab fa-drupal">&#xf1a9;Logotipo de Drupal</option>
                        <option value="fas fa-dumbbell">&#xf44b;Pesa</option>
                        <option value="fas fa-dumpster">&#xf793;Contenedor de basura</option>
                        <option value="fas fa-dumpster-fire">&#xf794;Contenedor de basura Fire</option>
                        <option value="fas fa-dungeon">&#xf6d9;Calabozo</option>
                        <option value="fab fa-dyalog">&#xf399;Dyalog</option>
                        <option value="fab fa-earlybirds">&#xf39a;Anticipado</option>
                        <option value="fab fa-ebay">&#xf4f4;eBay</option>
                        <option value="fab fa-edge">&#xf282;Navegador Edge</option>
                        <option value="fas fa-edit">&#xf044;Editar</option>
                        <option value="fas fa-egg">&#xf7fb;Huevo</option>
                        <option value="fas fa-eject">&#xf052;expulsar</option>
                        <option value="fab fa-elementor">&#xf430;Elementor</option>
                        <option value="fas fa-ellipsis-h">&#xf141;Elipsis horizontal</option>
                        <option value="fas fa-ellipsis-v">&#xf142;Elipsis vertical</option>
                        <option value="fab fa-ello">&#xf5f1;Ello</option>
                        <option value="fab fa-ember">&#xf423;Ascua</option>
                        <option value="fab fa-empire">&#xf1d1;Imperio galáctico</option>
                        <option value="fas fa-envelope">&#xf0e0;Sobre</option>
                        <option value="fas fa-envelope-open">&#xf2b6;Sobre Open</option>
                        <option value="fas fa-envelope-open-text">&#xf658;Sobre Open-text</option>
                        <option value="fas fa-envelope-square">&#xf199;Sobre Square</option>
                        <option value="fab fa-envira">&#xf299;Galería Envira</option>
                        <option value="fas fa-equals">&#xf52c;Igual</option>
                        <option value="fas fa-eraser">&#xf12d;borrador</option>
                        <option value="fab fa-erlang">&#xf39d;Erlang</option>
                        <option value="fab fa-ethereum">&#xf42e;Ethereum</option>
                        <option value="fas fa-ethernet">&#xf796;Ethernet</option>
                        <option value="fab fa-etsy">&#xf2d7;Etsy</option>
                        <option value="fas fa-euro-sign">&#xf153;Signo de euro</option>
                        <option value="fab fa-evernote">&#xf839;Evernote</option>
                        <option value="fas fa-exchange-alt">&#xf362;Intercambio alternativo</option>
                        <option value="fas fa-exclamation">&#xf12a;exclamación</option>
                        <option value="fas fa-exclamation-circle">&#xf06a;Círculo de exclamación</option>
                        <option value="fas fa-exclamation-triangle">&#xf071;Triángulo de exclamación</option>
                        <option value="fas fa-expand">&#xf065;Expandir</option>
                        <option value="fas fa-expand-alt">&#xf424;Expansión alternativair</option>
                        <option value="fas fa-expand-arrows-alt">&#xf31e;Expansión alternativair Arrows</option>
                        <option value="fab fa-expeditedssl">&#xf23e;ExpeditedSSL</option>
                        <option value="fas fa-external-link-alt">&#xf35d;Enlace externo alternativo</option>
                        <option value="fas fa-external-link-square-alt">&#xf360;Enlace externo alternativo Square</option>
                        <option value="fas fa-eye">&#xf06e;Ojo</option>
                        <option value="fas fa-eye-dropper">&#xf1fb;Ojo Dropper</option>
                        <option value="fas fa-eye-slash">&#xf070;Ojo Slash</option>
                        <option value="fab fa-facebook">&#xf09a;Facebook</option>
                        <option value="fab fa-facebook-f">&#xf39e;Facebook F</option>
                        <option value="fab fa-facebook-messenger">&#xf39f;Facebook Messenger</option>
                        <option value="fab fa-facebook-square">&#xf082;Plaza de Facebook</option>
                        <option value="fas fa-fan">&#xf863;Ventilador</option>
                        <option value="fab fa-fantasy-flight-games">&#xf6dc;Ventiladortasy Flight-games</option>
                        <option value="fas fa-fast-backward">&#xf049;retroceso rápido</option>
                        <option value="fas fa-fast-forward">&#xf050;avance rápido</option>
                        <option value="fas fa-faucet">&#xf905;Grifo</option>
                        <option value="fas fa-fax">&#xf1ac;Fax</option>
                        <option value="fas fa-feather">&#xf52d;Pluma</option>
                        <option value="fas fa-feather-alt">&#xf56b;Alternate Pluma</option>
                        <option value="fab fa-fedex">&#xf797;FedEx</option>
                        <option value="fab fa-fedora">&#xf798;Fedora</option>
                        <option value="fas fa-female">&#xf182;Hembra</option>
                        <option value="fas fa-fighter-jet">&#xf0fb;caza de reacción</option>
                        <option value="fab fa-figma">&#xf799;Figma</option>
                        <option value="fas fa-file">&#xf15b;Expediente</option>
                        <option value="fas fa-file-alt">&#xf15c;Alternate Expediente</option>
                        <option value="fas fa-file-archive">&#xf1c6;Archive Expediente</option>
                        <option value="fas fa-file-audio">&#xf1c7;Audio Expediente</option>
                        <option value="fas fa-file-code">&#xf1c9;Code Expediente</option>
                        <option value="fas fa-file-contract">&#xf56c;Expediente Contract</option>
                        <option value="fas fa-file-csv">&#xf6dd;Expediente CSV</option>
                        <option value="fas fa-file-download">&#xf56d;Expediente Descargar</option>
                        <option value="fas fa-file-excel">&#xf1c3;Excel Expediente</option>
                        <option value="fas fa-file-export">&#xf56e;Expediente Export</option>
                        <option value="fas fa-file-image">&#xf1c5;Image Expediente</option>
                        <option value="fas fa-file-import">&#xf56f;Expediente Import</option>
                        <option value="fas fa-file-invoice">&#xf570;Expediente Invoice</option>
                        <option value="fas fa-file-invoice-dollar">&#xf571;Expediente Invoice with US Dollar</option>
                        <option value="fas fa-file-medical">&#xf477;Medical Expediente</option>
                        <option value="fas fa-file-medical-alt">&#xf478;Alternate Medical Expediente</option>
                        <option value="fas fa-file-pdf">&#xf1c1;PDF Expediente</option>
                        <option value="fas fa-file-powerpoint">&#xf1c4;Powerpoint Expediente</option>
                        <option value="fas fa-file-prescription">&#xf572;Expediente Prescription</option>
                        <option value="fas fa-file-signature">&#xf573;Expediente Signature</option>
                        <option value="fas fa-file-upload">&#xf574;Expediente Upload</option>
                        <option value="fas fa-file-video">&#xf1c8;Video Expediente</option>
                        <option value="fas fa-file-word">&#xf1c2;Word Expediente</option>
                        <option value="fas fa-fill">&#xf575;Llenar</option>
                        <option value="fas fa-fill-drip">&#xf576;Llenar Drip</option>
                        <option value="fas fa-film">&#xf008;Película</option>
                        <option value="fas fa-filter">&#xf0b0;Filtrar</option>
                        <option value="fas fa-fingerprint">&#xf577;Huella dactilar</option>
                        <option value="fas fa-fire">&#xf06d;fuego</option>
                        <option value="fas fa-fire-alt">&#xf7e4;Fuego alternativo</option>
                        <option value="fas fa-fire-extinguisher">&#xf134;fuego-extinguisher</option>
                        <option value="fab fa-firefox">&#xf269;Firefox</option>
                        <option value="fab fa-firefox-browser">&#xf907;Navegador Firefox</option>
                        <option value="fas fa-first-aid">&#xf479;Primeros auxilios</option>
                        <option value="fab fa-first-order">&#xf2b0;Primer orden</option>
                        <option value="fab fa-first-order-alt">&#xf50a;Alternate Primer orden</option>
                        <option value="fab fa-firstdraft">&#xf3a1;primer borrador</option>
                        <option value="fas fa-fish">&#xf578;Pescado</option>
                        <option value="fas fa-fist-raised">&#xf6de;Puño levantado</option>
                        <option value="fas fa-flag">&#xf024;bandera</option>
                        <option value="fas fa-flag-checkered">&#xf11e;bandera-checkered</option>
                        <option value="fas fa-flag-usa">&#xf74d;Bandera de los estados unidos de américa</option>
                        <option value="fas fa-flask">&#xf0c3;Matraz</option>
                        <option value="fab fa-flickr">&#xf16e;Flickr</option>
                        <option value="fab fa-flipboard">&#xf44d;Flipboard</option>
                        <option value="fas fa-flushed">&#xf579;Cara sonrojada</option>
                        <option value="fab fa-fly">&#xf417;Mosca</option>
                        <option value="fas fa-folder">&#xf07b;Carpeta</option>
                        <option value="fas fa-folder-minus">&#xf65d;Carpeta Minus</option>
                        <option value="fas fa-folder-open">&#xf07c;Carpeta Open</option>
                        <option value="fas fa-folder-plus">&#xf65e;Carpeta Plus</option>
                        <option value="fas fa-font">&#xf031;fuent</option>
                        <option value="fab fa-font-awesome">&#xf2b4;Fuente impresionante</option>
                        <option value="fab fa-font-awesome-alt">&#xf35c;Alternate Fuente impresionante</option>
                        <option value="fab fa-font-awesome-flag">&#xf425;Fuente impresionante Flag</option>
                        <option value="fab fa-fonticons">&#xf280;Fonticones</option>
                        <option value="fab fa-fonticons-fi">&#xf3a2;Fonticones Fi</option>
                        <option value="fas fa-football-ball">&#xf44e;Pelota de fútbol</option>
                        <option value="fab fa-fort-awesome">&#xf286;Fuerte impresionante</option>
                        <option value="fab fa-fort-awesome-alt">&#xf3a3;Alternate Fuerte impresionante</option>
                        <option value="fab fa-forumbee">&#xf211;Forumbee</option>
                        <option value="fas fa-forward">&#xf04e;adelante</option>
                        <option value="fab fa-foursquare">&#xf180;Firme</option>
                        <option value="fab fa-free-code-camp">&#xf2c5;freeCodeCamp</option>
                        <option value="fab fa-freebsd">&#xf3a4;FreeBSD</option>
                        <option value="fas fa-frog">&#xf52e;Rana</option>
                        <option value="fas fa-frown">&#xf119;Cara ceñuda</option>
                        <option value="fas fa-frown-open">&#xf57a;Cara ceñuda With Open Mouth</option>
                        <option value="fab fa-fulcrum">&#xf50b;Fulcro</option>
                        <option value="fas fa-funnel-dollar">&#xf662;Dólar embudo</option>
                        <option value="fas fa-futbol">&#xf1e3;Futbol</option>
                        <option value="fab fa-galactic-republic">&#xf50c;República Galáctica</option>
                        <option value="fab fa-galactic-senate">&#xf50d;Senado galáctico</option>
                        <option value="fas fa-gamepad">&#xf11b;Mando</option>
                        <option value="fas fa-gas-pump">&#xf52f;Bomba de gas</option>
                        <option value="fas fa-gavel">&#xf0e3;Mazo</option>
                        <option value="fas fa-gem">&#xf3a5;Joya</option>
                        <option value="fas fa-genderless">&#xf22d;Sin género</option>
                        <option value="fab fa-get-pocket">&#xf265;Obtener bolsillo</option>
                        <option value="fab fa-gg">&#xf260;Moneda GG</option>
                        <option value="fab fa-gg-circle">&#xf261;Moneda GG Circle</option>
                        <option value="fas fa-ghost">&#xf6e2;Fantasma</option>
                        <option value="fas fa-gift">&#xf06b;regalo</option>
                        <option value="fas fa-gifts">&#xf79c;Regalos</option>
                        <option value="fab fa-git">&#xf1d3;Git</option>
                        <option value="fab fa-git-alt">&#xf841;Git Alt</option>
                        <option value="fab fa-git-square">&#xf1d2;Plaza Git</option>
                        <option value="fab fa-github">&#xf09b;GitHub</option>
                        <option value="fab fa-github-alt">&#xf113;GitHub alternativo</option>
                        <option value="fab fa-github-square">&#xf092;Plaza de GitHub</option>
                        <option value="fab fa-gitkraken">&#xf3a6;GitKraken</option>
                        <option value="fab fa-gitlab">&#xf296;GitLab</option>
                        <option value="fab fa-gitter">&#xf426;Gitter</option>
                        <option value="fas fa-glass-cheers">&#xf79f;Saludos de cristal</option>
                        <option value="fas fa-glass-martini">&#xf000;Copa de Martini</option>
                        <option value="fas fa-glass-martini-alt">&#xf57b;Martini de vidrio alternativo</option>
                        <option value="fas fa-glass-whiskey">&#xf7a0;Whisky de cristal</option>
                        <option value="fas fa-glasses">&#xf530;Ga<option>
                        <option value="fab fa-glide">&#xf2a5;Planeo</option>
                        <option value="fab fa-glide-g">&#xf2a6;Planeo G</option>
                        <option value="fas fa-globe">&#xf0ac;Globo</option>
                        <option value="fas fa-globe-africa">&#xf57c;Globo with Africa shown</option>
                        <option value="fas fa-globe-americas">&#xf57d;Globo with Americas shown</option>
                        <option value="fas fa-globe-asia">&#xf57e;Globo with Asia shown</option>
                        <option value="fas fa-globe-europe">&#xf7a2;Globo with Europe shown</option>
                        <option value="fab fa-gofore">&#xf3a7;Gofore</option>
                        <option value="fas fa-golf-ball">&#xf450;Pelota de golf</option>
                        <option value="fab fa-goodreads">&#xf3a8;Goodreads</option>
                        <option value="fab fa-goodreads-g">&#xf3a9;Goodreads G</option>
                        <option value="fab fa-google">&#xf1a0;Logotipo de Google</option>
                        <option value="fab fa-google-drive">&#xf3aa;Google Drive</option>
                        <option value="fab fa-google-play">&#xf3ab;Google Play</option>
                        <option value="fab fa-google-plus">&#xf2b3;Google Mas</option>
                        <option value="fab fa-google-plus-g">&#xf0d5;Google Mas G</option>
                        <option value="fab fa-google-plus-square">&#xf0d4;Google Mas Square</option>
                        <option value="fab fa-google-wallet">&#xf1ee;Cartera de Google</option>
                        <option value="fas fa-gopuram">&#xf664;Gopuram</option>
                        <option value="fas fa-graduation-cap">&#xf19d;Gorro de graduación</option>
                        <option value="fab fa-gratipay">&#xf184;Gratipay (Gittip)</option>
                        <option value="fab fa-grav">&#xf2d6;Grav</option>
                        <option value="fas fa-greater-than">&#xf531;Mas grande que</option>
                        <option value="fas fa-greater-than-equal">&#xf532;Mas grande que Equal To</option>
                        <option value="fas fa-grimace">&#xf57f;Cara haciendo muecas</option>
                        <option value="fas fa-grin">&#xf580;Cara sonriente</option>
                        <option value="fas fa-grin-alt">&#xf581;Alternate Cara sonriente</option>
                        <option value="fas fa-grin-beam">&#xf582;Cara sonriente With Smiling Ojos</option>
                        <option value="fas fa-grin-beam-sweat">&#xf583;Cara sonriente con sudor</option>
                        <option value="fas fa-grin-hearts">&#xf584;Cara sonriente con ojos de corazón</option>
                        <option value="fas fa-grin-squint">&#xf585;Sonriendo cara entrecerrada</option>
                        <option value="fas fa-grin-squint-tears">&#xf586;Rodando en el piso, riendo</option>
                        <option value="fas fa-grin-stars">&#xf587;Golpe de estrella</option>
                        <option value="fas fa-grin-tears">&#xf588;Rostro con lágrimas de alegría</option>
                        <option value="fas fa-grin-tongue">&#xf589;Cara con lengua</option>
                        <option value="fas fa-grin-tongue-squint">&#xf58a;Squinting Cara con lengua</option>
                        <option value="fas fa-grin-tongue-wink">&#xf58b;Winking Cara con lengua</option>
                        <option value="fas fa-grin-wink">&#xf58c;Cara sonriente guiñando un ojo</option>
                        <option value="fas fa-grip-horizontal">&#xf58d;Agarre horizontal</option>
                        <option value="fas fa-grip-lines">&#xf7a4;Líneas de agarre</option>
                        <option value="fas fa-grip-lines-vertical">&#xf7a5;Líneas de agarre Vertical</option>
                        <option value="fas fa-grip-vertical">&#xf58e;Agarre Vertical</option>
                        <option value="fab fa-gripfire">&#xf3ac;Gripfire, Inc.</option>
                        <option value="fab fa-grunt">&#xf3ad;Gruñido</option>
                        <option value="fas fa-guitar">&#xf7a6;Guitarra</option>
                        <option value="fab fa-gulp">&#xf3ae;Trago</option>
                        <option value="fas fa-h-square">&#xf0fd;H cuadrado</option>
                        <option value="fab fa-hacker-news">&#xf1d4;Noticias de hackers</option>
                        <option value="fab fa-hacker-news-square">&#xf3af;Noticias de hackers Square</option>
                        <option value="fab fa-hackerrank">&#xf5f7;Hackerrank</option>
                        <option value="fas fa-hamburger">&#xf805;Hamburguesa</option>
                        <option value="fas fa-hammer">&#xf6e3;Martillo</option>
                        <option value="fas fa-hamsa">&#xf665;Hamsa</option>
                        <option value="fas fa-hand-holding">&#xf4bd;Tomar de las manos</option>
                        <option value="fas fa-hand-holding-heart">&#xf4be;Tomar de las manos Corazón</option>
                        <option value="fas fa-hand-holding-medical">&#xf95c;Tomar de las manos Medical Cross</option>
                        <option value="fas fa-hand-holding-usd">&#xf4c0;Tomar de las manos US Dollar</option>
                        <option value="fas fa-hand-holding-water">&#xf4c1;Tomar de las manos Water</option>
                        <option value="fas fa-hand-lizard">&#xf258;Lagarto (mano)</option>
                        <option value="fas fa-hand-middle-finger">&#xf806;Mano con el dedo medio levantado</option>
                        <option value="fas fa-hand-paper">&#xf256;Papel (Mano)</option>
                        <option value="fas fa-hand-peace">&#xf25b;Paz (Mano)</option>
                        <option value="fas fa-hand-point-down">&#xf0a7;Mano apuntando hacia abajo</option>
                        <option value="fas fa-hand-point-left">&#xf0a5;Mano apuntando a la izquierda</option>
                        <option value="fas fa-hand-point-right">&#xf0a4;Mano apuntando a la derecha</option>
                        <option value="fas fa-hand-point-up">&#xf0a6;Mano apuntando hacia arriba</option>
                        <option value="fas fa-hand-pointer">&#xf25a;Puntero (mano)</option>
                        <option value="fas fa-hand-rock">&#xf255;Rock (mano)</option>
                        <option value="fas fa-hand-scissors">&#xf257;Tijeras (mano)</option>
                        <option value="fas fa-hand-sparkles">&#xf95d;Mano brilla</option>
                        <option value="fas fa-hand-spock">&#xf259;Spock (mano)</option>
                        <option value="fas fa-hands">&#xf4c2;Manos</option>
                        <option value="fas fa-hands-helping">&#xf4c4;Helping Manos</option>
                        <option value="fas fa-hands-wash">&#xf95e;Manos Wash</option>
                        <option value="fas fa-handshake">&#xf2b5;Manoshake</option>
                        <option value="fas fa-handshake-alt-slash">&#xf95f;Manoshake Alternate Slash</option>
                        <option value="fas fa-handshake-slash">&#xf960;Manoshake Slash</option>
                        <option value="fas fa-hanukiah">&#xf6e6;Hanukiah</option>
                        <option value="fas fa-hard-hat">&#xf807;Casco de seguridad</option>
                        <option value="fas fa-hashtag">&#xf292;Hashtag</option>
                        <option value="fas fa-hat-cowboy">&#xf8c0;Sombrero de vaquero</option>
                        <option value="fas fa-hat-cowboy-side">&#xf8c1;Sombrero de vaquero Side</option>
                        <option value="fas fa-hat-wizard">&#xf6e8;Sombrero de mago</option>
                        <option value="fas fa-hdd">&#xf0a0;HDD</option>
                        <option value="fas fa-head-side-cough">&#xf961;Tos del costado de la cabeza</option>
                        <option value="fas fa-head-side-cough-slash">&#xf962;Cabeza, tos lateral, barra</option>
                        <option value="fas fa-head-side-mask">&#xf963;Máscara lateral de cabeza</option>
                        <option value="fas fa-head-side-virus">&#xf964;Virus del lado de la cabeza</option>
                        <option value="fas fa-heading">&#xf1dc;Bóveda</option>
                        <option value="fas fa-headphones">&#xf025;auriculares</option>
                        <option value="fas fa-headphones-alt">&#xf58f;Auriculares alternativos</option>
                        <option value="fas fa-headset">&#xf590;Auriculares</option>
                        <option value="fas fa-heart">&#xf004;Corazón</option>
                        <option value="fas fa-heart-broken">&#xf7a9;Corazón Broken</option>
                        <option value="fas fa-heartbeat">&#xf21e;Corazónbeat</option>
                        <option value="fas fa-helicopter">&#xf533;Helicóptero</option>
                        <option value="fas fa-highlighter">&#xf591;Resaltador</option>
                        <option value="fas fa-hiking">&#xf6ec;Excursionismo</option>
                        <option value="fas fa-hippo">&#xf6ed;Hipopótamo</option>
                        <option value="fab fa-hips">&#xf452;Caderas</option>
                        <option value="fab fa-hire-a-helper">&#xf3b0;HireAHelper</option>
                        <option value="fas fa-history">&#xf1da;Historia</option>
                        <option value="fas fa-hockey-puck">&#xf453;Disco de hocllave</option>
                        <option value="fas fa-holly-berry">&#xf7aa;Baya de acebo</option>
                        <option value="fas fa-home">&#xf015;casa</option>
                        <option value="fab fa-hooli">&#xf427;Hooli</option>
                        <option value="fab fa-hornbill">&#xf592;Cálao</option>
                        <option value="fas fa-horse">&#xf6f0;Caballo</option>
                        <option value="fas fa-horse-head">&#xf7ab;Caballo Head</option>
                        <option value="fas fa-hospital">&#xf0f8;hospital</option>
                        <option value="fas fa-hospital-alt">&#xf47d;Hospital alternativo</option>
                        <option value="fas fa-hospital-symbol">&#xf47e;Símbolo del hospital</option>
                        <option value="fas fa-hospital-user">&#xf80d;Hospital con Usuario</option>
                        <option value="fas fa-hot-tub">&#xf593;Bañera de hidromasaje</option>
                        <option value="fas fa-hotdog">&#xf80f;Pancho</option>
                        <option value="fas fa-hotel">&#xf594;Hotel</option>
                        <option value="fab fa-hotjar">&#xf3b1;Hotjar</option>
                        <option value="fas fa-hourglass">&#xf254;Reloj de arena</option>
                        <option value="fas fa-hourglass-end">&#xf253;Reloj de arena End</option>
                        <option value="fas fa-hourglass-half">&#xf252;Reloj de arena Half</option>
                        <option value="fas fa-hourglass-start">&#xf251;Reloj de arena Start</option>
                        <option value="fas fa-house-damage">&#xf6f1;Casa dañada</option>
                        <option value="fas fa-house-user">&#xf965;Usuario interno</option>
                        <option value="fab fa-houzz">&#xf27c;Houzz</option>
                        <option value="fas fa-hryvnia">&#xf6f2;Hryvnia</option>
                        <option value="fab fa-html5">&#xf13b;Logotipo HTML 5</option>
                        <option value="fab fa-hubspot">&#xf3b2;HubSpot</option>
                        <option value="fas fa-i-cursor">&#xf246;Yo hago el cursor</option>
                        <option value="fas fa-ice-cream">&#xf810;Helado</option>
                        <option value="fas fa-icicles">&#xf7ad;Carámbanos</option>
                        <option value="fas fa-icons">&#xf86d;Iconos</option>
                        <option value="fas fa-id-badge">&#xf2c1;Placa de identificación</option>
                        <option value="fas fa-id-card">&#xf2c2;Tarjeta de identificación</option>
                        <option value="fas fa-id-card-alt">&#xf47f;Alternate Tarjeta de identificación</option>
                        <option value="fab fa-ideal">&#xf913;ideal</option>
                        <option value="fas fa-igloo">&#xf7ae;Iglú</option>
                        <option value="fas fa-image">&#xf03e;Imagen</option>
                        <option value="fas fa-images">&#xf302;Imagens</option>
                        <option value="fab fa-imdb">&#xf2d8;IMDB</option>
                        <option value="fas fa-inbox">&#xf01c;bandeja de entrada</option>
                        <option value="fas fa-indent">&#xf03c;Sangrar</option>
                        <option value="fas fa-industry">&#xf275;Industria</option>
                        <option value="fas fa-infinity">&#xf534;infinito</option>
                        <option value="fas fa-info">&#xf129;Información</option>
                        <option value="fas fa-info-circle">&#xf05a;Información Circle</option>
                        <option value="fab fa-instagram">&#xf16d;Instagram</option>
                        <option value="fab fa-instagram-square">&#xf955;Plaza de Instagram</option>
                        <option value="fab fa-intercom">&#xf7af;Intercomunicador</option>
                        <option value="fab fa-internet-explorer">&#xf26b;Explorador de Internet</option>
                        <option value="fab fa-invision">&#xf7b0;InVision</option>
                        <option value="fab fa-ioxhost">&#xf208;ioxhost</option>
                        <option value="fas fa-italic">&#xf033;itálico</option>
                        <option value="fab fa-itch-io">&#xf83a;itch.io</option>
                        <option value="fab fa-itunes">&#xf3b4;iTunes</option>
                        <option value="fab fa-itunes-note">&#xf3b5;Nota de iTunes</option>
                        <option value="fab fa-java">&#xf4e4;Java</option>
                        <option value="fas fa-jedi">&#xf669;Jedi</option>
                        <option value="fab fa-jedi-order">&#xf50e;Orden Jedi</option>
                        <option value="fab fa-jenkins">&#xf3b6;Jenkis</option>
                        <option value="fab fa-jira">&#xf7b1;Jira</option>
                        <option value="fab fa-joget">&#xf3b7;Joget</option>
                        <option value="fas fa-joint">&#xf595;Articulación</option>
                        <option value="fab fa-joomla">&#xf1aa;Logotipo de Joomla</option>
                        <option value="fas fa-journal-whills">&#xf66a;Diario de los Whills</option>
                        <option value="fab fa-js">&#xf3b8;JavaScript (JS)</option>
                        <option value="fab fa-js-square">&#xf3b9;Cuadrado de JavaScript (JS)</option>
                        <option value="fab fa-jsfiddle">&#xf1cc;jsFiddle</option>
                        <option value="fas fa-kaaba">&#xf66b;Kaaba</option>
                        <option value="fab fa-kaggle">&#xf5fa;Kaggle</option>
                        <option value="fas fa-key">&#xf084;llave</option>
                        <option value="fab fa-keybase">&#xf4f5;Base de claves</option>
                        <option value="fas fa-keyboard">&#xf11c;Teclado</option>
                        <option value="fab fa-keycdn">&#xf3ba;KeyCDN</option>
                        <option value="fas fa-khanda">&#xf66d;Khanda</option>
                        <option value="fab fa-kickstarter">&#xf3bb;Pedal de arranque</option>
                        <option value="fab fa-kickstarter-k">&#xf3bc;Pedal de arranque K</option>
                        <option value="fas fa-kiss">&#xf596;Besar la cara</option>
                        <option value="fas fa-kiss-beam">&#xf597;Besar la cara With Smiling Eyes</option>
                        <option value="fas fa-kiss-wink-heart">&#xf598;Cara que sopla un beso</option>
                        <option value="fas fa-kiwi-bird">&#xf535;Pájaro del kiwi</option>
                        <option value="fab fa-korvue">&#xf42f;KORVUE</option>
                        <option value="fas fa-landmark">&#xf66f;Punto de referencia</option>
                        <option value="fas fa-language">&#xf1ab;Idioma</option>
                        <option value="fas fa-laptop">&#xf109;Ordenador portátil</option>
                        <option value="fas fa-laptop-code">&#xf5fc;Ordenador portátil Code</option>
                        <option value="fas fa-laptop-house">&#xf966;Ordenador portátil House</option>
                        <option value="fas fa-laptop-medical">&#xf812;Ordenador portátil Medical</option>
                        <option value="fab fa-laravel">&#xf3bd;Laravel</option>
                        <option value="fab fa-lastfm">&#xf202;Last FM</option>
                        <option value="fab fa-lastfm-square">&#xf203;Last FM Square</option>
                        <option value="fas fa-laugh">&#xf599;Cara sonriente con ojos grandes</option>
                        <option value="fas fa-laugh-beam">&#xf59a;Cara de risa con ojos radiantes</option>
                        <option value="fas fa-laugh-squint">&#xf59b;Reír, entrecerrar los ojos, cara</option>
                        <option value="fas fa-laugh-wink">&#xf59c;Riendo guiñando un ojo</option>
                        <option value="fas fa-layer-group">&#xf5fd;Grupo de capas</option>
                        <option value="fas fa-leaf">&#xf06c;hoja</option>
                        <option value="fab fa-leanpub">&#xf212;Leanpub</option>
                        <option value="fas fa-lemon">&#xf094;Limón</option>
                        <option value="fab fa-less">&#xf41d;Menos</option>
                        <option value="fas fa-less-than">&#xf536;Menos Than</option>
                        <option value="fas fa-less-than-equal">&#xf537;Menos Than Equal To</option>
                        <option value="fas fa-level-down-alt">&#xf3be;Nivel alternativo hacia abajo</option>
                        <option value="fas fa-level-up-alt">&#xf3bf;Subir de nivel alternativo</option>
                        <option value="fas fa-life-ring">&#xf1cd;Anillo de vida</option>
                        <option value="fas fa-lightbulb">&#xf0eb;Bombilla</option>
                        <option value="fab fa-line">&#xf3c0;Línea</option>
                        <option value="fas fa-link">&#xf0c1;Enlace</option>
                        <option value="fab fa-linkedin">&#xf08c;EnlaceedIn</option>
                        <option value="fab fa-linkedin-in">&#xf0e1;EnlaceedIn In</option>
                        <option value="fab fa-linode">&#xf2b8;Linode</option>
                        <option value="fab fa-linux">&#xf17c;Linux</option>
                        <option value="fas fa-lira-sign">&#xf195;Signo de la lira turca</option>
                        <option value="fas fa-list">&#xf03a;Lista</option>
                        <option value="fas fa-list-alt">&#xf022;Lista alternativaa</option>
                        <option value="fas fa-list-ol">&#xf0cb;list-ol</option>
                        <option value="fas fa-list-ul">&#xf0ca;list-ul</option>
                        <option value="fas fa-location-arrow">&#xf124;flecha de ubicación</option>
                        <option value="fas fa-lock">&#xf023;bloquear</option>
                        <option value="fas fa-lock-open">&#xf3c1;Bloqueo abierto</option>
                        <option value="fas fa-long-arrow-alt-down">&#xf309;Flecha larga alternativa hacia abajo</option>
                        <option value="fas fa-long-arrow-alt-left">&#xf30a;Flecha larga alternativa a la izquierda</option>
                        <option value="fas fa-long-arrow-alt-right">&#xf30b;Flecha larga alternativa a la derecha</option>
                        <option value="fas fa-long-arrow-alt-up">&#xf30c;Flecha larga alternativa hacia arriba</option>
                        <option value="fas fa-low-vision">&#xf2a8;Visión baja</option>
                        <option value="fas fa-luggage-cart">&#xf59d;Carrito de equipaje</option>
                        <option value="fas fa-lungs">&#xf604;Livianos</option>
                        <option value="fas fa-lungs-virus">&#xf967;Livianos Virus</option>
                        <option value="fab fa-lyft">&#xf3c3;Lyft</option>
                        <option value="fab fa-magento">&#xf3c4;Magento</option>
                        <option value="fas fa-magic">&#xf0d0;magia</option>
                        <option value="fas fa-magnet">&#xf076;imán</option>
                        <option value="fas fa-mail-bulk">&#xf674;Correo masivo</option>
                        <option value="fab fa-mailchimp">&#xf59e;Mailchimp</option>
                        <option value="fas fa-male">&#xf183;Masculino</option>
                        <option value="fab fa-mandalorian">&#xf50f;Mandaloriano</option>
                        <option value="fas fa-map">&#xf279;Mapa</option>
                        <option value="fas fa-map-marked">&#xf59f;Mapa Marked</option>
                        <option value="fas fa-map-marked-alt">&#xf5a0;Alternate Mapa Marked</option>
                        <option value="fas fa-map-marker">&#xf041;marcador de mapa</option>
                        <option value="fas fa-map-marker-alt">&#xf3c5;Alternate Mapa Marcador</option>
                        <option value="fas fa-map-pin">&#xf276;Mapa Pin</option>
                        <option value="fas fa-map-signs">&#xf277;Mapa Signs</option>
                        <option value="fab fa-markdown">&#xf60f;Reducción</option>
                        <option value="fas fa-marker">&#xf5a1;Marcador</option>
                        <option value="fas fa-mars">&#xf222;Marte</option>
                        <option value="fas fa-mars-double">&#xf227;Marte Double</option>
                        <option value="fas fa-mars-stroke">&#xf229;Marte Stroke</option>
                        <option value="fas fa-mars-stroke-h">&#xf22b;Marte Stroke Horizontal</option>
                        <option value="fas fa-mars-stroke-v">&#xf22a;Marte Stroke Vertical</option>
                        <option value="fas fa-mask">&#xf6fa;Máscara</option>
                        <option value="fab fa-mastodon">&#xf4f6;Mastodonte</option>
                        <option value="fab fa-maxcdn">&#xf136;MaxCDN</option>
                        <option value="fab fa-mdb">&#xf8ca;Diseño de materiales para Bootstrap</option>
                        <option value="fas fa-medal">&#xf5a2;Medalla</option>
                        <option value="fab fa-medapps">&#xf3c6;MedApps</option>
                        <option value="fab fa-medium">&#xf23a;Medio</option>
                        <option value="fab fa-medium-m">&#xf3c7;Medio M</option>
                        <option value="fas fa-medkit">&#xf0fa;Botiquín</option>
                        <option value="fab fa-medrt">&#xf3c8;MRT</option>
                        <option value="fab fa-meetup">&#xf2e0;Reunirse</option>
                        <option value="fab fa-megaport">&#xf5a3;Megapuerto</option>
                        <option value="fas fa-meh">&#xf11a;Cara neutral</option>
                        <option value="fas fa-meh-blank">&#xf5a4;Cara sin boca</option>
                        <option value="fas fa-meh-rolling-eyes">&#xf5a5;Cara con ojos en blanco</option>
                        <option value="fas fa-memory">&#xf538;Memoria</option>
                        <option value="fab fa-mendeley">&#xf7b3;Mendeley</option>
                        <option value="fas fa-menorah">&#xf676;Menorah</option>
                        <option value="fas fa-mercury">&#xf223;Mercurio</option>
                        <option value="fas fa-meteor">&#xf753;Meteorito</option>
                        <option value="fab fa-microblog">&#xf91a;Micro.blog</option>
                        <option value="fas fa-microchip">&#xf2db;Pastilla</option>
                        <option value="fas fa-microphone">&#xf130;micrófono</option>
                        <option value="fas fa-microphone-alt">&#xf3c9;Micrófono alternativo</option>
                        <option value="fas fa-microphone-alt-slash">&#xf539;Micrófono alternativo Slash</option>
                        <option value="fas fa-microphone-slash">&#xf131;Barra de micrófono</option>
                        <option value="fas fa-microscope">&#xf610;Microscopio</option>
                        <option value="fab fa-microsoft">&#xf3ca;Microsoft</option>
                        <option value="fas fa-minus">&#xf068;menos</option>
                        <option value="fas fa-minus-circle">&#xf056;Círculo menos</option>
                        <option value="fas fa-minus-square">&#xf146;Menos cuadrado</option>
                        <option value="fas fa-mitten">&#xf7b5;Mitón</option>
                        <option value="fab fa-mix">&#xf3cb;Mezcla</option>
                        <option value="fab fa-mixcloud">&#xf289;Mezclacloud</option>
                        <option value="fab fa-mixer">&#xf956;Mezclaer</option>
                        <option value="fab fa-mizuni">&#xf3cc;Mizuni</option>
                        <option value="fas fa-mobile">&#xf10b;Teléfono móvil</option>
                        <option value="fas fa-mobile-alt">&#xf3cd;Móvil alternativo</option>
                        <option value="fab fa-modx">&#xf285;MODX</option>
                        <option value="fab fa-monero">&#xf3d0;Monero</option>
                        <option value="fas fa-money-bill">&#xf0d6;Factura de dinero</option>
                        <option value="fas fa-money-bill-alt">&#xf3d1;Alternate Factura de dinero</option>
                        <option value="fas fa-money-bill-wave">&#xf53a;Wavy Factura de dinero</option>
                        <option value="fas fa-money-bill-wave-alt">&#xf53b;Alternate Wavy Factura de dinero</option>
                        <option value="fas fa-money-check">&#xf53c;Cheque de dinero</option>
                        <option value="fas fa-money-check-alt">&#xf53d;Alternate Cheque de dinero</option>
                        <option value="fas fa-monument">&#xf5a6;Monumento</option>
                        <option value="fas fa-moon">&#xf186;Luna</option>
                        <option value="fas fa-mortar-pestle">&#xf5a7;Maja de mortero</option>
                        <option value="fas fa-mosque">&#xf678;Mezquita</option>
                        <option value="fas fa-motorcycle">&#xf21c;Motocicleta</option>
                        <option value="fas fa-mountain">&#xf6fc;Montaña</option>
                        <option value="fas fa-mouse">&#xf8cc;Ratón</option>
                        <option value="fas fa-mouse-pointer">&#xf245;Ratón Pointer</option>
                        <option value="fas fa-mug-hot">&#xf7b6;Taza caliente</option>
                        <option value="fas fa-music">&#xf001;Música</option>
                        <option value="fab fa-napster">&#xf3d2;Napster</option>
                        <option value="fab fa-neos">&#xf612;Neos</option>
                        <option value="fas fa-network-wired">&#xf6ff;Red cableada</option>
                        <option value="fas fa-neuter">&#xf22c;Neutro</option>
                        <option value="fas fa-newspaper">&#xf1ea;Periódico</option>
                        <option value="fab fa-nimblr">&#xf5a8;Nimblr</option>
                        <option value="fab fa-node">&#xf419;Node.js</option>
                        <option value="fab fa-node-js">&#xf3d3;JS de Node.js</option>
                        <option value="fas fa-not-equal">&#xf53e;No es igual</option>
                        <option value="fas fa-notes-medical">&#xf481;Notas médicas</option>
                        <option value="fab fa-npm">&#xf3d4;npm</option>
                        <option value="fab fa-ns8">&#xf3d5;NS8</option>
                        <option value="fab fa-nutritionix">&#xf3d6;Nutritionix</option>
                        <option value="fas fa-object-group">&#xf247;Grupo de objetos</option>
                        <option value="fas fa-object-ungroup">&#xf248;Desagrupar objeto</option>
                        <option value="fab fa-odnoklassniki">&#xf263;Odnoklassniki</option>
                        <option value="fab fa-odnoklassniki-square">&#xf264;Plaza Odnoklassniki</option>
                        <option value="fas fa-oil-can">&#xf613;Lata de aceite</option>
                        <option value="fab fa-old-republic">&#xf510;Vieja república</option>
                        <option value="fas fa-om">&#xf679;Om</option>
                        <option value="fab fa-opencart">&#xf23d;OpenCart</option>
                        <option value="fab fa-openid">&#xf19b;OpenID</option>
                        <option value="fab fa-opera">&#xf26a;Ópera</option>
                        <option value="fab fa-optin-monster">&#xf23c;Optin monstruo</option>
                        <option value="fab fa-orcid">&#xf8d2;ORCID</option>
                        <option value="fab fa-osi">&#xf41a;Iniciativa de código abierto</option>
                        <option value="fas fa-otter">&#xf700;Nutria</option>
                        <option value="fas fa-outdent">&#xf03b;Sangrado</option>
                        <option value="fab fa-page4">&#xf3d7;page4 Corporation</option>
                        <option value="fab fa-pagelines">&#xf18c;Pagelines</option>
                        <option value="fas fa-pager">&#xf815;Buscapersonas</option>
                        <option value="fas fa-paint-brush">&#xf1fc;Cepillo de pintura</option>
                        <option value="fas fa-paint-roller">&#xf5aa;Rodillo</option>
                        <option value="fas fa-palette">&#xf53f;Paleta</option>
                        <option value="fab fa-palfed">&#xf3d8;Palfeado</option>
                        <option value="fas fa-pallet">&#xf482;Paleta</option>
                        <option value="fas fa-paper-plane">&#xf1d8;Avion de papel</option>
                        <option value="fas fa-paperclip">&#xf0c6;Clip de papel</option>
                        <option value="fas fa-parachute-box">&#xf4cd;Caja de paracaídas</option>
                        <option value="fas fa-paragraph">&#xf1dd;párrafo</option>
                        <option value="fas fa-parking">&#xf540;Estacionamiento</option>
                        <option value="fas fa-passport">&#xf5ab;Pasaporte</option>
                        <option value="fas fa-pastafarianism">&#xf67b;Pastafarianismo</option>
                        <option value="fas fa-paste">&#xf0ea;Pegar</option>
                        <option value="fab fa-patreon">&#xf3d9;Patreon</option>
                        <option value="fas fa-pause">&#xf04c;pausa</option>
                        <option value="fas fa-pause-circle">&#xf28b;Pausar círculo</option>
                        <option value="fas fa-paw">&#xf1b0;Pata</option>
                        <option value="fab fa-paypal">&#xf1ed;Paypal</option>
                        <option value="fas fa-peace">&#xf67c;Paz</option>
                        <option value="fas fa-pen">&#xf304;Bolígrafo</option>
                        <option value="fas fa-pen-alt">&#xf305;Alternate Bolígrafo</option>
                        <option value="fas fa-pen-fancy">&#xf5ac;Bolígrafo Fancy</option>
                        <option value="fas fa-pen-nib">&#xf5ad;Bolígrafo Nib</option>
                        <option value="fas fa-pen-square">&#xf14b;Bolígrafo Cuadrado</option>
                        <option value="fas fa-pencil-alt">&#xf303;Alternate Bolígrafocil</option>
                        <option value="fas fa-pencil-ruler">&#xf5ae;Bolígrafocil gobernante</option>
                        <option value="fab fa-penny-arcade">&#xf704;Bolígrafony Arcade</option>
                        <option value="fas fa-people-arrows">&#xf968;Flechas de personas</option>
                        <option value="fas fa-people-carry">&#xf4ce;La gente lleva</option>
                        <option value="fas fa-pepper-hot">&#xf816;Guindilla</option>
                        <option value="fas fa-percent">&#xf295;Por ciento</option>
                        <option value="fas fa-percentage">&#xf541;Por cientoage</option>
                        <option value="fab fa-periscope">&#xf3da;Periscopio</option>
                        <option value="fas fa-person-booth">&#xf756;Persona entrando en la cabina</option>
                        <option value="fab fa-phabricator">&#xf3db;fabricador</option>
                        <option value="fab fa-phoenix-framework">&#xf3dc;Marco de Phoenix</option>
                        <option value="fab fa-phoenix-squadron">&#xf511;Escuadrón Fénix</option>
                        <option value="fas fa-phone">&#xf095;Teléfono</option>
                        <option value="fas fa-phone-alt">&#xf879;Alternate Teléfono</option>
                        <option value="fas fa-phone-slash">&#xf3dd;Teléfono Barra oblicua</option>
                        <option value="fas fa-phone-square">&#xf098;Teléfono Cuadrado</option>
                        <option value="fas fa-phone-square-alt">&#xf87b;Alternate Teléfono Cuadrado</option>
                        <option value="fas fa-phone-volume">&#xf2a0;Teléfono Volume</option>
                        <option value="fas fa-photo-video">&#xf87c;Foto Video</option>
                        <option value="fab fa-php">&#xf457;PHP</option>
                        <option value="fab fa-pied-piper">&#xf2ae;Logotipo de flautista</option>
                        <option value="fab fa-pied-piper-alt">&#xf1a8;Alternate Logotipo de flautista (Old)</option>
                        <option value="fab fa-pied-piper-hat">&#xf4e5;Sombrero de flautista (antiguo)</option>
                        <option value="fab fa-pied-piper-pp">&#xf1a7;Logotipo de Pied Piper PP (antiguo)</option>
                        <option value="fab fa-pied-piper-square">&#xf91e;Logotipo de Pied Piper Cuadrado (antiguo)</option>
                        <option value="fas fa-piggy-bank">&#xf4d3;Hucha</option>
                        <option value="fas fa-pills">&#xf484;Pastillas</option>
                        <option value="fab fa-pinterest">&#xf0d2;Pinterest</option>
                        <option value="fab fa-pinterest-p">&#xf231;Pinterest P</option>
                        <option value="fab fa-pinterest-square">&#xf0d3;Pinterest Cuadrado</option>
                        <option value="fas fa-pizza-slice">&#xf818;Porción de pizza</option>
                        <option value="fas fa-place-of-worship">&#xf67f;Lugar de adoración</option>
                        <option value="fas fa-plane">&#xf072;avión</option>
                        <option value="fas fa-plane-arrival">&#xf5af;Llegada del avión</option>
                        <option value="fas fa-plane-departure">&#xf5b0;Salida de avion</option>
                        <option value="fas fa-plane-slash">&#xf969;Barra plana</option>
                        <option value="fas fa-play">&#xf04b;tocar</option>
                        <option value="fas fa-play-circle">&#xf144;Círculo de juego</option>
                        <option value="fab fa-playstation">&#xf3df;Estación de juegos</option>
                        <option value="fas fa-plug">&#xf1e6;Enchufe</option>
                        <option value="fas fa-plus">&#xf067;más</option>
                        <option value="fas fa-plus-circle">&#xf055;Círculo Plus</option>
                        <option value="fas fa-plus-square">&#xf0fe;Plus cuadrado</option>
                        <option value="fas fa-podcast">&#xf2ce;Podcast</option>
                        <option value="fas fa-poll">&#xf681;Encuesta</option>
                        <option value="fas fa-poll-h">&#xf682;Encuesta H</option>
                        <option value="fas fa-poo">&#xf2fe;Caca</option>
                        <option value="fas fa-poo-storm">&#xf75a;Caca Storm</option>
                        <option value="fas fa-poop">&#xf619;Cacap</option>
                        <option value="fas fa-portrait">&#xf3e0;Retrato</option>
                        <option value="fas fa-pound-sign">&#xf154;Firmaro de Libra</option>
                        <option value="fas fa-power-off">&#xf011;Apagado</option>
                        <option value="fas fa-pray">&#xf683;Orar</option>
                        <option value="fas fa-praying-hands">&#xf684;Oraring Hands</option>
                        <option value="fas fa-prescription">&#xf5b1;Prescripción</option>
                        <option value="fas fa-prescription-bottle">&#xf485;Prescripción Bottle</option>
                        <option value="fas fa-prescription-bottle-alt">&#xf486;Alternate Prescripción Bottle</option>
                        <option value="fas fa-print">&#xf02f;impresión</option>
                        <option value="fas fa-procedures">&#xf487;Procedimientos</option>
                        <option value="fab fa-product-hunt">&#xf288;Búsqueda de productos</option>
                        <option value="fas fa-project-diagram">&#xf542;Diagrama del proyecto</option>
                        <option value="fas fa-pump-medical">&#xf96a;Bomba médica</option>
                        <option value="fas fa-pump-soap">&#xf96b;Jabón de bomba</option>
                        <option value="fab fa-pushed">&#xf3e1;Empujado</option>
                        <option value="fas fa-puzzle-piece">&#xf12e;Pieza de puzzle</option>
                        <option value="fab fa-python">&#xf3e2;Pitón</option>
                        <option value="fab fa-qq">&#xf1d6;QQ</option>
                        <option value="fas fa-qrcode">&#xf029;Código QR</option>
                        <option value="fas fa-question">&#xf128;Pregunta</option>
                        <option value="fas fa-question-circle">&#xf059;Pregunta Circle</option>
                        <option value="fas fa-quidditch">&#xf458;Quidditch</option>
                        <option value="fab fa-quinscape">&#xf459;QuinScape</option>
                        <option value="fab fa-quora">&#xf2c4;Quora</option>
                        <option value="fas fa-quote-left">&#xf10d;cita-izquierda</option>
                        <option value="fas fa-quote-right">&#xf10e;cita-derecha</option>
                        <option value="fas fa-quran">&#xf687;Corán</option>
                        <option value="fab fa-r-project">&#xf4f7;Proyecto R</option>
                        <option value="fas fa-radiation">&#xf7b9;Radiación</option>
                        <option value="fas fa-radiation-alt">&#xf7ba;Alternate Radiación</option>
                        <option value="fas fa-rainbow">&#xf75b;Arco iris</option>
                        <option value="fas fa-random">&#xf074;aleatorio</option>
                        <option value="fab fa-raspberry-pi">&#xf7bb;Frambuesa pi</option>
                        <option value="fab fa-ravelry">&#xf2d9;Ravelry</option>
                        <option value="fab fa-react">&#xf41b;Reaccionar</option>
                        <option value="fab fa-reacteurope">&#xf75d;ReaccionarEurope</option>
                        <option value="fab fa-readme">&#xf4d5;Léame</option>
                        <option value="fab fa-rebel">&#xf1d0;Alianza rebelde</option>
                        <option value="fas fa-receipt">&#xf543;Recibo</option>
                        <option value="fas fa-record-vinyl">&#xf8d9;Disco de vinilo</option>
                        <option value="fas fa-recycle">&#xf1b8;Reciclar</option>
                        <option value="fab fa-red-river">&#xf3e3;río Rojo</option>
                        <option value="fab fa-reddit">&#xf1a1;logotipo de reddit</option>
                        <option value="fab fa-reddit-alien">&#xf281;reddit alien</option>
                        <option value="fab fa-reddit-square">&#xf1a2;plaza reddit</option>
                        <option value="fab fa-redhat">&#xf7bc;Sombrero rojo</option>
                        <option value="fas fa-redo">&#xf01e;Rehacer</option>
                        <option value="fas fa-redo-alt">&#xf2f9;Alternate Rehacer</option>
                        <option value="fas fa-registered">&#xf25d;Marca registrada</option>
                        <option value="fas fa-remove-format">&#xf87d;Quitar formato</option>
                        <option value="fab fa-renren">&#xf18b;Renren</option>
                        <option value="fas fa-reply">&#xf3e5;Respuesta</option>
                        <option value="fas fa-reply-all">&#xf122;responder a todos</option>
                        <option value="fab fa-replyd">&#xf3e6;respondido</option>
                        <option value="fas fa-republican">&#xf75e;Republicano</option>
                        <option value="fab fa-researchgate">&#xf4f8;Puerta de la investigación</option>
                        <option value="fab fa-resolving">&#xf3e7;Resolviendo</option>
                        <option value="fas fa-restroom">&#xf7bd;Area de aseo</option>
                        <option value="fas fa-retweet">&#xf079;Retweet</option>
                        <option value="fab fa-rev">&#xf5b2;Rev.io</option>
                        <option value="fas fa-ribbon">&#xf4d6;Cinta</option>
                        <option value="fas fa-ring">&#xf70b;anillo</option>
                        <option value="fas fa-road">&#xf018;la carretera</option>
                        <option value="fas fa-robot">&#xf544;Robot</option>
                        <option value="fas fa-rocket">&#xf135;cohete</option>
                        <option value="fab fa-rocketchat">&#xf3e8;Rocket.Chat</option>
                        <option value="fab fa-rockrms">&#xf3e9;Rockrms</option>
                        <option value="fas fa-route">&#xf4d7;Ruta</option>
                        <option value="fas fa-rss">&#xf09e;rss</option>
                        <option value="fas fa-rss-square">&#xf143;RSS cuadrado</option>
                        <option value="fas fa-ruble-sign">&#xf158;Firmaro de rublo</option>
                        <option value="fas fa-ruler">&#xf545;gobernante</option>
                        <option value="fas fa-ruler-combined">&#xf546;gobernante Combined</option>
                        <option value="fas fa-ruler-horizontal">&#xf547;gobernante Horizontal</option>
                        <option value="fas fa-ruler-vertical">&#xf548;gobernante Vertical</option>
                        <option value="fas fa-running">&#xf70c;Corriendo</option>
                        <option value="fas fa-rupee-sign">&#xf156;Firmaro de la rupia india</option>
                        <option value="fas fa-sad-cry">&#xf5b3;Cara llorando</option>
                        <option value="fas fa-sad-tear">&#xf5b4;Loudly Cara llorando</option>
                        <option value="fab fa-safari">&#xf267;Safari</option>
                        <option value="fab fa-salesforce">&#xf83b;Fuerza de ventas</option>
                        <option value="fab fa-sass">&#xf41e;Hablar con descaro a</option>
                        <option value="fas fa-satellite">&#xf7bf;Satélite</option>
                        <option value="fas fa-satellite-dish">&#xf7c0;Satélite Dish</option>
                        <option value="fas fa-save">&#xf0c7;Salvar</option>
                        <option value="fab fa-schlix">&#xf3ea;SCHLIX</option>
                        <option value="fas fa-school">&#xf549;Colegio</option>
                        <option value="fas fa-screwdriver">&#xf54a;Destornillador</option>
                        <option value="fab fa-scribd">&#xf28a;Scribd</option>
                        <option value="fas fa-scroll">&#xf70e;Desplazarse</option>
                        <option value="fas fa-sd-card">&#xf7c2;Tarjeta SD</option>
                        <option value="fas fa-search">&#xf002;Buscar</option>
                        <option value="fas fa-search-dollar">&#xf688;Buscar Dollar</option>
                        <option value="fas fa-search-location">&#xf689;Buscar Location</option>
                        <option value="fas fa-search-minus">&#xf010;Buscar Minus</option>
                        <option value="fas fa-search-plus">&#xf00e;Buscar Plus</option>
                        <option value="fab fa-searchengin">&#xf3eb;Buscarengin</option>
                        <option value="fas fa-seedling">&#xf4d8;Planta de semillero</option>
                        <option value="fab fa-sellcast">&#xf2da;Sellcast</option>
                        <option value="fab fa-sellsy">&#xf213;Sellsy</option>
                        <option value="fas fa-server">&#xf233;Servidor</option>
                        <option value="fab fa-servicestack">&#xf3ec;Servicestack</option>
                        <option value="fas fa-shapes">&#xf61f;Formas</option>
                        <option value="fas fa-share">&#xf064;Compartir</option>
                        <option value="fas fa-share-alt">&#xf1e0;Alternate Compartir</option>
                        <option value="fas fa-share-alt-square">&#xf1e1;Alternate Compartir Cuadrado</option>
                        <option value="fas fa-share-square">&#xf14d;Compartir Cuadrado</option>
                        <option value="fas fa-shekel-sign">&#xf20b;Firmaro de Shekel</option>
                        <option value="fas fa-shield-alt">&#xf3ed;Escudo alternativo</option>
                        <option value="fas fa-shield-virus">&#xf96c;Virus escudo</option>
                        <option value="fas fa-ship">&#xf21a;Embarcacion</option>                     
                        <option value="fas fa-shipping>&#xf48b;Embarcacionping</option>
                        <option value="fab fa-shirtsinbulk">&#xf214;Camisas a granel</option>
                        <option value="fas fa-shoe-prints">&#xf54b;Huellas de zapatos</option>
                        <option value="fab fa-shopify">&#xf957;Shopify</option>
                        <option value="fas fa-shopping-bag">&#xf290;Bolsa de la compra</option>
                        <option value="fas fa-shopping-basket">&#xf291;Cesta de la compra</option>
                        <option value="fas fa-shopping-cart">&#xf07a;carrito de compras</option>
                        <option value="fab fa-shopware">&#xf5b5;Shopware</option>
                        <option value="fas fa-shower">&#xf2cc;Ducha</option>
                        <option value="fas fa-shuttle-van">&#xf5b6;Van lanzadera</option>
                        <option value="fas fa-sign">&#xf4d9;Firmar</option>
                        <option value="fas fa-sign-in-alt">&#xf2f6;Alternate Firmar In</option>
                        <option value="fas fa-sign-language">&#xf2a7;Firmar Language</option>
                        <option value="fas fa-sign-out-alt">&#xf2f5;Alternate Firmar Out</option>
                        <option value="fas fa-signal">&#xf012;señal</option>
                        <option value="fas fa-signature">&#xf5b7;Firmarature</option>
                        <option value="fas fa-sim-card">&#xf7c4;Tarjeta SIM</option>
                        <option value="fab fa-simplybuilt">&#xf215;SimplyBuilt</option>
                        <option value="fab fa-sistrix">&#xf3ee;SISTRIX</option>
                        <option value="fas fa-sitemap">&#xf0e8;Mapa del sitio</option>
                        <option value="fab fa-sith">&#xf512;Sith</option>
                        <option value="fas fa-skating">&#xf7c5;Patinaje</option>
                        <option value="fab fa-sketch">&#xf7c6;Bosquejo</option>
                        <option value="fas fa-skiing">&#xf7c9;Esquí</option>
                        <option value="fas fa-skiing-nordic">&#xf7ca;Esquí Nordic</option>
                        <option value="fas fa-skull">&#xf54c;Cráneo</option>
                        <option value="fas fa-skull-crossbones">&#xf714;Cráneo & Crossbones</option>
                        <option value="fab fa-skyatlas">&#xf216;skyatlas</option>
                        <option value="fab fa-skype">&#xf17e;Skype</option>
                        <option value="fab fa-slack">&#xf198;Logotipo de Slack</option>
                        <option value="fab fa-slack-hash">&#xf3ef;Hashtag flojo</option>
                        <option value="fas fa-slash">&#xf715;Barra oblicua</option>
                        <option value="fas fa-sleigh">&#xf7cc;Trineo</option>
                        <option value="fas fa-sliders-h">&#xf1de;Deslizadores horizontales</option>
                        <option value="fab fa-slideshare">&#xf1e7;Slideshare</option>
                        <option value="fas fa-smile">&#xf118;Cara sonriente</option>
                        <option value="fas fa-smile-beam">&#xf5b8;Cara radiante con ojos sonrientes</option>
                        <option value="fas fa-smile-wink">&#xf4da;Guiño de cara</option>
                        <option value="fas fa-smog">&#xf75f;Niebla tóxica</option>
                        <option value="fas fa-smoking">&#xf48d;De fumar</option>
                        <option value="fas fa-smoking-ban">&#xf54d;De fumar Ban</option>
                        <option value="fas fa-sms">&#xf7cd;SMS</option>
                        <option value="fab fa-snapchat">&#xf2ab;Snapchat</option>
                        <option value="fab fa-snapchat-ghost">&#xf2ac;Snapchat fantasma</option>
                        <option value="fab fa-snapchat-square">&#xf2ad;Snapchat Cuadrado</option>
                        <option value="fas fa-snowboarding">&#xf7ce;Snowboarding</option>
                        <option value="fas fa-snowflake">&#xf2dc;Copo de nieve</option>
                        <option value="fas fa-snowman">&#xf7d0;Monigote de nieve</option>
                        <option value="fas fa-snowplow">&#xf7d2;Quitanieves</option>
                        <option value="fas fa-soap">&#xf96e;Jabón</option>
                        <option value="fas fa-socks">&#xf696;Calcetines</option>
                        <option value="fas fa-solar-panel">&#xf5ba;Panel solar</option>
                        <option value="fas fa-sort">&#xf0dc;Ordenar</option>
                        <option value="fas fa-sort-alpha-down">&#xf15d;Ordenar Alphabetical Down</option>
                        <option value="fas fa-sort-alpha-down-alt">&#xf881;Alternate Ordenar Alphabetical Down</option>
                        <option value="fas fa-sort-alpha-up">&#xf15e;Ordenar Alphabetical Up</option>
                        <option value="fas fa-sort-alpha-up-alt">&#xf882;Alternate Ordenar Alphabetical Up</option>
                        <option value="fas fa-sort-amount-down">&#xf160;Ordenar Amount Down</option>
                        <option value="fas fa-sort-amount-down-alt">&#xf884;Alternate Ordenar Amount Down</option>
                        <option value="fas fa-sort-amount-up">&#xf161;Ordenar Amount Up</option>
                        <option value="fas fa-sort-amount-up-alt">&#xf885;Alternate Ordenar Amount Up</option>
                        <option value="fas fa-sort-down">&#xf0dd;Ordenar Down (Descending)</option>
                        <option value="fas fa-sort-numeric-down">&#xf162;Ordenar Numeric Down</option>
                        <option value="fas fa-sort-numeric-down-alt">&#xf886;Alternate Ordenar Numeric Down</option>
                        <option value="fas fa-sort-numeric-up">&#xf163;Ordenar Numeric Up</option>
                        <option value="fas fa-sort-numeric-up-alt">&#xf887;Alternate Ordenar Numeric Up</option>
                        <option value="fas fa-sort-up">&#xf0de;Ordenar Up (Ascending)</option>
                        <option value="fab fa-soundcloud">&#xf1be;SoundCloud</option>
                        <option value="fab fa-sourcetree">&#xf7d3;Árbol de origen</option>
                        <option value="fas fa-spa">&#xf5bb;Spa</option>
                        <option value="fas fa-space-shuttle">&#xf197;Transbordador espacial</option>
                        <option value="fab fa-speakap">&#xf3f3;Speakap</option>
                        <option value="fab fa-speaker-deck">&#xf83c;Cubierta de altavoz</option>
                        <option value="fas fa-spell-check">&#xf891;Corrector ortográfico</option>
                        <option value="fas fa-spider">&#xf717;Araña</option>
                        <option value="fas fa-spinner">&#xf110;Hilandero</option>
                        <option value="fas fa-splotch">&#xf5bc;Mancha</option>
                        <option value="fab fa-spotify">&#xf1bc;Spotify</option>
                        <option value="fas fa-spray-can">&#xf5bd;Lata de aerosol</option>
                        <option value="fas fa-square">&#xf0c8;Cuadrado</option>
                        <option value="fas fa-square-full">&#xf45c;Cuadrado Full</option>
                        <option value="fas fa-square-root-alt">&#xf698;Alternate Cuadrado Root</option>
                        <option value="fab fa-squarespace">&#xf5be;Cuadradospace</option>
                        <option value="fab fa-stack-exchange">&#xf18d;Intercambio de pila</option>
                        <option value="fab fa-stack-overflow">&#xf16c;Desbordamiento de pila</option>
                        <option value="fab fa-stackpath">&#xf842;Stackpath</option>
                        <option value="fas fa-stamp">&#xf5bf;Sello</option>
                        <option value="fas fa-star">&#xf005;Estrella</option>
                        <option value="fas fa-star-and-crescent">&#xf699;Estrella and Crescent</option>
                        <option value="fas fa-star-half">&#xf089;mitad estrella</option>
                        <option value="fas fa-star-half-alt">&#xf5c0;Alternate Estrella Half</option>
                        <option value="fas fa-star-of-david">&#xf69a;Estrella of David</option>
                        <option value="fas fa-star-of-life">&#xf621;Estrella of Life</option>
                        <option value="fab fa-staylinked">&#xf3f5;StayLinked</option>
                        <option value="fab fa-steam">&#xf1b6;Vapor</option>
                        <option value="fab fa-steam-square">&#xf1b7;Vapor Cuadrado</option>
                        <option value="fab fa-steam-symbol">&#xf3f6;Vapor Symbol</option>
                        <option value="fas fa-step-backward">&#xf048;dar un paso atrás</option>
                        <option value="fas fa-step-forward">&#xf051;un paso adelante</option>
                        <option value="fas fa-stethoscope">&#xf0f1;Estetoscopio</option>
                        <option value="fab fa-sticker-mule">&#xf3f7;Etiqueta engomada de la mula</option>
                        <option value="fas fa-sticky-note">&#xf249;Nota adhesiva</option>
                        <option value="fas fa-stop">&#xf04d;detener</option>
                        <option value="fas fa-stop-circle">&#xf28d;Detener círculo</option>
                        <option value="fas fa-stopwatch">&#xf2f2;Cronógrafo</option>
                        <option value="fas fa-stopwatch-20">&#xf96f;Cronógrafo 20</option>
                        <option value="fas fa-store">&#xf54e;Tienda</option>
                        <option value="fas fa-store-alt">&#xf54f;Alternate Tienda</option>
                        <option value="fas fa-store-alt-slash">&#xf970;Alternate Tienda Barra oblicua</option>
                        <option value="fas fa-store-slash">&#xf971;Tienda Barra oblicua</option>
                        <option value="fab fa-strava">&#xf428;Strava</option>
                        <option value="fas fa-stream">&#xf550;Corriente</option>
                        <option value="fas fa-street-view">&#xf21d;vista de calle</option>
                        <option value="fas fa-strikethrough">&#xf0cc;Tachado</option>
                        <option value="fab fa-stripe">&#xf429;Raya</option>
                        <option value="fab fa-stripe-s">&#xf42a;Raya S</option>
                        <option value="fas fa-stroopwafel">&#xf551;Stroopwafel</option>
                        <option value="fab fa-studiovinari">&#xf3f8;Estudio Vinari</option>
                        <option value="fab fa-stumbleupon">&#xf1a4;StumbleUpon Logotipo</option>
                        <option value="fab fa-stumbleupon-circle">&#xf1a3;StumbleUpon Circle</option>
                        <option value="fas fa-subscript">&#xf12c;subíndice</option>
                        <option value="fas fa-subway">&#xf239;Subterraneo</option>
                        <option value="fas fa-suitcase">&#xf0f2;Maleta</option>
                        <option value="fas fa-suitcase-rolling">&#xf5c1;Maleta Rolling</option>
                        <option value="fas fa-sun">&#xf185;Dom</option>
                        <option value="fab fa-superpowers">&#xf2dd;Superpoderes</option>
                        <option value="fas fa-superscript">&#xf12b;sobrescrito</option>
                        <option value="fab fa-supple">&#xf3f9;Flexible</option>
                        <option value="fas fa-surprise">&#xf5c2;Cara silenciosa</option>
                        <option value="fab fa-suse">&#xf7d6;Suse</option>
                        <option value="fas fa-swatchbook">&#xf5c3;Muestrario</option>
                        <option value="fab fa-swift">&#xf8e1;Rápido</option>
                        <option value="fas fa-swimmer">&#xf5c4;Nadador</option>
                        <option value="fas fa-swimming-pool">&#xf5c5;Piscina</option>
                        <option value="fab fa-symfony">&#xf83d;Symfony</option>
                        <option value="fas fa-synagogue">&#xf69b;Sinagoga</option>
                        <option value="fas fa-sync">&#xf021;Sincronizar</option>
                        <option value="fas fa-sync-alt">&#xf2f1;Alternate Sincronizar</option>
                        <option value="fas fa-syringe">&#xf48e;Jeringuilla</option>
                        <option value="fas fa-table">&#xf0ce;mesa</option>
                        <option value="fas fa-table-tennis">&#xf45d;Tenis de mesa</option>
                        <option value="fas fa-tablet">&#xf10a;mesat</option>
                        <option value="fas fa-tablet-alt">&#xf3fa;Tableta alternativa</option>
                        <option value="fas fa-tablets">&#xf490;Tabletas</option>
                        <option value="fas fa-tachometer-alt">&#xf3fd;Tacómetro alternativo</option>
                        <option value="fas fa-tag">&#xf02b;etiqueta</option>
                        <option value="fas fa-tags">&#xf02c;etiquetas</option>
                        <option value="fas fa-tape">&#xf4db;Cinta</option>
                        <option value="fas fa-tasks">&#xf0ae;Tareas</option>
                        <option value="fas fa-taxi">&#xf1ba;Taxi</option>
                        <option value="fab fa-teamspeak">&#xf4f9;TeamSpeak</option>
                        <option value="fas fa-teeth">&#xf62e;Dientes</option>
                        <option value="fas fa-teeth-open">&#xf62f;Dientes Open</option>
                        <option value="fab fa-telegram">&#xf2c6;Telegrama</option>
                        <option value="fab fa-telegram-plane">&#xf3fe;Telegrama Plane</option>
                        <option value="fas fa-temperature-high">&#xf769;Alta temperatura</option>
                        <option value="fas fa-temperature-low">&#xf76b;Baja temperatura</option>
                        <option value="fab fa-tencent-weibo">&#xf1d5;Tencent Weibo</option>
                        <option value="fas fa-tenge">&#xf7d7;Tenge</option>
                        <option value="fas fa-terminal">&#xf120;Terminal</option>
                        <option value="fas fa-text-height">&#xf034;Altura del texto</option>
                        <option value="fas fa-text-width">&#xf035;Ancho del texto</option>
                        <option value="fas fa-th">&#xf00a;th</option>
                        <option value="fas fa-th-large">&#xf009;th-grande</option>
                        <option value="fas fa-th-list">&#xf00b;lista-th</option>
                        <option value="fab fa-the-red-yeti">&#xf69d;El Yeti Rojo</option>
                        <option value="fas fa-theater-masks">&#xf630;Máscaras de teatro</option>
                        <option value="fab fa-themeco">&#xf5c6;Themeco</option>
                        <option value="fab fa-themeisle">&#xf2b2;ThemeIsle</option>
                        <option value="fas fa-thermometer">&#xf491;Termómetro</option>
                        <option value="fas fa-thermometer-empty">&#xf2cb;Termómetro Empty</option>
                        <option value="fas fa-thermometer-full">&#xf2c7;Termómetro Full</option>
                        <option value="fas fa-thermometer-half">&#xf2c9;Termómetro 1/2 Full</option>
                        <option value="fas fa-thermometer-quarter">&#xf2ca;Termómetro 1/4 Full</option>
                        <option value="fas fa-thermometer-three-quarters">&#xf2c8;Termómetro 3/4 Full</option>
                        <option value="fab fa-think-peaks">&#xf731;Think Peaks</option>
                        <option value="fas fa-thumbs-down">&#xf165;pulgares abajo</option>
                        <option value="fas fa-thumbs-up">&#xf164;Pulgares hacia arriba</option>
                        <option value="fas fa-thumbtack">&#xf08d;Chinche</option>
                        <option value="fas fa-ticket-alt">&#xf3ff;Boleto alternativo</option>
                        <option value="fas fa-times">&#xf00d;Veces</option>
                        <option value="fas fa-times-circle">&#xf057;Veces Circle</option>
                        <option value="fas fa-tint">&#xf043;tinte</option>
                        <option value="fas fa-tint-slash">&#xf5c7;Barra de tinte</option>
                        <option value="fas fa-tired">&#xf5c8;Cara cansada</option>
                        <option value="fas fa-toggle-off">&#xf204;Desactivar</option>
                        <option value="fas fa-toggle-on">&#xf205;Activar</option>
                        <option value="fas fa-toilet">&#xf7d8;Baño</option>
                        <option value="fas fa-toilet-paper">&#xf71e;Baño Paper</option>
                        <option value="fas fa-toilet-paper-slash">&#xf972;Baño Paper Slash</option>
                        <option value="fas fa-toolbox">&#xf552;Caja de herramientas</option>
                        <option value="fas fa-tools">&#xf7d9;Herramientas</option>
                        <option value="fas fa-tooth">&#xf5c9;Diente</option>
                        <option value="fas fa-torah">&#xf6a0;Tora</option>
                        <option value="fas fa-torii-gate">&#xf6a1;Puerta Torii</option>
                        <option value="fas fa-tractor">&#xf722;Tractor</option>
                        <option value="fab fa-trade-federation">&#xf513;Federación de comercio</option>
                        <option value="fas fa-trademark">&#xf25c;Marca comercial</option>
                        <option value="fas fa-traffic-light">&#xf637;Semáforo</option>
                        <option value="fas fa-trailer">&#xf941;Remolque</option>
                        <option value="fas fa-train">&#xf238;Entrenar</option>
                        <option value="fas fa-tram">&#xf7da;Tranvía</option>
                        <option value="fas fa-transgender">&#xf224;Transgénero</option>
                        <option value="fas fa-transgender-alt">&#xf225;Alternate Transgénero</option>
                        <option value="fas fa-trash">&#xf1f8;Basura</option>
                        <option value="fas fa-trash-alt">&#xf2ed;Alternate Basura</option>
                        <option value="fas fa-trash-restore">&#xf829;Basura Restore</option>
                        <option value="fas fa-trash-restore-alt">&#xf82a;Alternative Basura Restore</option>
                        <option value="fas fa-tree">&#xf1bb;Árbol</option>
                        <option value="fab fa-trello">&#xf181;Trello</option>
                        <option value="fab fa-tripadvisor">&#xf262;TripAdvisor</option>
                        <option value="fas fa-trophy">&#xf091;trofeo</option>
                        <option value="fas fa-truck">&#xf0d1;camión</option>
                        <option value="fas fa-truck-loading">&#xf4de;Carga de camiones</option>
                        <option value="fas fa-truck-monster">&#xf63b;Monstruo de camión</option>
                        <option value="fas fa-truck-moving">&#xf4df;Camión en movimiento</option>
                        <option value="fas fa-truck-pickup">&#xf63c;Lado del camión</option>
                        <option value="fas fa-tshirt">&#xf553;Camiseta</option>
                        <option value="fas fa-tty">&#xf1e4;TTY</option>
                        <option value="fab fa-tumblr">&#xf173;Tumblr</option>
                        <option value="fab fa-tumblr-square">&#xf174;Tumblr Square</option>
                        <option value="fas fa-tv">&#xf26c;Televisión</option>
                        <option value="fab fa-twitch">&#xf1e8;Contracción nerviosa</option>
                        <option value="fab fa-twitter">&#xf099;Gorjeo</option>
                        <option value="fab fa-twitter-square">&#xf081;Gorjeo Square</option>
                        <option value="fab fa-typo3">&#xf42b;Typo3</option>
                        <option value="fab fa-uber">&#xf402;Uber</option>
                        <option value="fab fa-ubuntu">&#xf7df;Ubuntu</option>
                        <option value="fab fa-uikit">&#xf403;UIkit</option>
                        <option value="fab fa-umbraco">&#xf8e8;Umbraco</option>
                        <option value="fas fa-umbrella">&#xf0e9;Paraguas</option>
                        <option value="fas fa-umbrella-beach">&#xf5ca;Paraguas Beach</option>
                        <option value="fas fa-underline">&#xf0cd;Subrayar</option>
                        <option value="fas fa-undo">&#xf0e2;Deshacer</option>
                        <option value="fas fa-undo-alt">&#xf2ea;Alternate Deshacer</option>
                        <option value="fab fa-uniregistry">&#xf404;Unirregistro</option>
                        <option value="fab fa-unity">&#xf949;Unidad 3D</option>
                        <option value="fas fa-universal-access">&#xf29a;Acceso universal</option>
                        <option value="fas fa-university">&#xf19c;Universidad</option>
                        <option value="fas fa-unlink">&#xf127;desconectar</option>
                        <option value="fas fa-unlock">&#xf09c;desbloquear</option>
                        <option value="fas fa-unlock-alt">&#xf13e;Desbloqueo alternativo</option>
                        <option value="fab fa-untappd">&#xf405;Untappd</option>
                        <option value="fas fa-upload">&#xf093;Subir</option>
                        <option value="fab fa-ups">&#xf7e0;UPS</option>
                        <option value="fab fa-usb">&#xf287;USB</option>
                        <option value="fas fa-user">&#xf007;Usuario</option>
                        <option value="fas fa-user-alt">&#xf406;Alternate Usuario</option>
                        <option value="fas fa-user-alt-slash">&#xf4fa;Alternate Usuario Slash</option>
                        <option value="fas fa-user-astronaut">&#xf4fb;Usuario Astronaut</option>
                        <option value="fas fa-user-check">&#xf4fc;Usuario Check</option>
                        <option value="fas fa-user-circle">&#xf2bd;Usuario Circle</option>
                        <option value="fas fa-user-clock">&#xf4fd;Usuario Clock</option>
                        <option value="fas fa-user-cog">&#xf4fe;Usuario Cog</option>
                        <option value="fas fa-user-edit">&#xf4ff;Usuario Edit</option>
                        <option value="fas fa-user-friends">&#xf500;Usuario Friends</option>
                        <option value="fas fa-user-graduate">&#xf501;Usuario Graduate</option>
                        <option value="fas fa-user-injured">&#xf728;Usuario Injured</option>
                        <option value="fas fa-user-lock">&#xf502;Usuario Lock</option>
                        <option value="fas fa-user-md">&#xf0f0;Médico</option>
                        <option value="fas fa-user-minus">&#xf503;Usuario Minus</option>
                        <option value="fas fa-user-ninja">&#xf504;Usuario Ninja</option>
                        <option value="fas fa-user-nurse">&#xf82f;enfermera</option>
                        <option value="fas fa-user-plus">&#xf234;Usuario Plus</option>
                        <option value="fas fa-user-secret">&#xf21b;Usuario Secret</option>
                        <option value="fas fa-user-shield">&#xf505;Usuario Shield</option>
                        <option value="fas fa-user-slash">&#xf506;Usuario Slash</option>
                        <option value="fas fa-user-tag">&#xf507;Usuario Tag</option>
                        <option value="fas fa-user-tie">&#xf508;Usuario Tie</option>
                        <option value="fas fa-user-times">&#xf235;Remove Usuario</option>
                        <option value="fas fa-users">&#xf0c0;Usuarios</option>
                        <option value="fas fa-users-cog">&#xf509;Usuarios Cog</option>
                        <option value="fab fa-usps">&#xf7e1;Servicio Postal de los Estados Unidos</option>
                        <option value="fab fa-ussunnah">&#xf407;Fundación us-Sunnah</option>
                        <option value="fas fa-utensil-spoon">&#xf2e5;Cuchara para utensilios</option>
                        <option value="fas fa-utensils">&#xf2e7;Utensilios</option>
                        <option value="fab fa-vaadin">&#xf408;Vaadin</option>
                        <option value="fas fa-vector-square">&#xf5cb;Vector cuadrado</option>
                        <option value="fas fa-venus">&#xf221;Venus</option>
                        <option value="fas fa-venus-double">&#xf226;Venus doble</option>
                        <option value="fas fa-venus-mars">&#xf228;Venus Marte</option>
                        <option value="fab fa-viacoin">&#xf237;Viacoin</option>
                        <option value="fab fa-viadeo">&#xf2a9;Vídeo</option>
                        <option value="fab fa-viadeo-square">&#xf2aa;Vídeo Square</option>
                        <option value="fas fa-vial">&#xf492;Frasco</option>
                        <option value="fas fa-vials">&#xf493;Frascos</option>
                        <option value="fab fa-viber">&#xf409;Viber</option>
                        <option value="fas fa-video">&#xf03d;Vídeo</option>
                        <option value="fas fa-video-slash">&#xf4e2;Vídeo Slash</option>
                        <option value="fas fa-vihara">&#xf6a7;Vihara</option>
                        <option value="fab fa-vimeo">&#xf40a;Vimeo</option>
                        <option value="fab fa-vimeo-square">&#xf194;Plaza Vimeo</option>
                        <option value="fab fa-vimeo-v">&#xf27d;Vimeo</option>
                        <option value="fab fa-vine">&#xf1ca;Vino</option>
                        <option value="fas fa-virus">&#xf974;Virus</option>
                        <option value="fas fa-virus-slash">&#xf975;Barra de virus</option>
                        <option value="fas fa-viruses">&#xf976;Virus</option>
                        <option value="fab fa-vk">&#xf189;VK</option>
                        <option value="fab fa-vnv">&#xf40b;VNV</option>
                        <option value="fas fa-voicemail">&#xf897;Mensaje de voz</option>
                        <option value="fas fa-volleyball-ball">&#xf45f;Pelota de voleibol</option>
                        <option value="fas fa-volume-down">&#xf027;Bajar volumen</option>
                        <option value="fas fa-volume-mute">&#xf6a9;Silenciar volumen</option>
                        <option value="fas fa-volume-off">&#xf026;Volumen apagado</option>
                        <option value="fas fa-volume-up">&#xf028;Sube el volumen</option>
                        <option value="fas fa-vote-yea">&#xf772;Vote sí</option>
                        <option value="fas fa-vr-cardboard">&#xf729;Cartón VR</option>
                        <option value="fab fa-vuejs">&#xf41f;Vuejs</option>
                        <option value="fas fa-walking">&#xf554;Caminando</option>
                        <option value="fas fa-wallet">&#xf555;Billetera</option>
                        <option value="fas fa-warehouse">&#xf494;Almacén</option>
                        <option value="fas fa-water">&#xf773;Agua</option>
                        <option value="fas fa-wave-square">&#xf83e;Ola cuadrada</option>
                        <option value="fab fa-waze">&#xf83f;Waze</option>
                        <option value="fab fa-weebly">&#xf5cc;Weebly</option>
                        <option value="fab fa-weibo">&#xf18a;Weibo</option>
                        <option value="fas fa-weight">&#xf496;Peso</option>
                        <option value="fas fa-weight-hanging">&#xf5cd;Hanging Peso</option>
                        <option value="fab fa-weixin">&#xf1d7;Weixin (WeChat)</option>
                        <option value="fab fa-whatsapp">&#xf232;¿Qué es la aplicación?</option>
                        <option value="fab fa-whatsapp-square">&#xf40c;¿Qué es la aplicación? Square</option>
                        <option value="fas fa-wheelchair">&#xf193;Silla de ruedas</option>
                        <option value="fab fa-whmcs">&#xf40d;WHMCS</option>
                        <option value="fas fa-wifi">&#xf1eb;Wifi</option>
                        <option value="fab fa-wikipedia-w">&#xf266;Wikipedia W</option>
                        <option value="fas fa-wind">&#xf72e;Viento</option>
                        <option value="fas fa-window-close">&#xf410;Vientoow Close</option>
                        <option value="fas fa-window-maximize">&#xf2d0;Vientoow Maximize</option>
                        <option value="fas fa-window-minimize">&#xf2d1;Vientoow Minimize</option>
                        <option value="fas fa-window-restore">&#xf2d2;Vientoow Restore</option>
                        <option value="fab fa-windows">&#xf17a;Vientoows</option>
                        <option value="fas fa-wine-bottle">&#xf72f;Botella de vino</option>
                        <option value="fas fa-wine-glass">&#xf4e3;Copa de vino</option>
                        <option value="fas fa-wine-glass-alt">&#xf5ce;Copa de vino alternativa</option>
                        <option value="fab fa-wix">&#xf5cf;Wix</option>
                        <option value="fab fa-wizards-of-the-coast">&#xf730;Magos de la costa</option>
                        <option value="fab fa-wolf-pack-battalion">&#xf514;Batallón de manada de lobos</option>
                        <option value="fas fa-won-sign">&#xf159;Signo ganado</option>
                        <option value="fab fa-wordpress">&#xf19a;Logotipo de WordPress</option>
                        <option value="fab fa-wordpress-simple">&#xf411;Wordpress Simple</option>
                        <option value="fab fa-wpbeginner">&#xf297;WPBeginner</option>
                        <option value="fab fa-wpexplorer">&#xf2de;WPExplorer</option>
                        <option value="fab fa-wpforms">&#xf298;WPForms</option>
                        <option value="fab fa-wpressr">&#xf3e4;wpressr</option>
                        <option value="fas fa-wrench">&#xf0ad;Llave inglesa</option>
                        <option value="fas fa-x-ray">&#xf497;Radiografía</option>
                        <option value="fab fa-xbox">&#xf412;Xbox</option>
                        <option value="fab fa-xing">&#xf168;Xing</option>
                        <option value="fab fa-xing-square">&#xf169;Plaza Xing</option>
                        <option value="fab fa-y-combinator">&#xf23b;Combinador Y</option>
                        <option value="fab fa-yahoo">&#xf19e;Logotipo de Yahoo</option>
                        <option value="fab fa-yammer">&#xf840;Quejarse</option>
                        <option value="fab fa-yandex">&#xf413;Yandex</option>
                        <option value="fab fa-yandex-international">&#xf414;Yandex Internacional</option>
                        <option value="fab fa-yarn">&#xf7e3;Hilo</option>
                        <option value="fab fa-yelp">&#xf1e9;Gañido</option>
                        <option value="fas fa-yen-sign">&#xf157;Signo de yen</option>
                        <option value="fas fa-yin-yang">&#xf6ad;Yin Yang</option>
                        <option value="fab fa-yoast">&#xf2b1;Yoast</option>
                        <option value="fab fa-youtube">&#xf167;Youtube</option>
                        <option value="fab fa-youtube-square">&#xf431;Youtube Square</option>
                        <option value="fab fa-zhihu">&#xf63f;Zhihu</option>
                                                                     

                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         

                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         

                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                        
                  </select>

                <x-jet-input wire:model.defer="createForm.icon" class="w-full mt-1" type="text" />

                <x-jet-input-error for="createForm.icon" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-jet-label>
                    Marcas
                </x-jet-label>

                <div class="grid grid-cols-4 mt-3">
                    @foreach ($brands as $brand)
                        <x-jet-label>
                            <x-jet-checkbox wire:model.defer="createForm.brands" name="brands[]"
                                value="{{ $brand->id }}" />
                            {{ $brand->name }}

                        </x-jet-label>
                    @endforeach

                </div>
                <x-jet-input-error for="createForm.brands" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-jet-label>
                    Imagen
                </x-jet-label>

                <input  wire:model="createForm.image" class="mt-1" accept="image/*" type="file" id="create-Image{{ $rand }}">                
                <x-jet-input-error for="createForm.image" />
            </div>
            

        </x-slot>

        <x-slot name="footer">
            <x-jet-action-message class="mr-3 text-red-600" on="saved">
                Registro Creado
            </x-jet-action-message>            

            <x-jet-button wire:click="save">
                CREAR CATEGORIA
            </x-jet-button>

            <x-jet-secondary-button wire:click="cancelar">
                CANCELAR
            </x-jet-secondary-button>            
        </x-slot>
    </x-jet-dialog-modal>

    {{-- MODAL PARA EDITAR CATEGORIA --}}
    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            EDITAR CATEGORIA
        </x-slot>

        <x-slot name="content">
            <div class="space-y-3">

                <div>
                    @if ($editImage)
                        <img class="w-full h-64 object-cover object-center" src="{{ $editImage->temporaryUrl() }}"
                            alt="">
                    @else
                        <img class="w-full h-64 object-cover object-center" src="{{ Storage::url($editForm['image']) }}"
                            alt="">
                    @endif

                </div>

                <div>
                    <x-jet-label>
                        Nombre
                    </x-jet-label>

                    <x-jet-input wire:model="editForm.name" class="w-full mt-1" type="text" />

                    <x-jet-input-error for="editForm.name" />
                </div>

                <div>
                    <x-jet-label>
                        Slug
                    </x-jet-label>

                    <x-jet-input wire:model="editForm.slug" class="w-full mt-1 bg-gray-100" disabled type="text" />

                    <x-jet-input-error for="editForm.slug" />
                </div>

                <div>
                    <x-jet-label>
                        Icono
                    </x-jet-label>

                    <x-jet-input wire:model.defer="editForm.icon" class="w-full mt-1" type="text" />

                    <x-jet-input-error for="editForm.icon" />
                </div>

                <div>
                    <x-jet-label>
                        Marcas
                    </x-jet-label>

                    <div class="grid grid-cols-4">
                        @foreach ($brands as $brand)
                            <x-jet-label>
                                <x-jet-checkbox wire:model.defer="editForm.brands" name="brands[]"
                                    value="{{ $brand->id }}" />
                                {{ $brand->name }}

                            </x-jet-label>
                        @endforeach

                    </div>
                    <x-jet-input-error for="editForm.brands" />
                </div>

                <div>
                    <x-jet-label>
                        Imagen
                    </x-jet-label>

                    <input wire:model="editImage" class="mt-1" accept="image/*" type="file" id="edit-Image{{ $randEdit }}">

                    <x-jet-input-error for="editImage" />
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="update" wire:target="editImage,update" wire:loading.attr="disabled">
                ACTUALIZAR
            </x-jet-danger-button>

            <x-jet-secondary-button wire:click="cancelar">
                CANCELAR
            </x-jet-secondary-button>

        </x-slot>
    </x-jet-dialog-modal>




    {{-- FORMULARIO CREAR CATEGORIA --}}
    {{-- <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            <div class="mb-4">
                CREAR NUEVA CATEGORIA   
            </div>
        </x-slot>

        <x-slot name="description">
            Completa la información necesaria para poder crear una nueva categoría
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model="createForm.name" class="w-full mt-1" type="text" />

                <x-jet-input-error for="createForm.name" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Slug
                </x-jet-label>

                <x-jet-input wire:model="createForm.slug" class="w-full mt-1 bg-gray-100" disabled type="text" />

                <x-jet-input-error for="createForm.slug" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Icono
                </x-jet-label>

                <x-jet-input wire:model.defer="createForm.icon" class="w-full mt-1" type="text" />

                <x-jet-input-error for="createForm.icon" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Marcas
                </x-jet-label>

                <div class="grid grid-cols-4 mt-3">
                    @foreach ($brands as $brand)
                        <x-jet-label>
                            <x-jet-checkbox wire:model.defer="createForm.brands" name="brands[]" value="{{$brand->id}}" />
                                {{$brand->name}}
                        
                        </x-jet-label>
                    @endforeach

                </div>
                <x-jet-input-error for="createForm.brands" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Imagen
                </x-jet-label>

                <input wire:model="createForm.image" class="mt-1" accept="image/*" type="file" id="{{$rand}}">

                <x-jet-input-error for="createForm.image" />
            </div>
        </x-slot>

        <x-slot name="actions">

            <x-jet-action-message class="mr-3 text-red-600" on="saved">
                Registro Creado
            </x-jet-action-message>

            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section> --}}
</div>
