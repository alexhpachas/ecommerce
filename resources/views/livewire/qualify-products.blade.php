<div class="container py-1 px-8">

    <div class="container"> 
        @if ($qualified == 0)
            <x-button-enlace color='red' class="cursor-pointer" wire:click="abrir">
                Calificar Producto
            </x-button-enlace>                                
        @else
            <x-button-enlace class="cursor-pointer" wire:click="edit({{$order->id}})">
                Editar Calificacion
            </x-button-enlace>                        
        @endif                
    </div>

    {{-- MODAL PARA GUARDAR UNA CALIFICACION  --}}
    <x-jet-dialog-modal class="z-999999"  wire:model="open">
        <x-slot name="title">
            <div class="font-bold text-xl">
                CALIFICA ESTE PRODUCTO                 
            </div>
        </x-slot>
           
        <x-slot name="content">
            <div class="flex space-x-6 justify-center">
                <div wire:click="$set('qualification',1)" class="cursor-pointer {{$qualification >= 1 ? 'text-yellow-400' : 'text-gray-300'}}">
                    @if ($qualification >= 1 )
                        <i class="fas fa-star fa-lg"></i>                        
                    @else
                        <i class="fas fa-star fa-lg"></i>                        
                    @endif                    
                </div>

                <div wire:click="$set('qualification',2)" class="cursor-pointer {{$qualification >= 2 ? 'text-yellow-400' : 'text-gray-300'}}">
                    @if ($qualification >= 2 )
                        <i class="fas fa-star fa-lg"></i>                        
                    @else
                        <i class="fas fa-star fa-lg"></i>                                              
                    @endif                    
                </div>

                <div wire:click="$set('qualification',3)" class="cursor-pointer {{$qualification >= 3 ? 'text-yellow-400' : 'text-gray-300'}}">
                    @if ($qualification >= 3 )
                        <i class="fas fa-star fa-lg"></i>                        
                    @else
                        <i class="fas fa-star fa-lg"></i>                                              
                    @endif                    
                </div>

                <div wire:click="$set('qualification',4)" class="cursor-pointer {{$qualification >= 4 ? 'text-yellow-400' : 'text-gray-300'}}">
                    @if ($qualification >= 4 )
                        <i class="fas fa-star fa-lg"></i>                        
                    @else
                        <i class="fas fa-star fa-lg"></i>                                          
                    @endif                    
                </div>

                <div wire:click="$set('qualification',5)" class="cursor-pointer {{$qualification == 5 ? 'text-yellow-400' : 'text-gray-300'}}">
                    @if ($qualification == 5 )
                        <i class="fas fa-star fa-lg "></i>                       
                    @else
                        <i class="fas fa-star fa-lg"></i>                                               
                    @endif                    
                </div>                                    
            </div>
                       
            @error('qualification')
                <span class="text-sm text-red-600">Seleccionar un puntaje</span>                               
            @enderror

            <div class="flex mt-6">   
                <span class="flex justify-start text-sm ">Tú opinión acerca de este producto, es importante. </span>
                <span class="text-sm font-bold">(Maximo 255 caracteres)</span>            
            </div>
            <div class=" flex flex-1">
                <textarea wire:model="comment" class="w-full" name="" id="" cols="" rows="4">Lorem ipsum, Suscipit laborum quisquam sed amet, corrupti rerum cumque ab vitae autem perspiciatis eius ipsum.</textarea>                
            </div>  
            <x-jet-input-error for="comment" />
            
        </x-slot>
    
        <x-slot name="footer">
            <div class="flex-1">
                @if ($this->qualification > 0 & $this->comment != null)
                    <x-jet-secondary-button wire:click="save({{$order->id}})" class="w-full text-center justify-center">
                        ENVIAR
                    </x-jet-secondary-button>
                @else
                    <x-jet-secondary-button disabled wire:click="save" class="w-full text-center justify-center">
                        ENVIAR
                    </x-jet-secondary-button>
                @endif                    
            </div>
    
    
        </x-slot>
    </x-jet-dialog-modal>

    {{-- MODAL PARA EDITAR UNA CALIFICACION  --}}
    <x-jet-dialog-modal class="z-999999"  wire:model="openM">
        <x-slot name="title">
            <div class="font-bold text-xl">
                MODIFICAR CALIFICACIÓN
           
            </div>
        </x-slot>
           
        <x-slot name="content">
            <div class="flex space-x-6 justify-center">
                <div wire:click="$set('qualification',1)" class="cursor-pointer {{$qualification >= 1 ? 'text-yellow-400' : 'text-gray-300'}}">
                    @if ($qualification >= 1 )
                        <i class="fas fa-star fa-lg"></i>                        
                    @else
                        <i class="fas fa-star fa-lg"></i>                        
                    @endif                    
                </div>

                <div wire:click="$set('qualification',2)" class="cursor-pointer {{$qualification >= 2 ? 'text-yellow-400' : 'text-gray-300'}}">
                    @if ($qualification >= 2 )
                        <i class="fas fa-star fa-lg"></i>                        
                    @else
                        <i class="fas fa-star fa-lg"></i>                                              
                    @endif                    
                </div>

                <div wire:click="$set('qualification',3)" class="cursor-pointer {{$qualification >= 3 ? 'text-yellow-400' : 'text-gray-300'}}">
                    @if ($qualification >= 3 )
                        <i class="fas fa-star fa-lg"></i>                        
                    @else
                        <i class="fas fa-star fa-lg"></i>                                              
                    @endif                    
                </div>

                <div wire:click="$set('qualification',4)" class="cursor-pointer {{$qualification >= 4 ? 'text-yellow-400' : 'text-gray-300'}}">
                    @if ($qualification >= 4 )
                        <i class="fas fa-star fa-lg"></i>                        
                    @else
                        <i class="fas fa-star fa-lg"></i>                                          
                    @endif                    
                </div>

                <div wire:click="$set('qualification',5)" class="cursor-pointer {{$qualification == 5 ? 'text-yellow-400' : 'text-gray-300'}}">
                    @if ($qualification == 5 )
                        <i class="fas fa-star fa-lg "></i>                       
                    @else
                        <i class="fas fa-star fa-lg"></i>                                               
                    @endif                    
                </div>                                    
            </div>
                       
            @error('qualification')
                <span class="text-sm text-red-600">Seleccionar un puntaje</span>                               
            @enderror

            <div class="flex mt-6">   
                <span class="flex justify-start text-sm ">Tú opinión acerca de este producto, es importante. </span>
                <span class="text-sm font-bold">(Maximo 255 caracteres)</span>            
            </div>
            <div class=" flex flex-1">
                <textarea wire:model="comment" class="w-full" name="" id="" cols="" rows="4">Lorem ipsum, Suscipit laborum quisquam sed amet, corrupti rerum cumque ab vitae autem perspiciatis eius ipsum.</textarea>                
            </div>  
            <x-jet-input-error for="comment" />
            
        </x-slot>
    
        <x-slot name="footer">
            <div class="flex-1">
                @if ($this->qualification > 0 & $this->comment != null)
                    <x-jet-secondary-button wire:click="update" class="w-full text-center justify-center">
                        ACTUALIZAR
                    </x-jet-secondary-button>
                @else
                    <x-jet-secondary-button disabled wire:click="save" class="w-full text-center justify-center">
                        ENVIAR
                    </x-jet-secondary-button>
                @endif                    
            </div>
    
    
        </x-slot>
    </x-jet-dialog-modal>

    <style>
        .jetstream-modal{
            z-index: 999;
        }

    </style>



</div>




