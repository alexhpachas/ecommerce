<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-600 capitalize">
                DEPARTAMENTO: {{$department->name}}
            </h2>                      
        </div>
    </x-slot>

    <div class="container py-12">

        {{-- FORMULARIO CREAR UNA CUIDAD --}}
        <x-jet-form-section submit="save" class="mb-6">
            <x-slot name="title">
                Agregar una nueva Cuidad
            </x-slot>
    
            <x-slot name="description">
                Complete la información necesaria para poder agregar una cuidad
            </x-slot>
    
            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">             
                    <x-jet-label>
                        Nombre
                    </x-jet-label>
    
                    <x-jet-input wire:model.defer="createForm.name" type="text" class="w-full" />
                    <x-jet-input-error for="createForm.name" />
                </div>

                <div class="col-span-6 sm:col-span-4">             
                    <x-jet-label>
                        Costo de envío
                    </x-jet-label>
    
                    <x-jet-input wire:model.defer="createForm.cost" type="number" class="w-full" />
                    <x-jet-input-error for="createForm.cost" />
                </div>
            </x-slot>
    
            <x-slot name="actions">
    
                <x-jet-button>
                    Agregar
                </x-jet-button>
                
            </x-slot>
    
        </x-jet-form-section>
    
        {{-- LISTA CUIDADES --}}
        <x-jet-action-section>
            <x-slot name="title">
                LISTA DE CUIDADES
            </x-slot>
    
            <x-slot name="description">
                Aqui encontrara todas las cuidades agregadas
            </x-slot>
    
            <x-slot name="content">
                <table class=" text-gray-600">
                    <thead class="border-b border-gray-300">
                        <tr class="text-left">
                            <th class="py-2 w-full">Nombre</th>
                            <th class="py-2 w-full">Costo de envío</th>
                            <th class="py-2 w-full">Accion</th>
                        </tr>
                    </thead>
    
                    <tbody class="divide-y divide-gray-300 justify-center">
                        @foreach ($cities as $city)
                            <tr>
                                <td class="py-2">                           
                                    <a href="{{route('admin.cities.show',$city)}}"  class="uppercase hover:underline hover:text-blue-600">
                                        {{$city->name}}                                    
                                    </a>
                                </td>

                                <td class="py-2">                           
                                    <span  class="uppercase ">
                                        {{$city->cost}}                                    
                                    </span>
                                </td>
                                <td class="py-2">
                                    <span>
                                        <div class="flex divide-x divide-gray-300 font-semibold">
                                            <a wire:click="edit({{$city}})" class="pr-2 hover:text-blue-600 cursor-pointer" >Editar</a>
                                            <a wire:click="$emit('deleteCity',{{$city}})" class="pl-2 hover:text-rojo-600 cursor-pointer">Eliminar</a>
                                        </div>
                                        
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-slot>
        </x-jet-action-section>
    
        {{-- MODAL PARA EDITAR DEPARTAMENTO --}}
        <x-jet-dialog-modal wire:model="editForm.open">
            <x-slot name="title">
                EDITAR DEPARTAMENTO
            </x-slot>
    
            <x-slot name="content">
                <div class="space-y-3">                
    
                    <div>
                        <x-jet-label>
                            Nombre
                        </x-jet-label>
    
                        <x-jet-input wire:model="editForm.name" class="w-full mt-1" type="text" />
    
                        <x-jet-input-error for="editForm.name" />
                    </div>

                    <div>
                        <x-jet-label>
                            Costo de envío
                        </x-jet-label>
    
                        <x-jet-input wire:model="editForm.cost" class="w-full mt-1" type="text" />
    
                        <x-jet-input-error for="editForm.cost" />
                    </div>
                </div>
                
            </x-slot>
    
            <x-slot name="footer">
                <x-jet-danger-button 
                            wire:click="update"
                            wire:target="update"
                            wire:loading.attr="disabled">
                    ACTUALIZAR
                </x-jet-danger-button>
                
            </x-slot>
        </x-jet-dialog-modal>
    
    </div>

    @push('script')
        
    
        <script>
            Livewire.on('deleteCity',CityId =>{

            
            Swal.fire({
            title: 'Desea Eliminar la Cuidad?',            
            showCancelButton: true,           
            cancelButtonColor: '#d33',
            confirmButtonText: `Si, Eliminar`,
            cancelButtonText: 'Cancelar',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Livewire.emitTo('admin.show-department','delete',CityId)
            }
            })
        })
        </script>
    @endpush
</div>
