<div>
    <div wire:click="edit({{$method}})" class="flex divide-x divide-gray-300 font-semibold text-right">
        <svg class="cursor-pointer focus:outline-none w-7 mr-2  bg-yellow-500 text-white border rounded-lg p-1 transform  hover:bg-yellow-700 hover:scale-110"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
        </svg>
    </div>   
    
    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            <div class="border-b-2 text-center">
                MODIFICAR METODO DE PAGO   
            </div>
        </x-slot>
    
        <x-slot name="content">
            <div class="mb-5">
                <x-jet-label>
                    Nombre del titular
                </x-jet-label>
    
                <x-jet-input wire:model="editForm.name" class="w-full uppercase" type="text" />    
                <x-jet-input-error for="editForm.name" />        
            </div>        
    
            <div class="mb-5">
                <x-jet-label>
                    Celular del titular
                </x-jet-label>
    
                <x-jet-input wire:model='editForm.celular' class="w-full" type="number" />

                <x-jet-input-error for="editForm.celular" />
            </div>
    
            <div class="mb-5 border mt-1 py-3 px-4">
                <div class="items-center">                  
                    <x-jet-label class="mb-3">
                        Codigo QR 
                    </x-jet-label>                    

                    <div class="flex items-center">
                        @if ($editImage)
                            <img class="w-28 h-28 object-cover object-center" src="{{ $editImage->temporaryUrl() }}"
                                alt="">
                        @else                            
                            <img class="w-28 h-28 object-cover object-center" src="{{ Storage::url($editForm['qr']) }}"
                                alt="">
                        @endif
                        {{-- <img class="w-28 h-28" src="{{$editForm['qr']}}" alt="">              --}}                                        
    
                        <input class="ml-auto flex" wire:model="editImage" class="mt-1" accept="image/*" type="file" id="edit-Image{{$rand}}">
                    </div>

                    <x-jet-input-error for="editForm" />
                </div>
            </div>
    
            <div class="mb-5 flex">
                <x-jet-label>
                    DESACTIVAR METODO DE PAGO
                </x-jet-label>
    
                <div class="flex justify-items-start ml-3">
                    <label for="toogleButton{{$method->id}}" class="flex items-center cursor-pointer">                                
                        <div class="relative">
                            <input wire:model="editForm.status" name="status1" id="toogleButton{{$method->id}}" type="checkbox" class="hidden" />
                            
                            <div class="toggle-path bg-gray-200 w-9 h-5 rounded-full shadow-inner">
    
                            </div>
                            
                            <div class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
    
                            </div>
                        </div>   

                        <x-jet-input-error for="editForm.status" />                             
                    </label>
                </div>    
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <div>
                <x-jet-danger-button wire:click="update({{$method->id}})"  wire:target="editImage,update" wire:loading.attr="disabled">
                    ACTUALIZAR
                </x-jet-danger-button>

                <x-jet-secondary-button wire:click="cancelar">
                    CANCELAR
                </x-jet-secondary-button>
            </div>
            
        </x-slot>
    
        <style>
            .toggle-path {
                transition: background 0.3s ease-in-out;
            }
            .toggle-circle {
                top: 0.2rem;
                left: 0.25rem;
                transition: all 0.3s ease-in-out;
            }
            input:checked ~ .toggle-circle {
                transform: translateX(100%);
            }
            input:checked ~ .toggle-path {
                background-color:#81E6D9;
            }
        </style>
    </x-jet-dialog-modal>
</div>





