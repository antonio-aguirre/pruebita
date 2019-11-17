<div class="modal fade" id="createCategory" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregado de categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ Route('categorias.store') }} " method="post">
        {{ csrf_field() }} <!--token de seguridad-->
          <div class="modal-body">
              <input class="form-control" type="text" name="nombre" placeholder="Nombre"><br>
              <textarea class="form-control" name="descripcion" cols="20" rows="10" placeholder="Descripción" ></textarea><br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fa fa-times-circle"></i>
              Cancelar
            </button>
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-download"></i>
              Guardar
            </button>
          </div>
      </form>

    </div>
  </div>
</div>
