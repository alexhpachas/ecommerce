<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{-- <x-jet-authentication-card-logo /> --}}
        </x-slot>
        

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>

<style>@import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css')</style>


    <div class="bg-white text-gray-500 rounded-3xl w-full overflow-hidden" style="max-width:1000px">
        <div class="md:flex w-full">            
            <div class="w-full px-5 md:px-10">
                <div class="flex flex-1 justify-center items-center">
                    <img class="h-16 w-36 object-center" src="https://mundodetalles.com.pe/img/LOGO.png" alt="">
                </div>
                
                <div>
                    <div class="lg:flex -mx-7 lg:-mx-12">
                        <div class="lg:w-1/2 px-2 mb-2">
                            <label for="" class="text-xs font-semibold px-1">Nombres</label>
                            <div class="flex">
                                <div class="w-10 z-10  text-center pointer-events-none flex items-center justify-center">
                                    <i class="mdi mdi-account-outline text-gray-400 text-lg"></i>
                                </div>

                                <input id="name" name="name" :value="old('name')" required autofocus autocomplete="name" type="text" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="John">
                            </div>
                        </div>
                        
                        <div class="lg:w-1/2 px-2 mb-2">
                            <label for="" class="text-xs font-semibold px-1">Apellidos</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="mdi mdi-account-outline text-gray-400 text-lg"></i>
                                </div>

                                <input id="lastname" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" type="text" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Smith">
                            </div>
                        </div>

                    </div>

                    <div class="lg:flex -mx-7 lg:-mx-12">
                        <div class="lg:w-1/2 px-2 mb-2">
                            <label for="" class="text-xs font-semibold px-1">Dni</label>
                            <div class="flex">
                                <div class="w-10 z-10  text-center pointer-events-none flex items-center justify-center">
                                    <i class="mdi mdi-contacts text-gray-400 text-lg"></i>
                                </div>

                                <input id="dni" type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==8 && event.keyCode!=8) return false;" name="dni" :value="old('dni')" required autofocus autocomplete="dni" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="21853664">
                            </div>
                        </div>
                        
                        <div class="lg:w-1/2 px-2 mb-2">
                            <label for="" class="text-xs font-semibold px-1">Celular</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="mdi mdi-tablet-android text-gray-400 text-lg"></i>
                                </div>

                                <input id="phone" type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==9 && event.keyCode!=8) return false;" name="phone" :value="old('phone')" required autofocus autocomplete="phone" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="958996352">
                            </div>
                        </div>
                        
                    </div>


                    <div class="flex -mx-7 lg:-mx-12">
                        <div class="w-full px-3 mb-2">
                            <label for="" class="text-xs font-semibold px-1">Email</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="mdi mdi-email-outline text-gray-400 text-lg"></i>
                                </div>

                                <input id="email" type="email" name="email" :value="old('email')" required class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="johnsmith@example.com">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-7 lg:-mx-12">
                        <div class="w-full px-3 mb-2">
                            <label for="" class="text-xs font-semibold px-1">Contraseña</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="mdi mdi-lock-outline text-gray-400 text-lg"></i>
                                </div>

                                <input id="password" type="password" name="password" required autocomplete="new-password" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Ingrese una contraseña">
                            </div>
                        </div>                        
                    </div>

                    <div class="flex -mx-7 lg:-mx-12">
                        <div class="w-full px-3 mb-6">
                            <label for="" class="text-xs font-semibold px-1">Confirmar Contraseña</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="mdi mdi-lock-outline text-gray-400 text-lg"></i>
                                </div>

                                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Repita su contraseña">
                            </div>
                        </div>                        
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms"/>

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif
                                       
                    <div class="flex items-center justify-center mt-4">
                        <div class="flex w-full justify-center items-center px-3 mb-5 gap-6">
                            <a class="underline w-full text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                            
                            <button class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">
                                {{ __('Register') }}
                            </button>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



            {{-- <div class="lg:flex flex-1 lg:gap-4 gap-4 w-full">
                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="">
                    <x-jet-label for="lastname" value="{{ __('Apellidos') }}" />
                    <x-jet-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
                </div>
            </div>

            <div class="flex lg:gap-4 gap-4">
                <div class="mt-4">
                    <x-jet-label for="dni" value="{{ __('Dni') }}" />
                    <x-jet-input id="dni" class="block mt-1 w-full" type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==8 && event.keyCode!=8) return false;" name="dni" :value="old('dni')" required autofocus autocomplete="dni"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="phone" value="{{ __('Celular') }}" />
                    <x-jet-input id="phone" class="block mt-1 w-full" type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==9 && event.keyCode!=8) return false;" name="phone" :value="old('phone')" required autofocus autocomplete="phone"/>
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div> --}}
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
