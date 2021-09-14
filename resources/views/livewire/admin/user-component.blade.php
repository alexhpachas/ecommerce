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
                                Rol
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-gray-900">
                                        {{ $user->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $user->name }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $user->email }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        @if (count($user->roles))
                                            Admin
                                        @else
                                            No tiene rol
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                    @can('admin.users.create')
                                        <a wire:key="'usuario-'.{{ $user->id }}" wire:click="edit({{ $user }})"
                                            class="text-indigo-600 hover:text-indigo-900">Edit</a>
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
