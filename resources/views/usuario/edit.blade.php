@extends('plantilla.app') <!-- Extiende la plantilla principal -->

@section('contenido')
<div class="app-content mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Editar Usuario</h3> <!-- Título de la página -->
                    </div>
                    <div class="card-body">
                        <!-- Formulario para actualizar los datos del usuario -->
                        <form method="post" action="{{route('usuarios.update', ['usuario'=>$usuario])}}">
                            @csrf <!-- Token de seguridad para evitar ataques CSRF -->
                            @method('PUT') <!-- Método PUT para la actualización -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" name="name" 
                                               placeholder="Ingrese nombre" required value="{{$usuario->name}}">
                                        @error('name') <!-- Muestra errores de validación -->
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Correo Electrónico</label>
                                        <input type="email" class="form-control" name="email" 
                                               placeholder="Ingrese correo" required value="{{$usuario->email}}">
                                        @error('email') <!-- Muestra errores de validación -->
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="password">Nueva Contraseña (opcional)</label>
                                        <input type="password" class="form-control" name="password" 
                                               placeholder="Ingrese nueva contraseña">
                                        @error('password') <!-- Muestra errores de validación -->
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-2">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Guardar</button> <!-- Botón de envío -->
                                    <a href="{{route('usuarios.index')}}" class="btn btn-secondary">Cancelar</a> <!-- Botón para regresar -->
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Resalta el menú de usuarios en la navegación
    document.getElementById("liUsuarios").classList.add("menu-open");
    document.getElementById("aUsuario").classList.add("active");
</script>
@endpush


<!--usuario.edit.blade.php-->