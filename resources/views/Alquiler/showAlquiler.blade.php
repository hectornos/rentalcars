@extends('plantilla')
@section('titulo','Eliminar alquiler')
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
  <h1 class="page-header">Eliminar un alquiler</h1>
      <form action="{{ route('Alquiler.destroy', ['id'=>$alquiler->id])}}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <div class="form-group">
              <label for="nombre" class="col-2 col-form-label">Cliente: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$alquiler->cliente->nombre}} {{$alquiler->cliente->apellido}}" name="nombre">
              </div>
          </div>
          <div class="form-group">
              <label for="Apellido" class="col-2 col-form-label">Vehiculo: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$alquiler->vehiculo->marca->nombre}} {{$alquiler->vehiculo->modelo}} {{$alquiler->vehiculo->matricula}}" name="apellido">
              </div>
          </div>
          <div class="form-group">
              <label for="f_nac" class="col-2 col-form-label">Fecha nacimiento: </label>
              <div class="col-10">
              <input class="form-control" type="date" value="{{$alquiler->fecha}}" name="f_nac">
              </div>
          </div>
          @foreach ($alquiler->incidencias as $incidencia)
          <div class="form-group">
              <label for="f_nac" class="col-2 col-form-label">Incidencia: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$incidencia->descripcion}}" name="incidencia">
              </div>
          </div>
          @endforeach
          <br>
          <div class="btn-group">
              <button class="btn btn-info" type="submit" name="borrar" value="borrar" id="borra">
                <span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                <a class="btn btn-danger" href="{{ route('Alquiler.cancel',['mensaje'=>'Borrado de alquiler cancelado'])}}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>

          </div>
      </form>          
  </div>
  <br>
  <div id="error"></div>
@endsection
