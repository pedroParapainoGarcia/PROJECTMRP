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
        $role2 = Role::create(['name' => 'Empleado']);

        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categorias.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categorias.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categorias.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categorias.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.productos.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.productos.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.productos.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.productos.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.proveedor.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.proveedor.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.proveedor.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.proveedor.destroy'])->syncRoles([$role1, $role2]);
    }
}
