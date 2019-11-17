<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href= " {{ asset('css/app.css') }} "> <!--Poner bootstrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <title>🍓🍑</title>
  </head>

  <header>
    @include('Partials.header')
  </header>

  <body style="background-color:#424242">

    <div class="container">
      <div class="row">
        <div class="col"><br>
          <div class="tab-content" id="myTabContent">
            @yield('content') <!--Para que se especifique que el contenido será dinámico-->
          </div>
        </div>
      </div>
    </div>

    @yield('script')
  </body>
</html>
