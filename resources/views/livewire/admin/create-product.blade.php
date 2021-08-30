<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    
    <h1 class="text-3xl text-center font-semibold mb-8 border-b-2">CREAR UN PRODUCTO</h1>

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

            <select class="w-full form-control" wire:model="subcategory_id">
                <option  value="" selected disabled>Seleccione una sub categoria</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="subcategory_id" />
        </div>
    </div>
    
    {{-- NOMBRE DEL PRODUCTO --}}
    <div class="mb-4">
        <x-jet-label value="Nombre" />
        <x-jet-input wire:model="name" class="w-full" type="text" placeholder="Ingrese nombre del producto" />

        <x-jet-input-error for="name" />
    </div>

    {{-- SLUG DEL PRODUCTO --}}
    <div class="mb-4">
        <x-jet-label value="Slug" />
        <x-jet-input wire:model="slug" class="w-full bg-gray-200" disable type="text" placeholder="Ingrese slug del producto" />

        <x-jet-input-error for="slug" />
    </div>

    {{-- DESCRIPCION DEL PRODUCTO --}}
    <div class="mb-4">
        <div wire:ignore>
            <x-jet-label value="Descripción" />
            <textarea wire:model="description" x-data x-init="ClassicEditor
            .create( $refs.miEditor ).then(function(editor){
                editor.model.document.on('change:data',() =>{
                    @this.set('description',editor.getData())
                })
            })
            .catch( error => {
                console.error( error );
            } );" x-ref="miEditor" class="w-full form-control" rows="4">

            </textarea>            
        </div>

        <x-jet-input-error for="description" />
    </div>

    <div class="grid grid-cols-2 mb-4 gap-6">
        {{-- MARCA --}}
        <div class="">
            <x-jet-label value="Marca" />

            <select wire:model="brand_id" class="form-control w-full">
                <option value="" disabled selected>Seleccione un marca</option>
                @foreach ($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="brand_id" />
        </div>

        {{-- PRECIO --}}
        <div>
            <x-jet-label value="Precio" />
            <x-jet-input wire:model="price" class="w-full form-control" step=".01" type="number" />

            <x-jet-input-error for="price" />
        </div>

    @if ($subcategory_id)
    
        @if (!$this->subcategory->color && !$this->subcategory->size)
                {{-- PRECIO --}}
                <div>
                    <x-jet-label value="Cantidad" />
                    <x-jet-input wire:model="quantity" class="w-full form-control" type="number" />

                    <x-jet-input-error for="quantity" />
                </div>
                    
             @endif
         @endif
         
    </div>

    <div class="flex mt-3">
        <x-jet-button class="ml-auto" 
                wire:loading.attr="disabled"
                wire:target="save"
                wire:click="save"
                 >
            Crear Producto
        </x-jet-button>
    </div>

</div>
