@extends('plantilla')
@section('titulo','Agregar alquiler')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Agregar un alquiler</h1>
      <form action="{{ route('Alquiler.store')}}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
              <label for="nombre" class="col-2 col-form-label">Cliente: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="" name="nombre">
              </div>
          </div>
          <div class="form-group">
              <label for="Apellido" class="col-2 col-form-label">Vehiculo: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="" name="apellido">
              </div>
          </div>
          <div class="form-group">
              <label for="f_nac" class="col-2 col-form-label">Fecha nacimiento: </label>
              <div class="col-10">
              <input class="form-control" type="date" value="" name="f_nac">
              </div>
          </div>
          <div class="form-group">
              <label for="f_nac" class="col-2 col-form-label">Incidencia: </label>
              <div class="col-10">
              <input class="form-control" type="date" value="" name="incidencia">
              </div>
          </div>
          <br>
          <div class="btn-group">
              <button class="btn btn-success"  type="submit" name="guardar" value="Almacenar">
                  <span class="glyphicon glyphicon-ok"></span> Almacenar</button>
            <a class="btn btn-danger" href="{{ route('Alquiler.cancel')}}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>
          </div>
      </form>          
  </div>



@endsection
