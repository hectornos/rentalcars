@extends('plantillaPDF')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Resumen alquiler</h1>
  <div class="form-group">
              <label for="nombre" class="col-2 col-form-label">Cliente: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$alquiler->cliente->completo}}" name="nombre">
              </div>
          </div>
          <div class="form-group">
              <label for="Apellido" class="col-2 col-form-label">Marca: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$alquiler->vehiculo->marc}}" name="apellido">
              </div>
          </div>
          <div class="form-group">
              <label for="Apellido" class="col-2 col-form-label">Modelo: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$alquiler->vehiculo->mod}}" name="modelo">
              </div>
          </div>
          <div class="form-group">
              <label for="Apellido" class="col-2 col-form-label">Cambio: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$alquiler->vehiculo->cambio->nom}}" name="cambio">
              </div>
          </div>
          <div class="form-group">
              <label for="Apellido" class="col-2 col-form-label">Combustible: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$alquiler->vehiculo->combustible->nom}}" name="combustible">
              </div>
          </div>
          <div class="form-group">
              <label for="Apellido" class="col-2 col-form-label">Tipo: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$alquiler->vehiculo->tipo->nom}}" name="tipo">
              </div>
          </div>
          <div class="form-group">
              <label for="Apellido" class="col-2 col-form-label">Matricula: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$alquiler->vehiculo->mat}}" name="matricula">
              </div>
          </div>
          <div class="form-group">
              <label for="Apellido" class="col-2 col-form-label">Color: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$alquiler->vehiculo->color->nom}}" name="color">
              </div>
          </div>
          @foreach ($alquiler->incidencias as $incidencia)
          <div class="form-group">
              <label for="f_nac" class="col-2 col-form-label">Incidencia: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$incidencia->descripcion}}" name="incidencia">
              </div>
          </div>
          @endforeach      
  </div>

@endsection
