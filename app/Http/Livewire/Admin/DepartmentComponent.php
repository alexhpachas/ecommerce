<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use Livewire\Component;

class DepartmentComponent extends Component
{
    protected $listeners = ['delete'];

    public $departments,$department;    
    public $openCreateDepartamento=false;

    public $createForm = [
        'name' =>''
    ];

    public $editForm =[
        'open' => false,
        'name' =>null
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
            'createForm.name' => 'required|unique:departments,name'
        ]);

        Department::create($this->createForm);
        $this->reset('createForm','openCreateDepartamento');
        $this->getDepartments();
        $this->emit('create','El departamento ha sido creado');
    }

    public function edit(Department $department){
        $this->resetValidation();
        $this->department = $department;
        $this->editForm['open'] = true;
        $this->editForm['name']= $department->name;        
    }

    public function update(){
        $this->validate([
            'editForm.name' => 'required|unique:departments,name,'.$this->department->id,
        ]);
        
        $this->department->name = $this->editForm['name'];
        $this->department->save();
        $this->reset('editForm');
        $this->getDepartments();
        $this->emit('update','El departamento ha sido actualizado');
    }

    public function delete(Department $department){
        $this->department = $department;
        $this->department->delete();
        $this->getDepartments();

        /* EMITIMOS MENSAJE PARA SWEET ALERT2 */
        $this->emit('eliminar','El Departamento fue Eliminado');
    }

    public function cancelar(){
        $this->reset(['editForm','openCreateDepartamento']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.admin.department-component')->layout('layouts.admin');
    }
}
