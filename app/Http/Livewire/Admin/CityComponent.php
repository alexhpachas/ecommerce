<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\District;
use Livewire\Component;

class CityComponent extends Component
{
    protected $listeners = ['delete'];

    public $city,$districts,$district;    

    public $createForm = [
        'name' =>''        
    ];

    public $editForm =[
        'open' => false,
        'name' =>''
    ];

    protected $validationAttributes = [
        'editForm.name' => 'nombre',        
        'createForm.name' => 'nombre',        
    ];

    public function getDistrics(){
        $this->districts = District::where('city_id',$this->city->id)->get(); 
    }


    public function mount(City $city){
        $this->city = $city;
        $this->getDistrics();
    }

    public function save(){

        $this->validate([
            'createForm.name' => 'required',            
        ]);

        $this->city->districts()->create($this->createForm);
        /* City::create($this->createForm); */
        $this->reset('createForm');
        $this->getDistrics();
        $this->emit('actualizar');
    }

    public function edit(District $district){
        $this->resetValidation();
        $this->district = $district;
        $this->editForm['open'] = true;
        $this->editForm['name']= $district->name;   
          
    }

    public function update(){
        $this->validate([
            'editForm.name' => 'required',            
        ]);
        
        $this->district->name = $this->editForm['name'];
        
        $this->district->save();
        $this->reset('editForm');
        $this->getDistrics();
    }

    public function delete(District $district){
        $district->delete();
        $this->getDistrics();

        /* EMITIMOS PARA MOSTRAR UNA ALERTA SWEET ALERT 2 */        
        $this->emit('eliminar','El distrito fue, Eliminado');
    }


    public function render()
    {
        return view('livewire.admin.city-component')->layout('layouts.admin');
    }
}
