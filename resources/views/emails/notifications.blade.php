<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <head>
        <meta charset="UTF-8">
        <title>Listas de definiciones</title>
    
        <style>
            table,
            th,
            td {
                border: 1px solid black;
                border-collapse: collapse;
                text-transform: uppercase;
            }
    
            th,
            td {
                padding: 5px;
                text-align: left;
                text-transform: uppercase;
            }
        </style>
    </head>
    
    
    <h1>Se ha generado una nueva compra ORDER-{{$order['id']}}</h1>
    <p>Notificación de compra</p>


    <!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nombre de Usuario
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Contacto
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Celular
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Envio
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Total Compra
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fecha
                </th>
              
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">                    
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{$order->user['name']}}
                      </div>
                      <div class="text-sm text-gray-500">
                        {{$order->user['email']}}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{$order['contact']}}</div>                    
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{$order['phone']}}</div>            
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if ($order['envio_type'] != 1)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            SI
                        </span>
                    @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            NO
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    S/. {{$order['total']}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    {{$order['created_at']}}
                </td>
              </tr>              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <hr>

  <a href="{{route('admin.orders.show',$order['id'])}}">GESTIONAR COMPRA</a>
  
    
    
</body>
</html>