<?php

namespace Database\Seeders;

use App\Models\Utility;
use Illuminate\Database\Seeder;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Utility::create([
            'name' => 'ALEX HUAMAN PACHAS',
            'celular' => '956895580',
            'description' => 'YAPE',
            'qr' => 'YAPE',
        ]);

        Utility::create([
            'name' => 'ANGEMAR HUAMAN PACHAS',
            'celular' => '976316753',
            'description' => 'PLIM',
            'qr' => 'PLIM',
        ]);

        Utility::create([
            'name' => 'MILUSKA HUAMAN PACHAS',
            'celular' => '912556764',
            'description' => 'TUNKI',
            'qr' => 'TUNKI',
        ]);

        Utility::create([
            'name' => 'KEYMI HUAMAN PACHAS',
            'celular' => '91255652',
            'description' => 'LUKITA',
            'qr' => 'LUKITA',
        ]);
    }
}