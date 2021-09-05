<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class PDFexportVentasporEnviarController extends Controller
{
    public function ventasporenviarPDF(){        

        $ventasEnvio = Order::query()->where('envio_type','<>',1)->where('status',2);
        $fechaInicio=0;
        $fechaFin=0;

        if (request('fechaInicio') != null & (request('fechaFin')) != null) {
            $ventasEnvio = $ventasEnvio->whereBetween('created_at', [request('fechaInicio'), Carbon::parse(request('fechaFin'))->addDay(1)]);       
            $fechaInicio = Carbon::parse(request('fechaInicio'))->format('d-m-Y');
            $fechaFin = Carbon::parse(request('fechaFin'))->format('d-m-Y');     
        }
        
        $ventasEnvio = $ventasEnvio->orderBy('created_at','desc')->get();

        $ventasEnvios = $ventasEnvio;

        $titulo ="REPORTE DE VENTAS POR ENVIAR";        

        $usuario = auth()->user()->name;
        $pdf = PDF::loadView('admin.reportePDF.ventasporenviarpdf',compact('ventasEnvios','titulo','fechaInicio','fechaFin','usuario'));

        $pdf->setPaper('letter', 'landscape');
                        
        return $pdf->stream('ventasporenviar.pdf');
    }
    
}
