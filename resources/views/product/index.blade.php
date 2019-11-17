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
        <th scope="col">Nombre</th>
        <th scope="col">Precio $</th>
        <th scope="col">Descripción</th>
        <th scope="col">Editar</th>
        <th scope="col">Borrar</th>
      </tr>
    </thead>

    <tbody>

      <?php $count = 1; ?> <!--Contador para ir referenciando a la cantidad de productos-->
      @if(count($products)>0)
        @foreach($products as $product)
          <tr>
            <th scope="row">{{$count}}</th>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->description}}</td>
            <td>
              <a class="btn btn-warning" data-toggle="modal" data-target="#editProduct{{$product->id}}">
                <i class="fa fa-refresh" style="color:black"></i>
              </a>
              @include('product.update') <!--Se añade el modal para actualizar un producto-->
            </td>

            <td>
              <form action="{{ Route('productos.destroy', ['id'=>$product->id])}}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">
                  <i class="fa fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          <?php $count++; ?>
        @endforeach
      @else
        <div class="alert alert-dark" role="alert">
          <strong>¡Lo sentimos!</strong> No existen productos en almacén :c
        </div>
      @endif

      <!--Botón para agregar un nuevo producto-->
      <a class="btn btn-info float-right" data-toggle="modal" data-target="#createProduct">
          <i class="fa fa-plus"></i>
          Producto
      </a><br><br>
      @include('product.create') <!--Se añade el modal para crear un producto-->

    </tbody>
  </table>
@endsection

@section('script')  <!--Con esto se manda a llamara los yield-->
  <script src="{{ asset('js/app.js') }}"></script>
@endsection
