<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use Livewire\Component;

class DepartmentComponent extends Component
{
    protected $listeners = ['delete'];

    public $departments,$department;    

    public $createForm = [
        'name' =>''
    ];

    public $editForm =[
        'open' => false,
        'name' =>'required'
    ];

    protected $validationAttributes = [
        'editForm.name' => 'nombre',
        'createForm.name' => 'nombre'
    ];


    public function getDepartments(){
        $this->departments = Department::all();    
    }
    
    public function mount(){
        $this->getDepartments();
    }

    public function save(){

        $this->validate([
            'createForm.name' => 'required'
        ]);

        Department::create($this->createForm);
        $this->reset('createForm');
        $this->getDepartments();
        $this->emit('actualizar');
    }

    public function edit(Department $department){
        $this->resetValidation();
        $this->department = $department;
        $this->editForm['open'] = true;
        $this->editForm['name']= $department->name;        
    }

    public function update(){
        $this->validate([
            'editForm.name' => 'required'
        ]);
        
        $this->department->name = $this->editForm['name'];
        $this->department->save();
        $this->reset('editForm');
        $this->getDepartments();
    }

    public function delete(Department $department){
        $department->delete();
        $this->getDepartments();

        /* EMITIMOS MENSAJE PARA SWEET ALERT2 */
        $this->emit('eliminar','Departamento fue Eliminado');
    }

    public function render()
    {
        return view('livewire.admin.department-component')->layout('layouts.admin');
    }
}
