@extends('plantilla')
@section('titulo','Editar')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Editar una incidencia</h1>
      <form action="{{ route('Incidencia.update', ['id'=>$incidencia->id])}}" method="POST">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="form-group">
              <label for="vehiculo" >Vehiculo: </label>
              <input readonly class="form-control" type="text" value="{{$incidencia->alquiler->vehiculo->marca->nombre}} {{$incidencia->alquiler->vehiculo->modelo}} , {{$incidencia->alquiler->vehiculo->matricula}}" name="vehiculo">
          </div>
          <div class="form-group">
              <label for="cliente" >Cliente: </label> 
              <input readonly class="form-control" type="text" value="{{$incidencia->alquiler->cliente->nombre}} {{$incidencia->alquiler->cliente->apellido}}" name="cliente">    
          </div>
          <div class="form-group">
              <label for="cliente" >Descripcion: </label> 
              <input class="form-control" type="text" value="{{$incidencia->descripcion}}" name="descripcion">    
          </div>
          <br>
          <div class="btn-group">
              <button class="btn btn-success" type="submit" name="guardar" value="Almacenar">
                  <span class="glyphicon glyphicon-ok"></span> Almacenar</button>
              <button class="btn btn-danger" type="submit" name="cancel" value="Cancelar">
                  <span class="glyphicon glyphicon-step-backward"></span> Cancelar</button>
          </div>
      </form>          
  </div>
@endsection
