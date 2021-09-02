<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Department;
use App\Models\Order;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Carbon\Carbon;

class ReportComponent extends Component
{
    public $orders=[];
    public $cities=[];
    public $products=[];
    public $brands;
    public $fechaInicio = null;
    public $fechaFin = null;
    public $ordenes;
    public $openCity = false;
    public $openVenta = false;
    public $nombreCuidad;
    public $ciudades;
    public $departments;
    public $department_id="";
    public $category_id="";
    public $brand_id="";
    public $openProducto;
    public $productos;
    public $categories;
    public $sizes;
    public $subcategories=[];
    public $subcategory_id="";
    public $size_id="";
    public $ventasProductos=[];
    public $ventas;
    public $openProductoVendido=false;
    public $minimoStock=5;
    

    public $newFechaInicio,$newFechaFin;
        
    public function getVentas(){

        $this->reset('orders');
        $orders = Order::query()->where('status','<>',1);

        if ($this->fechaInicio != null & $this->fechaFin != null) {
            $orders = $orders->whereBetween('created_at', [$this->fechaInicio, Carbon::parse($this->fechaFin)->addDay(1)]);
            /* $orders = $orders->where('created_at','>=',Carbon::createFromFormat('Y-m-d', $this->fechaInicio)->where('create_at','>=',Carbon::createFromFormat('Y-m-d',$this->fechaFin))); */
        }



        

        $orders = $orders->orderBy('created_at','desc')->get();

        /* $this->reset('orders'); */
        /* $this->orders = Order::query()->where('status','<>',1)->get(); */
        /* $this->orders = Order::query()->whereBetween('created_at', [$this->fechaInicio, $this->fechaFin])->get(); */
        $this->ordenes = $orders;
    }

    public function getCities(){
        $cities = City::query();        

        if ($this->department_id) {
            $cities = $cities->where('department_id',$this->department_id);
        }

        $cities = $cities->orderBy('id','desc')->get();
        $this->ciudades = $cities;
    }

    public function getProducts(){
        $products = Product::query();        

        if ($this->category_id) {
            $products = $products->whereHas('subcategory.category',function(Builder $query){
                $query->where('id',$this->category_id);
            });            
        }

        if ($this->size_id) {
            $products = $products->whereHas('sizes',function(Builder $query){
                $query->where('name',$this->size_id);
            });            
        }

        if ($this->subcategory_id) {
            $products = $products->where('subcategory_id',$this->subcategory_id);
        }

        if ($this->brand_id) {
            $products = $products->where('brand_id',$this->brand_id);
        }

        $products = $products->orderBy('subcategory_id','desc')->get();
        $this->productos = $products;

    }

    public function getProductosVendidos(){
        $ventasProductos = Order::query();   
        
        if ($this->fechaInicio != null & $this->fechaFin != null) {
            $ventasProductos = $ventasProductos->whereBetween('created_at', [$this->fechaInicio, Carbon::parse($this->fechaFin)->addDay(1)]);
        }
        
        $ventasProductos = $ventasProductos->where('status','<>',1)->get();
        $this->ventas = $ventasProductos;
    }

    public function openCities(){
        $this->reset('openVenta','ordenes','ciudades','openProducto','productos','openProductoVendido','ventas');
        $this->openCity = true;        
    }

    public function openVentas(){
        $this->reset('openCity','ciudades','openProducto','productos','openProductoVendido','ventas','fechaInicio','fechaFin');
        $this->openVenta = true;
    }

    public function openProductos(){
        $this->reset('openCity','openVenta','ordenes','ciudades','openProductoVendido','ventas');
        $this->openProducto = true;
    }

    public function openProductosVendidos(){        
        $this->reset('openCity','openVenta','openProducto','ordenes','ciudades','productos','fechaInicio','fechaFin');
        $this->openProductoVendido = true;
    }

    public function updatedFechaInicio(){
        $this->reset('ordenes');
        $this->reset('ventas');
    }



    public function cancelar(){
        $this->reset('orders','fechaInicio','fechaFin','ordenes','ciudades');
    }

    

    public function updatedCategoryId($value){
        $this->reset('subcategory_id');
        $this->subcategories = Subcategory::where('category_id',$value)->get();
    }

    public function mount(){
        $this->departments = Department::all();   
        $this->categories = Category::all() ;
        $this->brands = Brand::all();
        $this->sizes = Size::all();              
    }

    public function render()
    {    
           
       
                
        return view('livewire.reportes.report-component')->layout('layouts.admin');
    }
}
