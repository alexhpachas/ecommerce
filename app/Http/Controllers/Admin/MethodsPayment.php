<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Utility;
use Illuminate\Http\Request;

class MethodsPayment extends Controller
{
    public function index(){
        $methods = Utility::all();
        return view('admin.methods.index',compact('methods'));
    }
}
