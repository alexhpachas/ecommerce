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
            'lastname'=>'Huamán Pachas',
            'email'=>'alex.pachas@gmail.com',
            'dni'=>'47364074',
            'phone'=>'912425976',
            'password'=>bcrypt('123456789')
        ])->assignRole('superadmin');;

        User::create([
            'name'=>'Angemar',
            'lastname'=>'Huaman Pachas',
            'email'=>'angemar@autonomadeica.edu.pe',
            'dni'=>'12345678',
            'phone'=>'956895580',
            'password'=>bcrypt('48256335')
        ])->assignRole('superadmin');;

        User::factory(50)->create();
    }
}
