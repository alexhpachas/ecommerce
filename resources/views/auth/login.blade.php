<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{-- <x-jet-authentication-card-logo /> --}}

        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        @if (session('info'))
            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 " role="alert">
                <p class="font-bold ml-3">Información</p>
                <p class="text-sm ml-3">{{session('info')}}</p>
            </div>
        @endif       

        <style>@import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css')</style>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- component -->
            <!-- This is an example component -->
            <div class="md:flex w-full">   
                <div class="relative w-full rounded-3xl  px-5 py-4 bg-white ">
                    <div class="flex flex-1 justify-center items-center">
                        <img class="h-16 w-36 object-center" src="https://mundodetalles.com.pe/img/LOGO.png" alt="">
                    </div>
                    
                    <div class="flex mt-5">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <i class="mdi mdi-email-outline text-gray-400 text-lg"></i>
                        </div>
                        
                        <input id="email" name="email" :value="old('email')" required autofocus type="email"
                            placeholder="Correo electronico"
                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                    </div>

                    <div class="flex mt-7">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <i class="mdi mdi-lock-outline text-gray-400 text-lg"></i>
                        </div>

                        <input id="password" name="password" required autocomplete="current-password" type="password"
                            placeholder="Contraseña"
                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                    </div>

                    <div class="mt-7 flex">
                        <label for="remember_me" class="inline-flex items-center w-full cursor-pointer">
                            <input id="remember_me" name="remember" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-600">
                                {{ __('Remember me') }}
                            </span>
                        </label>

                        <div class="w-full text-right">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    </div>

                    <div class="mt-7">
                        <button
                            class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                            {{ __('Log in') }}
                        </button>
                    </div>

                    <div class="flex mt-7 items-center text-center">
                        <hr class="border-gray-300 border-1 w-full rounded-md">
                        <label class="block font-medium text-sm text-gray-600 w-full">
                            Accede con
                        </label>
                        <hr class="border-gray-300 border-1 w-full rounded-md">
                    </div>

                   

                    <div class="flex mt-7 justify-center w-full gap-4">
                        <a href="{{route('login.facebook','facebook')}}" class="bg-blue-500 px-4 py-2 font-semibold text-white inline-flex items-center space-x-2 rounded hover:shadow-inner transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                            <svg class="w-5 h-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            <span>Facebook</span>
                        </a>

                        <a href="{{route('login.facebook','google')}}" class="bg-red-500 px-4 py-2 font-semibold text-white inline-flex items-center space-x-2 rounded hover:shadow-inner transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105"">
                            <svg class="w-9 h-5 " xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            viewBox="0 0 172 172"
                            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M89.42656,165.12c-43.63156,0 -79.13344,-35.48844 -79.13344,-79.12c0,-43.63156 35.50187,-79.12 79.13344,-79.12c19.76656,0 38.68656,7.32344 53.29312,20.62656l2.66063,2.43219l-26.09563,26.09563l-2.41875,-2.06938c-7.65937,-6.5575 -17.40156,-10.17219 -27.43937,-10.17219c-23.27375,0 -42.22063,18.93344 -42.22063,42.20719c0,23.27375 18.94688,42.20719 42.22063,42.20719c16.78344,0 30.04625,-8.57312 36.29469,-23.17969h-39.73469v-35.62281l77.57469,0.1075l0.57781,2.72781c4.04469,19.20219 0.80625,47.44781 -15.5875,67.65781c-13.57188,16.72969 -33.45938,25.22219 -59.125,25.22219z"></path></g></g>
                            </svg>
                            <span>Google</span>
                        </a>
                                                                      
                    </div>

                    <div class="mt-7">
                        <div class="flex justify-center items-center">
                            <label class="mr-2">¿Eres nuevo?</label>
                            <a href="{{ route('register') }}"
                                class=" text-blue-500 transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                Crea una cuenta
                            </a>
                        </div>
                    </div>




                    {{-- <div>
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('register'))
                            <a class="underline text-sm mr-3 text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                                {{ __('Regístrate') }}
                            </a>
                        @endif

                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif                

                        <x-jet-button class="ml-4">
                            {{ __('Log in') }}
                        </x-jet-button> --}}

                </div>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
