<div class="modal fade" id="editProduct{{$product->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualización de datos del producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ Route('productos.update',['id'=>$product->id]) }} " method="post">
        {{ csrf_field() }}
        {{ method_field("PUT") }} <!--// esto va por default para cuando entra al metodo de Update -->
          <div class="modal-body">
              <input class="form-control" type="text" name="nombre" placeholder="Nombre" value="{{$product->name}}"><br>
              <textarea class="form-control" name="descripcion" cols="20" rows="10" placeholder="Descripción">{{$product->description}}</textarea><br>
              <input class="form-control" type="number"  name="precio" placeholder="$ Costo" value="{{$product->price}}"><br>
              <div class="form-group">
              <label for="exampleFormControlSelect1">Categoria del producto</label>
              @if(count($categories)>0)
                <select class="form-control" id="exampleFormControlSelect1" name="category" required>
                  <option disabled>--Seleccione una opción--</option>
                  @foreach($categories as $category)
                    @if($category->id == $product->category->id)
                      <option value="{{$category->id}}" selected>{{$category->name}}</option>
                    @else
                      <option value="{{$category->id}}">{{$category->name}}</option>
                    @endif
                  @endforeach
                </select>
              @else
              <br>
                <strong>** No hay categorías registradas **</strong>
              @endif

          </div>
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
