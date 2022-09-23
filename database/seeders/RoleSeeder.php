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
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Empleado']);

        // Lista de permisos, nombre y descripcion
        $permissions = [
            ['name' => 'admin.home', 'description' => 'Ver el dashboard'],
            ['name' => 'users.index', 'description' => 'Ver lista de usuarios'],
            ['name' => 'users.edit', 'description' => 'Asignar rol a usuarios'],
            ['name' => 'roles.index', 'description' => 'Ver lista de roles'],
            ['name' => 'roles.edit', 'description' => 'Editar roles'],
            ['name' => 'roles.create', 'description' => 'Crear roles'],
            ['name' => 'roles.destroy', 'description' => 'Eliminar roles'],
            ['name' => 'product.index', 'description' => 'Ver lista de productos'],
            ['name' => 'product.edit', 'description' => 'Editar productos'],
            ['name' => 'product.create', 'description' => 'Crear productos'],
            ['name' => 'product.destroy', 'description' => 'Eliminar productos'],
            ['name' => 'category.index', 'description' => 'Ver lista de categorias'],
            ['name' => 'category.edit', 'description' => 'Editar categorias'],
            ['name' => 'category.create', 'description' => 'Crear categorias'],
            ['name' => 'category.destroy', 'description' => 'Eliminar categorias'],
            ['name' => 'client.index', 'description' => 'Ver lista de clientes'],
            ['name' => 'client.edit', 'description' => 'Editar clientes'],
            ['name' => 'client.create', 'description' => 'Crear clientes'],
            ['name' => 'client.destroy', 'description' => 'Eliminar clientes'],
            ['name' => 'provider.index', 'description' => 'Ver lista de proveedores'],
            ['name' => 'provider.edit', 'description' => 'Editar proveedores'],
            ['name' => 'provider.create', 'description' => 'Crear proveedores'],
            ['name' => 'provider.destroy', 'description' => 'Eliminar proveedores'],
            ['name' => 'purchase.index', 'description' => 'Ver lista de compras'],
            ['name' => 'purchase.edit', 'description' => 'Editar compras'],
            ['name' => 'purchase.create', 'description' => 'Crear compras'],
            ['name' => 'purchase.destroy', 'description' => 'Eliminar compras'],
            ['name' => 'invoice.index', 'description' => 'Ver lista de facturas'],
            ['name' => 'invoice.edit', 'description' => 'Editar facturas'],
            ['name' => 'invoice.create', 'description' => 'Crear facturas'],
            ['name' => 'invoice.destroy', 'description' => 'Eliminar facturas'],
            ['name' => 'report.index', 'description' => 'Ver lista de reportes'],
            ['name' => 'report.edit', 'description' => 'Editar reportes'],
            ['name' => 'report.create', 'description' => 'Crear reportes'],
            ['name' => 'report.destroy', 'description' => 'Eliminar reportes'],
        ];

        // Crear permisos
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission['name'],
                'description' => $permission['description']
            ]);
        }

        // Agregar todos los permisos al rol de administrador
        $role1->syncPermissions(Permission::all());

        // Asignar permisos al rol
        $role2->syncPermissions([
            'product.index',
            'product.create',
            'product.edit',
            'product.destroy',
            'category.index',
            'category.create',
            'category.edit',
            'category.destroy',
            'client.index',
            'client.create',
            'client.edit',
            'client.destroy',
            'provider.index',
            'provider.create',
            'provider.edit',
            'provider.destroy',
            'invoice.index',
            'invoice.create',
            'invoice.edit',
            'invoice.destroy',
        ]);
    }
}
