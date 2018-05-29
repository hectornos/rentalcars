@extends('plantilla')
@section('titulo','Agregar averia')
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
  <h1 class="page-header">Agregar una averia</h1>
      <form action="{{ route('Averia.store')}}" method="POST" id="formulario" onsubmit="return validarOtros()">
          {{ csrf_field() }}
          <input name="vehiculo_id" type="hidden" value="{{$vehiculo->id}}"/>
          <div class="form-group">
              Vehiculo: {{$vehiculo->marca->nombre}} {{$vehiculo->modelo}}, {{$vehiculo->matricula}}
          </div>
          <div class="form-group">
              <label for="tipo">Tipo: </label>
              <select class="form-control" id="tipoaveria_id" name="tipoaveria_id" id="tipo">
                @foreach($tipoaverias as $tipoaveria)
                    <option name={{$tipoaveria->id}} value={{$tipoaveria->id}}>{{$tipoaveria->nombre}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
              <label for="dni" >Descripcion: </label>
              
              <input class="form-control" type="text" value="" id="descripcion" name="descripcion">
              
          </div>
          <div class="form-group">
              <label for="f_nac" >Fecha: </label>
              <input  class="form-control" type="date" value="" name="fecha">
          </div>

          <br>
          <div class="btn-group">
              <button class="btn btn-success" type="submit" name="guardar" value="guardar">
                  <span class="glyphicon glyphicon-edit"></span> Almacenar</button>
                  <a class="btn btn-danger" href="{{ route('Vehiculo.cancel',['mensaje'=>'Creacion de averia cancelada'])}}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>

          </div>
      </form>          
  </div>
  <br>
  <div id="error"></div>
@endsection
