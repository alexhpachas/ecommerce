<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadings;            //COLOCAR EMCABEZADO
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;        //INTERACTUAR CON EL LIBRO
use Maatwebsite\Excel\Concerns\WithCustomStartCell;     //PARA INDICAR EN QUE CELDA INICIARA EL REPORTE
use Maatwebsite\Excel\Concerns\WithTitle;               //COLOCAR NOMBRE DE LAS HOJAS DEL LIBRO
use Maatwebsite\Excel\Concerns\WithStyles;              //DAR FORMATO A LAS CELDAS

use Maatwebsite\Excel\Concerns\FromView;                //PARA EXPORTAR DESDE UNA VISTA
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;          //PARA QUE SE AUTOAJUSTE LA CELDA 
use Maatwebsite\Excel\Concerns\WithEvents;              //PARA APLICAR ESTYLOS AL REPORTE EXCEL
use Maatwebsite\Excel\Events\AfterSheet;

class ExcelExportVenta implements FromView, WithHeadings, WithCustomStartCell, WithTitle, WithStyles, ShouldAutoSize, WithEvents
{
    public function view(): View
    {
        $orders = Order::query()->where('status','<>',1);
        $fechaInicio=0;
        $fechaFin=0;

        if (request('fechaInicio') != null & (request('fechaFin')) != null) {
            $orders = $orders->whereBetween('created_at', [request('fechaInicio'), Carbon::parse(request('fechaFin'))->addDay(1)]);            
            $fechaInicio = Carbon::parse(request('fechaInicio'))->format('d-m-Y');
            $fechaFin = Carbon::parse(request('fechaFin'))->format('d-m-Y');
        }        

        $orders = $orders->orderBy('created_at','desc')->where('status','<>',5)->where('status','<>',6)->get();

        $ordenes = $orders;

        return view('admin.reporteEXCEL.ventaexcel',compact('ordenes','fechaInicio','fechaFin') );
    }

    /* CABECERA DEL REPORTE */
    public function headings(): array{
        return ["REPORTE DE VENTAS "];
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
                        $cellRange = 'A2:J2';       //FIJAMOS EL RAGO A2 HASTA D2
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
        return 'Reporte de Ventas';
    }


}
