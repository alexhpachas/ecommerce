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
    public $openDelete;

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

        $this->emit('create','El Stock ha sido agregado');

        $this->size = $this->size->fresh();

    }

    public function edit(Pivot $pivot){
        $this->open=true;
        $this->pivot = $pivot;
        $this->pivot_color_id = $pivot->color_id;
        $this->pivot_quantity = $pivot->quantity;        
    }

    public function editDelete(Pivot $pivot){
        $this->openDelete=true;
        $this->pivot = $pivot;
        $this->pivot_color_id = $pivot->color_id;
        $this->pivot_quantity = $pivot->quantity;        
    }

    public function update(){

        $this->pivot->color_id = $this->pivot_color_id;
        $this->pivot->quantity = $this->pivot_quantity;
             
        $this->pivot->save();        
        $this->reset(['pivot_quantity','open']);
        $this->size = $this->size->fresh();      
        $this->emit('update','El Stock y Color ha sido actualizado');  
        

    }

    public function updateDelete(){

        $this->pivot->color_id = $this->pivot_color_id;
        $this->pivot->quantity = $this->pivot_quantity;
             
        $this->pivot->delete();        
        $this->reset(['pivot_quantity','openDelete']);
        $this->size = $this->size->fresh();      
        $this->emit('update','El Stock y Color ha sido eliminado');  
        

    }

    /* ESTE METODO DELETE NO SE ESTA UTILIZANDO YA QUE DA ERROR AL EJECUTAR, SE ESTA UTILIZANDO EL METODO UpdateDelete */
    public function delete(Pivot $pivot){
        
        $this->pivot = $pivot;
        $this->pivot->delete();
        $this->size = $this->size->fresh();  
        
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
