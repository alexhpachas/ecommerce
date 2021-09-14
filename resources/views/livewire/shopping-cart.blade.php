<div class="container py-8">
    
    <x-table-responsive>
        <div class="flex border-b border-red-300 mb-3 bg-white py-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-600 bg-white ml-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />            
            </svg>
            {{-- <div class="px-6 py-4 bg-white"> --}}
                <h1 class="text-4xl font-semibold ml-3 text-red-600 ">Mi Carrito</h1>
            {{-- </div> --}}
            
        </div>       

        {{-- SI HAY PRODUCTOS EN EL CARRITO DE COMPRAS ARMAMOS LA TABLA --}}
        @if (Cart::count())                    
        <div class="{{ Cart::content()->count() > 4 ? 'overflow-y-auto h-80' : ''}}">
            <table class="min-w-full divide-y divide-gray-200 ">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Precio
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Cantidad
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total
                        </th>        
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            
                        </th>        
                    </tr>
              </thead>
              
                <tbody class="bg-white divide-y divide-gray-200 ">
                    
                    @foreach (Cart::content() as $item)                        
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 object-cover object-center rounded-full" src="{{$item->options->image}}" alt="">
                                    </div>

                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{$item->name}}                                                                                        
                                        </div>

                                        <div class="text-sm text-gray-500">
                                            @if ($item->options->color)
                                                <span class="mr-1">Color: {{__($item->options->color)}}</span>                                                                                                                                
                                            @endif

                                            @if ($item->options->size)
                                                <span class="mx-1">-</span>
                                                <span>{{__($item->options->size)}}</span>
                                            @endif
                                        </div>
                                    </div>
                              </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">                              
                                <div class="text-sm text-gray-500">
                                    <span>{{$item->price}}</span>
                                </div>                                
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">
                              
                                    @if ($item->options->size)

                                        @livewire('update-cart-item-size', ['rowId' => $item->rowId], key($item->rowId))

                                    @elseif($item->options->color)

                                        @livewire('update-cart-item-color', ['rowId' => $item->rowId], key($item->rowId))
                                        
                                    @else

                                        @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                            
                                    @endif
                                </div>                              
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap ">
                                <div class="text-sm font-semibold text-red-500">
                                    S/. {{$item->price * $item->qty}}
                                </div>
                            </td>

                            <td class="px-6 py-4 ">
                                <div>
                                    <a wire:click="delete('{{$item->rowId}}')" 
                                    wire:target="delete"
                                    wire:loading.attr="hidden"                                   
                                    
                                    class="cursor-pointer text-red-600 hover:text-black">
                                    <i class="fas fa-times-circle "></i>
                                    </a>
                                </div>
                               
                                    
                                 
                                <div wire:loading wire:target="delete">
                                    <span class="inline-flex items-center border border-transparent text-base leading-6 font-medium rounded-md   duration-150">
                                        <svg class="animate-spin h-4 w-4 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        
                                      </span>
                                    
                                </div>
                            </td>
                            
                          </tr>
                        
                    @endforeach
                    
                
                </tbody>
            
            </table>
        </div>

            {{-- PROBANDO ESTO --}}

            {{-- <div class="container flex justify-end">
                <p class="text-gray-700">
                    <span class="font-semibold text-lg">Total: </span> S/.{{Cart::subtotal()}}
                </p>

            </div> --}}

        {{-- BOTON ELIMINAR CARRITO DE COMPRAS --}}
            <div class="px-6 py-4">
                <a wire:click="destroy" class="text-sm cursor-pointer hover:underline hover:text-red-600 mt-3 inline-block">
                    <i class="fas fa-trash"></i>
                    Vaciar carrito de compras
                </a>
            </div>

        {{-- SI NO HAY PRODUCTOS EN EL CARRITO DE COMPRAS MOSTRAMOS UN MENSAJE --}}
        @else
            <div class="flex flex-col items-center">
                <x-cart />                                    

                <p class="text-gray-700 font-bold text-2xl ml-4">
                    Su carrito está vacio.
                </p>
                <p class="text-gray-700"> Para seguir comprando, navegar por las categorías en el sitio, o busque su producto.</p>

                <x-button-enlace color="gray" href="/" class="mt-4 mb-4">
                    SEGUIR COMPRANDO
                </x-button-enlace>
            </div>                    
        @endif        
    </x-table-responsive>

    
     
  

    {{-- SI EXISTE PRODUCTOS EN EL CARRITO MOSTRAMOS EL BOTON PARA QUE PUEDA CONTINUAR CON EL PROCESO DE COMPRA --}}
    @if (Cart::count())
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-700">
                        <span class="font-semibold text-lg">Total: </span> S/.{{Cart::subtotal()}}
                    </p>

                </div>

                <div>
                    <x-button-enlace href="{{route('orders.create')}}">
                        Continuar
                    </x-button-enlace>
                </div>

            </div>
        </div>
        
    @else
        
    @endif
</div>
