<?php

namespace Database\Seeders;

use App\Models\Slide;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slide::create([
            'title' => 'Zapatillas',
            'url' => '#',
            'image' => 'https://dynamic-yield.linio.com//api/scripts/8767678/images/341564090773f__3d601ed2-2c3e-11ec-bb46-ee0232e4a10d.jpeg',
            'image_small' => '',
            'slide_category_id' => 1,
        ]);

        Slide::create([
            'title' => 'Celular',
            'url' => '#',
            'image' => 'https://dynamic-yield.linio.com//api/scripts/8767678/images/279805a7744b4__appdays_bbe2_celulares.jpg',
            'image_small' => '',
            'slide_category_id' => 1,
        ]);

        Slide::create([
            'title' => 'SmartTV',
            'url' => '#',
            'image' => 'https://dynamic-yield.linio.com//api/scripts/8767678/images/285693a85da02__appdays_bbe4_tvs.jpg',
            'image_small' => '',
            'slide_category_id' => 1,
        ]);
    }
}
