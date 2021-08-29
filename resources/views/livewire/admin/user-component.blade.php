<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            USUARIOS
        </h2>
    </x-slot>

    <div class="container py-9">
        <x-table-responsive>

            <div class="px-6 py-4">
                <x-jet-input wire:model="search" type="text" class="w-full" placeholder="Ingrese un nombre para buscar" />
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
                                        {{$user->id}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{$user->name}}
                                    </div>
                                    
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{$user->email}}
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
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium" >
                                    {{-- <x-jet-button wire:click="edit({{$user->id}})">
                                        EDITAR
                                    </x-jet-button> --}}
                                    <a wire:key="'usuario-'.{{$user->id}}" wire:click="edit({{$user}})" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    
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
                    {{$users->links()}}
                </div>    
            @endif
        </x-table-responsive>
    </div>


    {{-- MODAL PARA ASIGNAR ROLES DE USUARIOS --}}

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            ASIGNAR ROL DE USUARIO
            
            {{$roles}}            
            
        </x-slot>

        <x-slot name="content">
            <div class="card">
                <div class="card-body mb-4">
                    <p class="h5">Nombre</p>
                    <x-jet-input wire:model="usuario" disabled type="text" class="w-full bg-gray-100" />
                </div>

                <div class="grid grid-cols-4">
                    @foreach ($roles as $role)
                        <x-jet-label>
                            <x-jet-checkbox wire:model="rol" name="rol[]" value="{{$role->id}}" />
                                {{$role->name}}
                        
                        </x-jet-label>
                    @endforeach

                </div>

                {{-- <div class="grid grid-cols-4">
                    @foreach ($roles as $role)
                        <x-jet-label>
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="roles[]" value="{{$role->id}}" />
                                {{$role->name}}
                        
                        </x-jet-label>
                    @endforeach

                </div> --}}
                

            </div>
            
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="update({{$user}})">
                Actualizar
            </x-jet-danger-button>
            
        </x-slot>
    </x-jet-dialog-modal>
</div>
