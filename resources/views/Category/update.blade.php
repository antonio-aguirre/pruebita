<div class="modal fade" id="editCategory{{$category->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:black">Actualización de datos de la categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ Route('categorias.update',['id'=>$category->id]) }} " method="post">
        {{ csrf_field() }}
        {{ method_field("PUT") }} <!--// esto va por default para cuando entra al metodo de Update -->
        <div class="modal-body">
          <input class="form-control" type="text" name="nombre" placeholder="Nombre" value="{{$category->name}}"><br>
          <textarea class="form-control" name="descripcion" cols="20" rows="10" placeholder="Descripción">{{$category->description}}</textarea><br>
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
