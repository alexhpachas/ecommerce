<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Qualify;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product){
        $qualifications = Qualify::where('product_id',$product->id)->get();
        return view('products.show',compact('product','qualifications'));
    }
}