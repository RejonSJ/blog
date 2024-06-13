<form method="post" id="updateName" action="{{route('user.updateName')}}">
    @method('PUT')
    @csrf
    <div class="modal fade" id="editarName">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="mb-0">Actualizar nombre</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idUserEdit" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nameUserEdit" name="name">
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