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
                        <h3 class="card-title">Categorías</h3>
                    </div>
                    <!-- Cuerpo de la tarjeta -->
                    <div class="card-body table-responsive">
                        <!-- Formulario de búsqueda -->
                        <div>
                            <form action="{{route('categorias.index')}}" method="get">
                                <div class="input-group">
                                    <input name="texto" type="text" class="form-control" value="{{$texto}}"
                                        placeholder="Ingrese texto a buscar">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i>
                                            Buscar</button>
                                        @can('categoria-crear')
                                        <!-- Botón para crear nueva categoría -->
                                        <a href="{{route('categorias.create')}}" class="btn btn-primary"> Nuevo</a>
                                        @endcan
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Mensajes de éxito o error -->
                        <div class="mt-3">
                            @if(Session::has('mensaje'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{Session::get('mensaje')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                            @if(Session::has('error'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{Session::get('error')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                        </div>
                        
                        <!-- Tabla de categorías -->
                        <div class="mt-3">
                            <table class="table table-bordered table-hover table-stripes">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($registros)<=0) 
                                    <!-- Mensaje cuando no hay registros -->
                                    <tr>
                                        <td colspan="3">No hay registros que coincidan con el texto consultado
                                            {{$texto}}.</td>
                                    </tr>
                                    @else
                                    @foreach($registros as $reg)
                                    <tr class="align-middle">
                                        <td>
                                            @can('categoria-editar')
                                            <!-- Botón para editar categoría -->
                                            <a href="{{route('categorias.edit',$reg->id)}}"
                                                class="btn btn-secondary btn-sm">&#9998;</a>
                                            @endcan
                                            @can('categoria-activar')
                                            <!-- Botón para eliminar categoría -->
                                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modal-eliminar-{{$reg->id}}">&#128465;</button>
                                            @endcan
                                        </td>
                                        <td>{{$reg->id}}</td>
                                        <td>{{$reg->nombre}}</td>
                                    </tr>
                                    @include('categoria.delete') <!-- Modal para eliminar -->
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Pie de la tarjeta con paginación -->
                    <div class="card-footer clearfix table-responsive">
                        {{$registros->appends(["texto" => $texto])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Añadir clases a los elementos del menú para resaltar la sección actual

document.getElementById("liAlmacen").classList.add("menu-open");
document.getElementById("aCategoria").classList.add("active");
</script>
@endpush
