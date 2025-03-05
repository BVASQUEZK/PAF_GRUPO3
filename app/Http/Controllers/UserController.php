<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Muestra la lista de usuarios con sus roles y permisos.
     */
    public function index()
    {
        $usuarios = User::with('roles', 'permissions')->paginate(10); // Obtiene usuarios con roles y permisos, paginados en grupos de 10
        return view('usuario.index', compact('usuarios')); // Retorna la vista con los usuarios
    }

    /**
     * Muestra el formulario de creación de un nuevo usuario.
     */
    public function create()
    {
        $roles = Role::all(); // Obtiene todos los roles disponibles
        return view('usuario.create', compact('roles')); // Retorna la vista de creación con los roles
    }

    /**
     * Guarda un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación de los datos ingresados
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        // Creación del usuario con los datos validados
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) // Se encripta la contraseña antes de guardarla
        ]);

        return redirect()->route('usuarios.index')->with('mensaje', 'Usuario creado correctamente.'); // Redirección con mensaje de éxito
    }

    /**
     * Elimina un usuario de la base de datos.
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id); // Busca el usuario por ID o falla si no existe
        $usuario->delete(); // Elimina el usuario

        return redirect()->route('usuarios.index')->with('mensaje', 'Usuario eliminado correctamente.'); // Redirección con mensaje
    }

    /**
     * Muestra el formulario de edición de un usuario específico.
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id); // Busca el usuario por ID
        return view('usuario.edit', compact('usuario')); // Retorna la vista de edición con los datos del usuario
    }

    /**
     * Actualiza la información de un usuario en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id); // Busca el usuario por ID

        // Validación de los datos ingresados
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $usuario->id, // Permite el mismo email si no se cambia
            'password' => 'nullable|min:6|confirmed' // La contraseña es opcional
        ]);

        // Se actualizan los datos del usuario
        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if ($request->filled('password')) { // Si se ingresó una nueva contraseña, se actualiza
            $usuario->password = bcrypt($request->password);
        }

        $usuario->save(); // Guarda los cambios en la base de datos

        return redirect()->route('usuarios.index')->with('mensaje', 'Usuario actualizado correctamente.'); // Redirección con mensaje de éxito
    }
}

//UserController
