@extends('plantilla')
@section('titulo','Editar')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Agregar una incidencia</h1>
      <form action="{{ route('Incidencia.store')}}" method="POST">
          {{ csrf_field() }}
          <input name="alquiler_id" type="hidden" value="{{$alquiler->id}}"/>
          <div class="form-group">
              <b>Datos del alquiler:</b><br>
              <b>Vehiculo:</b> {{$alquiler->vehiculo->marca->nombre}} {{$alquiler->vehiculo->modelo}} , {{$alquiler->vehiculo->matricula}}</br>
              <b>Cliente:</b> {{$alquiler->cliente->nombre}} {{$alquiler->cliente->apellido}}
          </div>
          <div class="form-group">
              <label for="cliente" >Descripcion: </label> 
              <input class="form-control" type="text" value="" name="descripcion">    
          </div>
          <br>
          <div class="btn-group">
              <button class="btn btn-success" type="submit" name="guardar" value="Almacenar">
                  <span class="glyphicon glyphicon-ok"></span> Almacenar</button>
                  <a class="btn btn-danger" href="{{ route('Alquiler.cancel',['mensaje'=>'Creacion de incidencia cancelada'])}}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>

          </div>
      </form>          
  </div>
  <br>
  <div id="error"></div>
@endsection
