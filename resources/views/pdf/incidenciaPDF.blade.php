@extends('plantillaPDF')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Detalle incidencia</h1>
      
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
          <div class="form-group">
              <label for="cliente" >Fecha del alquiler: </label> 
              <input class="form-control" type="text" value="{{$incidencia->alquiler->fecha}}" name="fecha">    
          </div>
           
</div>

@endsection
