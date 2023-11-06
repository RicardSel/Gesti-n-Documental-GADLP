<div class="modal fade" id="modal-user_control">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Cambiar Usuario/Contraseña Control</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" id="formUpdateControl">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Usuario*</label>
                            <input type="text" name="name" class="form-control required" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-grop">
                            <label>Contraseña</label>
                            <input type="text" name="password" class="form-control required">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" id="btnActualizaControl">Confirmar</button>
            </form>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->