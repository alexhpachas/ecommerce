<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/* IMPORTAMOS ESA CLASE PARA CREAR UN ROL */
use Spatie\Permission\Models\Role;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* CREAMOS UN ROL */
        

        User::create([
            'name'=>'Alex Pachas',
            'email'=>'alex.pachas@gmail.com',
            'password'=>bcrypt('123456789')
        ])->assignRole('superadmin');;

        User::create([
            'name'=>'Angemar Huaman Pachas',
            'email'=>'angemar@autonomadeica.edu.pe',
            'password'=>bcrypt('48256335')
        ])->assignRole('superadmin');;

        User::factory(50)->create();
    }
}
