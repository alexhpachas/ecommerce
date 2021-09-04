<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ExportController extends Controller
{
    public function exportPDF(){

        $productos = Product::all();         
        $pdf = PDF::loadView('admin.reportePDF.pdf',compact('productos'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->stream('usuariosReporte.pdf');

    }
}
