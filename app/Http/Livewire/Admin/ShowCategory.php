<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Support\Str;

class ShowCategory extends Component
{
    public $category, $subcategories,$subcategory;
    public $openSubcategoryCreate=false;

    protected $listeners=['delete'];

    protected $rules = [
        'createForm.name' =>'required',
        'createForm.slug' =>'required|unique:subcategories,slug',
        'createForm.color' =>'required',
        'createForm.size' => 'required'
    ];

    public $createForm = [          
        'name' => null,
        'slug' => null,
        'color' => false,
        'size' =>false
    ];

    public $editForm = [   
        'open' => false,       
        'name' => null,
        'slug' => null,
        'color' => false,
        'size' =>false
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.slug' => 'slug',
        'createForm.color' => 'color',
        'createForm.size' => 'talla',

        
    ];

    public function updatedCreateFormName($value){
        $this->createForm['slug'] = Str::slug($value);
    }

    public function updatedEditFormName($value){
        $this->editForm['slug'] = Str::slug($value);
    }

    public function mount(Category $category){
        $this->category = $category;
        $this->getSubCategories();
    }

    public function getSubCategories(){
        $this->subcategories = Subcategory::where('category_id',$this->category->id)->get();
    }

    public function save(){
        $this->validate();
        $this->category->subcategories()->create($this->createForm);
        $this->reset('createForm','openSubcategoryCreate');
        $this->getSubCategories();
        $this->emit('create','Se ha creado la Subcategoria');
    }

    public function edit(Subcategory $subcategory){
        $this->resetValidation();
        $this->editForm['open'] = true;
        $this->editForm['name'] = $subcategory->name;
        $this->editForm['slug'] = $subcategory->slug;
        $this->editForm['color'] = $subcategory->color;
        $this->editForm['size'] = $subcategory->size;
        $this->subcategory =$subcategory;
    }

    public function cancelar(){
        $this->reset('createForm','editForm','openSubcategoryCreate');
        $this->resetValidation();
    }

    public function update(){
        $this->validate([
        'editForm.name' =>'required',
        'editForm.slug' =>'required|unique:subcategories,slug,'.$this->subcategory->id,
        'editForm.color' =>'required',
        'editForm.size' => 'required'
        ]);

        $this->subcategory->update($this->editForm);
        $this->getSubCategories();
        $this->reset('editForm');
        $this->emit('update','La Subcategoria se ha actualizado');
        
    }

    public function delete(Subcategory $subcategory){
        $this->subcategory = $subcategory;
        $this->subcategory->delete();
        $this->getSubCategories();

        $this->emit('eliminar','La Subcategoria fue Eliminada');
    }

    public function render()
    {
        return view('livewire.admin.show-category')->layout('layouts.admin');
    }
}
