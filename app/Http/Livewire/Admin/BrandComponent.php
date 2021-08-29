<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Livewire\Component;

class BrandComponent extends Component
{
    public $brands,$brand,$openMarcaCreate=false;

    protected $listeners = ['delete','render'];

    /* CREAMOS ESA PROPIEDA Y DEFINIMOS TODOS LOS CAMPOS A CREAR  */
    public $createForm=[
        'name' =>null,
    ];

    /* CREAMOS ESA PROPIEDA Y DEFINIMOS LOS CAMPOS A EDITAR */
    public $editForm=[
        'open' => false,
        'name' =>null,
    ];

    /* DEFINIMOS LA REGLAS DE VALIDACION DE LA PROPIEDAD ACCEDO AL CAMPOS Y LE DECIMOS QUE ES UN CAMPO REQUERIDO */
    public $rules = [
        'createForm.name' => 'required|unique:brands,name'
    ];

    /* SI FALLA LA VALIDACION EN EL CAMPO NAME QUE ME MUESTRE COMO NOMBRE, YA QUE POR DEFECTO MUESTRA CREATEFORM.NAME */
    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'editForm.name' => 'nombre'
    ];
    
    /* CREAMOS ESTE METODO PARA LLENAR EN ESA VARIABLE TODAS LAS MARCAS EXISTENTES */
    public function getBrands(){
        $this->brands = Brand::all();
    }

    /* NI BIEN ENTREMOS A LA RUTA TENEMOS TODAS LAS MARCAS CARGADAS */
    public function mount(){
        $this->getBrands();
    }

    public function save(){
        $this->validate();
        Brand::create($this->createForm);
        $this->reset('createForm','openMarcaCreate');
        $this->getBrands();
    }

    public function edit(Brand $brand){
        $this->resetValidation();
        $this->brand = $brand;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $brand->name;
    }

    public function update(){
        $this->validate([
            'editForm.name' => 'required|unique:brands,name,'.$this->brand->id,
        ]);
        $this->brand->update($this->editForm);
        $this->reset('editForm');        
        
        $this->getBrands();
        
        return redirect()->route('admin.brands.index');

    }

    public function cancelar(){
        $this->reset('createForm','editForm','openMarcaCreate');
        $this->resetValidation();
    }

    public function delete(Brand $brand){    
        $this->emit('eliminar',"La Marca Fue Eliminada");
        $brand->delete();
        $this->getBrands();
    }

    public function render()
    {
        return view('livewire.admin.brand-component')->layout('layouts.admin');
    }

}
