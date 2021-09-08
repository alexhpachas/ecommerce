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
                                    @can('admin.users.create')
                                        <a wire:key="'usuario-'.{{$user->id}}" wire:click="edit({{$user}})" class="text-indigo-600 hover:text-indigo-900">Edit</a>    
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
                    {{$users->links()}}
                </div>    
            @endif
        </x-table-responsive>
    </div>


    {{-- MODAL PARA ASIGNAR ROLES DE USUARIOS --}}

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            <div class="text-center border-b-2">
                DAR ACCESOS DE USUARIO                                                  
            </div>
            
        </x-slot>
        
        <x-slot name="content">
            <div class="card">
                <div class="card-body mb-4">
                    <p class="h5">Nombre</p>
                    <x-jet-input wire:model="usuarioName" disabled type="text" class="w-full bg-gray-100" />
                </div>

                {{-- <div class="grid grid-cols-2 lg:grid-cols-4">
                    @foreach ($permisos as $permiso)
                        <x-jet-label class="text-sm">
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]" value="{{$permiso->id}}" />
                                {{$permiso->description}}
                        
                        </x-jet-label>
                    @endforeach

                </div> --}}

                {{-- <div class="grid grid-cols-4">
                    @foreach ($roles as $role)
                        <x-jet-label>
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="roles[]" value="{{$role->id}}" />
                                {{$role->name}}
                        
                        </x-jet-label>
                    @endforeach

                </div> --}}
                

            </div>

            <div class="flex lg:space-x-14 md:space-x-8">
                {{-- <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="w-full">
                                MODULOS
                            </th>
                            <th>
                                VER
                            </th>
                            <th>
                                CREAR
                            </th>
                            <th>
                                EDITAR
                            </th>
                            <th>
                                ELIMINAR
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td >
                                <div>
                                    <p class="border-b-2 text-sm">PRODUCTOS</p>
                                    <p class="border-b-2 text-sm">MARCAS</p>
                                    <p class="border-b-2 text-sm">CATEGORIA</p>
                                    <p class="border-b-2 text-sm">SUBCATEGORIA</p>
                                    <p class="border-b-2 text-sm">DEPARTAMENTO</p>
                                    <p class="border-b-2 text-sm">PROVINCIA</p>
                                    <p class="border-b-2 text-sm">DISTRITO</p>
                                    <p class="border-b-2 text-sm">COLORES</p>
                                    <p class="border-b-2 text-sm">COMPRAS</p>
                                    <p class="border-b-2 text-sm">USUARIOS</p>
                                </div>
                            </td>
                            <td>
                                <div class="mt-5">
                                    @foreach ($permisosList as $permisoList)
                                        <x-jet-label class="text-sm border-b-2">
                                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]" value="{{$permisoList->id}}" />                                            
                                        </x-jet-label>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div class="mt-5">
                                    @foreach ($permisosCreate as $permisoCreate)
                                        <x-jet-label class="text-sm border-b-2">
                                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]" value="{{$permisoCreate->id}}" />                            
                                        </x-jet-label>                                                                                       
                                    @endforeach
                                    <x-jet-label>
                                        <x-jet-checkbox disabled />    
                                    </x-jet-label>
                                    <x-jet-label>
                                        <x-jet-checkbox disabled />
                                    </x-jet-label>   
                                    <x-jet-label>
                                        <x-jet-checkbox disabled />
                                    </x-jet-label>   
                                                                                                                                                                                                                                                                                         
                                </div>
                            </td>
                            <td>
                                <div class="-mt-1">
                                    @foreach ($permisosEdit as $permisoEdit)
                                        <x-jet-label class="text-sm border-b-2">
                                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]" value="{{$permisoEdit->id}}" />                                                
                                        </x-jet-label>
                                    @endforeach
                                    <x-jet-label>
                                        <x-jet-checkbox disabled />    
                                    </x-jet-label>
                                      
                                </div>
                            </td>
                            <td>
                                <div>
                                    @foreach ($permisosDelete as $permisoDelete)
                                        <x-jet-label class="text-sm">
                                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]" value="{{$permisoDelete->id}}" />
                                                
                                        </x-jet-label>
                                    @endforeach

                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table> --}}
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
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]" value="{{$permisoList->id}}" />                                                            
                        </x-jet-label>
                    @endforeach
                    @foreach ($permisosDashbor as $dash)
                        <x-jet-label class="text-sm">
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]" value="{{$dash->id}}" />                                
                        </x-jet-label>                        
                    @endforeach
                    
                    @foreach ($permisosAcceso as $permisoAcceso)
                        <x-jet-label class="text-sm">
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]" value="{{$permisoAcceso->id}}" />                                
                        </x-jet-label>                        
                    @endforeach
                    @foreach ($permisospublicar as $permisopublicar)
                        <x-jet-label class="text-sm">
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]" value="{{$permisopublicar->id}}" />                                
                        </x-jet-label>                        
                    @endforeach
                </div>
                
                <div class="w-8 lg:space-x-8">
                    <span class="lg:font-bold lg:ml-4 text-sm">crear</span>
                    @foreach ($permisosCreate as $permisoCreate)
                        <x-jet-label class="text-sm">
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]" value="{{$permisoCreate->id}}" />
                                
                        </x-jet-label>
                    @endforeach
                </div>

                <div class="w-8 lg:space-x-5 text-sm mt-1">
                    <span class="lg:font-bold -m-2 ml-1">edit</span>                    
                    @foreach ($permisosEdit as $permisoEdit)
                        <x-jet-label class="text-sm">
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]" value="{{$permisoEdit->id}}" />
                                                                 
                        </x-jet-label>
                    @endforeach
                
                </div>

                <div class="w-8 lg:space-x-5 text-sm mt-1">
                    <span class="lg:font-bold">delete</span>                    
                    @foreach ($permisosDelete as $permisoDelete)
                        <x-jet-label class="text-sm">
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="createForm.roles[]" value="{{$permisoDelete->id}}" />
                                
                        </x-jet-label>
                    @endforeach                    
                </div>
            </div>            
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="update({{$user}})">
                Actualizar
            </x-jet-danger-button>
            
        </x-slot>
    </x-jet-dialog-modal>
</div>
