<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'vendedor']);

        Permission::create(['name' => 'admin.home', 'description' => 'Ver dashboard Principal'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.usuarios.index', 'description' => 'Ver Lista de Usarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.create', 'description' => 'Crear Usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.edit', 'description' => 'Editar datos de Usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.destroy', 'description' => 'Eliminar Usuario'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver Lista de Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar datos de Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy', 'description' => 'Eliminar Rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categorias.index', 'description' => 'Ver Listado de categoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categorias.create', 'description' => 'Crear categoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categorias.edit', 'description' => 'Editar datos de categoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categorias.destroy', 'description' => 'Eliminar categoria'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.proveedores.index', 'description' => 'Ver Listado de Proveedores'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.proveedores.create', 'description' => 'Crear Proveedor'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.proveedores.edit', 'description' => 'Editar datos de Proveedor'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.proveedores.destroy', 'description' => 'Eliminar proveedor'])->syncRoles([$role1]);

        //Permission::create(['name' => 'admin.repuestos.index','description'=>'Ver Listado'])->syncRoles([$role1]);
        //Permission::create(['name' => 'admin.repuestos.create','description'=>'Crear Listado'])->syncRoles([$role1]);
        //Permission::create(['name' => 'admin.repuestos.edit','description'=>'Editar datos de Listado'])->syncRoles([$role1]);
        //Permission::create(['name' => 'admin.repuestos.destroy','description'=>'Eliminar Listado'])->syncRoles([$role1]);

        //Permission::create(['name' => 'admin.bitacoras.index','description'=>'Ver Bitacora'])->syncRoles([$role1]);
    }
}
