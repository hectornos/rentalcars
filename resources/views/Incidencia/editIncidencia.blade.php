@extends('plantilla')
@section('titulo','Editar')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Editar una incidencia</h1>
      <form action="{{ route('Incidencia.update', ['id'=>$incidencia->id])}}" method="POST" name="formulario" onsubmit="return validarOtros()">
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
              <input class="form-control" type="text" value="{{$incidencia->descripcion}}" id="descripcion" name="descripcion">    
          </div>
          <br>
          <div class="btn-group">
          <button class="btn btn-success" type="submit" name="editar" value="Editar">
                  <span class="glyphicon glyphicon-edit"></span> Editar</button>
                <a class="btn btn-danger" href="{{ URL::previous() }}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>
                <button type="button" onclick="validarOtros()">Click Me!</button>
          </div>
      </form>          
  </div>
@endsection
