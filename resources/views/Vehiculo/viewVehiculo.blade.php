@extends('plantilla')
@section('titulo','Detalle vehiculo')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ route('welcome') }}">RentalCars <span class="glyphicon glyphicon-home"></span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item" title="Clientes">
        <a class="nav-link" href="{{ route('Cliente.index') }}"><span class="glyphicon glyphicon-user"></span> </a>
      </li>
      <li class="nav-item" title="Vehiculos">
        <a class="nav-link" href="{{ route('Vehiculo.index') }}"><span class="glyphicon glyphicon-road"></span> </a>
      </li>
      <li class="nav-item" title="Alquileres">
        <a class="nav-link" href="{{ route('Alquiler.index') }}"><span class="glyphicon glyphicon-euro"></span> </a>
      </li>
      <li class="nav-item" title="Incidencias">
        <a class="nav-link" href="{{ route('Incidencia.index') }}"><span class="glyphicon glyphicon-tasks"></span> </a>
      </li>
      <li class="nav-item" title="Averias">
        <a class="nav-link" href="{{ route('Averia.index') }}"><span class="glyphicon glyphicon-wrench"></span> </a>
      </li>
    </ul>
    </div>
</nav>
@section('contenido')  
<div class="container">
  <h1 class="page-header">Detalle de vehiculo</h1>
      
          <div class="form-group">
            <label for="marca_id">Marca</label>
            <input class="form-control" readonly type="text" value="{{$vehiculo->marca->nom}}" name="marca">
          </div>
          <div class="form-group">
              <label for="modelo" >Modelo: </label>
              <input class="form-control" readonly type="text" value="{{$vehiculo->mod}}" name="modelo">
          </div>
          <div class="form-group">
              <label for="matricula" >Matricula: </label >
              <input class="form-control" readonly type="text" value="{{$vehiculo->mat}}" name="matricula">
          </div>
          <div class="form-group">
              <label for="tipo_id">Tipo</label>
              <input class="form-control" readonly type="text" value="{{$vehiculo->tipo->nom}}" name="tipo">
          </div> 
          <div class="form-group">
              <label for="combustible_id">Combustible</label>
              <input class="form-control" readonly type="text" value="{{$vehiculo->combustible->nom}}" name="combustible">
          </div> 
          <div class="form-group">
              <label for="color_id">Color</label>
              <input class="form-control" readonly type="text" value="{{$vehiculo->color->nom}}" name="color">     
          </div> 
          <div class="form-group">
              <label for="cambio_id">Cambio</label>
              <input class="form-control" readonly type="text" value="{{$vehiculo->cambio->nom}}" name="cambio">  
          </div> 
          <br>
          <div class="btn-group">
            
            <a class="btn btn-danger" href="{{ URL::previous() }}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>
          </div>
        
  </div>
@endsection
