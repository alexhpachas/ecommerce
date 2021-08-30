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
        

        Permission::create(['name' => 'admin.index','description' => 'Dashboard'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.products.create','description' => 'Crear Producto'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.products.edit','description' => 'Editar Producto'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.products.files','description' => 'Eliminar Producto'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.products.public','description' => 'Publicar producto'])->syncRoles([$role1]);;

        Permission::create(['name' => 'admin.brands.index','description' => 'Ver lista de marcas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.brands.create','description' => 'Crear marca'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.brands.edit','description' => 'Editar marca'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.brands.delete','description' => 'Eliminar marca'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categories.index','description' => 'Ver lista Categoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.create','description' => 'Crear categoria'])->syncRoles([$role1]);                
        Permission::create(['name' => 'admin.categories.edit','description' => 'Editar categoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.delete','description' => 'Eliminar categoria'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categories.show','description' => 'Ver lista Subcategorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.subcategories.create','description' => 'Crear Subcategoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.subcategories.edit','description' => 'Editar Subcategoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.subcategories.delete','description' => 'Eliminar Subcategoria'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.orders.index','description' => 'Ver lista de compras'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.orders.show','description' => 'Ver detalles de compra'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.orders.edit','description' => 'Actualizar estado de compra'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.departments.index','description' => 'Ver lista departamentos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.departments.create','description' => 'Crear departamento'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.departments.edit','description' => 'Editar departamento'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.departments.delete','description' => 'Eliminar departamento'])->syncRoles([$role1]);

        
        Permission::create(['name' => 'admin.cities.index','description' => 'Ver lista de provincias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.cities.create','description' => 'Crear provincia'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.cities.edit','description' => 'Editar provincia'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.cities.delete','description' => 'Eliminar provincia'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.districts.index','description' => 'Ver lista distritos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.districts.create','description' => 'Crear distritos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.districts.edit','description' => 'Editar distrito'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.districts.delete','description' => 'Eliminar distrito'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.users.index','description' => 'Ver lista de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.create','description' => 'Dar Accesos'])->syncRoles([$role1]);
                                        
        Permission::create(['name' => 'admin.colors.index','description' => 'ver lista de colores'])->syncRoles([$role1]);;
        

    }
}
