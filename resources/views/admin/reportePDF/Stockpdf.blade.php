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
