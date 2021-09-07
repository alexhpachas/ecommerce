<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExcelExportAgotado;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;

class PDFStockAgotadoController extends Controller
{
    public function stockAgotadoPDF(){
        $productosAgotados = Product::query();         
        if (request('category_id')) {
            $productosAgotados = $productosAgotados->whereHas('subcategory.category',function(Builder $query){
                $query->where('id',request('category_id'));
            });            
        }

        if (request('subcategory_id')) {
            $productosAgotados = $productosAgotados->where('subcategory_id',request('subcategory_id'));
        }

        if (request('brand_id')) {
            $productosAgotados = $productosAgotados->where('brand_id',request('brand_id'));
        }

        $productosAgotados = $productosAgotados->orderBy('subcategory_id','desc')->get();

        $pdf = PDF::loadView('admin.reportePDF.stockagotado',compact('productosAgotados'));
        $pdf->setPaper('letter', 'landscape');
        
        return $pdf->stream('stockagotado.pdf');
    }

    public function agotadosExcel(){
        $reportName = 'Reporte de stock Agotado_'. uniqid(). '.xlsx';
        return Excel::download(new ExcelExportAgotado(), $reportName);
    }
}
