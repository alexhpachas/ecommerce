<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends Component
{
    use WithPagination;

    public $category,$subcategoria,$marca;   
    
    /* VARIABLE PARA CAPTURAR SI EL CONTENIDO SERA VISTO EN LISTA O GRID */
    public $view = 'grid';

    public $queryString = ['subcategoria','marca'];

    public function updatedSubcategoria(){
        $this->resetPage();
    }

    public function updatedMarca(){
        $this->resetPage();
    }

    public function render()
    {
        /* $products = $this->category->products()->where('status',2)->paginate(20); */
        $productsQuery = Product::query()->whereHas('subcategory.category', function(Builder $query){
            $query->where('id',$this->category->id);
        });


        /* FILTRO POR CATEGORIA */
        if($this->subcategoria){
            $productsQuery = $productsQuery->whereHas('subcategory',function(Builder $query){
                $query->where('slug',$this->subcategoria);            
            });
        }

        /* FILTRO POR MARCA */
        if($this->marca){
            $productsQuery = $productsQuery->whereHas('brand',function(Builder $query){
                $query->where('name',$this->marca);
            });
        }

        /* ARMAMOS LA LISTA DE PRODUCTOS DEACUERDO A LA BUSQUEDA */
        $products = $productsQuery->paginate(20);

        /* PASAMOS LOS PRODUCTOS A LA VISTA */
        return view('livewire.category-filter',compact('products'));
        
    }

    /* ELIMINAR TODO EL FILTRO DE BUSQUEDA CATEGORIA Y MARCA */
    public function limpiar(){
        $this->reset(['subcategoria','marca','page']);
    }
}
