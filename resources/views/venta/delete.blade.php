@foreach($ventas as $venta)
    <div class="modal fade" id="modal-eliminar-{{$venta->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <form action="{{route('ventas.destroy', $venta->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h4 class="modal-title">Eliminar Venta</h4>
                    </div>
                    <div class="modal-body">
                        ¿Está seguro de que desea eliminar la venta con ID #{{$venta->id}}?
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-light">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach


<!--venta.delete.blade.php-->