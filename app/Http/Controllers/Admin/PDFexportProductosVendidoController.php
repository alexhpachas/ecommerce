<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExcelExportVendidos;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class PDFexportProductosVendidoController extends Controller
{
    public function productosvendidosPDF(){

        $ventasProductos = Order::query();   
        $fechaInicio=0;
        $fechaFin=0;
        
        if (request('fechaInicio') != null & (request('fechaFin')) != null) {
            $ventasProductos = $ventasProductos->whereBetween('created_at', [request('fechaInicio'), Carbon::parse(request('fechaFin'))->addDay(1)]);
            $fechaInicio = Carbon::parse(request('fechaInicio'))->format('d-m-Y');
            $fechaFin = Carbon::parse(request('fechaFin'))->format('d-m-Y');
        }
        
        $ventasProductos = $ventasProductos->where('status','<>',1)->where('status','<>',5)->get();
        $ventas = $ventasProductos;
        $titulo ="REPORTE DE PRODUCTOS VENDIDOS";        

        $usuario = auth()->user()->name;
        $pdf = PDF::loadView('admin.reportePDF.productovendidospdf',compact('ventas','titulo','fechaInicio','fechaFin','usuario'));

        $pdf->setPaper('letter', 'landscape');
                        
        return $pdf->stream('productovendidos.pdf');

    }    

    public function vendidosExcel(){
        $reportName = 'Reporte productos vendidos_'. uniqid(). '.xlsx';
        return Excel::download(new ExcelExportVendidos(), $reportName);
    }
}
