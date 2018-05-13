@extends('plantilla')
@section('titulo','Editar')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Eliminar vehiculo</h1>
      <form action="{{ route('Vehiculo.destroy', ['id'=>$vehiculo->id])}}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <div class="form-group">
            <label for="marca_id">Marca</label>
            <input class="form-control" type="text" value="{{$vehiculo->marca->nom}}" name="marca">
          </div>
          <div class="form-group">
              <label for="modelo" >Modelo: </label>
              <input class="form-control" type="text" value="{{$vehiculo->mod}}" name="modelo">
          </div>
          <div class="form-group">
              <label for="matricula" >Matricula: </label >
              <input class="form-control" type="text" value="{{$vehiculo->mat}}" name="matricula">
          </div>
          <div class="form-group">
              <label for="tipo_id">Tipo</label>
              <input class="form-control" type="text" value="{{$vehiculo->tipo->nom}}" name="tipo">
          </div> 
          <div class="form-group">
              <label for="combustible_id">Combustible</label>
              <input class="form-control" type="text" value="{{$vehiculo->combustible->nom}}" name="combustible">
          </div> 
          <div class="form-group">
              <label for="color_id">Color</label>
              <input class="form-control" type="text" value="{{$vehiculo->color->nom}}" name="color">     
          </div> 
          <div class="form-group">
              <label for="cambio_id">cambio</label>
              <input class="form-control" type="text" value="{{$vehiculo->cambio->nom}}" name="cambio">  
          </div> 
          <br>
          <div class="btn-group">
            <button class="btn btn-info" type="submit" name="borrar" value="borrar" id="borra">
            <a class="btn btn-danger" href="{{ route('Vehiculo.cancel')}}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>

          </div>
      </form>          
  </div>
  <br>
  <div id="error"></div>
@endsection
