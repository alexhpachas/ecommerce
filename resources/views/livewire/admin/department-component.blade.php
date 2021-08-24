<div class="container py-12">

    {{-- FORMULARIO CREAR DEPARTAMENTO --}}
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Agregar nuevo departamento
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder agregar un departamento
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

    {{-- LISTA DEPARTAMENTOS --}}
    <x-jet-action-section>
        <x-slot name="title">
            LISTA DE DEPARTAMENTOS
        </x-slot>

        <x-slot name="description">
            Aqui encontrara todas los departamentos agregadas
        </x-slot>

        <x-slot name="content">
            <table class=" text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2 w-full">Nombre</th>
                        <th class="py-2">Accion</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach ($departments as $department)
                        <tr>
                            <td class="py-2">                           
                                <a href="{{route('admin.departments.show',$department)}}" class="uppercase hover:underline hover:text-blue-600">
                                    {{$department->name}}                                    
                                </a>
                            </td>
                            <td class="py-2">
                                <span>
                                    <div class="flex divide-x divide-gray-300 font-semibold">
                                        <a wire:click="edit({{$department}})" class="pr-2 hover:text-blue-600 cursor-pointer" >Editar</a>
                                        <a wire:click="$emit('deleteDepartment',{{$department}})" class="pl-2 hover:text-rojo-600 cursor-pointer">Eliminar</a>
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

                    <x-jet-input wire:model.defer="editForm.name" class="w-full mt-1" type="text" />

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


    @push('script')   
        {{-- <script>
            Livewire.on('deleteDepartment', departmentId =>{            
                        Swal.fire({
                        title: 'Desea Eliminar el Departamento?',
                        text: "No podra recuperar el registro!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Si, Eliminar!'
                        }).then((result) => {
                        if (result.isConfirmed) {

                            Livewire.emitTo('admin.department-component','delete',departmentId)
    
                        }
                        })
                    })
        </script> --}}

        <script>
            Livewire.on('deleteDepartment',departmentId =>{

            
            Swal.fire({
            title: 'Desea Eliminar el Departamento?',            
            showCancelButton: true,           
            cancelButtonColor: '#d33',
            confirmButtonText: `Si, Eliminar`,
            cancelButtonText: 'Cancelar',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Livewire.emitTo('admin.department-component','delete',departmentId)
            }
            })
        })
        </script>
    @endpush

</div>
