<header class="bg-trueGray-700 sticky top-0" style="z-index: 900" x-data="dropdown()">
    <div class="container flex items-center h-16 justify-between md:justify-start">
        <a :class="{'bg-opacity-100 text-orange-500': open}" x-on:click="show()"
            class="flex flex-col items-center justify-center px-6 md:px-4 bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full order-last md:order-first">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>

            <span class="text-sm hidden md:block">Categoria</span>
        </a>

        {{-- <a href="/" class="mx-6">
            <x-jet-application-mark class="block h-9 w-auto" />
        </a> --}}
        <a href="/" class="mx-6">
            <img class="h-16 object-cover" src="{{asset('img/LOGO.png')}}" alt="">
        </a>

        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>


        <div class="mx-6 relative hidden md:block">
            @auth
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        {{-- PERFILES --}}
                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        {{-- MIS COMPRAS --}}
                        <x-jet-dropdown-link href="{{ route('orders.index') }}">
                            Mis compras
                        </x-jet-dropdown-link>

                        {{-- MIS COMPRAS --}}
                        @can('admin.index')
                            <x-jet-dropdown-link href="{{ route('admin.index') }}">
                                Dashboard
                            </x-jet-dropdown-link>
                        @endcan

                        <div class="border-t border-gray-100"></div>

                        <!-- SALIR -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>

                </x-jet-dropdown>

            @else

                {{-- EN CASO EL USUARIO NO ESTA LOGEADO --}}

                <x-jet-dropdown align="right" width="48">

                    <x-slot name="trigger">
                        <i class="fas fa-user-circle text-white text-2xl  cursor-pointer"></i>
                    </x-slot>

                    {{-- DESPEGABLE LOGIN --}}
                    <x-slot name="content">

                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>

                        {{-- DESPEGABLE REGISTRAR --}}
                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>

                    </x-slot>
                </x-jet-dropdown>

            @endauth
        </div>

        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>


    </div>

    <nav id="navigation-menu" x-show="open" :class="{'block': open, 'hidden': !open}"
        class=" bg-trueGray-700 bg-opacity-25 w-full absolute hidden">

        {{-- MENU COMPUTADORA --}}
        <div class="container h-full hidden md:block">
            <div x-on:click.away="close()" class="grid grid-cols-4 h-full relative">
                <ul class="bg-white">

                    @foreach ($categories as $category)
                        <li
                            class="navigation-link text-trueGray-500 cursor-pointer hover:bg-orange-500 hover:text-white">
                            <a href="{{route('categories.show',$category)}}" class="py-2 px-4 text-sm flex items-center">
                                <span class="flex justify-center w-9">
                                    {!! $category->icon !!}
                                </span>
                                {{ $category->name }}
                            </a>


                            <div class="navigation-submenu bg-gray-100 absolute w-3/4 h-full top-0 right-0 hidden ">

                                {{-- <div class="grid grid-cols-4 py-4 p-4">
                                    <div>
                                        <p class="text-lg font-bold text-center text-trueGray-500 mb-3">SubCategorias</p>
                                        <ul>
                                            @foreach ($category->subcategories as $subcategory)
                                                <li>
                                                    <a class="text-trueGray-500 inline-block font-semibold py-1 px-4 hover:text-orange-500"
                                                        href="">
                                                        {{ $subcategory->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
            
                                    <div class="col-span-3">
                                        <img class="h-64 w-full object-cover object-center"
                                            src="{{ Storage::url($category->image) }}" alt="">
                                    </div>
            
                                </div> --}}


                                <x-navigation-subcategories :category="$category">
                                </x-navigation-subcategories>
                            </div>
                        </li>
                    @endforeach

                </ul>

                <div class="col-span-3 bg-gray-100">

                    {{-- <div class="grid grid-cols-4 py-4 p-4">
                        <div>
                            <p class="text-lg font-bold text-center text-trueGray-500 mb-3">SubCategorias</p>
                            <ul>
                                @foreach ($categories->first()->subcategories as $subcategory)
                                    <li>
                                        <a class="text-trueGray-500 inline-block font-semibold py-1 px-4 hover:text-orange-500"
                                            href="">
                                            {{ $subcategory->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-span-3">
                            <img class="h-64 w-full object-cover object-center"
                                src="{{ Storage::url($categories->first()->image) }}" alt="">
                        </div>

                    </div> --}}
                    <x-navigation-subcategories :category="$categories->first()">
                    </x-navigation-subcategories>

                </div>

            </div>

        </div>

        {{-- MENU MOBILE --}}

        <div class="bg-white h-full overflow-y-auto">
            <div class="container bg-gray-200 py-3 mb-2">
                @livewire('search')
            </div>
            <ul>
                @foreach ($categories as $category)
                    <li class="text-trueGray-500 cursor-pointer hover:bg-orange-500 hover:text-white">
                        <a href="{{route('categories.show',$category)}}" class="py-2 px-4 text-sm flex items-center">
                            <span class="flex justify-center w-9">
                                {!! $category->icon !!}
                            </span>
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <p class="text-trueGray-500 px-6 my-2">USUARIOS</p>

            <div class="hidden md:block">
                @livewire('dropdown-cart')
            </div>

            {{-- ICONO CARRITO DE COMPRAR MOBIL --}}

            @livewire('cart-mobil')     
            
            

            @auth            

            <a href="{{ route('profile.show') }}" class="py-2 px-4 text-sm flex items-center text-trueGray-500 cursor-pointer hover:bg-orange-500 hover:text-white">
                <span class="flex justify-center w-9">
                    <i class="fas fa-address-card"></i>
                </span>
                Perfil
            </a>

            <a href="{{ route('orders.index') }}" class="py-2 px-4 text-sm flex items-center text-trueGray-500 cursor-pointer hover:bg-orange-500 hover:text-white">
                <span class="flex justify-center w-9">
                    <i class="fas fa-shopping-bag"></i>
                </span>
                Mis compras
            </a>

            @can('admin.index')
                <a href="{{ route('admin.index') }}" class="py-2 px-4 text-sm flex items-center text-trueGray-500 cursor-pointer hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-tachometer-alt"></i>
                    </span>
                    Dashboard
                </a>
            @endcan

            <a href=""
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit()"
             class="py-2 px-4 text-sm flex items-center text-trueGray-500 cursor-pointer hover:bg-orange-500 hover:text-white">
                <span class="flex justify-center w-9">
                    <i class="fas fa-sign-out-alt"></i>
                </span>
                Cerrar Sesion
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>

            @else

            <a href="{{ route('login') }}" class="py-2 px-4 text-sm flex items-center text-trueGray-500 cursor-pointer hover:bg-orange-500 hover:text-white">
                <span class="flex justify-center w-9">
                    <i class="fas fa-user-circle"></i>
                </span>
                Iniciar sesión
            </a>

            <a href="{{ route('register') }}" class="py-2 px-4 text-sm flex items-center text-trueGray-500 cursor-pointer hover:bg-orange-500 hover:text-white">
                <span class="flex justify-center w-9">
                    <i class="fas fa-fingerprint"></i>
                </span>
                Registrate
            </a>

            

            @endauth            

        </div>

    </nav>
</header>
