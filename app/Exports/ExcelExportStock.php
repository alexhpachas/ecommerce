<?php

namespace App\Exports;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Maatwebsite\Excel\Concerns\WithHeadings;            //COLOCAR EMCABEZADO
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;        //INTERACTUAR CON EL LIBRO
use Maatwebsite\Excel\Concerns\WithCustomStartCell;     //PARA INDICAR EN QUE CELDA INICIARA EL REPORTE
use Maatwebsite\Excel\Concerns\WithTitle;               //COLOCAR NOMBRE DE LAS HOJAS DEL LIBRO
use Maatwebsite\Excel\Concerns\WithStyles;              //DAR FORMATO A LAS CELDAS

use Maatwebsite\Excel\Concerns\FromView;                //PARA EXPORTAR DESDE UNA VISTA
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;          //PARA QUE SE AUTOAJUSTE LA CELDA 
use Maatwebsite\Excel\Concerns\WithEvents;              //PARA APLICAR ESTYLOS AL REPORTE EXCEL
use Maatwebsite\Excel\Events\AfterSheet;

class ExcelExportStock implements FromView, WithHeadings, WithCustomStartCell, WithTitle, WithStyles, ShouldAutoSize, WithEvents
{
    public function view(): View
    {
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

        $categoria = request('category_id') == 0 ? 'TODAS LAS CATEGORIAS' : 'CATEGORIA: ' . Category::find(request('category_id'))->name;
        $subcategoria = request('subcategory_id') == "" ? '' : 'SUBCATEGORIA: ' . Subcategory::find(request('subcategory_id'))->name;
        $marca = request('brand_id') == "" ? '' : 'MARCA: ' . Brand::find(request('brand_id'))->name;

        return view('admin.reporteEXCEL.stockexcel',compact('productos','categoria','subcategoria','marca'));

    }

    /* CABECERA DEL REPORTE */
    public function headings(): array{
        return ["REPORTE DE STOCK "];
    }

    /* DEFINIR EN QUE CELDA SE ARMARA EL REPORTE */
    public function startCell(): string{
        return 'B2';
    }

    /* APLICAMOS STYLOS A NUESTRA VISTA DE EXCEL */
    public function registerEvents(): array
        {
            return 
                [
                    AfterSheet::class    => function(AfterSheet $event)             
                    {
                        $cellRange = 'A2:K2';       //FIJAMOS EL RAGO A2 HASTA D2
                        $event->sheet->getDelegate()->setMergeCells([$cellRange]);     //COMBINAR CELDAS DE LA A2 HASTA D2                        
                        /* $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14); */ // APLICAMOS TAMAÑO A TODO ESE RANGO DE CELDAS

                        /* APLICAMOS BORDE Y COLOR DE BORDE */
                        $styleArray = [
                            'borders' => [
                                'outline' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color' => ['argb' => '000000'],
                                ]
                            ]
                        ];
                        
                        $event->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);//APLICAMOS EL BORDE A LAS CELDAS A2 HASTA D2
                        
        
                    },
                
                ];              
       }
    
    
    


    /* APLICANDO STYLO NEGRITA  EL 2 REPRESENTA LAFILA DE EXCEL DONDE SE APLICARA EL BOLD */
    public function styles(Worksheet $sheet){      
        
        return [
            2 => ['font' => ['bold' => true, 'size' => 14],'alignment' => ['horizontal'=>'center']],    //APLICAMOS NEGRITA, TAMAÑO Y CENTRADO A LA FILA 2
            3 => ['font' => ['bold' => true, 'size' => 11]],         //APLICAMOS NEGRITA Y TAMAÑO A LA FILA 3
            /* 8 => ['font' => ['bold' => true, 'italic' => true, 'size' => 14], 'fill' => ['fillType' => 'solid', 'color' => array('rgb' => 'B5B8B1')],'alignment' => ['horizontal'=>'center']], */            
        ];
        
    }

    /* NOMBRE DEL LIBRO */
    public function title(): string
    {
        return 'Reporte de stock';
    }
}
