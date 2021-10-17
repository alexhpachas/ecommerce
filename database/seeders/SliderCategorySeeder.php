<?php

namespace Database\Seeders;

use App\Models\SlideCategory;
use Illuminate\Database\Seeder;

class SliderCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SlideCategory::create([
            'name' => 'Home',
            'slug' => 'home'
        ]);
    }
}
