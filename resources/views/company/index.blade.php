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

  <!--Botón para agregar una nueva compañia-->
  <a class="btn btn-info float-right" data-toggle="modal" data-target="#createCompany">
    <i class="fa fa-plus"></i>
    Compañia
  </a><br><br>
  @include('company.create')<!--Se añade el modal para crear una compañia-->

  <table class="table table-striped" style="color:white">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre de la empresa</th>
        <th scope="col">Giro de la empresa</th>
        <th scope="col">Descripción</th>
        <th scope="col">RFC</th>
        <th scope="col">Teléfono</th>
        <th></th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      <?php $cont=1; ?>
      @forelse($companies as $company)
        <tr>
          <th scope="row">{{$cont}}</th>
          <td>{{$company->name}}</td>
          <td>{{$company->businessRotation}}</td>
          <td>{{$company->description}}</td>
          <td>{{$company->rfc}}</td>
          <td>{{$company->phone}}</td>
          <td>
            <a class="btn btn-warning" data-toggle="modal" data-target="#editCompany{{$company->id}}">
              <i class="fa fa-refresh" style="color:gray"></i>
            </a>
            @include('company.update') <!--Se añade el modal de actualizar datos-->
          </td>
          <td>
            <form action="{{ Route('companias.destroy',['id'=>$company->id]) }}" method="post">
              {{ method_field('delete') }}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash"></i>
              </button>
            </form>
          </td>
        </tr><!--Se va a llenar la tabla con las categorias que hay en la base de datos-->
        <?php $cont++; ?>
        @empty
          <div class="alert alert-dark" role="alert">
            <strong>¡Lo sentimos!</strong> No existen compañias agregadas
          </div>
        @endforelse

    </tbody>
  </table>

@endsection

@section('script')  <!--Con esto se manda a llamara los yield-->
  <script src="{{ asset('js/app.js') }}"></script>
@endsection
