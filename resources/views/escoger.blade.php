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

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">

  <form action="{{ route('Cliente.editLogin', ['id'=>$cliente->id])}}" method="GET" id="formulario">
      
          <div class="btn-group" align="right" >
      <button class="btn btn-outline-warning my-2 my-sm-0" value="{{$cliente->id}}" id="client" type="submit">{{$cliente->completo}}</button>      
    </div>
  </form>
</div>
</nav>
  <h1 class="page-header" align="center">Escoge tu vehiculo</h1>
    <div class="container-fluid">
        
              @yield('formulario')
            
              <table class="table table-hover">
  <thead>
  <tr class='table-primary'>
    <td width="150" align="center" title="Marca de coche"><a href="{{ route('Vehiculo.index',['criterio' => 'marca'] )}}" >Marca</a></td>
    <td width="150" align="center" title="Modelo de coche"><a href="{{ route('Vehiculo.index',['criterio' => 'modelo'] )}}" >Modelo</a></td>
    <td width="150" align="center" title="Tipo de coche"><a href="{{ route('Vehiculo.index',['criterio' => 'tipo'] )}}" >Tipo</a></td>
    <td width="150" align="center" title="Combustible de coche"><a href="{{ route('Vehiculo.index',['criterio' => 'combustible'] )}}" >Combustible</a></td>
    <td width="150" align="center" title="Cambio de coche"><a href="{{ route('Vehiculo.index',['criterio' => 'cambio'] )}}" >Cambio</a></td>
    <td width="150" align="center" title="Modelo de coche"><a href="{{ route('Vehiculo.index',['criterio' => 'color'] )}}" >Color</a></td>
    <td width="50" align="center" title="Alquilar">Alquilar</td>
  </tr>
  </thead>
  @foreach($vehiculos as $vehiculo)
  <tr>
    <td width="150" align="center">{{ $vehiculo->marc }}</td>
    <td width="150" align="center">{{ $vehiculo->mod }}</td>
    <td width="150" align="center">{{ ucfirst($vehiculo->tipo->nombre) }}</td>
    <td width="150" align="center">{{ ucfirst($vehiculo->combustible->nombre) }}</td>
    <td width="150" align="center">{{ ucfirst($vehiculo->cambio->nombre) }}</td>
    <td width="150" align="center">{{ ucfirst($vehiculo->color->nombre) }}</td>
    <td width="50" align="center"><a href="{{ route('Cliente.alquilar',['vehiculo_id' => $vehiculo->id, 'cliente_id' => $cliente_id] )}}" class="btn btn-info" title="Alquilar vehiculo">
                  <span class="glyphicon glyphicon-edit"/></td>
  </tr>
  
  @endforeach
  <tr>
    <td colspan="7" align="center">Vehiculos encontrados: {{ $count }}</td>
  </tr>
  @if (isset($mensajito))
    <tr>
      <td colspan="7" align="center">{{ $mensajito }}</td>
    </tr>
  @endif
</table>
              
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>