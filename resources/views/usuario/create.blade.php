@extends('plantilla.app') <!-- Extiende la plantilla principal -->

@section('contenido')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">Crear Usuario</div> <!-- Título de la tarjeta -->

        <div class="card-body">
            <!-- Formulario para crear un nuevo usuario -->
            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf <!-- Token de seguridad para evitar ataques CSRF -->

                <!-- Campo para el nombre del usuario -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <!-- Campo para el correo electrónico -->
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <!-- Campo para la contraseña -->
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <!-- Selección de roles -->
                <div class="mb-3">
                    <label for="role" class="form-label">Rol</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="">Seleccione un rol</option> <!-- Opción por defecto -->
                        @foreach($roles as $role) <!-- Recorre los roles disponibles -->
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Botones de acción -->
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection

<!-- usuario.create.blade.php -->