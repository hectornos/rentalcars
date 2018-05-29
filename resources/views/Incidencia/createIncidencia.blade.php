@extends('plantilla')
@section('titulo','Agregar incidencia')
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
  <h1 class="page-header">Agregar una incidencia</h1>
      <form action="{{ route('Incidencia.store')}}" method="POST">
          {{ csrf_field() }}
          <input name="alquiler_id" type="hidden" value="{{$alquiler->id}}"/>
          <div class="form-group">
              <b>Datos del alquiler:</b><br>
              <b>Vehiculo:</b> {{$alquiler->vehiculo->marca->nombre}} {{$alquiler->vehiculo->modelo}} , {{$alquiler->vehiculo->matricula}}</br>
              <b>Cliente:</b> {{$alquiler->cliente->nombre}} {{$alquiler->cliente->apellido}}
          </div>
          <div class="form-group">
              <label for="cliente" >Descripcion: </label> 
              <input class="form-control" type="text" value="" name="descripcion">    
          </div>
          <br>
          <div class="btn-group">
              <button class="btn btn-success" type="submit" name="guardar" value="Almacenar">
                  <span class="glyphicon glyphicon-ok"></span> Almacenar</button>
                  <a class="btn btn-danger" href="{{ route('Alquiler.cancel',['mensaje'=>'Creacion de incidencia cancelada'])}}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>

          </div>
      </form>          
  </div>
  <br>
  <div id="error"></div>
@endsection
