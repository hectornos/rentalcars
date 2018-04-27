@extends('plantilla')
@section('titulo','Detalle')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Detalle de averia</h1>
      <form action="{{ route('Averia.destroy', ['id'=>$averia->id] )}}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <div class="form-group">
              <label for="nombre" class="col-2 col-form-label">Vehiculo: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$averia->vehiculo->marca->nombre}} {{$averia->vehiculo->modelo}} {{$averia->vehiculo->matricula}}" name="vehiculo_id">
              </div>
          </div>
          <div class="form-group">
              <label for="Apellido" class="col-2 col-form-label">Tipo: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$averia->tipoaveria->nombre}}" name="tipoaveria_id">
              </div>
          </div>
          <div class="form-group">
              <label for="dni" class="col-2 col-form-label">Descripcion: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$averia->descripcion}}" name="descripcion">
              </div>
          </div>
          <div class="form-group">
              <label for="f_nac" class="col-2 col-form-label">Fecha: </label>
              <div class="col-10">
              <input class="form-control" type="date" value="{{$averia->fecha}}" name="fecha">
              </div>
          </div>

          <div class="btn-group">

            <button class="btn btn-info" type="submit" name="borrar" value="borrar" id="borra">
                <span class="glyphicon glyphicon-trash"></span> Eliminar</button>
            <a class="btn btn-danger" href="{{ URL::previous() }}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>
        </div>
      </form>          
  </div>
@endsection
