<div class="modal fade" id="editCompany{{$company->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:black">Agregado de compañias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ Route('companias.update',['id'=>$company->id]) }}" method="post">
        {{ csrf_field() }} <!--token de seguridad-->
        {{ method_field("PUT") }}
        <div class="modal-body">
          <input class="form-control" type="text" name="nombre" value="{{$company->name}}"><br>
          <input class="form-control" type="text" name="giroEmpresa" value="{{$company->businessRotation}}"><br>
          <input class="form-control" type="text" name="rfc" value="{{$company->rfc}}"><br>
          <textarea class="form-control" name="descripcion" cols="20" rows="10">{{$company->description}}</textarea><br>
          <input class="form-control" type="text" name="telefono" value="{{$company->phone}}"><br>
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
