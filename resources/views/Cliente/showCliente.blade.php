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
  <h1 class="page-header">Eliminar cliente</h1>
      <form action="{{ route('Cliente.destroy',['id' => $cliente->id] )}}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <div class="form-group">
              <label for="nombre" >Nombre: </label>
             
              <input class="form-control" type="text" value="{{$cliente->nom}}" name="nombre">
      
          </div>
          <div class="form-group">
              <label for="colores" >Apellido: </label>
      
              <input class="form-control" type="text" value="{{$cliente->ape}}" name="colores">

          </div>
          <div class="form-group">
              <label for="colores" >DNI: </label>
   
              <input class="form-control" type="text" value="{{$cliente->dni}}" name="colores">
  
          </div>
          <div class="form-group">
              <label for="colores" >Fecha nacimiento: </label>
              <input class="form-control" type="text" value="{{$cliente->f_nac}}" name="colores">
          </div>
          <div class="form-group">
              <label for="colores" >Ciudad: </label>
              <input class="form-control" type="text" value="{{$cliente->ciu}}" name="colores">
          </div>
          <div class="form-group">
              <label for="colores" >Teléfono: </label>
              <input class="form-control" type="text" value="{{$cliente->telefono}}" name="colores">
          </div>
            <br>
          <div class="btn-group">

                <button class="btn btn-info" type="submit" name="borrar" value="borrar" id="borra">
                    <span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                    <a class="btn btn-danger" href="{{ route('Cliente.cancel',['mensaje'=>'Borrado de cliente cancelado'])}}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>            </div>
            </div>
      </form>   
  </div>
  <br>
  <div id="error"></div>
@endsection
