<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;

/* LE DAMOS UN ALIAS AS MODELSCOLORPRODUCT */
use App\Models\ColorProduct as Pivot;
use Livewire\Component;

class ColorProduct extends Component
{
    public $open=false;
    public $pivot_color_id,$pivot_quantity,$pivot;

    protected $listeners = ['delete'];

    public $product,$colors,$color_id,$quantity;

    protected $rules = [
        'color_id' =>'required',
        'quantity' => 'required|numeric'
    ];
    public function mount(){
        $this->colors = Color::all();
    }

    public function save(){
        $this->validate();

        $pivot = Pivot::where('color_id',$this->color_id)
                        ->where('product_id',$this->product->id)->first();
        
        if ($pivot) {
            $pivot->quantity = $pivot->quantity + $this->quantity;
            $pivot->save();
        }else{
        
            $this->product->colors()->attach([
                $this->color_id =>['quantity'=>$this->quantity]
            ]);
        }

        $this->reset(['color_id','quantity']);

        /* EMITIMOS PARA MOSTRAR UN TEXTO ROJO ACTUALIZADO */
        $this->emit('saved');
        


        $this->product = $this->product->fresh();
    }

    public function update(){
        $this->pivot->color_id = $this->pivot_color_id;
        $this->pivot->quantity = $this->pivot_quantity;
        $this->pivot->save();
        $this->open=false;
        $this->product = $this->product->fresh();
    }

    public function delete(Pivot $pivot){
        $pivot->delete();
        $this->product = $this->product->fresh();
        /* $this->emit('render'); */

    }

    public function edit(Pivot $pivot){
        $this->open=true;

        /* A ESTE MODELO LE DAMOS UN ALIAS ARRIBA YA QUE HAY UN COMPONENTE DE LIVEWIRE CON EL MISMO NOMBRE  */
        $this->pivot = $pivot;
        $this->pivot_color_id = $this->pivot->color_id;
        $this->pivot_quantity = $this->pivot->quantity;        

    }

    public function render()
    {
        $product_colors = $this->product->colors;
        return view('livewire.admin.color-product',compact('product_colors'));
    }
}
