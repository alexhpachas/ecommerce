<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Database\Eloquent\Builder;

class PDFExportController extends Controller
{
    
    public function exportPDF(){


        $productos = Product::query();         
        if (request('category_id') != null || request('category_id') != "" ) {
            $productos = $productos->whereHas('subcategory.category',function(Builder $query){
                $query->where('id',request('category_id'));
            });            
        }

        if (request('subcategory_id') != null || request('subcategory_id') != "") {
            $productos = $productos->where('subcategory_id',request('subcategory_id'));
        }

        if (request('brand_id') != null || request('brand_id') != "" ) {
            $productos = $productos->where('brand_id',request('brand_id'));
        }

        $productos = $productos->orderBy('subcategory_id','desc')->get();

        $titulo ="REPORTE DE STOCK DE PRODUCTOS";

        $categoria = request('category_id') == 0 ? 'TODAS LAS CATEGORIAS' : 'CATEGORIA: ' . Category::find(request('category_id'))->name;
        $subcategoria = request('subcategory_id') == "" ? '' : 'SUBCATEGORIA: ' . Subcategory::find(request('subcategory_id'))->name;

        $pdf = PDF::loadView('admin.reportePDF.Stockpdf',compact('productos','titulo','categoria','subcategoria'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('stock.pdf');

    }
}
