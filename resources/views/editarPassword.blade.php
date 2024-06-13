<form method="post" id="updatePassword" action="{{route('user.updatePassword')}}">
    @method('PUT')
    @csrf
    <div class="modal fade" id="editarPassword">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="mb-0">Actualizar contraseña</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idUserPasswordEdit" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="oldPassword">Contraseña actual</label>
                                <input type="text" class="form-control" id="oldPasswordUserEdit" name="oldPassword">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña nueva</label>
                                <input type="text" class="form-control" id="passwordUserEdit" name="password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </div>
    </div>
</form>