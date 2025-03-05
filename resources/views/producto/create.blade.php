@extends('plantilla.app') <!-- Extiende la plantilla base 'app', reutilizando su estructura general -->

@section('contenido')
<div class="app-content mt-3">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4"> <!-- Tarjeta que envuelve el formulario de productos -->
                    <div class="card-header">
                        <h3 class="card-title">Productos</h3> <!-- Título de la tarjeta -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Formulario para crear un nuevo producto -->
                        <form action="{{route('productos.store')}}" method="POST">
                            @csrf <!-- Protección contra ataques CSRF -->
                            <div class="row">
                                <!-- Campo de entrada para el nombre del producto -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre"
                                            placeholder="Ingrese nombre" required>
                                        @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Campo de entrada para el código del producto -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="codigo">Código</label>
                                        <input type="text" class="form-control" name="codigo"
                                            placeholder="Ingrese código" required>
                                        @error('codigo')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Campo de entrada para la descripción del producto -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <input type="text" class="form-control" name="descripcion"
                                            placeholder="Ingrese descripción" required>
                                        @error('descripcion')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Campo de selección de categoría del producto -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="categoria_id">Categoría</label>
                                        <select name="categoria_id" class="form-control">
                                            @foreach($categorias as $cat)
                                            <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                            @endforeach
                                        </select>
                                        @error('categoria_id')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Campo de entrada para el precio de venta del producto -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="precio_venta">Precio Venta</label>
                                        <input type="text" class="form-control" name="precio_venta"
                                            placeholder="Ingrese precio venta" required>
                                        @error('precio_venta')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Botones para guardar o cancelar el formulario -->
                            <div class="col-lg-12 mt-2">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                    <button class="btn btn-secondary" type="reset">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->

                    <!-- Enlace para regresar a la lista de productos -->
                    <div class="card-footer clearfix">
                        <a href="{{route('productos.index')}}">Regresar</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
@endsection

@push('scripts')
<script>
    // Agrega clases CSS a los elementos del menú para resaltar la sección actual
    document.getElementById("liAlmacen").classList.add("menu-open");
    document.getElementById("aProducto").classList.add("active");
</script>
@endpush


<!--Productos.create.blade.php-->