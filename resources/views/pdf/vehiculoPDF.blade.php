@extends('plantillaPDF')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Detalle de vehiculo</h1>
      
          <div class="form-group">
            <label for="marca_id">Marca</label>
            <input class="form-control" readonly type="text" value="{{$vehiculo->marca->nom}}" name="marca">
          </div>
          <div class="form-group">
              <label for="modelo" >Modelo: </label>
              <input class="form-control" readonly type="text" value="{{$vehiculo->mod}}" name="modelo">
          </div>
          <div class="form-group">
              <label for="matricula" >Matricula: </label >
              <input class="form-control" readonly type="text" value="{{$vehiculo->mat}}" name="matricula">
          </div>
          <div class="form-group">
              <label for="tipo_id">Tipo</label>
              <input class="form-control" readonly type="text" value="{{$vehiculo->tipo->nom}}" name="tipo">
          </div> 
          <div class="form-group">
              <label for="combustible_id">Combustible</label>
              <input class="form-control" readonly type="text" value="{{$vehiculo->combustible->nom}}" name="combustible">
          </div> 
          <div class="form-group">
              <label for="color_id">Color</label>
              <input class="form-control" readonly type="text" value="{{$vehiculo->color->nom}}" name="color">     
          </div> 
          <div class="form-group">
              <label for="cambio_id">Cambio</label>
              <input class="form-control" readonly type="text" value="{{$vehiculo->cambio->nom}}" name="cambio">  
          </div> 
        
  </div>
@endsection
