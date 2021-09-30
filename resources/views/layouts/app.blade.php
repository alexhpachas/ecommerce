<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('img/icono.ico') }}" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{-- STYLO BOTON WHATZAP --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/whatsapp.css') }}"> --}}

    <link rel="stylesheet" href="{{ asset('css/whats.css') }}">
    <link rel="stylesheet" href="{{ asset('css/whats2.css') }}">

    {{-- FONT AWESOME --}}

    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    {{-- GLIDER CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.css"
        integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- FLEX SLIDER --}}

    <link rel="stylesheet" href="{{ asset('vendor/FlexSlider/flexslider.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    {{-- CDN GLIDER JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js"
        integrity="sha512-tHimK/KZS+o34ZpPNOvb/bTHZb6ocWFXCtdGqAlWYUcz+BGHbNbHMKvEHUyFxgJhQcEO87yg5YqaJvyQgAEEtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- JSQUERY --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- FLEX SLIDER JS --}}

    <script src="{{ asset('vendor/FlexSlider/jquery.flexslider-min.js') }}"></script>

    {{-- JS STRIPE --}}
    <script src="https://js.stripe.com/v3/"></script>

    

    @isset($css)
        {{ $css }}
    @endisset
</head>

<body class="font-sans antialiased">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            <a href="https://api.whatsapp.com/send?phone=51912425976&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a> --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <div class="nav-bottom">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <div class="popup-whatsapp fadeIn">
            <div class="content-whatsapp -top"><button type="button" class="closePopup">
                    <i class="material-icons icon-font-color">close</i>
                </button>

                <p> <img src="{{asset('img/logo.png')}}" width="90"> </p>
                <p class="mt-3"> Hola, ¿en que podemos ayudarle?</p>

            </div>
            <div class="content-whatsapp -bottom mt-2">
                <input class="whats-input" id="whats-in" type="text" Placeholder="Enviar mensaje..." />

                <button class="send-msPopup" id="send-btn" type="button">
                    <i class="material-icons icon-font-color--black">send</i>
                </button>

            </div>
        </div>
        <button type="button" id="whats-openPopup" class="whatsapp-button">
            <div class="float">
                <i class="fa fa-whatsapp my-float"></i>
            </div>
        </button>
        <div class="circle-anime"></div>

        <script src="{{ asset('js/script2.js') }}"></script>
    </div>

    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation')

        <!-- Page Heading -->
        {{-- @if (isset($header))
                <header class="bg-white shadow">
                    
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    @isset($js)
        {{ $js }}
    @endisset

    <script>
        function dropdown() {
            return {
                open: false,
                show() {
                    if (this.open) {
                        //Se cierra el menu
                        this.open = false;

                        //Mostramos el Scrollbar
                        document.getElementsByTagName('html')[0].style.overflow = 'auto'
                    } else {
                        //Esta abriendo el menu
                        this.open = true;

                        //Ocultamos el Scrollbar
                        document.getElementsByTagName('html')[0].style.overflow = 'hidden'
                    }
                },
                close() {
                    //Se cierra el menu
                    this.open = false;

                    //Mostramos el Scrollbar
                    document.getElementsByTagName('html')[0].style.overflow = 'auto'
                }
            }
        }
    </script>


    @stack('script')
</body>

<footer class="bg-white shadow py-6">

    <div class="container flex">

        <p class="text-sm text-gray-700 mb-0 text-secondary hidden md:block">Copyright © 2021</p><span
            class="block md:ml-3 text-sm text-info font-bold text-green-600">Atlantyc System</span>

        <div class="ml-auto ">
            <a class="text-sm text-blue-400 hover:underline hover:text-blue-600"
                href="{{ route('politicas.index') }}">Politicas de privacidad</a>
            <a class="text-sm text-blue-400 hover:underline hover:text-blue-600 ml-4"
                href="{{ route('terminos.index') }}">Terminos y condiciones</a>
        </div>

    </div>


</footer>

</html>
