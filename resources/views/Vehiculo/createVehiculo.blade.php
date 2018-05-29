@extends('plantilla')
@section('titulo','Agregar vehiculo')
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
  <h1 class="page-header">Agregar un vehiculo</h1>
      <form action="{{ route('Vehiculo.store')}}" method="POST" id="formulario" onsubmit="return validarCoche()">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="marca_id">Marca</label>
            <select class="form-control" id="marca_id" name="marca_id" id="marca_id">
                    <option selected disabled>Selecciona marca</option>
                @foreach($marcas as $marca)
                    <option name={{$marca->id}} value={{$marca->id}}>{{$marca->nom}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
              <label for="modelo" >Modelo: </label>
              
              <input class="form-control" type="text" value="" id="modelo" name="modelo">
              
          </div>
          <div class="form-group">
              <label for="matricula" >Matricula: </label>
              
              <input class="form-control" type="text" value="" id="matricula" name="matricula">
              
          </div>
          <div class="form-group">
              <label for="tipo_id">Tipo</label>
              <select class="form-control" id="tipo_id" name="tipo_id">
                    <option selected disabled>Selecciona tipo</option>
                  @foreach($tipos as $tipo)
                      <option name={{$tipo->id}} value={{$tipo->id}}>{{$tipo->nom}}</option>
                      {{$tipo->id}}
                  @endforeach

              </select>
          </div> 
          <div class="form-group">
              <label for="combustible_id">Combustible</label>
              <select class="form-control" id="combustible_id" name="combustible_id">
                      <option selected disabled>Selecciona combustible</option>
                  @foreach($combustibles as $combustible)
                      <option name={{$combustible->id}} value={{$combustible->id}}>{{$combustible->nom}}</option>  
                  @endforeach
              </select>
          </div> 
          <div class="form-group">
              <label for="color_id">Color</label>
              <select class="form-control" id="color_id" name="color_id">
                    <option selected disabled>Selecciona color</option>
                  @foreach($colors as $color)
                      <option name={{$color->id}} value={{$color->id}}>{{$color->nom}}</option>
                  @endforeach
              </select>
          </div> 
          <div class="form-group">
              <label for="cambio_id">Cambio</label>
              <select class="form-control" id="cambio_id" name="cambio_id">
              <option selected disabled>Selecciona cambio</option>
                  @foreach($cambios as $cambio)
                      <option name={{$cambio->id}} value={{$cambio->id}}>{{$cambio->nom}}</option>
                  @endforeach
              </select>
          </div> 
          <br>
          <div class="btn-group">
              <button class="btn btn-success" type="submit" name="guardar" value="Almacenar">
                  <span class="glyphicon glyphicon-ok"></span> Almacenar</button>
                  <a class="btn btn-danger" href="{{ route('Vehiculo.cancel',['mensaje'=>'Creacion de vehiculo cancelada'])}}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>

          </div>
          
      </form>    
  </div>

  <br>
  <div id="error"></div>

@endsection
