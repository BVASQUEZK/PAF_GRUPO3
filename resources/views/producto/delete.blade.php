<!-- Modal para eliminar un producto -->
<div class="modal fade" id="modal-eliminar-{{$reg->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <!-- Formulario para eliminar el producto -->
            <form action="{{route('productos.destroy',$reg->id)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar registro</h4>
                </div>
                <div class="modal-body">
                    <!-- Mensaje de confirmación para eliminar el producto -->
                    ¿Usted desea eliminar el registro {{$reg->nombre}} ?
                </div>
                <div class="modal-footer justify-content-between">
                    <!-- Botón para cerrar el modal -->
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cerrar</button>
                    <!-- Botón para confirmar la eliminación -->
                    <button type="submit" class="btn btn-outline-light">Eliminar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Productos.delete.blade.php -->
