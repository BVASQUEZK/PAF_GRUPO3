<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Limpiar caché de permisos
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Lista de permisos
        $permissions = [
            'ver_ventas',
            'crear_ventas',
            'editar_ventas',
            'eliminar_ventas',
            'ver_usuarios',
            'administrar_roles',
            'ver_reportes_financieros' 
        ];

        // Crear permisos si no existen
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear roles si no existen
        $admin = Role::firstOrCreate(['name' => 'Administrador']);
        $vendedor = Role::firstOrCreate(['name' => 'Vendedor']);
        $contador = Role::firstOrCreate(['name' => 'Contador']); // Agregamos el rol de Contador

        // Asignar permisos a roles
        $admin->syncPermissions($permissions); // El admin tiene todos los permisos
        $vendedor->syncPermissions(['ver_ventas', 'crear_ventas']); // Un vendedor solo puede ver y crear ventas
        $contador->syncPermissions(['ver_reportes_financieros']); // El contador solo puede ver reportes financieros
    }
}


//RolesAndPermissionsSeeder