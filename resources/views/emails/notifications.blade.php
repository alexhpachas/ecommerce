<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>HAN INTENTADO COMPRAR</h1>
    <p>Primera notificacion por laravel</p>
    @foreach ($order as $item)
        {{$item}}
    @endforeach
    <p>{{$order->user['user_id']}}</p>
    <p>{{$order['contact']}}</p>
    <p>{{$order['phone']}}</p>
    <p>{{$order['total']}}</p>
    
    
</body>
</html>