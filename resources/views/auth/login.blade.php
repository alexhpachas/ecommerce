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

                   

                    <div class="flex mt-7 justify-center w-full">
                        <a href="{{route('login.facebook','facebook')}}"
                            class="mr-5 bg-blue-500 border-none px-4 py-2 rounded-xl cursor-pointer text-white shadow-xl hover:shadow-inner transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">

                            Facebook
                        </a>
                        
                        <a href="{{route('login.facebook','google')}}"
                            class="bg-red-500 border-none px-4 py-2 rounded-xl cursor-pointer text-white shadow-xl hover:shadow-inner transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">

                            Google
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
