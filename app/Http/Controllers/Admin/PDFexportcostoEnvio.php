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
        $department_id ='A'; 

        if(request('department_id') != null & (request('department_id') != "" )) {
            $cities = $cities->where('department_id',request('department_id'));
            $department_id = request('department_id');
            $cities = $cities->orderBy('id','desc')->get();
        }else{
            $cities = $cities->orderBy('id','desc')->get();
        }

        

        
        $ciudades = $cities;
        

        $titulo ="REPORTE COSTO DE ENVÍO POR CIUDAD";        

        $usuario = auth()->user()->name;

        $departamento = $department_id != null & $department_id != "" ? 'DEPARTAMENTO: '. Department::find($department_id)->name : 'TODOS LOS DEPARTAMENTOS';

        $pdf = PDF::loadView('admin.reportePDF.costoenviopdf',compact('ciudades','usuario','titulo','departamento'));
        /* $pdf->setPaper('letter', 'landscape'); */

        
        
        return $pdf->stream('costoenvio.pdf');

    }
}
