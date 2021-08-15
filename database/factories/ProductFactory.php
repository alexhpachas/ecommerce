<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);
        $subcategory = Subcategory::all()->random();//Recuperamos todas las categorias y elegimos una al azar para asignarme al campo subcategory_id.

        $category = $subcategory->category; // Aui recuperamos la categoria gracias a la relacion que tienen esas tablas 

        $brand = $category->brands->random(); //Aqui recuperamos la marca de cada categoria, fgracias a la relacion Eloquen y seleccionaamos una al azar
        if($subcategory->color){
            $quantity=null;
        }else{
            $quantity=15;
        }

        return [
            'name'=> $name,
            'slug'=>Str::slug($name),
            'description'=>$this->faker->text(),
            'price'=>$this->faker->randomElement([19.99, 49.99, 99.99]),
            'subcategory_id'=>$subcategory->id,
            'brand_id'=>$brand->id,
            'quantity'=>$quantity,
            'status'=>2
        ];
    }
}
