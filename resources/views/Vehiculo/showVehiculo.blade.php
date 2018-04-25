@extends('plantilla')
@section('titulo','Editar')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Editar un vehiculo</h1>
      <form action="{{ route('Vehiculo.destroy', ['id'=>$vehiculo->id])}}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <div class="form-group">
            <label for="marca_id">Marca</label>
            <input class="form-control" type="text" value="{{$vehiculo->marca->nombre}}" name="marca">
          </div>
          <div class="form-group">
              <label for="modelo" >Modelo: </label>
              
              <input class="form-control" type="text" value="{{$vehiculo->modelo}}" name="modelo">
              
          </div>
          <div class="form-group">
              <label for="matricula" >Matricula: </label>
              
              <input class="form-control" type="text" value="{{$vehiculo->matricula}}" name="matricula">
              
          </div>
          <div class="form-group">
              <label for="tipo_id">Tipo</label>
              <input class="form-control" type="text" value="{{$vehiculo->tipo->nombre}}" name="tipo">
          </div> 
          <div class="form-group">
              <label for="combustible_id">Combustible</label>
              <input class="form-control" type="text" value="{{$vehiculo->combustible->nombre}}" name="combustible">
              
          </div> 
          <div class="form-group">
              <label for="color_id">Color</label>
              <input class="form-control" type="text" value="{{$vehiculo->color->nombre}}" name="color">     
          </div> 
          <div class="form-group">
              <label for="cambio_id">cambio</label>
              <input class="form-control" type="text" value="{{$vehiculo->cambio->nombre}}" name="cambio">
              
          </div> 
          <br>
          <div class="btn-group">
              
              <button class="btn btn-danger" type="submit" name="cancel" value="Cancelar">
                  <span class="glyphicon glyphicon-step-backward"></span> Cancelar</button>
          </div>
      </form>          
  </div>
@endsection
