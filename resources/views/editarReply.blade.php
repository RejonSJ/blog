<form method="post" id="updateReply" action="{{route('replies.updateReply')}}">
    @method('PUT')
    @csrf
    <div class="modal fade" id="editarReply">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="mb-0">Editar comentario</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idReplyEdit" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea type="text" class="form-control" id="textReplyEdit" name="text"></textarea>
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