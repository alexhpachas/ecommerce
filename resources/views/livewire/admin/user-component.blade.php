<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            USUARIOS
        </h2>
    </x-slot>

    <div class="container py-9">
        <x-table-responsive>

            <div class="px-6 py-4">
                <x-jet-input wire:model="search" type="text" class="w-full"
                    placeholder="Ingrese un nombre para buscar" />
            </div>

            @if ($users->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Id
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Dni
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr class="uppercase hover:bg-gray-200">
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="">
                                        {{ $user->id }}
                                    </div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm ">
                                        {{ $user->name }}
                                    </div>

                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm ">
                                        {{ $user->email }}
                                    </div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap text-sm ">
                                    <div class="text-sm ">
                                        {{-- @if (count($user->roles))
                                            Admin
                                        @else
                                            No tiene rol
                                        @endif --}}
                                        {{$user->dni}}
                                    </div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap text-right text-sm font-medium flex justify-end items-center">

                                    @can('admin.users.create')
                                        <div wire:key="'usuario-'.{{ $user->id }}" wire:click="edit({{ $user }})" class="flex divide-x divide-gray-300 font-semibold text-right">
                                            <svg class="cursor-pointer focus:outline-none w-7 mr-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"                                               
                                                viewBox="0 0 172 172"
                                                style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#000000"><path d="M86,17.2112c-24.3208,0 -34.4,15.6004 -34.4,34.4c0,6.3296 3.02344,12.68724 3.02344,12.68724c-1.21547,0.69947 -3.21443,2.91979 -2.7099,6.86432c0.94027,7.35587 4.12925,9.22906 6.15885,9.38386c0.774,6.8628 8.14761,15.64152 10.72761,16.92005v11.46667c-0.01257,0.03771 -0.04303,0.06335 -0.05599,0.10078c-1.896,0.23536 -3.58757,1.3542 -4.44557,3.09063l-1.79167,3.60573c-14.15017,7.93421 -45.30677,5.967 -45.30677,39.06953h59.08021l6.85312,-22.45183l-6.52839,-11.94817h9.23828h9.26068c1.95507,-4.82747 4.70769,-9.22664 8.09609,-13.06797v-9.86536c2.58,-1.27853 9.95361,-10.05725 10.72761,-16.92005c2.0296,-0.1548 5.21858,-2.02799 6.15885,-9.38386c0.50454,-3.95027 -1.49443,-6.16485 -2.70989,-6.86432c0,0 3.02344,-5.74418 3.02344,-12.68724c0,-13.92053 -5.46387,-25.8 -17.2,-25.8c0,0 -4.0764,-8.6 -17.2,-8.6zM135.81953,103.2c-0.62493,0 -1.15177,0.47246 -1.22058,1.09739l-0.13437,1.25417c-0.17773,1.61107 -1.39624,2.88127 -2.97864,3.2138c-1.032,0.21787 -2.03731,0.48518 -3.02344,0.80625c-1.53653,0.4988 -3.21936,0.00251 -4.17683,-1.29896l-0.75026,-1.01901c-0.37267,-0.50453 -1.05664,-0.64554 -1.6013,-0.33593l-3.07942,1.78046c-0.54467,0.31533 -0.75618,0.98318 -0.50391,1.55651l0.51511,1.18698c0.64787,1.4792 0.23524,3.18281 -0.96302,4.26641c-0.774,0.69373 -1.50653,1.43199 -2.20599,2.20599c-1.08361,1.204 -2.78721,1.61662 -4.26641,0.96302l-1.18698,-0.51511c-0.57333,-0.25227 -1.24118,-0.04076 -1.55651,0.50391l-1.78047,3.07942c-0.31533,0.54467 -0.16859,1.22864 0.33594,1.6013l1.01901,0.75026c1.30147,0.95747 1.79776,2.63455 1.29896,4.17682c-0.32107,0.98613 -0.59412,1.99144 -0.80625,3.02344c-0.33253,1.5824 -1.60274,2.80091 -3.2138,2.97864l-1.05261,0.11198c-0.81413,0.08027 -1.28776,0.60684 -1.28776,1.23177v3.54974c0,0.62493 0.47246,1.15177 1.09739,1.22057l1.25417,0.14558c1.61107,0.17773 2.88127,1.38505 3.2138,2.96745c0.21787,1.032 0.48518,2.0485 0.80625,3.03464c0.4988,1.53653 0.00251,3.21936 -1.29896,4.17683l-1.01901,0.73906c-0.50453,0.37267 -0.64554,1.06783 -0.33593,1.6125l1.78046,3.06823c0.31533,0.54467 0.98318,0.76737 1.55651,0.51511l1.18698,-0.51511c1.4792,-0.64787 3.18281,-0.23524 4.26641,0.96302c0.69373,0.774 1.43199,1.50652 2.20599,2.20599c1.204,1.08361 1.61662,2.78721 0.96302,4.26641l-0.51511,1.17578c-0.25227,0.57333 -0.04076,1.25238 0.50391,1.56771l3.07942,1.76927c0.54467,0.31533 1.22864,0.1686 1.6013,-0.33593l0.75026,-1.01901c0.95747,-1.30147 2.63455,-1.78656 4.17682,-1.28776c0.98613,0.32107 1.99144,0.58292 3.02344,0.79505c1.5824,0.33253 2.80091,1.60847 2.97864,3.2138l0.13438,1.26536c0.05733,0.6192 0.58444,1.0862 1.20937,1.0862h3.54974c0.62493,0 1.15177,-0.47246 1.22057,-1.09739l0.14558,-1.25417c0.17773,-1.61107 1.38505,-2.88127 2.96745,-3.2138c1.032,-0.21787 2.0485,-0.48518 3.03464,-0.80625c1.53653,-0.4988 3.21936,-0.00251 4.17683,1.29896l0.73906,1.01901c0.37267,0.50453 1.06783,0.64554 1.6125,0.33593l3.06823,-1.78046c0.54467,-0.31533 0.76737,-0.98318 0.51511,-1.55651l-0.51511,-1.18698c-0.64787,-1.4792 -0.23524,-3.18281 0.96302,-4.26641c0.774,-0.69373 1.50652,-1.43199 2.20599,-2.20599c1.08361,-1.204 2.78721,-1.61662 4.26641,-0.96302l1.17578,0.51511c0.57333,0.25227 1.25238,0.04076 1.56771,-0.50391l1.76927,-3.07942c0.31533,-0.54467 0.1686,-1.22864 -0.33593,-1.6013l-1.01901,-0.75026c-1.30147,-0.95747 -1.78656,-2.63455 -1.28776,-4.17682c0.32107,-0.98613 0.58292,-1.99144 0.79505,-3.02344c0.33253,-1.5824 1.61393,-2.80091 3.225,-2.97864c0.45867,-0.0516 0.88723,-0.09424 1.25417,-0.13438c0.6192,-0.05733 1.0862,-0.58444 1.0862,-1.20937v-3.56094c0,-0.62493 -0.47246,-1.15177 -1.09739,-1.22058l-1.25417,-0.13437c-1.61107,-0.17773 -2.88127,-1.39624 -3.2138,-2.97864c-0.21787,-1.032 -0.48518,-2.03731 -0.80625,-3.02344c-0.4988,-1.53653 -0.00251,-3.21936 1.29896,-4.17683l1.01901,-0.75026c0.50453,-0.37267 0.64554,-1.05664 0.33593,-1.6013l-1.78046,-3.07942c-0.31533,-0.54467 -0.98318,-0.75618 -1.55651,-0.50391l-1.18698,0.51511c-1.4792,0.64787 -3.18281,0.23524 -4.26641,-0.96302c-0.69373,-0.774 -1.43199,-1.50653 -2.20599,-2.20599c-1.204,-1.08361 -1.61662,-2.78721 -0.96302,-4.26641l0.51511,-1.18698c0.25227,-0.57333 0.04076,-1.24118 -0.50391,-1.55651l-3.07942,-1.78047c-0.54467,-0.31533 -1.22864,-0.16859 -1.6013,0.33594l-0.75026,1.01901c-0.95747,1.30147 -2.63455,1.79776 -4.17682,1.29896c-0.98613,-0.32107 -1.99144,-0.59412 -3.02344,-0.80625c-1.5824,-0.33253 -2.80091,-1.60847 -2.97864,-3.2138l-0.13438,-1.25417c-0.05733,-0.61347 -0.58444,-1.0862 -1.20937,-1.0862zM137.6,120.4c9.50013,0 17.2,7.69987 17.2,17.2c0,9.50013 -7.69987,17.2 -17.2,17.2c-9.50013,0 -17.2,-7.69987 -17.2,-17.2c0,-9.50013 7.69987,-17.2 17.2,-17.2zM137.6,131.86667c-3.1648,0 -5.73333,2.56853 -5.73333,5.73333c0,3.1648 2.56853,5.73333 5.73333,5.73333c3.1648,0 5.73333,-2.56853 5.73333,-5.73333c0,-3.1648 -2.56853,-5.73333 -5.73333,-5.73333z"></path></g></g>
                                            </svg>
                                            {{-- <svg class="cursor-pointer focus:outline-none w-7 mr-2 bg-yellow-500 text-white border rounded-lg p-1 transform  hover:bg-yellow-700 hover:scale-110"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg> --}}
                                        </div>
                                        
                                    @endcan


                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            @else
                <div class="px-6 py-4">
                    No hay registros coincidentes.
                </div>

            @endif

            @if ($users->hasPages())
                <div class="px-6 py-4">
                    {{ $users->links() }}
                </div>
            @endif
        </x-table-responsive>
    </div>




    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            <div class="text-center border-b-2">
                DAR ACCESOS DE USUARIO
            </div>
        </x-slot>

        <x-slot name="content">           
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
                    max-height: 100vh;
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
                    color: #6574cd;
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

            <div class="card">
                <div class="card-body mb-1">
                    <p class="h5">Nombre</p>
                    <x-jet-input wire:model="usuarioName" disabled type="text" class="w-full bg-gray-100" />
                </div>
            </div>

            <body class="font-sans w-full container">
                <div class="w-full  p-2">
                    <p class="font-bold">Accesos y Control de Modulos - <strong>Mundo Detalles</strong></p>
                    <div class="shadow-md">
                        <div class="tab w-full overflow-hidden border-t">
                            <input class="absolute opacity-0" id="tab-multi-ten" type="radio" name="tabs2">
                            <label class="block p-1 leading-normal cursor-pointer" for="tab-multi-ten">MODULO USUARIOS</label>
                            <div
                                class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                <p class="p-2">
                                    @foreach ($usuarios as $usuario)
                                        <x-jet-label class="text-sm">
                                            <x-jet-checkbox wire:model.defer="createForm.roles"
                                                name="createForm.roles[]" value="{{ $usuario->id }}" />
                                            {{ $usuario->description }}
                                        </x-jet-label>
                                    @endforeach
                                </p>
                            </div>
                        </div>

                        <div class="tab w-full overflow-hidden border-t">
                            <input class="absolute opacity-0 " id="tab-multi-one" type="radio" name="tabs2">
                            <label class="block p-1 leading-normal cursor-pointer" for="tab-multi-one">MODULO PRODUCTOS</label>
                            <div
                                class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                <p class="p-2">
                                    @foreach ($productos as $producto)
                                        <x-jet-label class="text-sm">
                                            <x-jet-checkbox wire:model.defer="createForm.roles"
                                                name="createForm.roles[]" value="{{ $producto->id }}" />
                                            {{ $producto->description }}
                                        </x-jet-label>
                                    @endforeach
                                </p>
                            </div>
                        </div>

                        <div class="tab w-full overflow-hidden border-t">
                            <input class="absolute opacity-0" id="tab-multi-two" type="radio" name="tabs2">
                            <label class="block p-1 leading-normal cursor-pointer" for="tab-multi-two">MODULO MARCAS</label>
                            <div
                                class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                <p class="p-2">
                                    @foreach ($marcas as $marca)
                                        <x-jet-label class="text-sm">
                                            <x-jet-checkbox wire:model.defer="createForm.roles"
                                                name="createForm.roles[]" value="{{ $marca->id }}" />
                                            {{ $marca->description }}
                                        </x-jet-label>
                                    @endforeach

                                </p>
                            </div>
                        </div>
                        <div class="tab w-full overflow-hidden border-t">
                            <input class="absolute opacity-0" id="tab-multi-three" type="radio" name="tabs2">
                            <label class="block p-1 leading-normal cursor-pointer" for="tab-multi-three">MODULO CATEGORIAS</label>
                            <div
                                class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                <p class="p-2">
                                    @foreach ($categorias as $categoria)
                                        <x-jet-label class="text-sm">
                                            <x-jet-checkbox wire:model.defer="createForm.roles"
                                                name="createForm.roles[]" value="{{ $categoria->id }}" />
                                            {{ $categoria->description }}
                                        </x-jet-label>
                                    @endforeach
                                </p>
                            </div>
                        </div>

                        <div class="tab w-full overflow-hidden border-t">
                            <input class="absolute opacity-0" id="tab-multi-four" type="radio" name="tabs2">
                            <label class="block p-1 leading-normal cursor-pointer" for="tab-multi-four">MODULO SUBCATEGORIAS</label>
                            <div
                                class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                <p class="p-2">
                                    @foreach ($subcategorias as $subcategoria)
                                        <x-jet-label class="text-sm">
                                            <x-jet-checkbox wire:model.defer="createForm.roles"
                                                name="createForm.roles[]" value="{{ $subcategoria->id }}" />
                                            {{ $subcategoria->description }}
                                        </x-jet-label>
                                    @endforeach
                                </p>
                            </div>
                        </div>

                        <div class="tab w-full overflow-hidden border-t">
                            <input class="absolute opacity-0" id="tab-multi-five" type="radio" name="tabs2">
                            <label class="block p-1 leading-normal cursor-pointer" for="tab-multi-five">MODULO DEPARTAMENTO</label>
                            <div
                                class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                <p class="p-2">
                                    @foreach ($departamentos as $departamento)
                                        <x-jet-label class="text-sm">
                                            <x-jet-checkbox wire:model.defer="createForm.roles"
                                                name="createForm.roles[]" value="{{ $departamento->id }}" />
                                            {{ $departamento->description }}
                                        </x-jet-label>
                                    @endforeach
                                </p>
                            </div>
                        </div>

                        <div class="tab w-full overflow-hidden border-t">
                            <input class="absolute opacity-0" id="tab-multi-six" type="radio" name="tabs2">
                            <label class="block p-1 leading-normal cursor-pointer" for="tab-multi-six">MODULO PROVINCIA</label>
                            <div
                                class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                <p class="p-2">
                                    @foreach ($provincias as $provincia)
                                        <x-jet-label class="text-sm">
                                            <x-jet-checkbox wire:model.defer="createForm.roles"
                                                name="createForm.roles[]" value="{{ $provincia->id }}" />
                                            {{ $provincia->description }}
                                        </x-jet-label>
                                    @endforeach
                                </p>
                            </div>
                        </div>

                        <div class="tab w-full overflow-hidden border-t">
                            <input class="absolute opacity-0" id="tab-multi-seven" type="radio" name="tabs2">
                            <label class="block p-1 leading-normal cursor-pointer" for="tab-multi-seven">MODULO DISTRITO</label>
                            <div
                                class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                <p class="p-2">
                                    @foreach ($distritos as $distrito)
                                        <x-jet-label class="text-sm">
                                            <x-jet-checkbox wire:model.defer="createForm.roles"
                                                name="createForm.roles[]" value="{{ $distrito->id }}" />
                                            {{ $distrito->description }}
                                        </x-jet-label>
                                    @endforeach
                                </p>
                            </div>
                        </div>

                        <div class="tab w-full overflow-hidden border-t">
                            <input class="absolute opacity-0" id="tab-multi-height" type="radio" name="tabs2">
                            <label class="block p-1 leading-normal cursor-pointer" for="tab-multi-height">MODULO COLORES</label>
                            <div
                                class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                <p class="p-2">
                                    @foreach ($colores as $colore)
                                        <x-jet-label class="text-sm">
                                            <x-jet-checkbox wire:model.defer="createForm.roles"
                                                name="createForm.roles[]" value="{{ $colore->id }}" />
                                            {{ $colore->description }}
                                        </x-jet-label>
                                    @endforeach
                                </p>
                            </div>
                        </div>

                        <div class="tab w-full overflow-hidden border-t">
                            <input class="absolute opacity-0" id="tab-multi-nine" type="radio" name="tabs2">
                            <label class="block p-1 leading-normal cursor-pointer" for="tab-multi-nine">MODULO VENTAS</label>
                            <div
                                class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                <p class="p-2">
                                    @foreach ($ventas as $venta)
                                        <x-jet-label class="text-sm">
                                            <x-jet-checkbox wire:model.defer="createForm.roles"
                                                name="createForm.roles[]" value="{{ $venta->id }}" />
                                            {{ $venta->description }}
                                        </x-jet-label>
                                    @endforeach
                                </p>
                            </div>
                        </div> 
                        
                        <div class="tab w-full overflow-hidden border-t">
                            <input class="absolute opacity-0" id="tab-multi-eleven" type="radio" name="tabs2">
                            <label class="block p-1 leading-normal cursor-pointer" for="tab-multi-eleven">MODULO DE REPORTES</label>
                            <div
                                class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                <p class="p-2">
                                    @foreach ($reportes as $reporte)
                                        <x-jet-label class="text-sm">
                                            <x-jet-checkbox wire:model.defer="createForm.roles"
                                                name="createForm.roles[]" value="{{ $reporte->id }}" />
                                            {{ $reporte->description }}
                                        </x-jet-label>
                                    @endforeach
                                </p>
                            </div>
                        </div> 

                        <div class="tab w-full overflow-hidden border-t">
                            <input class="absolute opacity-0" id="tab-multi-tuelf" type="radio" name="tabs2">
                            <label class="block p-1 leading-normal cursor-pointer" for="tab-multi-tuelf">MODULO METODOS DE PAGO</label>
                            <div
                                class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                <p class="p-2">
                                    @foreach ($metodos as $metodos)
                                        <x-jet-label class="text-sm">
                                            <x-jet-checkbox wire:model.defer="createForm.roles"
                                                name="createForm.roles[]" value="{{ $metodos->id }}" />
                                            {{ $metodos->description }}
                                        </x-jet-label>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>



            </body>

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

            </html>
            

            {{-- <div class="flex lg:space-x-14 md:space-x-8">

                <div class="col-span-2 ">
                    <span class="font-bold -mb-1 ">MODULOS </span>
                    <p class="text-sm mt-1  ">PRODUCTOS</p>
                    <p class="text-sm -mb-0">MARCAS</p>
                    <p class="text-sm ">CATEGORIA</p>
                    <p class="text-sm -mb-0">SUBCATEGORIA</p>
                    <p class="text-sm ">DEPARTAMENTO</p>
                    <p class="text-sm ">PROVINCIA</p>
                    <p class="text-sm ">DISTRITO</p>
                    <p class="text-sm ">COLORES</p>
                    <p class="text-sm">VENTAS</p>
                    <p class="text-sm">USUARIOS</p>
                    <p class="text-sm">DASHBOARD</p>
                    <p class="text-sm">DAR ACCESOS</p>
                    <p class="text-sm">PUBLICAR PRODUCTO</p>

                </div>

                <div class="w-8 lg:space-x-12">
                    <span class="lg:font-bold lg:ml-11 text-sm">ver</span>
                    @foreach ($permisosList as $permisoList)
                        <x-jet-label class="text-sm">
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]"
                                value="{{ $permisoList->id }}" />
                        </x-jet-label>
                    @endforeach
                    @foreach ($permisosDashbor as $dash)
                        <x-jet-label class="text-sm">
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]"
                                value="{{ $dash->id }}" />
                        </x-jet-label>
                    @endforeach

                    @foreach ($permisosAcceso as $permisoAcceso)
                        <x-jet-label class="text-sm">
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]"
                                value="{{ $permisoAcceso->id }}" />
                        </x-jet-label>
                    @endforeach
                    @foreach ($permisospublicar as $permisopublicar)
                        <x-jet-label class="text-sm">
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]"
                                value="{{ $permisopublicar->id }}" />
                        </x-jet-label>
                    @endforeach
                </div>

                <div class="w-8 lg:space-x-8">
                    <span class="lg:font-bold lg:ml-4 text-sm">crear</span>
                    @foreach ($permisosCreate as $permisoCreate)
                        <x-jet-label class="text-sm">
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]"
                                value="{{ $permisoCreate->id }}" />

                        </x-jet-label>
                    @endforeach
                </div>

                <div class="w-8 lg:space-x-5 text-sm mt-1">
                    <span class="lg:font-bold -m-2 ml-1">edit</span>
                    @foreach ($permisosEdit as $permisoEdit)
                        <x-jet-label class="text-sm">
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]"
                                value="{{ $permisoEdit->id }}" />

                        </x-jet-label>
                    @endforeach

                </div>

                <div class="w-8 lg:space-x-5 text-sm mt-1">
                    <span class="lg:font-bold">delete</span>
                    @foreach ($permisosDelete as $permisoDelete)
                        <x-jet-label class="text-sm">
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]"
                                value="{{ $permisoDelete->id }}" />

                        </x-jet-label>
                    @endforeach
                </div>
            </div> --}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="update({{ $user }})">
                Actualizar
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
</div>
