<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Se ha Generado una nueva Orden</h1>
    <p>Notificación de compra</p>
  
    Usuario : <p>{{$order->user['user_id']}}</p>
    Contacto : <p>{{$order['contact']}}</p>
    Celular : <p>{{$order['phone']}}</p>
    @if ({{$order['envio_type'] != 1}})
    Envio : <p>SI</p>    
    @else
    Envio : <p>NO</p>
    @endif
    Total Compra : <p>{{$order['total']}}</p>
    
    
</body>
</html>