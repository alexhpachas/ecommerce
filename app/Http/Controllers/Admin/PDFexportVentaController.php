<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExcelExportVenta;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class PDFexportVentaController extends Controller
{
    public function ventasPDF(){
        $orders = Order::query()->where('status','<>',1);
        $fechaInicio=0;
        $fechaFin=0;

        if (request('fechaInicio') != null & (request('fechaFin')) != null) {
            $orders = $orders->whereBetween('created_at', [request('fechaInicio'), Carbon::parse(request('fechaFin'))->addDay(1)]);            
            $fechaInicio = Carbon::parse(request('fechaInicio'))->format('d-m-Y');
            $fechaFin = Carbon::parse(request('fechaFin'))->format('d-m-Y');
        }        

        $orders = $orders->orderBy('created_at','desc')->where('status','<>',5)->where('status','<>',6)->get();

        $titulo ="REPORTE GENERAL DE VENTAS";        

        $usuario = auth()->user()->name;

        $ordenes = $orders;

        $pdf = PDF::loadView('admin.reportePDF.ventapdf',compact('ordenes','titulo','fechaInicio','fechaFin','usuario'));
        /* $pdf->setPaper('letter', 'landscape'); */
                
        return $pdf->stream('venta.pdf');
    }

    public function ventasExcel(){
        $reportName = 'Reporte de ventas_'. uniqid(). '.xlsx';
        return Excel::download(new ExcelExportVenta(), $reportName);
        
    }
}
