<?php

namespace App\Http\Livewire;

use App\Mail\NotificationsMailable;
use App\Models\City;
use App\Models\Department;
use App\Models\District;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class CreateOrder extends Component
{
    public $envio_type=1;

    public $shipping_cost = 0;

    public $contact,$phone;
    
    public $departments,$cities=[] ,$districts=[];

    public $department_id = "",$city_id ="",$district_id="";

    public $address, $references;

    public $rules =[
        'contact'=>'required',
        'phone'=>'required',
        'envio_type'=>'required'
    ];

    public function updatedEnvioType($value){
        if ($value == 1) {
            $this->resetValidation([
                'department_id','city_id','district_id','address','references'
            ]);
        }        
    }

    public function updatedDepartmentId($value){
        $this->cities = City::where('department_id',$value)->get();
        $this->reset('city_id');
        $this->reset('district_id');
    }

    public function updatedCityId($value){
        $city = City::find($value);
        $this->shipping_cost = $city->cost;
        $this->districts = District::where('city_id',$value)->get();        
        $this->reset('district_id');
    }

    public function create_order(){        

        $rules = $this->rules;

        if ($this->envio_type == 2) {
            $rules['department_id'] = 'required';
            $rules['city_id'] = 'required';
            $rules['district_id'] = 'required';    
            $rules['address'] = 'required';
            $rules['references'] = 'required'; 
        }

        $this->validate($rules);

        $order = new Order();

        $order->user_id = auth()->user()->id;
        $order->contact = $this->contact;
        $order->phone = $this->phone;
        $order->envio_type = $this->envio_type;
        $order->shipping_cost = 0;
        $order->total = $this->shipping_cost + Cart::subtotalFloat();
        $order->content = Cart::content();

        $order->cant_items = Cart::content()->count();
        $order->cant_total = Cart::count();

        if ($this->envio_type == 2) {
            $order->shipping_cost=$this->shipping_cost;
            /* $order->department_id = $this->department_id;
            $order->city_id = $this->city_id;
            $order->district_id = $this->district_id;
            $order->address = $this->address;
            $order->references = $this->references; */
            $order->envio=json_encode([
                'department' => Department::find($this->department_id)->name,
                'city' => City::find($this->city_id)->name,
                'district' =>District::find($this->district_id)->name,
                'address' => $this->address,
                'references' => $this->references
            ]);
        }
        
        $order->save();

        foreach (Cart::content() as $item) {
            discount($item);
        }

        Cart::destroy();

        /* ACTUALIZAMOS EL CARRITO DE COMPRAS VISTA COMPUTADOR */
        $this->emitTo('dropdown-cart','render');

        /* ACTUALIZAMOS EL CARRITO DE COMPRAS VISTA MOBIL */
        $this->emitTo('cart-mobil','render');      
        
        
        /* DESCOMENTAR PARA ENVIAR NOTIFICACION VIA CORREO -> EN LOCAL NO ENVIA CORREO */
        Mail::to('alex.h.pachas@gmail.com')->send(new NotificationsMailable($order));

        return redirect()->route('orders.payment',$order);

        
        
    }

    public function mount(){
        $this->departments = Department::all();
    }
    public function render()
    {
        
        return view('livewire.create-order');
    }
}
