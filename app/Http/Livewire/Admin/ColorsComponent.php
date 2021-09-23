<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use Livewire\Component;

class ColorsComponent extends Component
{
    public $colors,$color;
    public $openCreateColor = false;

    protected $listeners=['delete','render'];


    public $createForm=[
        'name' => null
    ];

    public $editForm=[
        'open' => false,
        'name' => null
    ];

    protected $rules =[
        'createForm.name' =>'required|unique:colors,name'
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'editForm.name' => 'nombre'
    ];

    public function render()
    {
        return view('livewire.admin.colors-component')->layout('layouts.admin');
    }

    public function save(){
        $this->validate();
        Color::create($this->createForm);
        $this->reset('createForm','openCreateColor');
        $this->getColors();

        $this->emit('create','El color ha sido creado');
    }

    public function edit(Color $color){
        $this->resetValidation();
        $this->color = $color;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $color->name;
    }

    public function update(){
        $this->validate([
            'editForm.name' => 'required|unique:colors,name,'.$this->color->id,
        ]);
        $this->color->update($this->editForm);
        $this->reset('editForm');                
        $this->getColors();
        $this->color = $this->color->refresh();
        $this->emit('update','El color ha sido Actualizado');
        $this->emitTo('admin.colors-component','render');
        
        
        /* return redirect()->route('admin.brands.index'); */

    }

    public function cancelar(){
        $this->resetValidation();
        $this->reset('createForm','editForm','openCreateColor');
        $this->getColors();
    }

    public function delete(Color $color){
        $color->delete();        
        $this->emit('eliminar','El Color fue Eliminado');
        $this->getColors();
    }

    public function mount(){
        $this->getColors();
    }

    public function getColors(){
        $this->colors= Color::all();
    }

    
}
