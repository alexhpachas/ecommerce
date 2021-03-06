<?php

namespace Database\Seeders;

use App\Models\Slide;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Storage::deleteDirectory('categories');
        Storage::makeDirectory('categories');

        Storage::deleteDirectory('codigos');
        Storage::makeDirectory('codigos');

        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');

        Storage::deleteDirectory('subcategories');
        Storage::makeDirectory('subcategories');
        
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(ColorProductSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ColorSizeSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(PagoSeeder::class);
        $this->call(SliderCategorySeeder::class);
        $this->call(SliderSeeder::class);
        
    }
}
