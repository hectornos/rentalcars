@extends('plantilla')
@section('titulo','Editar')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Eliminar incidencia</h1>
      <form action="{{ route('Incidencia.destroy', ['id'=>$incidencia->id])}}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <div class="form-group">
              <label for="vehiculo" >Vehiculo: </label>
              <input readonly class="form-control" type="text" value="{{$incidencia->alquiler->vehiculo->marca->nom}} {{$incidencia->alquiler->vehiculo->mod}} , {{$incidencia->alquiler->vehiculo->mat}}" name="vehiculo">
          </div>
          <div class="form-group">
              <label for="cliente" >Cliente: </label> 
              <input readonly class="form-control" type="text" value="{{$incidencia->alquiler->cliente->nom}} {{$incidencia->alquiler->cliente->ape}}" name="cliente">    
          </div>
          <div class="form-group">
              <label for="cliente" >Descripcion: </label> 
              <input class="form-control" type="text" value="{{$incidencia->descrip}}" name="descripcion">    
          </div>
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
