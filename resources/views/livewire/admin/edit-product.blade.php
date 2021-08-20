<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8 border-b-2">CREAR UN PRODUCTO</h1>

    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-2 gap-6">

            {{-- CATEGORIA --}}
            <div>
                <x-jet-label value="Categorias" />

                <select class="w-full form-control" wire:model="category_id">
                    <option value="" selected disabled>Seleccione una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <x-jet-input-error for="category_id" />
            </div>

            {{-- SUBCATEGORIA --}}
            <div class="mb-4">
                <x-jet-label value="Sub Categorias" />

                <select class="w-full form-control" wire:model="product.subcategory_id">
                    <option  value="" selected disabled>Seleccione una sub categoria</option>
                    @foreach ($subcategories as $subcategory)
                        <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                    @endforeach
                </select>

                <x-jet-input-error for="product.subcategory_id" />
            </div>
        </div>
        
        {{-- NOMBRE DEL PRODUCTO --}}
        <div class="mb-4">
            <x-jet-label value="Nombre" />
            <x-jet-input wire:model="product.name" class="w-full" type="text" placeholder="Ingrese nombre del producto" />

            <x-jet-input-error for="product.name" />
        </div>

        {{-- SLUG DEL PRODUCTO --}}
        <div class="mb-4">
            <x-jet-label value="Slug" />
            <x-jet-input wire:model="product.slug" class="w-full bg-gray-200" disable type="text" placeholder="Ingrese slug del producto" />

            <x-jet-input-error for="slug" />
        </div>

        {{-- DESCRIPCION DEL PRODUCTO --}}
        <div class="mb-4">
            <div wire:ignore>
                <x-jet-label value="Descripción" />
                <textarea wire:model="product.description" x-data x-init="ClassicEditor
                .create( $refs.miEditor ).then(function(editor){
                    editor.model.document.on('change:data',() =>{
                        @this.set('product.description',editor.getData())
                    })
                })
                .catch( error => {
                    console.error( error );
                } );" x-ref="miEditor" class="w-full form-control" rows="4">

                </textarea>            
            </div>

            <x-jet-input-error for="product.description" />
        </div>

        <div class="grid grid-cols-2 mb-4 gap-6">
            {{-- MARCA --}}
            <div class="">
                <x-jet-label value="Marca" />

                <select wire:model="product.brand_id" class="form-control w-full">
                    <option value="" disabled selected>Seleccione un marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>

                <x-jet-input-error for="product.brand_id" />
            </div>

            {{-- PRECIO --}}
            <div>
                <x-jet-label value="Precio" />
                <x-jet-input wire:model="product.price" class="w-full form-control" step=".01" type="number" />

                <x-jet-input-error for="product.price" />
            </div>

            {{-- SI EXISTE LA PROPIEDAD COMPUTADA updatedCategoryId -> SOLO SE REFERENCIA AL NOMBRE SUBCATEGORY  --}}
            @if ($this->subcategory)            
                @if (!$this->subcategory->color && !$this->subcategory->size)
                    {{-- PRECIO --}}
                    <div>
                        <x-jet-label value="Cantidad" />
                        <x-jet-input wire:model="product.quantity" class="w-full form-control" type="number" />

                        <x-jet-input-error for="product.quantity" />
                    </div>
                            
                @endif
            @endif
            
        </div>

        <div class="flex justify-end items-center mt-3">

            <x-jet-action-message class="mr-3 text-red-500" on="saved">
                Registro Actualizado
            </x-jet-action-message>

            <x-jet-button 
                    wire:loading.attr="disabled"
                    wire:target="save"
                    wire:click="save"
                    >
                Actualizar Producto
            </x-jet-button>
        </div>
    </div>

    @if ($this->subcategory)
        @if ($this->subcategory->size)
            @livewire('admin.size-product', ['product' => $product], key('size-product-'.$product->id))
        @elseif($this->subcategory->color)
            @livewire('admin.color-product', ['product' => $product], key('color-product-'.$product->id))

        @endif
        
    @endif

</div>
