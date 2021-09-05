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
        $cities = City::all();       
        $department_id ='A'; 
        $departamento = 'TODOS LOS DEPARTAMENTOS';

        /* if(request('department_id') != null || (request('department_id') != "" )) {
            $cities = $cities->where('department_id',request('department_id'));
            $department_id = request('department_id');
            $cities = $cities->orderBy('id','desc')->get();
            $departamento = Department::find($department_id)->name;
        }

        if (request('department_id') == null || request('department_id') == "" || request('department_id') == 0 ) {
            $cities = $cities->orderBy('id','desc')->get();
            $departamento = 'TODOS LOS DEPARTAMENTOS';            
        } */

        

        
        $ciudades = $cities;
        

        $titulo ="REPORTE COSTO DE ENVÍO POR CIUDAD";        

        $usuario = auth()->user()->name;

        /* $departamento = $department_id != null & $department_id != "" ? 'DEPARTAMENTO: '. Department::find($department_id)->name : 'TODOS LOS DEPARTAMENTOS'; */

        $pdf = PDF::loadView('admin.reportePDF.costoenviopdf',compact('ciudades','usuario','titulo','departamento'));
        /* $pdf->setPaper('letter', 'landscape'); */

        
        
        return $pdf->stream('costoenvio.pdf');

    }
}
