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

        Permission::create(['name' => 'admin.categorias.index', 'description' => 'Ver Listado de categoria'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categorias.create', 'description' => 'Crear categoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categorias.edit', 'description' => 'Editar datos de categoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categorias.destroy', 'description' => 'Eliminar categoria'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.productos.index', 'description' => 'Ver Listado de Productos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.productos.create', 'description' => 'Crear Productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.productos.edit', 'description' => 'Editar datos de Productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.productos.destroy', 'description' => 'Eliminar Productos'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.proveedor.index', 'description' => 'Ver Listado de Proveedores'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.proveedor.create', 'description' => 'Crear Proveedor'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.proveedor.edit', 'description' => 'Editar datos de Proveedor'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.proveedor.destroy', 'description' => 'Eliminar proveedor'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.notaingreso.index', 'description' => 'Ver Listado de ingreso'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.notaingreso.create', 'description' => 'Crear ingreso'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.notaingreso.edit', 'description' => 'Editar datos de ingreso'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.notaingreso.destroy', 'description' => 'Eliminar ingreso'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.detallesingreso.index', 'description' => 'Ver detalle de ingreso'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.detallesingreso.create', 'description' => 'Crear detalle ingreso'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.detallesingreso.edit', 'description' => 'Editar detalles de ingreso'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.detallesingreso.destroy', 'description' => 'Eliminar detalles ingreso'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.lote.index', 'description' => 'Ver Lote'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.lote.create', 'description' => 'Crear Lote'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.lote.edit', 'description' => 'Editar Lote'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.lote.destroy', 'description' => 'Eliminar Lote'])->syncRoles([$role1]);

        //Permission::create(['name' => 'admin.bitacoras.index','description'=>'Ver Bitacora'])->syncRoles([$role1]);
    }
}
