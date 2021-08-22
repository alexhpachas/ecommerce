<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use App\Models\ColorSize as Pivot;
use App\Models\Historial;
use Livewire\Component;


class ColorSize extends Component
{
    public $size;
    public $colors;
    public $color_id;
    public $quantity;
    public $pivot;
    public $open=false;
    public $pivot_color_id;
    public $pivot_quantity;

    protected $listeners =['delete'];

    protected $rules = [
        'color_id' =>'required',
        'quantity' => 'required|numeric'
    ];

    

    public function save(){
        $this->validate();

        $pivot = Pivot::where('color_id',$this->color_id)
                        ->where('size_id',$this->size->id)->first();

        if ($pivot) {
            $pivot->quantity = $pivot->quantity + $this->quantity;
            $pivot->save();
        }else{        
            $this->size->colors()->attach([
                $this->color_id =>['quantity'=>$this->quantity]
            ]);
        }

        $this->reset(['color_id','quantity']);

        $this->reset(['color_id','quantity']);

        /* EMITIMOS PARA MOSTRAR UN TEXTO ROJO ACTUALIZADO */
        $this->emit('saved');

        $this->size = $this->size->fresh();

    }

    public function edit(Pivot $pivot){
        $this->open=true;
        $this->pivot = $pivot;
        $this->pivot_color_id = $pivot->color_id;
        $this->pivot_quantity = $pivot->quantity;
    }

    public function update(){
        /* PROBANDO HISTORIAL DE MOVIMIENTOS */
        /* $historial = new Historial();
        $historial->motivo="actualizar";
        $historial->color_id = $this->pivot_color_id;
        $historial->quantity_anterior = $this->pivot->quantity;
        $historial->quantity_nuevo = $this->pivot_quantity;
        $historial->usuario = auth()->user()->name;
        $historial->save(); */
        /* HISTORIAL DE MOVIMIENTO  */

        $this->pivot->color_id = $this->pivot_color_id;
        $this->pivot->quantity = $this->pivot_quantity;
             
        $this->pivot->save();        
        $this->reset(['pivot_color_id','pivot_quantity','open']);
        $this->size = $this->size->fresh();        

    }

    public function delete(Pivot $pivot){
        $pivot->delete();
        $this->size = $this->size->fresh();  
        
        /* $this->emit('render'); */
    }

    public function mount(){
        $this->colors = Color::all();
    }
    public function render()
    {        
        $size_colors = $this->size->colors;
        return view('livewire.admin.color-size',compact('size_colors'));
    }
}
