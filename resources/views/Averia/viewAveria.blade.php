@extends('plantilla')
@section('titulo','Detalle averia')
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
  <h1 class="page-header">Detalle de averia</h1>
      
          <div class="form-group">
              <label for="nombre" >Vehiculo: </label>
              <input class="form-control" readonly type="text" value="{{$averia->vehiculo->marca->nombre}} {{$averia->vehiculo->modelo}} {{$averia->vehiculo->matricula}}" name="vehiculo_id">
          </div>
          <div class="form-group">
              <label for="Apellido" >Tipo: </label>
              <input class="form-control" readonly type="text" value="{{$averia->tipoaveria->nombre}}" name="tipoaveria_id">
          </div>
          <div class="form-group">
              <label for="dni" >Descripcion: </label>
              <input class="form-control" readonly type="text" value="{{$averia->descripcion}}" name="descripcion">
          </div>
          <div class="form-group">
              <label for="f_nac">Fecha: </label>
              <input class="form-control" readonly type="date" value="{{$averia->fecha}}" name="fecha">
          </div>
            <br>
          <div class="btn-group">
          <a class="btn btn-danger" href="{{ URL::previous() }}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>
        </div>
              
  </div>
  <br>
  <div id="error"></div>
@endsection
