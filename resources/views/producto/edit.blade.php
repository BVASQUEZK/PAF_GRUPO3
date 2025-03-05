@extends('plantilla.app')
@section('contenido')
<div class="app-content mt-3">
    <!-- Contenedor principal -->
    <div class="container-fluid">
        <!-- Fila principal -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Productos</h3>
                    </div>
                    <!-- Cuerpo de la tarjeta -->
                    <div class="card-body">
                        <!-- Formulario para actualizar un producto -->
                        <form method="post" action="{{route('productos.update', ['producto'=>$registro])}}">
                            @csrf <!-- Protección contra ataques CSRF -->
                            @method('PUT') <!-- Método HTTP para actualizar el recurso -->
                            <div class="row">
                                <!-- Campo para el nombre del producto -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre"
                                            placeholder="Ingrese nombre" required value="{{$registro->nombre}}">
                                        @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Campo para el código del producto -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="codigo">Código</label>
                                        <input type="text" class="form-control" name="codigo"
                                            placeholder="Ingrese código" required value="{{$registro->codigo}}">
                                        @error('codigo')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Campo para la descripción del producto -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <input type="text" class="form-control" name="descripcion"
                                            placeholder="Ingrese descripción" required value="{{$registro->descripcion}}">
                                        @error('descripcion')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Selección de categoría del producto -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="categoria_id">Categoría</label>
                                        <select name="categoria_id" class="form-control">
                                            @foreach($categorias as $cat)
                                                @if($registro->categoria->id == $cat->id)
                                                <option value="{{$cat->id}}" selected>{{$cat->nombre}}</option>
                                                @else
                                                <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('categoria_id')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Campo para el precio de venta -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="precio_venta">Precio Venta</label>
                                        <input type="text" class="form-control" name="precio_venta"
                                            placeholder="Ingrese precio venta" required value="{{$registro->precio_venta}}">
                                        @error('precio_venta')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Botones de acción -->
                            <div class="col-lg-12 mt-2">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                    <button class="btn btn-secondary" type="reset">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Pie de la tarjeta con enlace de regreso -->
                    <div class="card-footer clearfix">
                        <a href="{{route('productos.index')}}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
// Agrega clases al menú de navegación para resaltar la sección actual
document.getElementById("liAlmacen").classList.add("menu-open");
document.getElementById("aProducto").classList.add("active");
</script>
@endpush


<!--Productos.edit.blade.php-->