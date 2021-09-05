<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Department;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PDFexportcostoEnvio extends Controller
{
    public function envioPDF(){
        $cities = City::query();        

        if (request('department_id') != 0) {
            $cities = $cities->where('department_id',request('department_id'));
        }

        $cities = $cities->orderBy('id','desc')->get();
        $ciudades = $cities;

        $titulo ="REPORTE COSTO DE ENVÍO POR CIUDAD";        

        $usuario = auth()->user()->name;

        $departamento = request('department_id') == 0 ? 'TODOS LOS DEPARTAMENTOS' : 'DEPARTAMENTO: '. Department::find(request('department_id'))->name;

        $pdf = PDF::loadView('admin.reportePDF.costoenviopdf',compact('ciudades','usuario','titulo','departamento'));
        /* $pdf->setPaper('letter', 'landscape'); */

        
        
        return $pdf->stream('costoenvio.pdf');

    }
}
