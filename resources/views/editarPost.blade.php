<form method="post" id="updatePost" action="{{route('posts.updatePost')}}">
    @method('PUT')
    @csrf
    <div class="modal fade" id="editarPost">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="text" class="form-control" id="titleEdit" name="title">
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idEdit" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea type="text" class="form-control" id="textEdit" name="text"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="mb-0 text-secondary"><i class="fas fa-info-circle"></i> La imagen no puede ser editada.</p>
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