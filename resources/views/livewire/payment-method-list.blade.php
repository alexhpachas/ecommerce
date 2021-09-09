<div>
    <section class="card relative">
        <div wire:loading.flex class="absolute w-full h-full bg-gray-100 bg-opacity-25 z-30 flex items-center justify-center">
            <x-spiner class="" size="20">

            </x-spiner>
        </div>

        <div class="px-6 py-4 bg-gray-50">
            <h1 class="text-lg font-bold text-gray-700">Metodos de pago agregados</h1>

        </div>

        <div class="card-body divide-y divide-gray-300 relative">
            
            @forelse ($paymentMethods as $paymentMethod)
                <article class="text-sm text-gray-700 py-2 flex justify-between items-center">
                    <div>
                        <h1><span class="font-bold">{{$paymentMethod->billing_details->name}}</span>  xxxx{{$paymentMethod->card->last4}}
                            @if ($paymentMethod->id == auth()->user()->DefaultPaymentMethod()->id)
                            <span class="font-semibold text-red-500"> (Default)</span>
                        @endif
                        </h1>
                        
                        <p> Expira el {{$paymentMethod->card->exp_month}}/{{$paymentMethod->card->exp_year}} - <span class="uppercase font-semibold">{{$paymentMethod->card->brand}}</span></p>
                    </div>
                    <div class="grid grid-cols-2 border border-gray-200 rounded text-gray-500 divide-x divide-gray-200">
                        @unless ($paymentMethod->id == auth()->user()->DefaultPaymentMethod()->id)
                            <i wire:click="defaultPaymentMethod('{{$paymentMethod->id}}')" class="fas fa-star cursor-pointer p-3 hover:text-gray-700"></i>                                           
                            <i  wire:click="deletePaymentMethod('{{$paymentMethod->id}}')" class="fas fa-trash p-3 cursor-pointer hover:underline hover:text-red-600"></i>                            
                        @endunless                                                                      
                    </div>

                </article>

            @empty

                <article class="p-2">
                    <h1 class="text-sm text-gray-700">No cuenta con ningún metodo de pago</h1>
                </article>
                
            
                
            @endforelse
            

        </div>

    </section>
</div>
