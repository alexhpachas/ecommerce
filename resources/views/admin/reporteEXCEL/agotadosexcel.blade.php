<table class="min-w-full divide-y divide-gray-200">

    @php
        $total = 0;
    @endphp
    <thead class="bg-gray-50">
        <tr>

        </tr>
        <tr>
            <th align="center">
                <h1>REPORTE STOCK DE AGOTADOS
                    @if ($categoria != null || $subcategoria || null & ($marca != null))
                        - {{ $categoria }}
                    @endif
                    @if ($subcategoria != null)
                        - {{ $subcategoria }}
                    @endif
                    @if ($marca != null)
                        - {{ $marca }}
                    @endif
                </h1>
            </th>
        </tr>

        <tr class="cabecera">
            <th width="8" scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                CODIGO
            </th>
            <th width="30" scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                PRODUCTO
            </th>
            <th width="12" scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                PUBLICADO
            </th>
            <th width="18" scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                CATEGORIA
            </th>
            <th width="25" scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                SUBCATEGORIA
            </th>
            <th width="10" scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                MARCA
            </th>
            <th width="10" scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                TALLA
            </th>
            <th width="10" scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                COLOR
            </th>
            <th width="8" scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                STOCK
            </th>
            <th width="10" scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                PRECIO UND
            </th>
            <th width="14" scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                TOTAL
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($productosAgotados as $producto)

            @if ($producto->sizes->count())
                @foreach ($producto->sizes as $size)
                    @if ($size->colors->count())
                        @foreach ($size->colors as $color)
                            @if ($color->pivot->quantity <= 5)

                                <tr class="hover:bg-gray-100 hover:cursor-pointer hover:text-red-600">
                                    <td class="py-1 whitespace-nowrap">
                                        <div class="text-sm">
                                            {{ $producto->id }}
                                        </div>
                                    </td>

                                    <td class="py-1 whitespace-nowrap uppercase">
                                        <div class="text-sm">
                                            {{ $producto->name }}
                                        </div>
                                    </td>

                                    <td class="py-1 whitespace-nowrap uppercase">
                                        <div class="text-sm">
                                            @switch($producto->status)
                                                @case(1)
                                                    <span class="text-red-500 font-bold">NO</span>
                                                @break
                                                @case(2)
                                                    <span class="text-green-600 font-bold">SI</span>
                                                @break
                                                @default

                                            @endswitch
                                        </div>
                                    </td>

                                    <td class="py-1 whitespace-nowrap uppercase">
                                        <div class="text-sm">
                                            {{ $producto->subcategory->category->name }}
                                        </div>
                                    </td>

                                    <td class="py-1 whitespace-nowrap uppercase">
                                        <div class="text-sm">
                                            {{ $producto->subcategory->name }}
                                        </div>
                                    </td>

                                    <td class="py-1 whitespace-nowrap uppercase">
                                        <div class="text-sm">
                                            {{ $producto->brand->name }}
                                        </div>
                                    </td>
                                    <td class="py-1 whitespace-nowrap uppercase">
                                        <div class="text-sm">
                                            {{ $size->name }}
                                        </div>
                                    </td>
                                    <td class="py-1 whitespace-nowrap uppercase">
                                        <div class="text-sm">
                                            {{ __($color->name) }}
                                        </div>
                                    </td>

                                    <td class="py-1 whitespace-nowrap uppercase">
                                        <div class="text-sm">
                                            <span>
                                                {{ $color->pivot->quantity }}
                                            </span>

                                        </div>
                                    </td>

                                    <td align="right" class="py-1 whitespace-nowrap uppercase">
                                        <div class="text-sm text-red-600">{{ number_format($producto->price, 2) }}
                                        </div>
                                    </td>

                                    <td align="right" class="py-1 whitespace-nowrap uppercase">
                                        <div class="text-sm text-red-600">
                                            {{ number_format($producto->price * $color->pivot->quantity, 2) }}</div>
                                    </td>

                                </tr>

                                @php
                                    $total = $total + $producto->price * $color->pivot->quantity;
                                @endphp

                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endif

            @if ($producto->colors->count())
                @foreach ($producto->colors as $item)
                    @if ($item->pivot->quantity <= 5)
                        <tr class="hover:bg-gray-100 hover:cursor-pointer hover:text-red-600">
                            <td class="py-1 whitespace-nowrap">
                                <div class="text-sm ml-1">
                                    {{ $producto->id }}
                                </div>
                            </td>

                            <td class="py-1 whitespace-nowrap uppercase">
                                <div class="text-sm">
                                    {{ $producto->name }}
                                </div>
                            </td>

                            <td class="py-1 whitespace-nowrap uppercase">
                                <div class="text-sm">
                                    @switch($producto->status)
                                        @case(1)
                                            <span class="text-red-500 font-bold">NO</span>
                                        @break
                                        @case(2)
                                            <span class="text-green-600 font-bold">SI</span>
                                        @break
                                        @default

                                    @endswitch
                                </div>
                            </td>

                            <td class="py-1 whitespace-nowrap uppercase">
                                <div class="text-sm">
                                    {{ $producto->subcategory->category->name }}
                                </div>
                            </td>

                            <td class="py-1 whitespace-nowrap uppercase">
                                <div class="text-sm">
                                    {{ $producto->subcategory->name }}
                                </div>
                            </td>

                            <td class="py-1 whitespace-nowrap uppercase">
                                <div class="text-sm">
                                    {{ $producto->brand->name }}
                                </div>
                            </td>
                            <td class="py-1 whitespace-nowrap uppercase">
                                <div class="text-sm">

                                </div>
                            </td>
                            <td class="py-1 whitespace-nowrap uppercase">
                                <div class="text-sm">
                                    {{ __($item->name) }}
                                </div>
                            </td>

                            <td class="py-1 whitespace-nowrap uppercase">
                                <div class="text-sm">
                                    <span>
                                        {{ $item->pivot->quantity }}
                                    </span>

                                </div>
                            </td>

                            <td align="right" class="py-1 whitespace-nowrap uppercase">
                                <div class="text-sm text-red-600"> {{ number_format($producto->price, 2) }}</div>
                            </td>

                            <td align="right" class="py-1 whitespace-nowrap uppercase">
                                <div class="text-sm text-red-600">{{ $producto->price * $item->pivot->quantity }}
                                </div>
                            </td>
                        </tr>

                        @php
                            $total = $total + $producto->price * $item->pivot->quantity;
                        @endphp
                    @endif
                @endforeach
            @endif

            @if ($producto->quantity != null)
                @if ($producto->quantity <= 5)
                    <tr class="hover:bg-gray-100 hover:cursor-pointer hover:text-red-600">
                        <td class="py-1 whitespace-nowrap">
                            <div class="text-sm ml-1">
                                {{ $producto->id }}
                            </div>
                        </td>

                        <td class="py-1 whitespace-nowrap uppercase">
                            <div class="text-sm">
                                {{ $producto->name }}
                            </div>
                        </td>

                        <td class="py-1 whitespace-nowrap uppercase">
                            <div class="text-sm">
                                @switch($producto->status)
                                    @case(1)
                                        <span class="text-red-500 font-bold">NO</span>
                                    @break
                                    @case(2)
                                        <span class="text-green-600 font-bold">SI</span>
                                    @break
                                    @default

                                @endswitch
                            </div>
                        </td>

                        <td class="py-1 whitespace-nowrap uppercase">
                            <div class="text-sm">
                                {{ $producto->subcategory->category->name }}
                            </div>
                        </td>

                        <td class="py-1 whitespace-nowrap uppercase">
                            <div class="text-sm">
                                {{ $producto->subcategory->name }}
                            </div>
                        </td>

                        <td class="py-1 whitespace-nowrap uppercase">
                            <div class="text-sm">
                                {{ $producto->brand->name }}
                            </div>
                        </td>
                        <td class="py-1 whitespace-nowrap uppercase">
                            <div class="text-sm">

                            </div>
                        </td>
                        <td class="py-1 whitespace-nowrap uppercase">
                            <div class="text-sm">

                            </div>
                        </td>

                        <td class="py-1 whitespace-nowrap uppercase">
                            <div class="text-sm">
                                <span>
                                    {{ $producto->quantity }}
                                </span>

                            </div>
                        </td>

                        <td align="right" class="py-1 whitespace-nowrap uppercase">
                            <div class="text-sm text-red-600">{{ $producto->price }}</div>
                        </td>

                        <td align="right" class="py-1 whitespace-nowrap uppercase">
                            <div class="text-sm text-red-600">{{ $producto->price * $producto->quantity }}</div>
                        </td>
                    </tr>

                    @php
                
                        $total = $total + $producto->price * $producto->quantity;
                    @endphp
                @endif
            @endif

            



            @if ($loop->last)
                <tr>

                </tr>
                <tr>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td style="background-color: #DCE6F1; color: red">
                        <b>
                            TOTAL
                        </b>
                    </td>
                    <td style="background-color: #DCE6F1; color: red" align="right" class="three-decimals">
                        <b>S/ {{ number_format($total, 2) }}</b>
                    </td>
                </tr>
            @endif
        @endforeach

    </tbody>
</table>
