<div>
    {{-- TITULO DEL DISTRITO --}}
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-600 capitalize">
                CUIDAD: {{$city->name}}
            </h2>                      
        </div>
    </x-slot>

    <div class="container py-12">

        {{-- FORMULARIO CREAR UN DISTRITO --}}
        <x-jet-form-section submit="save" class="mb-6">
            <x-slot name="title">
                Agregar un nuevo distrito
            </x-slot>
    
            <x-slot name="description">
                Complete la información necesaria para poder agregar un distrito
            </x-slot>
    
            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">             
                    <x-jet-label>
                        Nombre
                    </x-jet-label>
    
                    <x-jet-input wire:model.defer="createForm.name" type="text" class="w-full" />
                    <x-jet-input-error for="createForm.name" />
                </div>
                
            </x-slot>
    
            <x-slot name="actions">
    
                <x-jet-button>
                    Agregar
                </x-jet-button>
                
            </x-slot>
    
        </x-jet-form-section>
    
        {{-- LISTA DISTRITOS --}}
        <x-jet-action-section>
            <x-slot name="title">
                LISTA DE DISTRITOS
            </x-slot>
    
            <x-slot name="description">
                Aqui encontrara todas los distritos agregados
            </x-slot>
    
            <x-slot name="content">
                <table class=" text-gray-600">
                    <thead class="border-b border-gray-300">
                        <tr class="text-left">
                            <th class="py-2 w-full">Nombre</th>                            
                            <th class="py-2 w-full">Accion</th>
                        </tr>
                    </thead>
    
                    <tbody class="divide-y divide-gray-300 justify-center">
                        @foreach ($districts as $district)
                            <tr>
                                <td class="py-2">                           
                                    {{$district->name}}  
                                    {{-- <a href="{{route('admin.cities.show',$district)}}"  class="uppercase hover:underline hover:text-blue-600">
                                                                          
                                    </a> --}}
                                </td>
                                
                                <td class="py-2">
                                    <span>
                                        <div class="flex divide-x divide-gray-300 font-semibold">
                                            <a wire:click="edit({{$district}})" class="pr-2 hover:text-blue-600 cursor-pointer" >Editar</a>
                                            <a wire:click="$emit('deleteDistrict',{{$district}})" class="pl-2 hover:text-rojo-600 cursor-pointer">Eliminar</a>
                                        </div>
                                        
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-slot>
        </x-jet-action-section>
    
        {{-- MODAL PARA EDITAR DISTRITO --}}
        <x-jet-dialog-modal wire:model="editForm.open">
            <x-slot name="title">
                EDITAR DISTRITO
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
        {{-- <script>
            Livewire.on('deleteDistrict', DistrictId =>{            
                        Swal.fire({
                        title: 'Desea Eliminar el Distrito?',
                        text: "No podra recuperar el registro!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Si, Eliminar!'
                        }).then((result) => {
                        if (result.isConfirmed) {

                            Livewire.emitTo('admin.city-component','delete',DistrictId)
    
                        }
                        })
                    })
        </script> --}}
        
        <script>
            Livewire.on('deleteDistrict',DistrictId =>{

            
            Swal.fire({
            title: 'Desea Eliminar el Distrito?',            
            showCancelButton: true,           
            cancelButtonColor: '#d33',
            confirmButtonText: `Si, Eliminar`,
            cancelButtonText: 'Cancelar',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Livewire.emitTo('admin.city-component','delete',DistrictId)
            }
            })
        })
        </script>
    @endpush
</div>
