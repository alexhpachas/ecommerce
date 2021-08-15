<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [

            /* SUBCATEGORIAS PARA CELULARES Y TABLES */
            [
                'category_id'=>1,
                'name'=>'Celulares y Smarphone',
                'slug'=>Str::slug('Celulares y Smarphone'),
                'color' => true                
            ],
            [
                'category_id'=>1,
                'name'=>'Accesorios para celulares',
                'slug'=>Str::slug('Accesorios para celulares'),                
            ],
            [
                'category_id'=>1,
                'name'=>'Smartwatches',
                'slug'=>Str::slug('Accesorios para celulares'),                
            ],

            /* SUBCATEGORIA PARA TV AUDIO */
            [
                'category_id'=>2,
                'name'=>'TV y audio',
                'slug'=>Str::slug('TV y audio'),                
            ],
            [
                'category_id'=>2,
                'name'=>'Audios',
                'slug'=>Str::slug('Audios'),                
            ],
            [
                'category_id'=>2,
                'name'=>'Audio para autos',
                'slug'=>Str::slug('Audio para autos'),                
            ],

            /* SUBCATEGORIA PARA CONSOLA Y VIDEO JUEGOS */
            [
                'category_id'=>3,
                'name'=>'Xbox',
                'slug'=>Str::slug('xbox'),                
            ],
            [
                'category_id'=>3,
                'name'=>'Play Station',
                'slug'=>Str::slug('Play Station'),                
            ],
            [
                'category_id'=>3,
                'name'=>'Video Juegos para pc',
                'slug'=>Str::slug('Video Juegos para pc'),                
            ],
            [
                'category_id'=>3,
                'name'=>'Nintendo',
                'slug'=>Str::slug('Nintendo'),                
            ],

            /* SUBCATEGORIA PARA COMPUTACION */
            [
                'category_id'=>4,
                'name'=>'Portatiles',
                'slug'=>Str::slug('Portatiles'),                
            ],
            [
                'category_id'=>4,
                'name'=>'Pc escritorio',
                'slug'=>Str::slug('Pc escritorio'),                
            ],
            [
                'category_id'=>4,
                'name'=>'Almacenamiento',
                'slug'=>Str::slug('Almacenamiento'),                
            ],
            [
                'category_id'=>4,
                'name'=>'Accesorio computadora',
                'slug'=>Str::slug('Accesorio computadora'),                
            ],

            /* SUBCATEGORIA PARA MODA */
            [
                'category_id'=>5,
                'name'=>'Mujeres',
                'slug'=>Str::slug('Mujeres'), 
                'color'=>true,
                'size'=>true               
            ],
            [
                'category_id'=>5,
                'name'=>'Hombres',
                'slug'=>Str::slug('Hombres'),   
                'color'=>true,
                'size'=>true             
            ],
            [
                'category_id'=>5,
                'name'=>'Lentes',
                'slug'=>Str::slug('Lentes'),                
            ],
            [
                'category_id'=>5,
                'name'=>'Relojes',
                'slug'=>Str::slug('Relojes'),                
            ],
        ];

        foreach ($subcategories as $subcategory) {
            Subcategory::factory(1)->create($subcategory);
        }
    }
}
