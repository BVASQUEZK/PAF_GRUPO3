@extends('plantilla.app') 
@section('contenido') 

<div class="app-content mt-3">
    <!-- Contenedor principal -->
    <div class="container-fluid">
        <!-- Fila principal -->
        <div class="row">
            <div class="col-md-12">
                <!-- Tarjeta contenedora -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Categorías</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <!-- Formulario para actualizar una categoría -->
                        <form method="post" action="{{ route('categorias.update', ['categoria' => $registro]) }}">
                            @csrf <!-- Protección contra ataques CSRF -->
                            @method('PUT') <!-- Define el método HTTP como PUT para actualizar -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <!-- Campo oculto que almacena el ID de la categoría -->
                                    <input type="hidden" name="id" value="{{ $registro->id }}">
                                    <!-- Campo de entrada para el nombre de la categoría -->
                                    <input type="text" class="form-control" name="nombre" value="{{ $registro->nombre }}"
                                        placeholder="Ingrese nombre" required>
                                    <!-- Muestra errores de validación si el campo 'nombre' no es válido -->
                                    @error('nombre')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 mt-2">
                                <div class="form-group">
                                    <!-- Botón para enviar el formulario y guardar los cambios -->
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                    <!-- Botón para restablecer los valores del formulario -->
                                    <button class="btn btn-secondary" type="reset">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer clearfix">
                        <!-- Enlace para regresar a la lista de categorías -->
                        <a href="{{ route('categorias.index') }}">Regresar</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- Fin de la fila -->
    </div>
    <!-- Fin del contenedor -->
</div>

@endsection

@push('scripts')
<script>
    // Agrega la clase "menu-open" al elemento con ID "liAlmacen" para marcarlo como activo en la barra de navegación
    document.getElementById("liAlmacen").classList.add("menu-open");
    // Agrega la clase "active" al enlace con ID "aCategoria" para resaltar la opción actual
    document.getElementById("aCategoria").classList.add("active");
</script>
@endpush
