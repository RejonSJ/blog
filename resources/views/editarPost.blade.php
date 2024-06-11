<form method="put" id="updatePost" action="{{route('posts.updatePost')}}">
    @method('put')
    @csrf
    <div class="modal fade" id="editarPost">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5">Editar Post</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idEdit" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>
                                    Nombre
                                </label>
                                <input type="text" class="form-control" id="nombreEdit" name="nombre">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</form>