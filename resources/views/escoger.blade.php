<!doctype html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('titulo')</title>
      <!--Importando los estilos de BootStrap-->
      <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
      <link rel="shortcut icon" href="{{ asset('coche.ico') }}" >
      <script type="text/javascript" src="{{ URL::asset('js/validate.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/style.js') }}"></script>
  </head>
  <body>
  <h1 class="page-header" align="center">Escoge tu vehiculo</h1>
    <div class="container-fluid">
        
              @yield('formulario')
            
              @include('partials.rejillaEscoger')
              
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>