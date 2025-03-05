<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Definir permisos
        $permisos = [
            'rol-listar', 'rol-crear', 'rol-editar', 'rol-eliminar',
            'usuario-listar', 'usuario-crear', 'usuario-editar', 'usuario-activar',
            'categoria-listar', 'categoria-crear', 'categoria-editar', 'categoria-activar',
            'producto-listar', 'producto-crear', 'producto-editar', 'producto-activar',
            'venta-listar', 'venta-crear', 'venta-editar', 'venta-anular',
            'reporte-financiero', 'reporte-inventario'
        ];

        foreach ($permisos as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear roles y asignar permisos
        $roles = [
            'Administrador' => $permisos,
            'Vendedor' => ['venta-listar', 'venta-crear'],
            'Contador' => ['reporte-financiero'], 
            'Gestor de Almacén' => [
                'categoria-listar', 'categoria-crear', 'categoria-editar', 'categoria-activar',
                'producto-listar', 'producto-crear', 'producto-editar', 'producto-activar',
                'reporte-inventario'
            ]
        ];


        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }

        // Crear usuarios y asignar roles
        $usuarios = [
            ['name' => 'Usuario Administrador', 'email' => 'admin@prueba.com', 'password' => 'admin', 'role' => 'Administrador'],
            ['name' => 'Usuario Vendedor', 'email' => 'vendedor@prueba.com', 'password' => 'vendedor', 'role' => 'Vendedor'],
            ['name' => 'Usuario Contador', 'email' => 'contador@prueba.com', 'password' => 'contador', 'role' => 'Contador'],
            ['name' => 'Usuario Gestor Almacén', 'email' => 'almacen@prueba.com', 'password' => 'almacen', 'role' => 'Gestor de Almacén'],
        ];

        foreach ($usuarios as $usuarioData) {
            $user = User::updateOrCreate(
                ['email' => $usuarioData['email']],
                ['name' => $usuarioData['name'], 'password' => Hash::make($usuarioData['password'])]
            );
            $user->syncRoles([$usuarioData['role']]);
        }
    }
}


// UsuarioSeeder.php