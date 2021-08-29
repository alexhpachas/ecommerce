<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;




class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'superadmin']);
        $role2 = Role::create(['name' => 'admin']);

        Permission::create(['name' => 'admin.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.products.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.products.edit'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.products.files'])->syncRoles([$role1]);;

        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.categories.delete'])->syncRoles([$role1]);;


        Permission::create(['name' => 'admin.brands.index'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.brands.create'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.brands.edit'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.brands.delete'])->syncRoles([$role1]);;

        
        Permission::create(['name' => 'admin.orders.index'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.orders.create'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.orders.edit'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.orders.delete'])->syncRoles([$role1]);;

        Permission::create(['name' => 'admin.departments.index'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.departments.create'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.departments.edit'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.departments.delete'])->syncRoles([$role1]);;
        
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);;

        Permission::create(['name' => 'admin.cities.index'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.cities.create'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.cities.edit'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.cities.delete'])->syncRoles([$role1]);;

    }
}
