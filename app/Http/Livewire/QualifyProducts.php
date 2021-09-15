<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Product;
use App\Models\Prueba;
use App\Models\Qualify;
use Dompdf\Options;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class QualifyProducts extends Component
{
    public $open = false;
    public $openM = false;
    public $products;
    public $comment;
    public $product_id;
    public $status = 2;
    public $order_id;
    public $user_id=2;
    public $qualification;
    public $order;    
    public $qualified;
    public $content;
    public $item;
    public $rowId;
    public $todo;
    public $orden;


    public $rules =[
        'order_id' => 'required',
        'product_id'=>'required',
        'user_id'=>'required',   
        'comment'=>'required|max:255',  
        'qualification'=>'required',  
        'status' => 'required'      
    ];

    protected $validationAttributes = [
        'comment' => 'Comentario',
        'qualificacion' => 'Calificacion'
    ];
        
    public function abrir(){
        $this->open = true;                
    }

    public function edit($id){
        $this->openM=true;
        $this->orden = Qualify::where('order_id',$id)->where('product_id',$this->product_id)->first();
        $this->qualification = $this->orden->qualification;
        $this->comment = $this->orden->comment;
        $this->orden = $this->orden->id;
    }

    public function mount(Order $order,$item,$qualified,$rowId){
        $this->qualified = $qualified;
        $this->order = $order;
        $this->order_id = $this->order->id;
        $this->product_id = $item;  
        $this->rowId = $rowId;        
        $this->item = $item;         
    }

    public $options = [ 

        'qualified' =>1,
     
    ];

    public function update(){        

        DB::table('qualifies')
              ->where('id', $this->orden)
              ->update(['qualification' => $this->qualification,'comment' => $this->comment]);

        $affected = DB::table('orders')
              ->where('id', $this->order_id)
              ->update(['content->'.$this->rowId.'->options->qualification' => $this->qualification]);

        $this->openM = false;

        return redirect()->route('orders.qualify',$this->order->id);
        
        
    }

    public function save(Order $order){

        $rules = $this->rules;        

        $this->validate($rules);
        
        $affected = DB::table('orders')
              ->where('id', $this->order_id)
              ->update(['content->'.$this->rowId.'->options->qualified' => 1]);

              $affected = DB::table('orders')
              ->where('id', $this->order_id)
              ->update(['content->'.$this->rowId.'->options->qualification' => $this->qualification]);
        
        if ($this->qualification != 0) {
            
            $ratings = Qualify::create([
                'order_id' => $this->order_id,
                'product_id' => $this->product_id,
                'user_id' =>auth()->user()->id,
                'row_id' => $this->rowId,
                'comment' =>$this->comment,
                'qualification' => $this->qualification,   
                'status' => $this->status
            ]);

            return redirect()->route('orders.qualify',$this->order->id);
        }                        
        
    }

    public function render()
    {   
        return view('livewire.qualify-products');
    }
}
