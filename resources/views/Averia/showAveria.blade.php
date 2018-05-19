@extends('plantilla')
@section('titulo','Detalle')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Eliminar averia</h1>
      <form action="{{ route('Averia.destroy', ['id'=>$averia->id] )}}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <div class="form-group">
              <label for="nombre" >Vehiculo: </label>
              <input class="form-control" type="text" value="{{$averia->vehiculo->marca->nombre}} {{$averia->vehiculo->modelo}} {{$averia->vehiculo->matricula}}" name="vehiculo_id">
          </div>
          <div class="form-group">
              <label for="Apellido" >Tipo: </label>
              <input class="form-control" type="text" value="{{$averia->tipoaveria->nombre}}" name="tipoaveria_id">
          </div>
          <div class="form-group">
              <label for="dni" >Descripcion: </label>
              <input class="form-control" type="text" value="{{$averia->descripcion}}" name="descripcion">
          </div>
          <div class="form-group">
              <label for="f_nac">Fecha: </label>
              <input class="form-control" type="date" value="{{$averia->fecha}}" name="fecha">
          </div>
            <br>
          <div class="btn-group">

            <button class="btn btn-info" type="submit" name="borrar" value="borrar" id="borra">
                <span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                <a class="btn btn-danger" href="{{ route('Averia.cancel',['mensaje'=>'Borrado de averia cancelado'])}}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>
        </div>
      </form>          
  </div>
  <br>
  <div id="error"></div>
@endsection
