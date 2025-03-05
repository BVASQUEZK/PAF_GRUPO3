<!-- Modal de eliminación de registro -->
<div class="modal fade" id="modal-eliminar-{{$reg->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel">
    
    <!-- Contenedor principal del modal -->
    <div class="modal-dialog">
        
        <!-- Contenido del modal con fondo rojo para indicar acción de peligro -->
        <div class="modal-content bg-danger">
            
            <!-- Formulario para eliminar la categoría -->
            <form action="{{route('categorias.destroy',$reg->id)}}" method="post">
                @csrf <!-- Token CSRF para protección contra ataques CSRF -->
                @method('DELETE') <!-- Método DELETE para indicar que se eliminará un recurso -->

                <!-- Encabezado del modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar registro</h4>
                </div>

                <!-- Cuerpo del modal con mensaje de confirmación -->
                <div class="modal-body">
                    ¿Usted desea eliminar el registro {{$reg->nombre}} ?
                </div>

                <!-- Pie del modal con botones de acción -->
                <div class="modal-footer justify-content-between">
                    <!-- Botón para cerrar el modal sin realizar ninguna acción -->
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cerrar</button>
                    
                    <!-- Botón para confirmar la eliminación del registro -->
                    <button type="submit" class="btn btn-outline-light">Eliminar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
