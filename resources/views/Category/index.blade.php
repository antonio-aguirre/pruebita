@extends('Layouts.app')

@section('content')

  <!--Este código sirve para mostrar los mensjes de error o success-->
  @if ($errors->any())
      @foreach ($errors->all() as $error)
          <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              {{$error}}
          </div>
      @endforeach
  @endif

  @if (Session::has('message'))
   <div class="alert {{ Session::get('alert-class') }} col-xs-12 black-text alert-dismissable" ng-if="message">
     {{ Session::get('message') }}
     <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
  @endif

  <table class="table table-striped" style="color:white">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre de la categoria</th>
        <th scope="col">Descripción</th>
        <th></th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      <?php $cont=1; ?>
      @forelse($categories as $category) <!--Se va a llenar la tabla con las categorias que hay en la base de datos-->

        <tr>
          <th scope="row">{{$cont}}</th>
          <td>{{$category->name}}</td>
          <td>{{$category->description}}</td>
          <td>
            <a class="btn btn-warning" data-toggle="modal" data-target="#editCategory{{$category->id}}">
              <i class="fa fa-refresh" style="color:gray"></i>
            </a>
            @include('Category.update') <!--Se añade el modal para actualizar una categoria-->
          </td>
          <td>
            <form action="{{ Route('categorias.destroy',['id'=>$category->id])}}" method="post">
              {{ method_field('delete') }}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        <?php $cont++; ?>
      @empty
        <div class="alert alert-dark" role="alert">
          <strong>¡Lo sentimos!</strong> No existen categorias
        </div>
      @endforelse

      <!--Botón para agregar una nueva categoria-->
      <a class="btn btn-info float-right" data-toggle="modal" data-target="#createCategory">
          <i class="fa fa-plus"></i>
          Categoria
      </a><br><br>
      @include('Category.create') <!--Se añade el modal para agregar una categoria-->

    </tbody>
  </table>
@endsection

@section('script')  <!--Con esto se manda a llamara los yield-->
  <script src="{{ asset('js/app.js') }}"></script>
@endsection
