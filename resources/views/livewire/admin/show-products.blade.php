<div>
    
    @can('admin.products.index')            
    <x-slot name="header">
        <div class="flex items-center w-full">

            <span class="font-semibold lg:text-xl text-sm text-gray-600 uppercase">LISTA DE PRODUCTOS</span>                 

            @can('admin.products.create')
                <x-button-enlace class="ml-auto text-center" href="{{route('admin.products.create')}}">
                    CREAR PRODUCTO
                </x-button-enlace>                
            @endcan
            
        </div>
    </x-slot>
    

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container py-9">

        {{-- BOTON BUSCADOR --}}
        <div class="px-6 py-4">
            <x-jet-input wire:model="search" class="w-full uppercase " type="text" placeholder="Ingrese el nombre del producto que quiere buscar" />
        </div>

        {{-- DIBUJAMOS LA TABLE DE PRODUCTOS --}}
        <x-table-responsive>
            @if ($products->count())                            
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Categoria
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Precio
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($products as $product)                                            
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            @if ($product->images->count())                                                                                            
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                    src="{{Storage::url($product->images->first()->url)}}"
                                                    alt="">
                                            @else
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                    src="{{ asset('img/product-default.png') }}"
                                                    alt="">

                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium uppercase text-gray-900">
                                                {{$product->name}}
                                            </div>                                        
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 uppercase">
                                        {{$product->subcategory->category->name}}
                                    </div>
                                    
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @switch($product->status)
                                        @case(1)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 uppercase">
                                                BORRADOR
                                            </span>
                                            
                                            @break
                                        @case(2)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 uppercase">
                                                PUBLICADO
                                            </span>
                                            
                                            @break
                                        @default
                                            
                                    @endswitch
                                    
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                    S/. {{$product->price}}                                    
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    @can('admin.products.edit')                                           
                                        <a href="{{route('admin.products.edit',$product)}}" class="flex divide-x divide-gray-300 font-semibold text-right">
                                            <svg class="cursor-pointer focus:outline-none w-7 mr-2  bg-yellow-500 text-white border rounded-lg p-1 transform  hover:bg-yellow-700 hover:scale-110"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                    @endcan
                                    
                                </td>
                            </tr>
                        @endforeach
            
                        <!-- More people... -->
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No se encontraron productos coincidente..! 
                </div>
            @endif
            @if ($products->hasPages())
                <div class="px-6 py-4">
                    {{$products->links()}}
                </div>                
            @endif
                
        </x-table-responsive>
    </div>
    @endcan
</div>

