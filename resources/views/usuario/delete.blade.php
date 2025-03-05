<!-- Modal de confirmación para eliminar un usuario -->
<div class="modal fade" id="modal-eliminar-{{$user->id}}" tabindex="-1" role="dialog" 
     aria-labelledby="modalEliminarUsuario">
    <div class="modal-dialog">
        <div class="modal-content bg-danger"> <!-- Fondo rojo para resaltar el peligro de la acción -->
            <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST">
                @csrf <!-- Token de seguridad para evitar ataques CSRF -->
                @method('DELETE') <!-- Especifica el método DELETE para eliminar el usuario -->
                
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Usuario</h4> <!-- Título del modal -->
                </div>
                
                <div class="modal-body">
                    <!-- Mensaje de confirmación con el nombre del usuario -->
                    ¿Está seguro de que desea eliminar al usuario <strong>{{ $user->nombre }}</strong>?
                </div>
                
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Eliminar</button> <!-- Botón para confirmar eliminación -->
                </div>
            </form>
        </div>
    </div>
</div>

<!-- usuario.delete.blade.php -->