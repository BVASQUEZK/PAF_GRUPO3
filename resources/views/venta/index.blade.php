@extends('plantilla.app')

@section('contenido')
<div class="app-content mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Ventas</h3>
                    </div>
                    <div class="card-body">
                        <!-- Formulario de búsqueda -->
                        <div class="mb-3">
                            <form action="{{ route('ventas.index') }}" method="GET" class="d-flex">
                                <input type="text" name="buscar" class="form-control me-2" 
                                       placeholder="Buscar por cliente, vendedor o estado" 
                                       value="{{ request('buscar') }}">
                                <button type="submit" class="btn btn-secondary">🔍</button>
                            </form>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Vendedor</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ventas as $venta)
                                <tr>
                                    <td>{{ $venta->id }}</td>
                                    <td>{{ $venta->cliente->nombre }}</td>
                                    <td>{{ $venta->usuario->name }}</td>
                                    <td>{{ $venta->estado }}</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Ver Detalles</a>
                                        <a href="#" class="btn btn-warning btn-sm">Editar</a>
                                        <button class="btn btn-secondary btn-sm">🖨️</button>
                                        <button class="btn btn-success btn-sm">📥</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Botón centrado y con margen superior -->
                        <div class="d-flex justify-content-center mt-4">
                            <a href="{{ route('ventas.create') }}" class="btn btn-primary">Nueva Venta</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



<!--index.blade.php-->
