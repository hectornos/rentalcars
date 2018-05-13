@extends('plantilla')
@section('titulo','Editar alquiler')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Borrar un alquiler</h1>
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
              <a class="btn btn-danger" href="{{ URL::previous() }}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>
          </div>
      </form>          
  </div>
  <br>
  <div id="error"></div>
@endsection
