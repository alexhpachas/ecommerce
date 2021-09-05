<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Stock Productos</title>
    
</head>
<div align="center" style="font-size: 25px">
    SISTEMA MUNDO DETALLES
</div>
<table>
    <tr>
        <th>
            <div width="30%" style="padding-left: 10%; margin-bottom: 3%">
                <img src="{{asset('img/logo.png')}}" width="150" height="85">
            </div>
            
        </th>
        <th>
            <div width="70%" align="center" style="vertical-align: top; padding-top: 10px" >
            
                <h2 style="font-size: 16px"><strong>{{$titulo}}</strong></h2>
                <p style="font-size: 14px; text-transform: uppercase;"><strong>{{$categoria}} - SEGUN FECHA :{{date('d-m-Y')}}</strong></p>   
                @if ($subcategoria != null)
                    <p style="font-size: 14px; text-transform: uppercase;"><strong>{{$subcategoria}}</strong></p> 
                @endif
            </div>
        </th>
    </tr>
    

    
</table>
<body>
    @php
        $total = 0;
    @endphp

    {{$productos}}

    <x-table-responsive class="mt-3">          
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
               
            <style>
                table {
                
                border-collapse: collapse;
                width: 100%;
                }
                
                td, th {
                text-align: left;
                padding: 2px;
                
                }

                tr.cabecera {
                    font-size: 12px;
                    text-transform: uppercase;
                    background-color: #dddddd;
                }
                #Footer{                            
                        border-top: 2px solid rgba(0, 0, 0, 0.24);  
                        /*  poner footer abajo */
                        position: fixed;
                        left: 0;
                        bottom: 0;
                        width: 100%;
                    }
                
            </style>
                <tr >
                    <th>
                        Codigo 
                    </th>
    
                    <th>
                        producto
                    </th>
    
                    <th>
                        Sistema
                    </th>
    
                    <th>
                        Categoria
                    </th> 
    
                    <th>
                        Subcategoria
                    </th>  
    
                    <th>
                        Marca
                    </th>   
    
                    <th>
                        Talla
                    </th> 
    
                    <th>
                        Color
                    </th> 
                    
                    <th>
                        Stock
                    </th>   
    
                    <th>
                        Precio
                    </th>   
                    <th>
                        TOTAL
                    </th> 
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($productos as $producto)     
                
                    {{-- @if ($producto->sizes->count())      
                        @foreach ($producto->sizes as $size)     
                            @if ($size->colors->count())
                                @foreach ($size->colors as $color)
                                                                                                               
                                
                                    <tr class="hover:bg-gray-100 hover:cursor-pointer hover:text-red-600">
                                        <td class="py-1 whitespace-nowrap">
                                            <div class="text-sm">
                                                {{$producto->id}}
                                            </div>
                                        </td>
    
                                        <td class="py-1 whitespace-nowrap uppercase">
                                            <div class="text-sm">
                                                {{$producto->name}}
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
                                                {{$producto->subcategory->category->name}}
                                            </div>                                
                                        </td>
    
                                        <td class="py-1 whitespace-nowrap uppercase">
                                            <div class="text-sm">
                                                {{$producto->subcategory->name}}
                                            </div>                                
                                        </td>
    
                                        <td class="py-1 whitespace-nowrap uppercase">
                                            <div class="text-sm">                                    
                                                {{$producto->brand->name}}
                                            </div>                                       
                                        </td>
                                        <td class="py-1 whitespace-nowrap uppercase">
                                            <div class="text-sm">
                                                {{$size->name}}
                                            </div>                                       
                                        </td>
                                        <td class="py-1 whitespace-nowrap uppercase">
                                            <div class="text-sm">                                        
                                                {{__($color->name)}}
                                            </div>
                                        </td>
    
                                        <td class="py-1 whitespace-nowrap uppercase">
                                            <div class="text-sm">
                                                <span >
                                                    {{$color->pivot->quantity}}
                                                </span>
                                                
                                            </div>
                                        </td>
    
                                        <td class="py-1 whitespace-nowrap uppercase">
                                            <div class="text-sm text-red-600">{{ $producto->price }}</div>
                                        </td>

                                        <td class="py-1 whitespace-nowrap uppercase">
                                            <div class="text-sm text-red-600">S/. {{ $producto->price * $color->pivot->quantity }}</div>
                                        </td>
                    
                                    </tr>

                                    @php
                        
                                        $total = $total + $producto->price * $color->pivot->quantity;
                                    @endphp

                          
                                @endforeach
                            @endif                                                                                   
                        @endforeach          
                    @endif
     --}}
                    {{-- @if ($producto->colors->count())
                        @foreach ($producto->colors as $item)     
                                                                      
                            <tr class="hover:bg-gray-100 hover:cursor-pointer hover:text-red-600" >
                                <td class="py-1 whitespace-nowrap">
                                    <div class="text-sm ml-1">
                                        {{$producto->id}}
                                    </div>
                                </td>
    
                                <td class="py-1 whitespace-nowrap uppercase">
                                    <div class="text-sm">
                                        {{$producto->name}}
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
                                        {{$producto->subcategory->category->name}}
                                    </div>                                
                                </td>
    
                                <td class="py-1 whitespace-nowrap uppercase">
                                    <div class="text-sm">
                                        {{$producto->subcategory->name}}
                                    </div>                                
                                </td>
    
                                <td class="py-1 whitespace-nowrap uppercase">
                                    <div class="text-sm">                                    
                                        {{$producto->brand->name}}
                                    </div>                                       
                                </td>
                                <td class="py-1 whitespace-nowrap uppercase">
                                    <div class="text-sm">
                                    
                                    </div>                                       
                                </td>
                                <td class="py-1 whitespace-nowrap uppercase">
                                    <div class="text-sm">                                        
                                        {{__($item->name)}}
                                    </div>
                                </td>
    
                                <td class="py-1 whitespace-nowrap uppercase">
                                    <div class="text-sm">
                                        <span >
                                            {{$item->pivot->quantity}}
                                        </span>
                                        
                                    </div>
                                </td>
    
                                <td class="py-1 whitespace-nowrap uppercase">
                                    <div class="text-sm text-red-600">{{ $producto->price }}</div>
                                </td>   
                                
                                <td class="py-1 whitespace-nowrap uppercase">
                                    <div class="text-sm text-red-600">S/. {{ $producto->price * $item->pivot->quantity }}</div>
                                </td> 
                            </tr>

                            @php
                                
                                $total = $total + $producto->price * $item->pivot->quantity;
                            @endphp
                 
                        @endforeach                            
                    @endif --}}
    
                    @if ($producto->quantity != null)
                   
                        <tr >
                            <td>
                                <div>
                                    {{$producto->id}}
                                </div>
                            </td>
    
                            <td>
                                <div>
                                    {{$producto->name}}
                                </div>
                            </td>
    
                            <td>
                                <div>
                                    @if ($producto->status == 1)
                                        <span>
                                    @else
                                        <span>
                                    @endif
                                </div>
                            </td>
    
                            <td>
                                <div>
                                    {{$producto->subcategory->category->name}}
                                </div>                                
                            </td>
    
                            <td>
                                <div>
                                    {{$producto->subcategory->name}}
                                </div>                                
                            </td>
    
                            <td>
                                <div> 
                                    {{$producto->brand->name}}
                                </div>                                       
                            </td>
                            
    
                            <td>
                                <div>
                                    <span >
                                        {{$producto->quantity}}
                                    </span>
                                    
                                </div>
                            </td>
    
                            <td>
                                <div>
                                </div>
                            </td>    
                            
                            <td>
                                <div>
                                </div>
                            </td> 
                        </tr>

                        @php
                        
                            $total = $total + $producto->price * $producto->quantity;
                        @endphp
                 
                    @endif                                                                        
                @endforeach
    
            </tbody>

            
        </table>
    
    
    </x-table-responsive> 

    <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
        <tr class="cuerpo">
            <td width="70%">
                
            </td>
            <td width="14%">
                <b>
                    Total: S/ {{$total}}
                </b>
            </td>
        </tr>
    </table>

    
    
</body>
<footer id='Footer'>
    <section class="footer">
        <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
            <tr>
                <td width="40%">
                    <span>Sistema Mundo Detalles</span>
                </td>
                <td width="50%" class="text-center">
                    Athantyc System
                </td>
                <td class="text-center" width="10%">
                    Pagina :<span class="pagenum"></span>
    
                </td>
            </tr>
    
        </table>
    </section>
    </footer>
</html>
