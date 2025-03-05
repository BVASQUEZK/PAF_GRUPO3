@extends('plantilla.app')

@section('contenido')
<div class="container">
    <h3 class="text-center">Registrar Venta</h3>

    <!-- Mensajes de éxito o error -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf
        <input type="hidden" name="usuario_id" value="{{ auth()->id() }}">

        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select name="cliente_id" class="form-control" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="metodo_pago" class="form-label">Método de Pago</label>
            <select name="metodo_pago" class="form-control" required>
                <option value="Efectivo">Efectivo</option>
                <option value="Tarjeta">Tarjeta</option>
            </select>
        </div>

        <!-- Tabla de Productos -->
        <h4 class="text-center">Productos</h4>
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody id="productos-container">
                <tr class="producto-row">
                    <td>
                        <select name="productos[0][id]" class="form-control producto-select" required onchange="actualizarPrecio(this)">
                            <option value="" data-precio="0">Seleccione un producto</option>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id }}" data-precio="{{ $producto->precio_venta }}">
                                    {{ $producto->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" class="form-control text-center precio-producto" value="S/. 0.00" readonly></td>
                    <td><input type="number" name="productos[0][cantidad]" class="form-control cantidad text-center" min="1" value="1" required oninput="actualizarTotal()"></td>
                    <td><button type="button" class="btn btn-danger eliminar-producto">🗑</button></td>
                </tr>
            </tbody>
        </table>

        <button type="button" id="agregar-producto" class="btn btn-secondary mt-2">+ Agregar Producto</button>

        <div class="mt-3 text-end">
            <h4 class="mt-3">Total: <span id="total-venta" class="fw-bold">S/. 0.00</span></h4>
        </div>

        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-primary">Registrar Venta</button>
            <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>

    <!-- Información del Usuario al final -->
    <div class="card mt-4">
        <div class="card-header fw-bold">Usuario que atiende</div>
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ auth()->user()->name }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Fecha:</strong> {{ now()->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function actualizarPrecio(select) {
    let precio = select.options[select.selectedIndex].getAttribute("data-precio");
    let row = select.closest('tr');
    row.querySelector('.precio-producto').value = `S/. ${parseFloat(precio).toFixed(2)}`;
    actualizarTotal();
}

function actualizarTotal() {
    let total = 0;
    document.querySelectorAll('.producto-row').forEach(row => {
        let select = row.querySelector('.producto-select');
        let precio = parseFloat(select.options[select.selectedIndex].getAttribute("data-precio")) || 0;
        let cantidad = parseInt(row.querySelector('.cantidad').value) || 1;
        total += precio * cantidad;
    });
    document.getElementById("total-venta").textContent = `S/. ${total.toFixed(2)}`;
}

document.getElementById("agregar-producto").addEventListener("click", function() {
    let index = document.querySelectorAll('.producto-row').length;
    let container = document.getElementById("productos-container");

    let nuevaFila = document.createElement("tr");
    nuevaFila.classList.add("producto-row");

    nuevaFila.innerHTML = `
        <td>
            <select name="productos[${index}][id]" class="form-control producto-select" required onchange="actualizarPrecio(this)">
                <option value="" data-precio="0">Seleccione un producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}" data-precio="{{ $producto->precio_venta }}">
                        {{ $producto->nombre }}
                    </option>
                @endforeach
            </select>
        </td>
        <td><input type="text" class="form-control text-center precio-producto" value="S/. 0.00" readonly></td>
        <td><input type="number" name="productos[${index}][cantidad]" class="form-control cantidad text-center" min="1" value="1" required oninput="actualizarTotal()"></td>
        <td><button type="button" class="btn btn-danger eliminar-producto">🗑</button></td>
    `;

    container.appendChild(nuevaFila);
});

document.addEventListener("click", function(event) {
    if (event.target.classList.contains("eliminar-producto")) {
        event.target.closest('tr').remove();
        actualizarTotal();
    }
});
</script>
@endpush


<!--venta.create.blade.php-->
