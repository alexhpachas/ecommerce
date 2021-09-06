<?php

namespace App\Exports;

use App\Models\City;
use App\Models\Department;
use Maatwebsite\Excel\Concerns\WithHeadings;            //COLOCAR EMCABEZADO
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;        //INTERACTUAR CON EL LIBRO
use Maatwebsite\Excel\Concerns\WithCustomStartCell;     //PARA INDICAR EN QUE CELDA INICIARA EL REPORTE
use Maatwebsite\Excel\Concerns\WithTitle;               //COLOCAR NOMBRE DE LAS HOJAS DEL LIBRO
use Maatwebsite\Excel\Concerns\WithStyles;              //DAR FORMATO A LAS CELDAS

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class PrecioEnvioExport implements FromView, WithHeadings, WithCustomStartCell, WithTitle, WithStyles, ShouldAutoSize, WithEvents
{
    protected $department_id;

    public function view(): View
    {
        $cities = City::query();       
        $department_id ='A'; 
        

        if(request('department_id') != null || (request('department_id') != "" )) {
            $cities = $cities->where('department_id',request('department_id'));
            $department_id = request('department_id');
            $cities = $cities->orderBy('id','desc')->get();
            $departamento = 'DEPARTAMENTO: ' . Department::find($department_id)->name;
        }

        if (request('department_id') == null || request('department_id') == "" || request('department_id') == 0 ) {
            $cities = $cities->orderBy('id','desc')->get();
            $departamento = 'TODOS LOS DEPARTAMENTOS';            
        }

        

        
        $ciudades = $cities;
        

        $titulo ="REPORTE COSTO DE ENVÍO POR CIUDAD";        

        $usuario = auth()->user()->name;

        return view('admin.reportePDF.costoenvioexcel',compact('ciudades','titulo','usuario','departamento') );
    }


  
    /* public function collection()
    {
        $cities = City::query();    
        

        if(request('department_id') != null || (request('department_id') != "" )) {
            $cities = $cities->where('department_id',request('department_id'));
            $department_id = request('department_id');
            $cities = $cities->select('id','department_id.name','name','cost')->orderBy('id','desc')->get();            
        }

        if (request('department_id') == null || request('department_id') == "" || request('department_id') == 0 ) {
            $cities = $cities->select('id','department_id','name','cost')->orderBy('id','desc')->get();            
        }
                
        $ciudades = $cities;

        return $ciudades;
    } */

    /* CABECERA DEL REPORTE */
    public function headings(): array{
        return ["REPORTE DE VENTAS "];
    }

    /* DEFINIR EN QUE CELDA SE ARMARA EL REPORTE */
    public function startCell(): string{
        return 'B2';
    }

    public function registerEvents(): array
        {
        return [
            AfterSheet::class    => function(AfterSheet $event) 
            {
                $event->sheet->getDelegate()->setMergeCells(['A2:D2']);
                $cellRange = 'A2:D2';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);

                $styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ]
                    ]
                ];
                $event->sheet->getDelegate()->getStyle('A2:D2')->applyFromArray($styleArray);


                
                
                /* $event->sheet->getDelegate()->setMergeCells(['E2:J2']);

                       $cellRange = 'A1:D1';
            $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(11);
 
                         // Aplicar la matriz de estilo a las celdas de rango B2: G8
            $styleArray = [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => ['argb' => '000000'],
                    ]
                ]
            ];
            $event->sheet->getDelegate()->getStyle('A1:D1')->applyFromArray($styleArray);
 
                         // Establece la altura de la primera fila en 20
            $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(20);
 
                         // Establecer el texto en el rango de A1: D4 para ajustar automáticamente
            $event->sheet->getDelegate()->getStyle('A1:D4')
                ->getAlignment()->setWrapText(true);

                $widths = ['A' => 30, 'B' => 30, 'C' => 30, 'D' => 30];
                   foreach ($widths as $k => $v) {
                   	// establecer ancho de columna
                       $event->sheet->getDelegate()->getColumnDimension($k)->setWidth($v);
                   } */

                        

        
            },
              ];

              
       }
    
    
    


    /* APLICANDO STYLO NEGRITA  EL 2 REPRESENTA LAFILA DE EXCEL DONDE SE APLICARA EL BOLD */
    public function styles(Worksheet $sheet){      
        
        return [
            2 => ['font' => ['bold' => true, 'size' => 14],'alignment' => ['horizontal'=>'center']],
            3 => ['font' => ['bold' => true, 'size' => 11]]
        ];

        /* return [
            1 => ['font' => ['bold' => true, 'size' => 10, 'style' => 'italic'], 'fill' => ['fillType' => 'solid', 'color' => array('rgb' => 'D9D9D9')],'alignment' => ['horizontal'=>'center']],                     
        ]; */
        
       
        


        /* return [
            
            2    => ['font' => ['bold' => true, 'italic' => true, 'size' => 16], 'alignment' => ['horizontal' => 'center']], 
            3    => ['font' => ['bold' => true, 'italic' => true, 'size' => 14], 'alignment' => ['horizontal' => 'center']], 
            
            8    => ['font' => ['bold' => true, 'italic' => true, 'size' => 14],
                    'fill' => ['fillType' => 'solid', 'color' => array('rgb' => 'B5B8B1')],
                    'alignment' => ['horizontal'=>'center']],
        ]; */
         


    }

    public function title(): string
    {
        return 'Reporte Precio de Envio';

    }


   


}
