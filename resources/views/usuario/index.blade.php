@extends('plantilla.app') <!-- Extiende la plantilla principal -->

@section('contenido')
<div class="app-content mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Usuarios</h3> <!-- Título de la tabla de usuarios -->
                    </div>
                    <div class="card-body table-responsive">
                        <div>
                            <!-- Formulario para la búsqueda de usuarios -->
                            <form action="{{ route('usuarios.index') }}" method="GET">
                                <div class="input-group">
                                    <input name="texto" type="text" class="form-control" 
                                           value="{{ request('texto') }}" placeholder="Buscar usuario">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-secondary">
                                            <i class="fas fa-search"></i> Buscar
                                        </button>
                                        @can('usuario-crear') <!-- Verifica si el usuario tiene permiso para crear -->
                                        <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Nuevo</a>
                                        @endcan
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="mt-3">
                            <!-- Mensajes de éxito o error -->
                            @if(Session::has('mensaje'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ Session::get('mensaje') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            @if(Session::has('error'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ Session::get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                        </div>

                        <div class="mt-3">
                            <!-- Tabla de usuarios -->
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Opciones</th> <!-- Botones de edición/eliminación -->
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Rol</th>
                                        <th>Permisos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($usuarios->isEmpty()) <!-- Si no hay registros -->
                                    <tr>
                                        <td colspan="6">No hay registros que coincidan con la búsqueda.</td>
                                    </tr>
                                    @else
                                    @foreach($usuarios as $user)
                                    <tr class="align-middle">
                                        <td>
                                            @can('usuario-editar') <!-- Permiso para editar -->
                                            <a href="{{ route('usuarios.edit', $user->id) }}" 
                                               class="btn btn-secondary btn-sm">&#9998;</a>
                                            @endcan
                                            @can('usuario-eliminar') <!-- Permiso para eliminar -->
                                            <button class="btn btn-danger btn-sm" 
                                                    data-bs-toggle="modal" data-bs-target="#modal-eliminar-{{ $user->id }}">
                                                &#128465;
                                            </button>
                                            @endcan
                                        </td>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->nombre }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @foreach($user->roles as $role) <!-- Muestra los roles del usuario -->
                                                <span class="badge bg-info">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($user->getAllPermissions() as $permission) <!-- Muestra los permisos -->
                                                <span class="badge bg-success">{{ $permission->name }}</span>
                                            @endforeach
                                        </td>
                                    </tr>
                                    @include('usuario.delete', ['user' => $user]) <!-- Incluye el modal de eliminación -->
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer clearfix">
                        {{ $usuarios->links() }} <!-- Paginación de usuarios -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



<!--usuario.index.blade.php-->