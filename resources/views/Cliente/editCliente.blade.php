@extends('plantilla')
@section('titulo','Detalle')
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
  <h1 class="page-header">Detalle de cliente</h1>
      <form action="{{ route('Cliente.update',['id' => $cliente->id] )}}" method="POST" id="formulario" onsubmit="return validarCliente()">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="form-group">
              <label for="nombre" >Nombre: </label>
              <input class="form-control" type="text" value="{{$cliente->nom}}" id="nombre" name="nombre">
          </div>
          <div class="form-group">
              <label for="colores" >Apellido: </label>
              <input class="form-control" type="text" value="{{$cliente->ape}}" id="apellido" name="apellido">
          </div>
          <div class="form-group">
              <label for="colores" >DNI: </label>
              <input class="form-control" type="text" value="{{$cliente->dni}}" id="dni" name="dni">
          </div>
          <div class="form-group">
              <label for="colores" >Fecha nacimiento: </label>
              <input class="form-control" type="text" value="{{$cliente->f_nac}}" id="f_nac" name="f_nac">
          </div>
          <div class="form-group">
              <label for="colores" >Ciudad: </label>
              <input class="form-control" type="text" value="{{$cliente->ciu}}" id="ciudad" name="ciudad">
          </div>
          <div class="form-group">
              <label for="colores" >Teléfono: </label>
              <input class="form-control" type="text" value="{{$cliente->telefono}}" id="telefono" name="telefono">
          </div>
          <br>
          <div class="btn-group">

                <button class="btn btn-info" type="submit" name="editar" value="editar" id="editar">
                    <span class="glyphicon glyphicon-edit"></span> Editar</button>
                    <a class="btn btn-danger" href="{{ route('Cliente.cancel',['mensaje'=>'Edicion de cliente cancelada'])}}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>            </div>
      </form>          
  </div>
  <br>
  <div id="error"></div>
@endsection
