<div class="modal fade" id="modal-eliminar">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
            <h4 class="modal-title" id="txtTituloEliminar">Eliminar registro</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" id="formEliminar">
                {{ method_field('delete') }}
                @csrf
            </form>
            <p id="mensajeEliminar"></p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">No, cancelar</button>
          <button type="button" class="btn btn-outline-light" id="btnEliminar">Si, eliminar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
   <!-- /.modal -->