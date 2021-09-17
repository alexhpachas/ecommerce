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
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
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
                        <option value="fab fa-artstation"> Artstation   <option value="fab fa-artstation      &#xf77a;</option>
                        <option value="fas fa-assistive-listening-systems"> Sistemas de audición asistida   <option value="fas fa-assistive-listening-systems   anotación, detalles, referencia, estrella,   &#xf2a2;</option>
                        <option value="fas fa-asterisk"> asterisco   <option value="fas fa-asterisk   anotación, detalles, referencia, estrella,   &#xf069;</option>
                        <option value="fab fa-asymmetrik"> Asymmetrik, Ltd.   <option value="fab fa-asymmetrik      &#xf372;</option>
                        <option value="fas fa-at"> A   <option value="fas fa-at   libro, direcciones, geografía, globo, mapa, viaje, orientación,   &#xf1fa;</option>
                        <option value="fas fa-atlas"> Alas   <option value="fas fa-atlas   libro, direcciones, geografía, globo, mapa, viaje, orientación,   &#xf558;</option>
                        <option value="fab fa-atlassian"> Alassian   <option value="fab fa-atlassian      &#xf77b;</option>
                        <option value="fas fa-atom"> Aom   <option value="fas fa-atom   ateísmo, ciencia, electrón, ion, isótopo, neutrón, nuclear, protón,   &#xf5d2;</option>
                        <option value="fab fa-audible"> Audible   <option value="fab fa-audible      &#xf373;</option>
                        <option value="fas fa-audio-description"> Descripción de audio   <option value="fas fa-audio-description   ciego, narración, video, visual,   &#xf29e;</option>
                        <option value="fab fa-autoprefixer"> Autoprefixer   <option value="fab fa-autoprefixer      &#xf41c;</option>
                        <option value="fab fa-avianex"> avianex   <option value="fab fa-avianex      &#xf374;</option>
                        <option value="fab fa-aviato"> Aviato   <option value="fab fa-aviato      &#xf421;</option>
                        <option value="fas fa-award"> Premio   <option value="fas fa-award   honor, listón, premio, reconocimiento, trofeo,   &#xf559;</option>
                        <option value="fab fa-aws"> Amazonas Web Services (AWS)   <option value="fab fa-aws      &#xf375;</option>
                        <option value="fas fa-baby"> Bebé   <option value="fas fa-baby   cochecito, empujar, infante, pasear, portador, ruedas, transportación,   &#xf77c;</option>
                        <option value="fas fa-baby-carriage"> Bebé Cocheriage   <option value="fas fa-baby-carriage   comando, borrar, borrar, teclado, deshacer,   &#xf77d;</option>
                        <option value="fas fa-backspace"> Retroceso   <option value="fas fa-backspace   anterior, rebobinar,   &#xf55a;</option>
                        <option value="fas fa-backward"> hacia atrás   <option value="fas fa-backward   blt, carne de cerdo, desayuno, jamón, panceta, lonchera,   &#xf04a;</option>
                        <option value="fas fa-bacon"> Tocino   <option value="fas fa-bacon   antibiótico, anticuerpo, covid-19, enfermo, organismo,   &#xf7e5;</option>
                        <option value="fas fa-bahai"> Bahá'í   <option value="fas fa-bahai   equilibrado, la justicia, jurídico, medida, peso,   &#xf666;</option>
                        <option value="fas fa-balance-scale"> Balanza   <option value="fas fa-balance-scale   la justicia, legal, medida, peso, desequilibrado,   &#xf24e;</option>
                        <option value="fas fa-balance-scale-left"> Balanza (Left-Weighted)   <option value="fas fa-balance-scale-left   desequilibrado, la justicia, la medida, peso,   &#xf515;</option>
                        <option value="fas fa-balance-scale-right"> Balanza (Right-Weighted)   <option value="fas fa-balance-scale-right   desequilibrado, la justicia, la medida, peso,   &#xf516;</option>
                        <option value="fas fa-ban"> prohibición   <option value="fas fa-ban   vendaje, boo boo, primeros auxilios, ay,   &#xf05e;</option>
                        <option value="fas fa-band-aid"> Apósito adhesivo   <option value="fas fa-band-aid   vendaje, boo boo, primeros auxilios, ay,   &#xf462;</option>
                        <option value="fab fa-bandcamp"> Campamento de la banda   <option value="fab fa-bandcamp      &#xf2d5;</option>
                        <option value="fas fa-barcode"> código de barras   <option value="fas fa-barcode   lista de verificación, arrastrar, hamburguesa, lista, menú, nav, navegación, ol, reordenar, configuraciones, todo, ul,   &#xf02a;</option>
                        <option value="fas fa-bars"> Barras   <option value="fas fa-bars   lista de verificación, arrastrar, hamburguesa, lista, menú, nav, navegación, ol, reordenar, configuraciones, todo, ul, fuente del menú de hamburguesas increíble   &#xf0c9;</option>
                        <option value="fas fa-baseball-ball"> Pelota de beisbol   <option value="fas fa-baseball-ball   regate, mate, aro, nba,   &#xf433;</option>
                        <option value="fas fa-basketball-ball"> Pelota de baloncesto   <option value="fas fa-basketball-ball   limpiar, ducha, bañera, lavar,   &#xf434;</option>
                        <option value="fas fa-bath"> Bañera   <option value="fas fa-bath   carga, estado, muerto, poder,   &#xf2cd;</option>
                        <option value="fas fa-battery-empty"> Batería vacía   <option value="fas fa-battery-empty   carga, potencia, estado,   &#xf244;</option>
                        <option value="fas fa-battery-full"> Bateria llena   <option value="fas fa-battery-full   carga, potencia, estado,   &#xf240;</option>
                        <option value="fas fa-battery-half"> Batería 1/2 llena   <option value="fas fa-battery-half   carga, potencia, estado,   &#xf242;</option>
                        <option value="fas fa-battery-quarter"> Batería 1/4 llena   <option value="fas fa-battery-quarter   carga, potencia, estado,   &#xf243;</option>
                        <option value="fas fa-battery-three-quarters"> Batería 3/4 llena   <option value="fas fa-battery-three-quarters   carga, potencia, estado,   &#xf241;</option>
                        <option value="fab fa-battle-net"> Battle.net   <option value="fab fa-battle-net      &#xf835;</option>
                        <option value="fas fa-bed"> Cama   <option value="fas fa-bed   alcohol, barrita, bebida, cerveza inglesa, licor, jarra, jarra,   &#xf236;</option>
                        <option value="fas fa-beer"> cerveza   <option value="fas fa-beer   alcohol, barrita, bebida, cerveza inglesa, licor, jarra, jarra,   &#xf0fc;</option>
                        <option value="fab fa-behance"> Behance   <option value="fab fa-behance      &#xf1b4;</option>
                        <option value="fab fa-behance-square"> Plaza Behance   <option value="fab fa-behance-square      &#xf1b5;</option>
                        <option value="fas fa-bell"> campana   <option value="fas fa-bell   alerta, cancelar, desactivado, notificación, recordatorio,   &#xf0f3;</option>
                        <option value="fas fa-bell-slash"> Barra de campana   <option value="fas fa-bell-slash   curvas, ilustrador, líneas, camino, vector,   &#xf1f6;</option>
                        <option value="fas fa-bezier-curve"> Curva de Bezier   <option value="fas fa-bezier-curve   catolicismo, cristianismo, dios, santo,   &#xf55b;</option>
                        <option value="fas fa-bible"> Biblia   <option value="fas fa-bible   bicicleta, engranajes, pedal, transporte, vehículo,   &#xf647;</option>
                        <option value="fas fa-bicycle"> Bicicleta   <option value="fas fa-bicycle   bicicleta, ciclo, ciclismo, paseo, rueda,   &#xf206;</option>
                        <option value="fas fa-biking"> Andar en bicicleta   <option value="fas fa-biking   bicicleta, ciclo, ciclismo, paseo, rueda,   &#xf84a;</option>
                        <option value="fab fa-bimobject"> BIMobject   <option value="fab fa-bimobject      &#xf378;</option>
                        <option value="fas fa-binoculars"> Prismáticos   <option value="fas fa-binoculars   covid-19, desperdicios, médico, peligro, peligroso, radiactivo, tóxico, zombi,   &#xf1e5;</option>
                        <option value="fas fa-biohazard"> Riesgo biológico   <option value="fas fa-biohazard   amarillo, aniversario, celebración, glaseado, dia de fiesta, fiesta,   &#xf780;</option>
                        <option value="fas fa-birthday-cake"> Pastel de cumpleaños   <option value="fas fa-birthday-cake   amarillo, aniversario, celebración, crema pastelera, dia de fiesta,   &#xf1fd;</option>
                        <option value="fab fa-bitbucket"> Bitbucket   <option value="fab fa-bitbucket   atlassian, bitbucket-square, git,   &#xf171;</option>
                        <option value="fab fa-bitcoin"> Bitcoin   <option value="fab fa-bitcoin      &#xf379;</option>
                        <option value="fab fa-bity"> Bity   <option value="fab fa-bity      &#xf37a;</option>
                        <option value="fab fa-black-tie"> Font Awesome Black Tie   <option value="fab fa-black-tie      &#xf27e;</option>
                        <option value="fab fa-blackberry"> Mora   <option value="fab fa-blackberry      &#xf37b;</option>
                        <option value="fas fa-blender"> Licuadora   <option value="fas fa-blender   Aparato, cóctel, comunicación, fantasía, batido, batidora, puré, tonto, batido,   &#xf517;</option>
                        <option value="fas fa-blender-phone"> Licuadora Phone   <option value="fas fa-blender-phone   caña, discapacidad, persona, vista,   &#xf6b6;</option>
                        <option value="fas fa-blind"> Ciego   <option value="fas fa-blind   diario, en línea, escribir, iniciar sesión, personal, web 2.0, wordpress,   &#xf29d;</option>
                        <option value="fas fa-blog"> Blog   <option value="fas fa-blog   diario, en línea, escribir, iniciar sesión, personal, web 2.0, wordpress,   &#xf781;</option>
                        <option value="fab fa-blogger"> Blogger   <option value="fab fa-blogger      &#xf37c;</option>
                        <option value="fab fa-blogger-b"> Blogger B   <option value="fab fa-blogger-b      &#xf37d;</option>
                        <option value="fab fa-bluetooth"> Bluetooth   <option value="fab fa-bluetooth      &#xf293;</option>
                        <option value="fab fa-bluetooth-b"> Bluetooth   <option value="fab fa-bluetooth-b      &#xf294;</option>
                        <option value="fas fa-bold"> negrita   <option value="fas fa-bold   electricidad, relámpago, clima, zap,   &#xf032;</option>
                        <option value="fas fa-bolt"> Rayo   <option value="fas fa-bolt   advertencia, error, explotar, fusible, granada,   &#xf0e7;</option>
                        <option value="fas fa-bomb"> Bomba   <option value="fas fa-bomb   calcio, esqueleto, esquelético, perro, tibia,   &#xf1e2;</option>
                        <option value="fas fa-bone"> Hueso   <option value="fas fa-bone   aparato, de fumar, cannabis, marihuana, pipa,   &#xf5d7;</option>
                        <option value="fas fa-bong"> Bong   <option value="fas fa-bong   biblioteca, diario, documentación, leer,   &#xf55c;</option>
                        <option value="fas fa-book"> libro   <option value="fas fa-book   Dungeons & Drago;</option>ns, tibias cruzadas, d & d, ar;</option>tes oscuras, muerte, dnd, documentación, maldad, fantasía, halloween, vacaciones, necronomicon, leer, calavera, hechizo,   &#xf02d;</option>
                        <option value="fas fa-book-dead"> Libro de los Muertos   <option value="fas fa-book-dead   biblioteca, registro, diario, documentación, historia, leer,   &#xf6b7;</option>
                        <option value="fas fa-book-medical"> Libro médico   <option value="fas fa-book-medical   aviador, biblioteca, cuaderno, libro abierto, folleto, lectura,   &#xf7e6;</option>
                        <option value="fas fa-book-open"> Libro abierto   <option value="fas fa-book-open   aviador, biblioteca, cuaderno, libro abierto, folleto, lectura,   &#xf518;</option>
                        <option value="fas fa-book-reader"> Lector de libros   <option value="fas fa-book-reader   aviador, biblioteca, cuaderno, libro abierto, folleto, lectura,   &#xf5da;</option>
                        <option value="fas fa-bookmark"> libromark   <option value="fas fa-bookmark   favorito, marcador, leer, recordar, guardar,   &#xf02e;</option>
                        <option value="fab fa-bootstrap"> Oreja   <option value="fab fa-bootstrap      &#xf836;</option>
                        <option value="fas fa-border-all"> Bordear todo   <option value="fas fa-border-all   celda, cuadrícula, contorno, trazo, tabla,   &#xf84c;</option>
                        <option value="fas fa-border-none"> Borde Ninguno   <option value="fas fa-border-none   celda, cuadrícula, contorno, trazo, tabla,   &#xf850;</option>
                        <option value="fas fa-border-style"> Estilo de borde   <option value="fas fa-border-style      &#xf853;</option>
                        <option value="fas fa-bowling-ball"> Bola de boliche   <option value="fas fa-bowling-ball   almacenamiento, archivo, bulto, envase,   &#xf436;</option>
                        <option value="fas fa-box"> Caja   <option value="fas fa-box   almacenamiento, archivo, bulto, desempacar, envase,   &#xf466;</option>
                        <option value="fas fa-box-open"> Caja Open   <option value="fas fa-box-open   archivo, envase, paquete, almacenamiento, desempaquetar, producto   &#xf49e;</option>
                        <option value="fas fa-box-tissue"> Tissue Caja   <option value="fas fa-box-tissue   archivo, almacén, inventario, almacenamiento,   &#xf95b;</option>
                        <option value="fas fa-boxes"> Cajaes   <option value="fas fa-boxes   alphabet, ciego, planteado, puntos, visión,   &#xf468;</option>
                        <option value="fas fa-braille"> Braille   <option value="fas fa-braille   cerebelo, fideos chinos, intelecto, médula oblongada, mente,   &#xf2a1;</option>
                        <option value="fas fa-brain"> Cerebro   <option value="fas fa-brain   hornear, panadería, hornear, masa, harina, gluten, grano, sándwich, masa madre, tostadas, trigo, levadura,   &#xf5dc;</option>
                        <option value="fas fa-bread-slice"> Rebanada de pan   <option value="fas fa-bread-slice   bolsa, equipaje, oficina, trabajo,   &#xf7ec;</option>
                        <option value="fas fa-briefcase"> Maletín   <option value="fas fa-briefcase   doctor, emt, primeros auxilios, salud,   &#xf0b1;</option>
                        <option value="fas fa-briefcase-medical"> Medical Maletín   <option value="fas fa-briefcase-medical   doctor, emt, primeros auxilios, salud,   &#xf469;</option>
                        <option value="fas fa-broadcast-tower"> Torre de transmisión   <option value="fas fa-broadcast-tower   ondas de radio, antena, radio, recepción, ondas,   &#xf519;</option>
                        <option value="fas fa-broom"> Escoba   <option value="fas fa-broom   barrido, bruja, enarbolar, halloween, limpiar, nimbus 2000, quidditch,   &#xf51a;</option>
                        <option value="fas fa-brush"> Cepillo   <option value="fas fa-brush   arte, cerdas, color, encargarse de, pintar,   &#xf55d;</option>
                        <option value="fab fa-btc"> BTC   <option value="fab fa-btc      &#xf15a;</option>
                        <option value="fab fa-buffer"> Buffer   <option value="fab fa-buffer      &#xf837;</option>
                        <option value="fas fa-bug"> Insecto   <option value="fas fa-bug   escarabajo, error, insecto, informe,   &#xf188;</option>
                        <option value="fas fa-building"> edificio   <option value="fas fa-building   apartamento, ciudad, compañía, negocio, oficina, trabajo,   &#xf1ad;</option>
                        <option value="fas fa-bullhorn"> megáfono   <option value="fas fa-bullhorn   anuncio, compartir, más fuerte, megáfono,   &#xf0a1;</option>
                        <option value="fas fa-bullseye"> Diana   <option value="fas fa-bullseye   tiro con arco, objetivo, objetivo, tiro con arco,   &#xf140;</option>
                        <option value="fas fa-burn"> Quemar   <option value="fas fa-burn   caliente, calor, calor, energía, fuego, llama,   &#xf46a;</option>
                        <option value="fab fa-buromobelexperte"> Büromöbel-Experte GmbH & Co. K;</option>G.   <option value="fab fa-buromobelexperte      &#xf37f;</option>
                        <option value="fas fa-bus"> Autobús   <option value="fas fa-bus   transporte público, transporte, viaje, vehículo,   &#xf207;</option>
                        <option value="fas fa-bus-alt"> Autobús Alt   <option value="fas fa-bus-alt   mta, transporte público, transporte, viaje, vehículo,   &#xf55e;</option>
                        <option value="fas fa-business-time"> Autobúsiness Time   <option value="fas fa-business-time   alarma, calcetines de negocios, maletín, miercoles, reloj, recordatorio,   &#xf64a;</option>
                        <option value="fab fa-buy-n-large"> Compre n grande   <option value="fab fa-buy-n-large      &#xf8a6;</option>
                        <option value="fab fa-buysellads"> BuySellAnuncios   <option value="fab fa-buysellads      &#xf20d;</option>
                        <option value="fas fa-calculator"> Calculadora   <option value="fas fa-calculator   ábaco, suma, aritmética, contar, matemáticas, multiplicación, resta,   &#xf1ec;</option>
                        <option value="fas fa-calendar"> Calendario   <option value="fas fa-calendar   calendario-o, fecha, evento, horario, hora, cuando,   &#xf133;</option>
                        <option value="fas fa-calendar-alt"> Calendario alternativoio   <option value="fas fa-calendar-alt   calendario, fecha, evento, horario, hora, cuando,   &#xf073;</option>
                        <option value="fas fa-calendar-check"> Calendario Cheque   <option value="fas fa-calendar-check   aceptar, estar de acuerdo, cita, confirmar, corregir, fecha, hecho, evento, de acuerdo, programar, seleccionar, éxito, marcar, hora, todo, cuando, completar   &#xf274;</option>
                        <option value="fas fa-calendar-day"> Calendario with Day Focus   <option value="fas fa-calendar-day   fecha, detalle, evento, enfoque, horario, solo día, hora, hoy, cuando,   &#xf783;</option>
                        <option value="fas fa-calendar-minus"> Calendario Minus   <option value="fas fa-calendar-minus   calendario, eliminar, evento, fecha, horario, horario, negativo,   &#xf272;</option>
                        <option value="fas fa-calendar-plus"> Calendario Plus   <option value="fas fa-calendar-plus   agregar, calendario, crear, fecha, evento, nuevo, positivo, horario, tiempo, cuando,   &#xf271;</option>
                        <option value="fas fa-calendar-times"> Calendario Times   <option value="fas fa-calendar-times   archivo, calendario, fecha, eliminar, evento, eliminar, programar, hora, cuando, x, multiplicar   &#xf273;</option>
                        <option value="fas fa-calendar-week"> Calendario with Week Focus   <option value="fas fa-calendar-week   fecha, detalle, evento, enfoque, horario, semana única, tiempo, hoy, cuando,   &#xf784;</option>
                        <option value="fas fa-camera"> cámara   <option value="fas fa-camera   imagen, lente, foto, cuadro, grabar, obturador, vídeo,   &#xf030;</option>
                        <option value="fas fa-camera-retro"> Cámara retro   <option value="fas fa-camera-retro   imagen, lente, foto, cuadro, grabar, obturador, vídeo,   &#xf083;</option>
                        <option value="fas fa-campground"> Terreno de camping   <option value="fas fa-campground   cámping, el aire libre, tipi, tienda de campaña, tipi,   &#xf6bb;</option>
                        <option value="fab fa-canadian-maple-leaf"> Hoja de arce canadiense   <option value="fab fa-canadian-maple-leaf   bandera, canadá, flora, naturaleza, planta,   &#xf785;</option>
                        <option value="fas fa-candy-cane"> Bastón de caramelo   <option value="fas fa-candy-cane   a rayas, caramelo, dia de fiesta, hierbabuena, menta, navidad,   &#xf786;</option>
                        <option value="fas fa-cannabis"> Canabis   <option value="fas fa-cannabis   brote, crónico, drogas, endica, endo, ganja, marihuana, mary jane, bote, reefer, sativa, spliff, weed, whacky-tabacky,   &#xf55f;</option>
                        <option value="fas fa-capsules"> Cápsulas   <option value="fas fa-capsules   drogas, medicina, pastillas, prescripción,   &#xf46b;</option>
                        <option value="fas fa-car"> Coche   <option value="fas fa-car   Auto, automóvil, sedán, transporte, viaje, vehículo,   &#xf1b9;</option>
                        <option value="fas fa-car-alt"> Alternate Coche   <option value="fas fa-car-alt   Auto, automóvil, sedán, transporte, viaje, vehículo,   &#xf5de;</option>
                        <option value="fas fa-car-battery"> Coche Battery   <option value="fas fa-car-battery   auto, eléctrico, mecánico, potencia,   &#xf5df;</option>
                        <option value="fas fa-car-crash"> Coche Crash   <option value="fas fa-car-crash   accidente, auto, automóvil, seguro, sedán, transporte, vehículo,   &#xf5e1;</option>
                        <option value="fas fa-car-side"> Coche Side   <option value="fas fa-car-side   Auto, automóvil, sedán, transporte, viaje, vehículo,   &#xf5e4;</option>
                        <option value="fas fa-caravan"> Cocheavan   <option value="fas fa-caravan   caravana, casa rodante, rv, remolque, viaje,   &#xf8ff;</option>
                        <option value="fas fa-caret-down"> Cocheet Down   <option value="fas fa-caret-down   desplegable, expandir, flecha, menú, más, triángulo,   &#xf0d7;</option>
                        <option value="fas fa-caret-left"> Cocheet Left   <option value="fas fa-caret-left   anterior, flecha hacia atrás, triángulo,   &#xf0d9;</option>
                        <option value="fas fa-caret-right"> Cocheet Right   <option value="fas fa-caret-right   flecha, adelante, siguiente, triángulo,   &#xf0da;</option>
                        <option value="fas fa-caret-square-down"> Cocheet Square Down   <option value="fas fa-caret-square-down   flecha hacia abajo, cuadrado-o-abajo, desplegar, menú, más, triángulo,   &#xf150;</option>
                        <option value="fas fa-caret-square-left"> Cocheet Square Left   <option value="fas fa-caret-square-left   anterior, atrás, caret-square-o-left, flecha, triángulo el,   &#xf191;</option>
                        <option value="fas fa-caret-square-right"> Cocheet Square Right   <option value="fas fa-caret-square-right   adelante, flecha, signo de intercalación-cuadrado-o-derecha, siguiente, triángulo el,   &#xf152;</option>
                        <option value="fas fa-caret-square-up"> Cocheet Square Up   <option value="fas fa-caret-square-up   colapso, cuadrado, flecha, flecha, subir, triángulo el,   &#xf151;</option>
                        <option value="fas fa-caret-up"> Cocheet Up   <option value="fas fa-caret-up   flecha, colapso, triángulo,   &#xf0d8;</option>
                        <option value="fas fa-carrot"> Cocherot   <option value="fas fa-carrot   bugs bunny, naranja, vegano, vegetal,   &#xf787;</option>
                        <option value="fas fa-cart-arrow-down"> Shopping Cochet Arrow Down   <option value="fas fa-cart-arrow-down   descargar, guardar, comprar,   &#xf218;</option>
                        <option value="fas fa-cart-plus"> Anunciod to Shopping Cochet   <option value="fas fa-cart-plus   agregar, crear, nuevo, positivo, compras,   &#xf217;</option>
                        <option value="fas fa-cash-register"> Caja registradora   <option value="fas fa-cash-register   Comprar, cha-ching, cambiar, pagar, comercio, leaerboard, máquina, pagar, pago, compra, tienda,   &#xf788;</option>
                        <option value="fas fa-cat"> Gato   <option value="fas fa-cat   dia de fiesta, el gatito, felino, gatito, halloween, mascota, miau,   &#xf6be;</option>
                        <option value="fab fa-cc-amazon-pay"> Amazonas Pay Credit Coched   <option value="fab fa-cc-amazon-pay      &#xf42d;</option>
                        <option value="fab fa-cc-amex"> American Express Credit Coched   <option value="fab fa-cc-amex   amex,   &#xf1f3;</option>
                        <option value="fab fa-cc-apple-pay"> manzana Pay Credit Coched   <option value="fab fa-cc-apple-pay      &#xf416;</option>
                        <option value="fab fa-cc-diners-club"> Diner's Club Credit Coched   <option value="fab fa-cc-diners-club      &#xf24c;</option>
                        <option value="fab fa-cc-discover"> Discover Credit Coched   <option value="fab fa-cc-discover      &#xf1f2;</option>
                        <option value="fab fa-cc-jcb"> JCB Credit Coched   <option value="fab fa-cc-jcb      &#xf24b;</option>
                        <option value="fab fa-cc-mastercard"> MasterCoched Credit Coched   <option value="fab fa-cc-mastercard      &#xf1f1;</option>
                        <option value="fab fa-cc-paypal"> Paypal Credit Coched   <option value="fab fa-cc-paypal      &#xf1f4;</option>
                        <option value="fab fa-cc-stripe"> Stripe Credit Coched   <option value="fab fa-cc-stripe      &#xf1f5;</option>
                        <option value="fab fa-cc-visa"> Visa Credit Coched   <option value="fab fa-cc-visa      &#xf1f0;</option>
                        <option value="fab fa-centercode"> Código central   <option value="fab fa-centercode      &#xf380;</option>
                        <option value="fab fa-centos"> Centos   <option value="fab fa-centos   linux, sistema operativo, os,   &#xf789;</option>
                        <option value="fas fa-certificate"> certificado   <option value="fas fa-certificate   insignia, estrella, verificado,   &#xf0a3;</option>
                        <option value="fas fa-chair"> Silla   <option value="fas fa-chair   muebles, asiento, sentarse,   &#xf6c0;</option>
                        <option value="fas fa-chalkboard"> Pizarra   <option value="fas fa-chalkboard   aprendizaje, colegio, enseñando, escritura, escritura,   &#xf51b;</option>
                        <option value="fas fa-chalkboard-teacher"> Pizarra Teacher   <option value="fas fa-chalkboard-teacher   aprendizaje, colegio, escritura, instructor, profesor, pizarra,   &#xf51c;</option>
                        <option value="fas fa-charging-station"> Estación de carga   <option value="fas fa-charging-station   eléctrico, ev, tesla, vehículo,   &#xf5e7;</option>
                        <option value="fas fa-chart-area"> Gráfico de área   <option value="fas fa-chart-area   alana, analítica, carta de navegación,   &#xf1fe;</option>
                        <option value="fas fa-chart-bar"> Gráfico de barras   <option value="fas fa-chart-bar   analítica, barras, carta de navegación,   &#xf080;</option>
                        <option value="fas fa-chart-line"> Gráfico de linea   <option value="fas fa-chart-line   actividad, aumento, analítica, aumento, ganancia, graficar, línea,   &#xf201;</option>
                        <option value="fas fa-chart-pie"> Gráfico circular   <option value="fas fa-chart-pie   analítica, carta de navegación, diagrama, grafico, gráfico,   &#xf200;</option>
                        <option value="fas fa-check"> Cheque   <option value="fas fa-check   aceptar, estar de acuerdo, marca de verificación, confirmar, corregir, hecho, aviso, notificación, notificar, ok, seleccionar, éxito, marcar, todo, sí,   &#xf00c;</option>
                        <option value="fas fa-check-circle"> Cheque Circulo   <option value="fas fa-check-circle   aceptar, estar de acuerdo, confirmar, corregir, hecho, ok, seleccionar, éxito, marcar, todo, sí,   &#xf058;</option>
                        <option value="fas fa-check-double"> Double Cheque   <option value="fas fa-check-double   aceptar, de acuerdo, marca de verificación, confirmar, corregir, hecho, aviso, notificación, notificar, ok, seleccionar, éxito, marcar, todo,   &#xf560;</option>
                        <option value="fas fa-check-square"> Cheque Square   <option value="fas fa-check-square   aceptar, de acuerdo, marca de verificación, confirmar, corregir, hecho, de acuerdo, seleccionar, éxito, marcar, todo, sí,   &#xf14a;</option>
                        <option value="fas fa-cheese"> Queso   <option value="fas fa-cheese   queso cheddar, cuajada, derretir, gouda, queso parmesano, sándwich, suizo, cuña,   &#xf7ef;</option>
                        <option value="fas fa-chess"> Ajedrez   <option value="fas fa-chess   tablero, castillo, jaque mate, juego, rey, torre, estrategia, torneo,   &#xf439;</option>
                        <option value="fas fa-chess-bishop"> Ajedrez Bishop   <option value="fas fa-chess-bishop   tablero, jaque mate, juego, estrategia,   &#xf43a;</option>
                        <option value="fas fa-chess-board"> Ajedrez Board   <option value="fas fa-chess-board   tablero, jaque mate, juego, estrategia,   &#xf43c;</option>
                        <option value="fas fa-chess-king"> Ajedrez King   <option value="fas fa-chess-king   tablero, jaque mate, juego, estrategia,   &#xf43f;</option>
                        <option value="fas fa-chess-knight"> Ajedrez Knight   <option value="fas fa-chess-knight   tablero, jaque mate, juego, caballo, estrategia,   &#xf441;</option>
                        <option value="fas fa-chess-pawn"> Ajedrez Pawn   <option value="fas fa-chess-pawn   tablero, jaque mate, juego, estrategia,   &#xf443;</option>
                        <option value="fas fa-chess-queen"> Ajedrez Queen   <option value="fas fa-chess-queen   tablero, jaque mate, juego, estrategia,   &#xf445;</option>
                        <option value="fas fa-chess-rook"> Ajedrez Rook   <option value="fas fa-chess-rook   tablero, castillo, jaque mate, juego, estrategia,   &#xf447;</option>
                        <option value="fas fa-chevron-circle-down"> Círculo de Chevron hacia abajo   <option value="fas fa-chevron-circle-down   flecha, descargar, desplegable, menú, más,   &#xf13a;</option>
                        <option value="fas fa-chevron-circle-left"> Círculo de Chevron a la izquierda   <option value="fas fa-chevron-circle-left   flecha, atrás, anterior,   &#xf137;</option>
                        <option value="fas fa-chevron-circle-right"> Círculo de Chevron a la derecha   <option value="fas fa-chevron-circle-right   flecha, adelante, siguiente,   &#xf138;</option>
                        <option value="fas fa-chevron-circle-up"> Chevron Circulo Up   <option value="fas fa-chevron-circle-up   flecha, colapso, subir,   &#xf139;</option>
                        <option value="fas fa-chevron-down"> chevron-down   <option value="fas fa-chevron-down   flecha, descargar, expandir,   &#xf078;</option>
                        <option value="fas fa-chevron-left"> chevron-left   <option value="fas fa-chevron-left   anterior, flecha, atrás, corchete,   &#xf053;</option>
                        <option value="fas fa-chevron-right"> chevron-right   <option value="fas fa-chevron-right   flecha, corchete, adelante, siguiente,   &#xf054;</option>
                        <option value="fas fa-chevron-up"> chevron-up   <option value="fas fa-chevron-up   flecha, colapso, subir,   &#xf077;</option>
                        <option value="fas fa-child"> Niño   <option value="fas fa-child   niño, niña, niño, niñito, joven,   &#xf1ae;</option>
                        <option value="fab fa-chrome"> Cromo   <option value="fab fa-chrome   navegador,   &#xf268;</option>
                        <option value="fab fa-chromecast"> Cromocast   <option value="fab fa-chromecast      &#xf838;</option>
                        <option value="fas fa-church"> Iglesia   <option value="fas fa-church   catedral, capilla, comunidad, edificio, religión,   &#xf51d;</option>
                        <option value="fas fa-circle"> Circulo   <option value="fas fa-circle   círculo delgado, diámetro, elipse, notificación, puntito, ronda,   &#xf111;</option>
                        <option value="fas fa-circle-notch"> Circulo Notched   <option value="fas fa-circle-notch   círculo-o-notch, diámetro, elipse, hilandero, punto, redondo,   &#xf1ce;</option>
                        <option value="fas fa-city"> Ciudad   <option value="fas fa-city   edificios, ocupado, rascacielos, urbano, ventanas,   &#xf64f;</option>
                        <option value="fas fa-clinic-medical"> Clinica Medica   <option value="fas fa-clinic-medical   covid-19, enfermería, hospital, medicina, médico, médico general, oficina,   &#xf7f2;</option>
                        <option value="fas fa-clipboard"> Portapapeles   <option value="fas fa-clipboard   copiar, notas, pegar, grabar,   &#xf328;</option>
                        <option value="fas fa-clipboard-check"> Portapapeles with Cheque   <option value="fas fa-clipboard-check   aceptar, estar de acuerdo, confirmar, hecho, de acuerdo, seleccionar, éxito, marcar, todo, sí, calificar   &#xf46c;</option>
                        <option value="fas fa-clipboard-list"> Portapapeles List   <option value="fas fa-clipboard-list   lista de verificación, completado, hecho, terminado, intinerario, ol, horario, tick, todo, ul, grado   &#xf46d;</option>
                        <option value="fas fa-clock"> Reloj   <option value="fas fa-clock   fecha, tarde, horario, hora, temporizador, marca de tiempo, reloj,   &#xf017;</option>
                        <option value="fas fa-clone"> Clon   <option value="fas fa-clone   organizar, copiar, duplicar, pegar,   &#xf24d;</option>
                        <option value="fas fa-closed-captioning"> Subtítulos   <option value="fas fa-closed-captioning   cc, sordo, audición, subtítulo, subtitulado, texto, video,   &#xf20a;</option>
                        <option value="fas fa-cloud"> Nube   <option value="fas fa-cloud   atmósfera, niebla, nublado, salvar, subir, clima, Fuente de icono de nube increíble   &#xf0c2;</option>
                        <option value="fas fa-cloud-download-alt"> Alternate Nube Download   <option value="fas fa-cloud-download-alt   descargar, exportar, guardar,   &#xf381;</option>
                        <option value="fas fa-cloud-meatball"> Nube with (a chance of) Meatball   <option value="fas fa-cloud-meatball   FLDSMDFR, comida, espaguetis, tormenta,   &#xf73b;</option>
                        <option value="fas fa-cloud-moon"> Nube with Moon   <option value="fas fa-cloud-moon   cielo, luna creciente, noche, parcialmente nublado,   &#xf6c3;</option>
                        <option value="fas fa-cloud-moon-rain"> Nube with Moon and Rain   <option value="fas fa-cloud-moon-rain   media luna, lunar, noche, parcialmente nublado, precipitación, lluvia, tormenta,   &#xf73c;</option>
                        <option value="fas fa-cloud-rain"> Nube with Rain   <option value="fas fa-cloud-rain   precipitación, lluvia, cielo, tormenta,   &#xf73d;</option>
                        <option value="fas fa-cloud-showers-heavy"> Nube with Heavy Showers   <option value="fas fa-cloud-showers-heavy   precipitación, lluvia, cielo, tormenta,   &#xf740;</option>
                        <option value="fas fa-cloud-sun"> Nube with Sun   <option value="fas fa-cloud-sun   claro, día, día diurno, el aire libre, nublado, parcialmente nublado,   &#xf6c4;</option>
                        <option value="fas fa-cloud-sun-rain"> Nube with Sun and Rain   <option value="fas fa-cloud-sun-rain   nublado, precipitación, lluvia de sol, tormenta, veraniego   &#xf743;</option>
                        <option value="fas fa-cloud-upload-alt"> Alternate Nube Upload   <option value="fas fa-cloud-upload-alt   cargar en la nube, importar, guardar, cargar,   &#xf382;</option>
                        <option value="fab fa-cloudscale"> cloudscale.ch   <option value="fab fa-cloudscale      &#xf383;</option>
                        <option value="fab fa-cloudsmith"> Nubesmith   <option value="fab fa-cloudsmith      &#xf384;</option>
                        <option value="fab fa-cloudversify"> cloudversify   <option value="fab fa-cloudversify      &#xf385;</option>
                        <option value="fas fa-cocktail"> Cóctel   <option value="fas fa-cocktail   alcohol, bebida, ginebra, margarita, martini, vodka,   &#xf561;</option>
                        <option value="fas fa-code"> Código   <option value="fas fa-code   corchetes, código, desarrollo, html, icono de desarrollo web   &#xf121;</option>
                        <option value="fas fa-code-branch"> Código Branch   <option value="fas fa-code-branch   rama, horquilla de código, horquilla, git, github, rebase, svn, vcs, versión,   &#xf126;</option>
                        <option value="fab fa-codepen"> Códigopen   <option value="fab fa-codepen      &#xf1cb;</option>
                        <option value="fab fa-codiepie"> Pastel de codie   <option value="fab fa-codiepie      &#xf284;</option>
                        <option value="fas fa-coffee"> café   <option value="fas fa-coffee   bebida, cafe, desayuno, estacional, jarra, mañana, otoño,   &#xf0f4;</option>
                        <option value="fas fa-cog"> diente   <option value="fas fa-cog   engranaje, mecánico, ajustes, piñón, rueda dentada,   &#xf013;</option>
                        <option value="fas fa-cogs"> dientes   <option value="fas fa-cogs   engranajes, mecánico, ajustes, piñón, rueda dentada,   &#xf085;</option>
                        <option value="fas fa-coins"> Monedas   <option value="fas fa-coins   moneda, moneda de diez centavos, centavo, dinero,   &#xf51e;</option>
                        <option value="fas fa-columns"> Columnas   <option value="fas fa-columns   navegador, dashboard, organize, panes, split,   &#xf0db;</option>
                        <option value="fas fa-comment"> comentario   <option value="fas fa-comment   burbuja, charla, comentar, conversación, retroalimentación, mensaje, nota, notificación, sms, habla, mensajes de texto,   &#xf075;</option>
                        <option value="fas fa-comment-alt"> Comentario alternativo   <option value="fas fa-comment-alt   burbuja, charla, comentar, conversación, retroalimentación, mensaje, nota, notificación, sms, habla, mensajes de texto,   &#xf27a;</option>
                        <option value="fas fa-comment-dollar"> Comentario dólar   <option value="fas fa-comment-dollar   burbuja, charla, comentar, conversación, retroalimentación, mensaje, dinero, nota, notificación, paga, sms, habla, gastar, enviar mensajes de texto, transferir,   &#xf651;</option>
                        <option value="fas fa-comment-dots"> Puntos de comentario   <option value="fas fa-comment-dots   burbuja, charla, comentando, conversacion, retroalimentación, mensaje, más, nota, notificación, responder, sms, habla, mensajes de texto, icono de tres puntos   &#xf4ad;</option>
                        <option value="fas fa-comment-medical"> Chat médico alternativo   <option value="fas fa-comment-medical   consejo, burbuja, charla, comentar, conversación, diagnosticar, retroalimentación, mensaje, nota, notificación, prescripción, sms, habla, mensajes de texto,   &#xf7f5;</option>
                        <option value="fas fa-comment-slash"> Barra inclinada de comentarios   <option value="fas fa-comment-slash   burbuja, cancelar, charlar, comentar, conversación, retroalimentación, mensaje, silencio, nota, notificación, silencio, sms, habla, mensajes de texto,   &#xf4b3;</option>
                        <option value="fas fa-comments"> comentarios   <option value="fas fa-comments   burbuja, charla, comentando, conversacion, retroalimentación, mensaje, nota, notificación, sms, habla, mensajes de texto, fuente impresionante bocadillo   &#xf086;</option>
                        <option value="fas fa-comments-dollar"> Comentarios Dollar   <option value="fas fa-comments-dollar   burbuja, charla, comentar, conversación, retroalimentación, mensaje, dinero, nota, notificación, paga, sms, habla, gastar, enviar mensajes de texto, transferir,   &#xf653;</option>
                        <option value="fas fa-compact-disc"> Disco compacto   <option value="fas fa-compact-disc   álbum, bluray, discos compactos, dvd, medios de comunicación, música, película, vídeo, vinilo   &#xf51f;</option>
                        <option value="fas fa-compass"> Brújula   <option value="fas fa-compass   direcciones, directorio, ubicación, menú, navegación, safari, viajes,   &#xf14e;</option>
                        <option value="fas fa-compress"> Comprimir   <option value="fas fa-compress   contraer, pantalla completa, minimizar, mover, redimensionar, encoger, más pequeño,   &#xf066;</option>
                        <option value="fas fa-compress-alt"> Alternate Comprimir   <option value="fas fa-compress-alt   contraer, pantalla completa, minimizar, mover, redimensionar, encoger, más pequeño,   &#xf422;</option>
                        <option value="fas fa-compress-arrows-alt"> Alternate Comprimir Arrows   <option value="fas fa-compress-arrows-alt   contraer, pantalla completa, minimizar, mover, redimensionar, encoger, más pequeño,   &#xf78c;</option>
                        <option value="fas fa-concierge-bell"> Conserje Bell   <option value="fas fa-concierge-bell   atención, hotel, recepcionista, servicio, sostén,   &#xf562;</option>
                        <option value="fab fa-confluence"> Confluencia   <option value="fab fa-confluence   atlassian,   &#xf78d;</option>
                        <option value="fab fa-connectdevelop"> Conectar Desarrollar   <option value="fab fa-connectdevelop      &#xf20e;</option>
                        <option value="fab fa-contao"> Contao   <option value="fab fa-contao      &#xf26d;</option>
                        <option value="fas fa-cookie"> Galleta   <option value="fas fa-cookie   bocadillo, bueno al horno, chocolate, comer, dulce, dulce,   &#xf563;</option>
                        <option value="fas fa-cookie-bite"> Galleta Bite   <option value="fas fa-cookie-bite   bocadillo, bocadillo, bueno, horneado, comer, dulce, dulce,   &#xf564;</option>
                        <option value="fas fa-copy"> Copiar   <option value="fas fa-copy   clonar, duplicar, archivo, archivos-o, papel, pegar,   &#xf0c5;</option>
                        <option value="fas fa-copyright"> Copiarright   <option value="fas fa-copyright   marca, marca, registro, marca registrada,   &#xf1f9;</option>
                        <option value="fab fa-cotton-bureau"> Oficina de algodón   <option value="fab fa-cotton-bureau   ropa, camisetas, camisetas,   &#xf89e;</option>
                        <option value="fas fa-couch"> Sofá   <option value="fas fa-couch   cojín, silla, mobiliario, relajarse, sofá,   &#xf4b8;</option>
                        <option value="fab fa-cpanel"> cPanel   <option value="fab fa-cpanel      &#xf388;</option>
                        <option value="fab fa-creative-commons"> Creative Commons   <option value="fab fa-creative-commons      &#xf25e;</option>
                        <option value="fab fa-creative-commons-by"> Atribución Creative Commons   <option value="fab fa-creative-commons-by      &#xf4e7;</option>
                        <option value="fab fa-creative-commons-nc"> Creative Commons no comercial   <option value="fab fa-creative-commons-nc      &#xf4e8;</option>
                        <option value="fab fa-creative-commons-nc-eu"> Creative Commons no comercial (Signo de euro)   <option value="fab fa-creative-commons-nc-eu      &#xf4e9;</option>
                        <option value="fab fa-creative-commons-nc-jp"> Creative Commons no comercial (Yen Sign)   <option value="fab fa-creative-commons-nc-jp      &#xf4ea;</option>
                        <option value="fab fa-creative-commons-nd"> Creative Commons sin obras derivadas   <option value="fab fa-creative-commons-nd      &#xf4eb;</option>
                        <option value="fab fa-creative-commons-pd"> Dominio público de Creative Commons   <option value="fab fa-creative-commons-pd      &#xf4ec;</option>
                        <option value="fab fa-creative-commons-pd-alt"> Alternate Dominio público de Creative Commons   <option value="fab fa-creative-commons-pd-alt      &#xf4ed;</option>
                        <option value="fab fa-creative-commons-remix"> Remix de Creative Commons   <option value="fab fa-creative-commons-remix      &#xf4ee;</option>
                        <option value="fab fa-creative-commons-sa"> Compartir Creative Commons Alike   <option value="fab fa-creative-commons-sa      &#xf4ef;</option>
                        <option value="fab fa-creative-commons-sampling"> Muestreo Creative Commons   <option value="fab fa-creative-commons-sampling      &#xf4f0;</option>
                        <option value="fab fa-creative-commons-sampling-plus"> Muestreo Creative Commons +   <option value="fab fa-creative-commons-sampling-plus      &#xf4f1;</option>
                        <option value="fab fa-creative-commons-share"> Compartir Creative Commons   <option value="fab fa-creative-commons-share      &#xf4f2;</option>
                        <option value="fab fa-creative-commons-zero"> Creative Commons CC0   <option value="fab fa-creative-commons-zero      &#xf4f3;</option>
                        <option value="fas fa-credit-card"> Tarjeta de crédito   <option value="fas fa-credit-card   comprar, compra, débito, dinero, tarjeta de crédito-alt, pago,   &#xf09d;</option>
                        <option value="fab fa-critical-role"> Rol critico   <option value="fab fa-critical-role   Dungeons & Drago;</option>ns, d & d, dn;</option>d, fantasía, juego, videojuegos, mesa,   &#xf6c9;</option>
                        <option value="fas fa-crop"> cosecha   <option value="fas fa-crop   diseño, marco, máscara, redimensionar, encoger,   &#xf125;</option>
                        <option value="fas fa-crop-alt"> Cultivo alternativo   <option value="fas fa-crop-alt   diseño, marco, máscara, redimensionar, encoger,   &#xf565;</option>
                        <option value="fas fa-cross"> Cruzar   <option value="fas fa-cross   catolicismo, cristianismo, iglesia, jesús,   &#xf654;</option>
                        <option value="fas fa-crosshairs"> Cruzarhairs   <option value="fas fa-crosshairs   posición, diana, gpd, puntería,   &#xf05b;</option>
                        <option value="fas fa-crow"> Cuervo   <option value="fas fa-crow   dia de fiesta, fauna silvestre, halloween, pájaro, rana toro, sapo,   &#xf520;</option>
                        <option value="fas fa-crown"> Cuervon   <option value="fas fa-crown   favorito, reina, rey, royale, tiara,   &#xf521;</option>
                        <option value="fas fa-crutch"> Muleta   <option value="fas fa-crutch   caña, lesión, movilidad, silla de ruedas,   &#xf7f7;</option>
                        <option value="fab fa-css3"> Logotipo de CSS 3   <option value="fab fa-css3   código,   &#xf13c;</option>
                        <option value="fab fa-css3-alt"> Logotipo CSS3 alternativo   <option value="fab fa-css3-alt      &#xf38b;</option>
                        <option value="fas fa-cube"> Cubo   <option value="fas fa-cube   3 dimensiones, bulto, cuadrado, cuadrado, tesseract,   &#xf1b2;</option>
                        <option value="fas fa-cubes"> Cubos   <option value="fas fa-cubes   3 dimensiones, apilar, bulto, cuadrado, cuadrado, tesseract,   &#xf1b3;</option>
                        <option value="fas fa-cut"> Cortar   <option value="fas fa-cut   clip, tijeras, recortar,   &#xf0c4;</option>
                        <option value="fab fa-cuttlefish"> Cortartlefish   <option value="fab fa-cuttlefish      &#xf38c;</option>
                        <option value="fab fa-d-and-d"> Calabozos y Continuares   <option value="fab fa-d-and-d      &#xf38d;</option>
                        <option value="fab fa-d-and-d-beyond"> D&D más ;</option>allá   <option value="fab fa-d-and-d-beyond   Dungeons & Drago;</option>ns, d & d, dn;</option>d, fantasía, juegos, mesa,   &#xf6ca;</option>
                        <option value="fab fa-dailymotion"> dailymotion   <option value="fab fa-dailymotion      &#xf952;</option>
                        <option value="fab fa-dashcube"> DashCubo   <option value="fab fa-dashcube      &#xf210;</option>
                        <option value="fas fa-database"> Base de datos   <option value="fas fa-database   computadora, desarrollo, directorio, memoria, almacenamiento, icono de desarrollo web   &#xf1c0;</option>
                        <option value="fas fa-deaf"> Sordo   <option value="fas fa-deaf   oído, audición, lenguaje de señas,   &#xf2a4;</option>
                        <option value="fab fa-delicious"> Delicioso   <option value="fab fa-delicious      &#xf1a5;</option>
                        <option value="fas fa-democrat"> Demócrata   <option value="fas fa-democrat   burro, elección, estados unidos, izquierda, liberal, partido democrático, política,   &#xf747;</option>
                        <option value="fab fa-deploydog"> deploy.dog   <option value="fab fa-deploydog      &#xf38e;</option>
                        <option value="fab fa-deskpro"> Deskpro   <option value="fab fa-deskpro      &#xf38f;</option>
                        <option value="fas fa-desktop"> Escritorio   <option value="fas fa-desktop   computadora, computadora de escritorio, demo, dispositivo, imac, máquina, monitor,   &#xf108;</option>
                        <option value="fab fa-dev"> DEV   <option value="fab fa-dev      &#xf6cc;</option>
                        <option value="fab fa-deviantart"> deviantART   <option value="fab fa-deviantart      &#xf1bd;</option>
                        <option value="fas fa-dharmachakra"> Dharmachakra   <option value="fas fa-dharmachakra   analizar, detectar, diagnóstico, examinar, medicina,   &#xf655;</option>
                        <option value="fab fa-dhl"> DHL   <option value="fab fa-dhl   Dalsey, Hillblom y Lynn, alemán, paquete, envío,   &#xf790;</option>
                        <option value="fas fa-diagnoses"> Diagnósticos   <option value="fas fa-diagnoses   oportunidad, juego, juego, rollo,   &#xf470;</option>
                        <option value="fab fa-diaspora"> Diáspora   <option value="fab fa-diaspora      &#xf791;</option>
                        <option value="fas fa-dice"> Dado   <option value="fas fa-dice   Dungeons & Drago;</option>ns, chance, d & d, dn;</option>d, fantasía, juegos de azar, juego, rollo,   &#xf522;</option>
                        <option value="fas fa-dice-d20"> Dado D20   <option value="fas fa-dice-d20   oportunidad, juego, juego, rollo,   &#xf6cf;</option>
                        <option value="fas fa-dice-d6"> Dado D6   <option value="fas fa-dice-d6   oportunidad, juego, juego, rollo,   &#xf6d1;</option>
                        <option value="fas fa-dice-five"> Dado Five   <option value="fas fa-dice-five   Dungeons & Drago;</option>ns, chance, d & d, dn;</option>d, fantasía, juegos de azar, juego, rollo,   &#xf523;</option>
                        <option value="fas fa-dice-four"> Dado Four   <option value="fas fa-dice-four   Dungeons & Drago;</option>ns, chance, d & d, dn;</option>d, fantasía, juegos de azar, juego, rollo,   &#xf524;</option>
                        <option value="fas fa-dice-one"> Dado One   <option value="fas fa-dice-one   Dungeons & Drago;</option>ns, chance, d & d, dn;</option>d, fantasía, juegos de azar, juego, rollo,   &#xf525;</option>
                        <option value="fas fa-dice-six"> Dado Six   <option value="fas fa-dice-six   Dungeons & Drago;</option>ns, chance, d & d, dn;</option>d, fantasía, juegos de azar, juego, rollo,   &#xf526;</option>
                        <option value="fas fa-dice-three"> Dado Three   <option value="fas fa-dice-three   Dungeons & Drago;</option>ns, chance, d & d, dn;</option>d, fantasía, juegos de azar, juego, rollo,   &#xf527;</option>
                        <option value="fas fa-dice-two"> Dado Two   <option value="fas fa-dice-two   Dungeons & Drago;</option>ns, chance, d & d, dn;</option>d, fantasía, juegos de azar, juego, rollo,   &#xf528;</option>
                        <option value="fab fa-digg"> Logotipo de Digg   <option value="fab fa-digg      &#xf1a6;</option>
                        <option value="fab fa-digital-ocean"> Océano digital   <option value="fab fa-digital-ocean      &#xf391;</option>
                        <option value="fas fa-digital-tachograph"> Tacógrafo digital   <option value="fas fa-digital-tachograph   datos, distancia, velocidad, tacómetro,   &#xf566;</option>
                        <option value="fas fa-directions"> Direcciones   <option value="fas fa-directions   mapa, navegación, señal, giro,   &#xf5eb;</option>
                        <option value="fab fa-discord"> Discordia   <option value="fab fa-discord      &#xf392;</option>
                        <option value="fab fa-discourse"> Discurso   <option value="fab fa-discourse      &#xf393;</option>
                        <option value="fas fa-disease"> Enfermedad   <option value="fas fa-disease   aturdido, muerto, desaprobar, emoticon, cara,   &#xf7fa;</option>
                        <option value="fas fa-divide"> Dividir   <option value="fas fa-divide   doble hélice, genético, hélice, molécula, proteína,   &#xf529;</option>
                        <option value="fas fa-dizzy"> Cara mareada   <option value="fas fa-dizzy   aturdido, muerto, desaprobar, emoticon, cara,   &#xf567;</option>
                        <option value="fas fa-dna"> ADN   <option value="fas fa-dna   doble hélice, genético, hélice, molécula, proteína,   &#xf471;</option>
                        <option value="fab fa-dochub"> DocHub   <option value="fab fa-dochub      &#xf394;</option>
                        <option value="fab fa-docker"> Estibador   <option value="fab fa-docker      &#xf395;</option>
                        <option value="fas fa-dog"> Perro   <option value="fas fa-dog   llevar, envío, transporte,   &#xf6d3;</option>
                        <option value="fas fa-dollar-sign"> Signo de dólar   <option value="fas fa-dollar-sign   $, costo, signo de dólar, dinero, precio, usd, icono de venta   &#xf155;</option>
                        <option value="fas fa-dolly"> Muñequita   <option value="fas fa-dolly   contribuir, generosidad, obsequio, dar,   &#xf472;</option>
                        <option value="fas fa-dolly-flatbed"> Muñequita Flatbed   <option value="fas fa-dolly-flatbed   entrar, salir, bloqueado,   &#xf474;</option>
                        <option value="fas fa-donate"> Donar   <option value="fas fa-donate   entrar, salir, bienvenido,   &#xf4b9;</option>
                        <option value="fas fa-door-closed"> Puerta cerrada   <option value="fas fa-door-closed   diana, notificación, objetivo,   &#xf52a;</option>
                        <option value="fas fa-door-open"> Puerta abierta   <option value="fas fa-door-open   pájaro, fauna, paz, guerra, volador,   &#xf52b;</option>
                        <option value="fas fa-dot-circle"> Círculo de puntos   <option value="fas fa-dot-circle   exportar, disco duro, guardar, transferir,   &#xf192;</option>
                        <option value="fas fa-dove"> Paloma   <option value="fas fa-dove   pájaro, fauna, paz, guerra, volador,   &#xf4ba;</option>
                        <option value="fas fa-download"> Descargar   <option value="fas fa-download   diseño, mapa, dibujo mecánico, trama, trazado,   &#xf019;</option>
                        <option value="fab fa-draft2digital"> Draft2digital   <option value="fab fa-draft2digital      &#xf396;</option>
                        <option value="fas fa-drafting-compass"> Drafting Brújula   <option value="fas fa-drafting-compass   anclas, líneas, objeto, render, forma,   &#xf568;</option>
                        <option value="fas fa-dragon"> Continuar   <option value="fas fa-dragon   Dungeons & Drago;</option>ns, d & d, dn;</option>d, fantasía, fuego, lagarto, serpiente,   &#xf6d5;</option>
                        <option value="fas fa-draw-polygon"> Dibujar polígono   <option value="fas fa-draw-polygon   anclas, líneas, objeto, render, forma,   &#xf5ee;</option>
                        <option value="fab fa-dribbble"> Regate   <option value="fab fa-dribbble      &#xf17d;</option>
                        <option value="fab fa-dribbble-square"> Regate Square   <option value="fab fa-dribbble-square      &#xf397;</option>
                        <option value="fab fa-dropbox"> Dropbox   <option value="fab fa-dropbox      &#xf16b;</option>
                        <option value="fas fa-drum"> Tambor   <option value="fas fa-drum   carne, pollo, hueso, pierna, pavo,   &#xf569;</option>
                        <option value="fas fa-drum-steelpan"> Tambor Steelpan   <option value="fas fa-drum-steelpan   acero, calypso, instrumento, música, percusión, reggae, snare,   &#xf56a;</option>
                        <option value="fas fa-drumstick-bite"> Tamborstick with Bite Taken Out   <option value="fas fa-drumstick-bite   ejercicio, gimnasio, fuerza, peso, levantamiento de pesas,   &#xf6d7;</option>
                        <option value="fab fa-drupal"> Logotipo de Drupal   <option value="fab fa-drupal      &#xf1a9;</option>
                        <option value="fas fa-dumbbell"> Pesa   <option value="fas fa-dumbbell   basura, callejón, calor, comercial, desperdicios, eufemismo, llama, peligro, peligroso,   &#xf44b;</option>
                        <option value="fas fa-dumpster"> Contenedor de basura   <option value="fas fa-dumpster   Dungeons & Drago;</option>ns, edificio, d & d, dn;</option>d, puerta, entrada, fantasía, puerta,   &#xf793;</option>
                        <option value="fas fa-dumpster-fire"> Contenedor de basura Fire   <option value="fas fa-dumpster-fire   basura, callejón, comercial, desperdicios, eufemismo, llama, llama, peligro, peligroso,   &#xf794;</option>
                        <option value="fas fa-dungeon"> Calabozo   <option value="fas fa-dungeon   Dungeons & Drago;</option>ns, edificio, d & d, dn;</option>d, puerta, entrada, fantasía, puerta,   &#xf6d9;</option>
                        <option value="fab fa-dyalog"> Dyalog   <option value="fab fa-dyalog      &#xf399;</option>
                        <option value="fab fa-earlybirds"> Anticipado   <option value="fab fa-earlybirds      &#xf39a;</option>
                        <option value="fab fa-ebay"> eBay   <option value="fab fa-ebay      &#xf4f4;</option>
                        <option value="fab fa-edge"> Navegador Edge   <option value="fab fa-edge   editar, bolígrafo, lápiz, actualizar, escribir,   &#xf282;</option>
                        <option value="fas fa-edit"> Editar   <option value="fas fa-edit   abortar, cancelar, cd, descarga,   &#xf044;</option>
                        <option value="fas fa-egg"> Huevo   <option value="fas fa-egg   desayuno, pollo, pascua, cáscara, yema de huevo,   &#xf7fb;</option>
                        <option value="fas fa-eject"> expulsar   <option value="fas fa-eject   puntos, arrastrar, kebab, lista, menú, nav, navegación, ol, reordenar, configuraciones, ul,   &#xf052;</option>
                        <option value="fab fa-elementor"> Elementor   <option value="fab fa-elementor      &#xf430;</option>
                        <option value="fas fa-ellipsis-h"> Elipsis horizontal   <option value="fas fa-ellipsis-h   puntos, arrastrar, kebab, lista, menú, nav, navegación, ol, reordenar, configuraciones, ul, icono de tres puntos   &#xf141;</option>
                        <option value="fas fa-ellipsis-v"> Elipsis vertical   <option value="fas fa-ellipsis-v   puntos, arrastrar, kebab, lista, menú, nav, navegación, ol, reordenar, configuraciones, ul, icono de tres puntos   &#xf142;</option>
                        <option value="fab fa-ello"> Ello   <option value="fab fa-ello      &#xf5f1;</option>
                        <option value="fab fa-ember"> Ascua   <option value="fab fa-ember      &#xf423;</option>
                        <option value="fab fa-empire"> Imperio galáctico   <option value="fab fa-empire      &#xf1d1;</option>
                        <option value="fas fa-envelope"> Sobre   <option value="fas fa-envelope   correo electrónico, correo electrónico, carta, correo, mensaje, notificación, soporte,   &#xf0e0;</option>
                        <option value="fas fa-envelope-open"> Sobre Open   <option value="fas fa-envelope-open   correo electrónico, correo electrónico, carta, correo, mensaje, notificación, soporte,   &#xf2b6;</option>
                        <option value="fas fa-envelope-open-text"> Sobre Open-text   <option value="fas fa-envelope-open-text   correo electrónico, correo electrónico, carta, correo, mensaje, notificación, soporte,   &#xf658;</option>
                        <option value="fas fa-envelope-square"> Sobre Square   <option value="fas fa-envelope-square   correo electrónico, correo electrónico, carta, correo, mensaje, notificación, soporte,   &#xf199;</option>
                        <option value="fab fa-envira"> Galería Envira   <option value="fab fa-envira   arte, borrar, quitar, caucho,   &#xf299;</option>
                        <option value="fas fa-equals"> Igual   <option value="fas fa-equals   aritmética, incluso, emparejar, matemáticas,   &#xf52c;</option>
                        <option value="fas fa-eraser"> borrador   <option value="fas fa-eraser   arte, borrar, quitar, caucho,   &#xf12d;</option>
                        <option value="fab fa-erlang"> Erlang   <option value="fab fa-erlang      &#xf39d;</option>
                        <option value="fab fa-ethereum"> Ethereum   <option value="fab fa-ethereum      &#xf42e;</option>
                        <option value="fas fa-ethernet"> Ethernet   <option value="fas fa-ethernet   moneda, dólar, cambio, dinero,   &#xf796;</option>
                        <option value="fab fa-etsy"> Etsy   <option value="fab fa-etsy      &#xf2d7;</option>
                        <option value="fas fa-euro-sign"> Signo de euro   <option value="fas fa-euro-sign   intercambio, flecha, flechas, intercambiar, intercambiar,   &#xf153;</option>
                        <option value="fab fa-evernote"> Evernote   <option value="fab fa-evernote      &#xf839;</option>
                        <option value="fas fa-exchange-alt"> Intercambio alternativo   <option value="fas fa-exchange-alt   alerta, advertencia, error, importante, aviso, notificación, notificar, problema,   &#xf362;</option>
                        <option value="fas fa-exclamation"> exclamación   <option value="fas fa-exclamation   alerta, advertencia, error, importante, aviso, notificación, notificar, problema,   &#xf12a;</option>
                        <option value="fas fa-exclamation-circle"> Círculo de exclamación   <option value="fas fa-exclamation-circle   alerta, advertencia, error, importante, aviso, notificación, notificar, problema,   &#xf06a;</option>
                        <option value="fas fa-exclamation-triangle"> Triángulo de exclamación   <option value="fas fa-exclamation-triangle   alerta, advertencia, error, importante, aviso, notificación, notificar, problema,   &#xf071;</option>
                        <option value="fas fa-expand"> Expandir   <option value="fas fa-expand   más grande, ampliar, pantalla completa, mover, redimensionar,   &#xf065;</option>
                        <option value="fas fa-expand-alt"> Expansión alternativair   <option value="fas fa-expand-alt   arrows, más grande, ampliar, pantalla completa, mover, redimensionar,   &#xf424;</option>
                        <option value="fas fa-expand-arrows-alt"> Expansión alternativair Arrows   <option value="fas fa-expand-arrows-alt   más grande, ampliar, pantalla completa, mover, cambiar el tamaño, arrastrar y soltar la fuente del icono impresionante   &#xf31e;</option>
                        <option value="fab fa-expeditedssl"> ExpeditedSSL   <option value="fab fa-expeditedssl      &#xf23e;</option>
                        <option value="fas fa-external-link-alt"> Enlace externo alternativo   <option value="fas fa-external-link-alt   mira, óptica, ver, espectáculo, visión, vistas, visible,   &#xf35d;</option>
                        <option value="fas fa-external-link-square-alt"> Enlace externo alternativo Square   <option value="fas fa-external-link-square-alt   clon, color, copiar, cuentagotas, pipeta,   &#xf360;</option>
                        <option value="fas fa-eye"> Ojo   <option value="fas fa-eye   ciego, esconder, mostrar, alternar, invisible, vistas, visible, visiblity,   &#xf06e;</option>
                        <option value="fas fa-eye-dropper"> Ojo Dropper   <option value="fas fa-eye-dropper   facebook oficial, red social,   &#xf1fb;</option>
                        <option value="fas fa-eye-slash"> Ojo Slash   <option value="fas fa-eye-slash   Facebook,   &#xf070;</option>

                        <option value="fab fa-facebook"> Facebook   <option value="fab fa-facebook   facebook oficial, red social,   &#xf09a;</option>
                        <option value="fab fa-facebook-f"> Facebook F   <option value="fab fa-facebook-f   red social,   &#xf39e;</option>
                        <option value="fab fa-facebook-messenger"> Facebook Messenger   <option value="fab fa-facebook-messenger      &#xf39f;</option>
                        <option value="fab fa-facebook-square"> Plaza de Facebook   <option value="fab fa-facebook-square   Dungeons & Drago;</option>ns, d & d, dn;</option>d, fantasía, juego, videojuegos, mesa,   &#xf082;</option>
                        <option value="fas fa-fan"> Ventilador   <option value="fas fa-fan   comienzo, primero, anterior, rebobinar, comenzar,   &#xf863;</option>
                        <option value="fab fa-fantasy-flight-games"> Ventiladortasy Flight-games   <option value="fab fa-fantasy-flight-games   final, último, siguiente,   &#xf6dc;</option>
                        <option value="fas fa-<option value="fast-backward"> retroceso rápido   <option value="fas fa-<option value="fast-backward   agua, casa, cocina, covid-19, goteo, higiene, fregadero,   &#xf049;</option>
                        <option value="fas fa-<option value="fast-forward"> avance rápido   <option value="fas fa-<option value="fast-forward   comunicar, copiar, facsímil, enviar,   &#xf050;</option>
                        <option value="fas fa-faucet"> Grifo   <option value="fas fa-faucet   pájaro, luz, desplumado, pluma, escribir,   &#xf905;</option>
                        <option value="fas fa-fax"> Fax   <option value="fas fa-fax   pájaro, luz, desplumado, pluma, escribir,   &#xf1ac;</option>
                        <option value="fas fa-feather"> Pluma   <option value="fas fa-feather   Federal Express, paquete, envío,   &#xf52d;</option>
                        <option value="fas fa-feather-alt"> Alternate Pluma   <option value="fas fa-feather-alt   Federal Express, paquete, envío,   &#xf56b;</option>
                        <option value="fab fa-fedex"> FedEx   <option value="fab fa-fedex   humano, persona, perfil, usuario, mujer,   &#xf797;</option>
                        <option value="fab fa-fedora"> Fedora   <option value="fab fa-fedora   avión, rápido, volar, ganso, inconformista, avión, rápido, pistola superior, transporte, viaje,   &#xf798;</option>
                        <option value="fas fa-female"> Hembra   <option value="fas fa-female   aplicación, diseño, interfaz,   &#xf182;</option>
                        <option value="fas fa-fighter-jet"> caza de reacción   <option value="fas fa-fighter-jet   documento, nuevo, página, pdf, curriculum vitae,   &#xf0fb;</option>
                        <option value="fab fa-figma"> Figma   <option value="fab fa-figma   documento, archivo-texto, factura, nuevo, página, pdf,   &#xf799;</option>
                        <option value="fas fa-file"> Expediente   <option value="fas fa-file   .zip, paquete, comprimir, compresión, descargar, zip,   &#xf15b;</option>
                        <option value="fas fa-file-alt"> Alternate Expediente   <option value="fas fa-file-alt   documento, archivo-texto, factura, nuevo, página, pdf, orden de compra   &#xf15c;</option>
                        <option value="fas fa-file-archive"> Archive Expediente   <option value="fas fa-file-archive   .zip, paquete, comprimir, compresión, descargar, zip,   &#xf1c6;</option>
                        <option value="fas fa-file-audio"> Audio Expediente   <option value="fas fa-file-audio   documento, mp3, música, página, reproducir, sonido,   &#xf1c7;</option>
                        <option value="fas fa-file-code"> Code Expediente   <option value="fas fa-file-code   css, desarrollo, documento, html,   &#xf1c9;</option>
                        <option value="fas fa-file-contract"> Expediente Contract   <option value="fas fa-file-contract   acuerdo, vinculante, documento, legal, firma, fuente de icono de contrato impresionante   &#xf56c;</option>
                        <option value="fas fa-file-csv"> Expediente CSV   <option value="fas fa-file-csv   documento, sobresalir, números, hojas de cálculo, tabla,   &#xf6dd;</option>
                        <option value="fas fa-file-download"> Expediente Descargar   <option value="fas fa-file-download   documento, exportar, guardar,   &#xf56d;</option>
                        <option value="fas fa-file-excel"> Excel Expediente   <option value="fas fa-file-excel   csv, documento, números, hojas de cálculo, tabla,   &#xf1c3;</option>
                        <option value="fas fa-file-export"> Expediente Export   <option value="fas fa-file-export   descargar, guardar,   &#xf56e;</option>
                        <option value="fas fa-file-image"> Image Expediente   <option value="fas fa-file-image   documento, imagen, jpg, foto, png,   &#xf1c5;</option>
                        <option value="fas fa-file-import"> Expediente Import   <option value="fas fa-file-import   copiar, documentar, enviar, cargar,   &#xf56f;</option>
                        <option value="fas fa-file-invoice"> Expediente Invoice   <option value="fas fa-file-invoice   cuenta, factura, cargo, documento, pago, recibo, orden de compra   &#xf570;</option>
                        <option value="fas fa-file-invoice-dollar"> Expediente Invoice with US Dollar   <option value="fas fa-file-invoice-dollar   $, cuenta, factura, cargo, documento, signo de dólar, dinero, pago, recibo, usd, icono de venta, icono de orden de compra, icono de orden de venta, icono de factura   &#xf571;</option>
                        <option value="fas fa-file-medical"> Medical Expediente   <option value="fas fa-file-medical   documento, historia, salud, prescripción, registro,   &#xf477;</option>
                        <option value="fas fa-file-medical-alt"> Alternate Medical Expediente   <option value="fas fa-file-medical-alt   documento, historia, salud, prescripción, registro,   &#xf478;</option>
                        <option value="fas fa-file-pdf"> PDF Expediente   <option value="fas fa-file-pdf   acróbata, guardar, documento, vista previa,   &#xf1c1;</option>
                        <option value="fas fa-file-powerpoint"> Powerpoint Expediente   <option value="fas fa-file-powerpoint   display, documento, keynote, presentación,   &#xf1c4;</option>
                        <option value="fas fa-file-prescription"> Expediente Prescription   <option value="fas fa-file-prescription   documento, drogas, medicina, médico, rx,   &#xf572;</option>
                        <option value="fas fa-file-signature"> Expediente Signature   <option value="fas fa-file-signature   John Hancock, contrato, documento, nombre,   &#xf573;</option>
                        <option value="fas fa-file-upload"> Expediente Upload   <option value="fas fa-file-upload   documento, importación, página, guardar,   &#xf574;</option>
                        <option value="fas fa-file-video"> Video Expediente   <option value="fas fa-file-video   documento, m4v, película, mp4, jugar,   &#xf1c8;</option>
                        <option value="fas fa-file-word"> Word Expediente   <option value="fas fa-file-word   documento, editar, página, texto, escritura,   &#xf1c2;</option>
                        <option value="fas fa-fill"> Llenar   <option value="fas fa-fill   cubo, color, pintura, cubo de pintura,   &#xf575;</option>
                        <option value="fas fa-fill-drip"> Llenar Drip   <option value="fas fa-fill-drip   balde, bote de pintura, colorear, derramar, derramar,   &#xf576;</option>
                        <option value="fas fa-film"> Película   <option value="fas fa-film   cine, película, tira, video,   &#xf008;</option>
                        <option value="fas fa-filter"> Filtrar   <option value="fas fa-filter   embudo, opciones, separar, ordenar,   &#xf0b0;</option>
                        <option value="fas fa-fingerprint"> Huella dactilar   <option value="fas fa-fingerprint   humano, identificación, identificación, mancha, toque, único, desbloquear,   &#xf577;</option>
                        <option value="fas fa-fire"> fuego   <option value="fas fa-fire   caliente, caliente, calor, llama, popular, quemar,   &#xf06d;</option>
                        <option value="fas fa-fire-alt"> Fuego alternativo   <option value="fas fa-fire-alt   caliente, caliente, calor, llama, popular, quemar,   &#xf7e4;</option>
                        <option value="fas fa-fire-extinguisher"> fuego-extinguisher   <option value="fas fa-fire-extinguisher   caliente, calor, bombero, calor, quemar, rescate,   &#xf134;</option>
                        <option value="fab fa-firefox"> Firefox   <option value="fab fa-firefox   navegador,   &#xf269;</option>
                        <option value="fab fa-firefox-browser"> Navegador Firefox   <option value="fab fa-firefox-browser   navegador,   &#xf907;</option>
                        <option value="fas fa-first-aid"> Primeros auxilios   <option value="fas fa-first-aid   emergencia, emt, salud, médico, rescate,   &#xf479;</option>
                        <option value="fab fa-first-order"> Primer orden   <option value="fab fa-first-order      &#xf2b0;</option>
                        <option value="fab fa-first-order-alt"> Alternate Primer orden   <option value="fab fa-first-order-alt      &#xf50a;</option>
                        <option value="fab fa-firstdraft"> primer borrador   <option value="fab fa-firstdraft      &#xf3a1;</option>
                        <option value="fas fa-fish"> Pescado   <option value="fas fa-fish   fauna, oro, mariscos, nadando,   &#xf578;</option>
                        <option value="fas fa-fist-raised"> Puño levantado   <option value="fas fa-fist-raised   Dungeons & Drago;</option>ns, d & d, dn;</option>d, fantasía, mano, ki, monje, resistir, fuerza, combate sin armas,   &#xf6de;</option>
                        <option value="fas fa-flag"> bandera   <option value="fas fa-flag   notificar, notificar, notificar, país, qutb minar, símbolo,   &#xf024;</option>
                        <option value="fas fa-flag-checkered"> bandera-checkered   <option value="fas fa-flag-checkered   aviso, notificación, notificar, carreras, poste, informe, símbolo,   &#xf11e;</option>
                        <option value="fas fa-flag-usa"> Bandera de los estados unidos de américa   <option value="fas fa-flag-usa   betsy ross, estrellas, país, rayas, símbolo, vieja gloria,   &#xf74d;</option>
                        <option value="fas fa-flask"> Matraz   <option value="fas fa-flask   vaso de precipitados, experimental, laboratorios, ciencia,   &#xf0c3;</option>
                        <option value="fab fa-flickr"> Flickr   <option value="fab fa-flickr      &#xf16e;</option>
                        <option value="fab fa-flipboard"> Flipboard   <option value="fab fa-flipboard      &#xf44d;</option>
                        <option value="fas fa-flushed"> Cara sonrojada   <option value="fas fa-flushed   avergonzado, emoticon, cara,   &#xf579;</option>
                        <option value="fab fa-fly"> Mosca   <option value="fab fa-fly      &#xf417;</option>
                        <option value="fas fa-folder"> Carpeta   <option value="fas fa-folder   archivo, directorio, documento, archivo,   &#xf07b;</option>
                        <option value="fas fa-folder-minus"> Carpeta Minus   <option value="fas fa-folder-minus   archivo, borrar, directorio, documento, expediente, negativo,   &#xf65d;</option>
                        <option value="fas fa-folder-open"> Carpeta Open   <option value="fas fa-folder-open   archivo, directorio, documento, expediente, nuevo, nuevo,   &#xf07c;</option>
                        <option value="fas fa-folder-plus"> Carpeta Plus   <option value="fas fa-folder-plus   agregar, archivo, crear, directorio, documento, expediente, nuevo,   &#xf65e;</option>
                        <option value="fas fa-font"> fuente   <option value="fas fa-font   al<option value="fabeto, glifo, texto, tipo, tipografía,   &#xf031;</option>
                        <option value="fab fa-font-awesome"> Fuente impresionante   <option value="fab fa-font-awesome   meanpath,   &#xf2b4;</option>
                        <option value="fab fa-font-awesome-alt"> Alternate Fuente impresionante   <option value="fab fa-font-awesome-alt      &#xf35c;</option>
                        <option value="fab fa-font-awesome-flag"> Fuente impresionante Flag   <option value="fab fa-font-awesome-flag      &#xf425;</option>
                        <option value="fab fa-fonticons"> Fonticones   <option value="fab fa-fonticons      &#xf280;</option>
                        <option value="fab fa-fonticons-fi"> Fonticones Fi   <option value="fab fa-fonticons-fi      &#xf3a2;</option>
                        <option value="fas fa-football-ball"> Pelota de fútbol   <option value="fas fa-football-ball   bola, estacional, nfl, otoño, piel de cerdo,   &#xf44e;</option>
                        <option value="fab fa-fort-awesome"> Fuerte impresionante   <option value="fab fa-fort-awesome   castillo,   &#xf286;</option>
                        <option value="fab fa-fort-awesome-alt"> Alternate Fuerte impresionante   <option value="fab fa-fort-awesome-alt   castillo,   &#xf3a3;</option>
                        <option value="fab fa-forumbee"> Forumbee   <option value="fab fa-forumbee      &#xf211;</option>
                        <option value="fas fa-forward"> adelante   <option value="fas fa-forward   adelante, siguiente, saltar,   &#xf04e;</option>
                        <option value="fab fa-foursquare"> Firme   <option value="fab fa-foursquare      &#xf180;</option>
                        <option value="fab fa-free-code-camp"> freeCodeCamp   <option value="fab fa-free-code-camp      &#xf2c5;</option>
                        <option value="fab fa-freebsd"> FreeBSD   <option value="fab fa-freebsd      &#xf3a4;</option>
                        <option value="fas fa-frog"> Rana   <option value="fas fa-frog   anfibio, beso, fauna, kermit, príncipe, ribbit, rana toro, sapo, verruga   &#xf52e;</option>

                        <option value="fas fa-frown"> Cara ceñuda   <option value="fas fa-frown   desaprobar, emoticon, calificación, triste,   &#xf119;</option>
                        <option value="fas fa-frown-open"> Cara ceñuda With Open Mouth   <option value="fas fa-frown-open   desaprobar, emoticon, calificación, triste,   &#xf57a;</option>
                        <option value="fab fa-fulcrum"> Fulcro   <option value="fab fa-fulcrum      &#xf50b;</option>
                        <option value="fas fa-funnel-dollar"> Dólar embudo   <option value="fas fa-funnel-dollar   filtro, dinero, opciones, separar, ordenar,   &#xf662;</option>
                        <option value="fas fa-futbol"> Futbol   <option value="fas fa-futbol   fútbol, ​​mls, pelota,   &#xf1e3;</option>
                        <option value="fab fa-galactic-republic"> República Galáctica   <option value="fab fa-galactic-republic   política, guerra de las galaxias,   &#xf50c;</option>
                        <option value="fab fa-galactic-senate"> Senado galáctico   <option value="fab fa-galactic-senate   guerra de las Galaxias,   &#xf50d;</option>
                        <option value="fas fa-gamepad"> Mando   <option value="fas fa-gamepad   arcada, controlador, d-pad, joystick, video, videojuego,   &#xf11b;</option>
                        <option value="fas fa-gas-pump"> Bomba de gas   <option value="fas fa-gas-pump   coche, combustible, gasolina, gasolina,   &#xf52f;</option>
                        <option value="fas fa-gavel"> Mazo   <option value="fas fa-gavel   martillo, juez, ley, abogado, opinión,   &#xf0e3;</option>
                        <option value="fas fa-gem"> Joya   <option value="fas fa-gem   diamante, joyería, zafiro, piedra, tesoro,   &#xf3a5;</option>
                        <option value="fas fa-genderless"> Sin género   <option value="fas fa-genderless   andrógino, asexual, asexuado,   &#xf22d;</option>
                        <option value="fab fa-get-pocket"> Obtener bolsillo   <option value="fab fa-get-pocket      &#xf265;</option>
                        <option value="fab fa-gg"> Moneda GG   <option value="fab fa-gg      &#xf260;</option>
                        <option value="fab fa-gg-circle"> Moneda GG Circle   <option value="fab fa-gg-circle      &#xf261;</option>
                        <option value="fas fa-ghost"> Fantasma   <option value="fas fa-ghost   aparición, blinky, clyde, dia de fiesta, espiritu, flotante, halloween,   &#xf6e2;</option>
                        <option value="fas fa-gift"> regalo   <option value="fas fa-gift   dia de fiesta, envuelto, fiesta, generosidad, navidad, presentar, regalando,   &#xf06b;</option>
                        <option value="fas fa-gifts"> Regalos   <option value="fas fa-gifts   dia de fiesta, envuelto, fiesta, generosidad, navidad, presentar, regalando,   &#xf79c;</option>
                        <option value="fab fa-git"> Git   <option value="fab fa-git      &#xf1d3;</option>
                        <option value="fab fa-git-alt"> Git Alt   <option value="fab fa-git-alt      &#xf841;</option>
                        <option value="fab fa-git-square"> Plaza Git   <option value="fab fa-git-square      &#xf1d2;</option>
                        <option value="fab fa-github"> GitHub   <option value="fab fa-github   octocat   &#xf09b;</option>
                        <option value="fab fa-github-alt"> GitHub alternativo   <option value="fab fa-github-alt   octocat   &#xf113;</option>
                        <option value="fab fa-github-square"> Plaza de GitHub   <option value="fab fa-github-square   octocat   &#xf092;</option>
                        <option value="fab fa-gitkraken"> GitKraken   <option value="fab fa-gitkraken      &#xf3a6;</option>
                        <option value="fab fa-gitlab"> GitLab   <option value="fab fa-gitlab   Axosoft,   &#xf296;</option>
                        <option value="fab fa-gitter"> Gitter   <option value="fab fa-gitter      &#xf426;</option>
                        <option value="fas fa-glass-cheers"> Saludos de cristal   <option value="fas fa-glass-cheers   Alcohol, bar, bebidas, celebración, champán, tintineo, beber, vacaciones, Nochevieja, fiesta, brindis,   &#xf79f;</option>
                        <option value="fas fa-glass-martini"> Copa de Martini   <option value="fas fa-glass-martini   alcohol, barrita, bebida, licor,   &#xf000;</option>
                        <option value="fas fa-glass-martini-alt"> Martini de vidrio alternativo   <option value="fas fa-glass-martini-alt   alcohol, barrita, bebida, licor,   &#xf57b;</option>
                        <option value="fas fa-glass-whiskey"> Whisky de cristal   <option value="fas fa-glass-whiskey   alcohol, barrita, bebida, bourbon, whisky escocés, licor de centeno,   &#xf7a0;</option>
                        <option value="fas fa-glasses"> Ga<option value="fas   <option value="fas fa-glasses   hipster, nerd, lectura, visión, espectáculos, visión,   &#xf530;</option>
                        <option value="fab fa-glide"> Planeo   <option value="fab fa-glide      &#xf2a5;</option>
                        <option value="fab fa-glide-g"> Planeo G   <option value="fab fa-glide-g      &#xf2a6;</option>
                        <option value="fas fa-globe"> Globo   <option value="fas fa-globe   todos, coordenadas, país, tierra, global, gps, idioma, localizar, ubicación, mapa, en línea, lugar, planeta, traducir, viajar, mundo,   &#xf0ac;</option>
                        <option value="fas fa-globe-africa"> Globo with Africa shown   <option value="fas fa-globe-africa   todos, país, tierra, global, gps, idioma, localizar, ubicación, mapa, en línea, lugar, planeta, traducir, viajar, mundo,   &#xf57c;</option>
                        <option value="fas fa-globe-americas"> Globo with Americas shown   <option value="fas fa-globe-americas   todos, país, tierra, global, gps, idioma, localizar, ubicación, mapa, en línea, lugar, planeta, traducir, viajar, mundo,   &#xf57d;</option>
                        <option value="fas fa-globe-asia"> Globo with Asia shown   <option value="fas fa-globe-asia   todos, país, tierra, global, gps, idioma, localizar, ubicación, mapa, en línea, lugar, planeta, traducir, viajar, mundo,   &#xf57e;</option>
                        <option value="fas fa-globe-europe"> Globo with Europe shown   <option value="fas fa-globe-europe   todos, país, tierra, global, gps, idioma, localizar, ubicación, mapa, en línea, lugar, planeta, traducir, viajar, mundo,   &#xf7a2;</option>
                        <option value="fab fa-gofore"> Gofore   <option value="fab fa-gofore      &#xf3a7;</option>
                        <option value="fas fa-golf-ball"> Pelota de golf   <option value="fas fa-golf-ball   caddie, águila, putt, tee,   &#xf450;</option>
                        <option value="fab fa-goodreads"> Goodreads   <option value="fab fa-goodreads      &#xf3a8;</option>
                        <option value="fab fa-goodreads-g"> Goodreads G   <option value="fab fa-goodreads-g      &#xf3a9;</option>
                        <option value="fab fa-google"> Logotipo de Google   <option value="fab fa-google      &#xf1a0;</option>
                        <option value="fab fa-google-drive"> Google Drive   <option value="fab fa-google-drive      &#xf3aa;</option>
                        <option value="fab fa-google-play"> Google Play   <option value="fab fa-google-play      &#xf3ab;</option>
                        <option value="fab fa-google-plus"> Google Mas   <option value="fab fa-google-plus   google-plus-circle, google-plus-official,   &#xf2b3;</option>
                        <option value="fab fa-google-plus-g"> Google Mas G   <option value="fab fa-google-plus-g   google-plus, red social,   &#xf0d5;</option>
                        <option value="fab fa-google-plus-square"> Google Mas Square   <option value="fab fa-google-plus-square   red social,   &#xf0d4;</option>
                        <option value="fab fa-google-wallet"> Cartera de Google   <option value="fab fa-google-wallet      &#xf1ee;</option>
                        <option value="fas fa-gopuram"> Gopuram   <option value="fas fa-gopuram   edificio, entrada, hinduismo, templo, torre,   &#xf664;</option>
                        <option value="fas fa-graduation-cap"> Gorro de graduación   <option value="fas fa-graduation-cap   aprendizaje, ceremonia, colegio, graduado,   &#xf19d;</option>                     
                        
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
