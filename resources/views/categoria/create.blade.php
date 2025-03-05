@extends('plantilla.app') <!-- Extiende la plantilla base "app" -->

@section('contenido') <!-- Sección del contenido principal -->
<div class="app-content mt-3"> <!-- Contenedor principal con margen superior -->
    
    <!--begin::Container-->
    <div class="container-fluid"> <!-- Contenedor fluido para el contenido -->
        
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12"> <!-- Columna que ocupa todo el ancho en pantallas medianas en adelante -->
                
                <div class="card mb-4"> <!-- Tarjeta contenedora con margen inferior -->
                    
                    <div class="card-header"> <!-- Encabezado de la tarjeta -->
                        <h3 class="card-title">Categorías</h3> <!-- Título de la sección -->
                    </div>
                    <!-- /.card-header -->
                    
                    <div class="card-body"> <!-- Cuerpo de la tarjeta -->
                        
                        <!-- Formulario para agregar una nueva categoría -->
                        <form action="{{route('categorias.store')}}" method="POST">
                            @csrf <!-- Token CSRF para protección contra ataques CSRF -->

                            <div class="col-lg-12"> <!-- Contenedor para el campo de nombre -->
                                <div class="form-group">
                                    <label for="nombre">Nombre</label> <!-- Etiqueta del campo -->
                                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre"
                                        required> <!-- Campo de entrada de texto con validación requerida -->
                                    
                                    @error('nombre') <!-- Validación de errores -->
                                    <small class="text-danger">{{ $message }}</small> <!-- Muestra mensaje de error -->
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 mt-2"> <!-- Contenedor para los botones -->
                                <div class="form-group">
                                    <!-- Botón para guardar la categoría -->
                                    <button class="btn btn-primary" type="submit">Guardar</button>

                                    <!-- Botón para resetear el formulario -->
                                    <button class="btn btn-secondary" type="reset">Cancelar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer clearfix"> <!-- Pie de la tarjeta -->
                        <a href="{{route('categorias.index')}}">Regresar</a> <!-- Enlace para regresar a la lista de categorías -->
                    </div>

                </div>
                <!-- /.card -->
            </div>
        </div>
        <!--end::Row-->
        
    </div>
    <!--end::Container-->
</div>
@endsection <!-- Fin de la sección de contenido -->

@push('scripts') <!-- Sección para agregar scripts adicionales -->
<script>
    // Agrega la clase "menu-open" al elemento con ID "liAlmacen" para mantener el menú expandido
    document.getElementById("liAlmacen").classList.add("menu-open");

    // Agrega la clase "active" al elemento con ID "aCategoria" para marcarlo como activo en el menú
    document.getElementById("aCategoria").classList.add("active");
</script>
@endpush <!-- Fin de la sección de scripts -->
