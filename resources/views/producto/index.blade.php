@extends('plantilla.app') <!-- Extiende la plantilla base -->

@section('contenido')
<div class="app-content mt-3">
    <!-- Contenedor principal -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Productos</h3> <!-- Título de la tarjeta -->
                    </div>

                    <!-- Cuerpo de la tarjeta con la tabla de productos -->
                    <div class="card-body table-responsive">
                        <div>
                            <!-- Formulario de búsqueda -->
                            <form action="{{ route('productos.index') }}" method="get">
                                <div class="input-group">
                                    <input name="texto" type="text" class="form-control" 
                                        value="{{ $texto }}" placeholder="Ingrese texto a buscar">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-secondary">
                                            <i class="fas fa-search"></i> Buscar
                                        </button>
                                        @can('producto-crear')
                                        <a href="{{ route('productos.create') }}" class="btn btn-primary">Nuevo</a>
                                        @endcan
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Sección para mostrar mensajes de éxito o error -->
                        <div class="mt-3">
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

                        <!-- Tabla de productos -->
                        <div class="mt-3">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>ID</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Precio Venta</th>
                                        <th>Categoría</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Verifica si hay productos disponibles -->
                                    @if(count($registros) <= 0)
                                    <tr>
                                        <td colspan="7">No hay registros que coincidan con la búsqueda "{{ $texto }}".</td>
                                    </tr>
                                    @else
                                    <!-- Itera sobre los productos para mostrarlos en la tabla -->
                                    @foreach($registros as $reg)
                                    <tr class="align-middle">
                                        <td>
                                            @can('producto-editar')
                                            <a href="{{ route('productos.edit', $reg->id) }}" 
                                                class="btn btn-secondary btn-sm">&#9998;</a>
                                            @endcan
                                            @can('producto-activar')
                                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" 
                                                data-bs-target="#modal-eliminar-{{ $reg->id }}">&#128465;</button>
                                            @endcan
                                        </td>
                                        <td>{{ $reg->id }}</td>
                                        <td>{{ $reg->codigo }}</td>
                                        <td>{{ $reg->nombre }}</td>
                                        <td>{{ $reg->descripcion }}</td>
                                        <td>{{ $reg->precio_venta }}</td>
                                        <td>{{ $reg->categoria->nombre }}</td> <!-- Relación con la categoría -->
                                    </tr>
                                    @include('producto.delete') <!-- Incluye el modal de eliminación -->
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Paginación -->
                    <div class="card-footer clearfix table-responsive">
                        {{ $registros->appends(["texto" => $texto]) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Resalta el menú de productos en la barra lateral
document.getElementById("liAlmacen").classList.add("menu-open");
document.getElementById("aProducto").classList.add("active");
</script>
@endpush

<!--Productos.index.blade.php-->