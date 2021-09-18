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
  
    <p>Usuario : {{$order->user}}</p>
    <p>Contacto : {{$order['contact']}}</p>
    <p>Celular : {{$order['phone']}}</p>
    @if ($order['envio_type'] != 1)
    <p>Envio : SI</p>    
    @else
    <p>Envio : NO</p>
    @endif

    <p>Total Compra : S/. {{$order['total']}}</p>
    
    
</body>
</html>