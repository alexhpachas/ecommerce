<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\Department;
use Livewire\Component;

class ShowDepartment extends Component
{
    protected $listeners = ['delete'];

    public $department,$cities,$city;   
    public $openCreateCity = false; 

    public $createForm = [
        'name' =>'',
        'cost' => null
    ];

    public $editForm =[
        'open' => false,
        'name' =>'',
        'cost' => null
    ];

    protected $validationAttributes = [
        'editForm.name' => 'nombre',
        'editForm.cost' => 'costo',
        'createForm.name' => 'nombre',
        'createForm.cost' => 'costo'
    ];

    public function getCities(){
        $this->cities = City::where('department_id',$this->department->id)->get(); 
    }

    public function save(){

        $this->validate([
            'createForm.name' => 'required|unique:cities,name',
            'createForm.cost' => 'required|numeric|min:1|max:100'
        ]);

        $this->department->cities()->create($this->createForm);
        /* City::create($this->createForm); */
        $this->reset('createForm','openCreateCity');
        $this->getCities();
        $this->emit('create','La Provincia ha sido creada');
    }

    public function edit(City $city){
        $this->resetValidation();
        $this->city = $city;
        $this->editForm['open'] = true;
        $this->editForm['name']= $city->name;   
        $this->editForm['cost']= $city->cost;        
    }

    public function cancelar(){
        $this->resetValidation();
        $this->reset('createForm','editForm','openCreateCity');
    }

    public function update(){
        $this->validate([
            'editForm.name' => 'required|unique:cities,name,'.$this->city->id,
            'editForm.cost' => 'required'
        ]);
        
        $this->city->name = $this->editForm['name'];
        $this->city->cost = $this->editForm['cost'];
        $this->city->save();
        $this->reset('editForm');
        $this->getCities();
        $this->emit('update','La Provincia ha sido actualizada');
    }

    public function delete(City $city){
        $this->city = $city;
        $this->city->delete();
        $this->getCities();

        $this->emit('eliminar','La Provincia fue, Eliminada');
    }

    public function mount(Department $department){
        $this->$department = $department;
        $this->getCities();
    }
    public function render()
    {
        return view('livewire.admin.show-department')->layout('layouts.admin');
    }
}
