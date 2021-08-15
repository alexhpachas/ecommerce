<x-app-layout>
    
    <div class="container py-8">
        <ul>
            @forelse ($products as $product)
               
                <x-products-list :product="$product">
    
                </x-products-list>
            @empty
                    
                <li class="bg-white rounded-lg shadow-lg">
                    <div class="p-4">
                        <p class="text-gray-700 text-2xlg">
                            No se encontro ningún producto que coincida con la busqueda...!
                        </p>

                    </div>
                </li>    

            @endempty
                
            
        </ul>

        <div class="mt-4">

            {{$products->links()}}

        </div>

    </div>
</x-app-layout>