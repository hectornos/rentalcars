@extends('plantillaPDF')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Detalle de cliente</h1>
      
          <div class="form-group">
              <label for="nombre" class="col-2 col-form-label">Nombre: </label>
              <div class="col-10">
              <input class="form-control" readonly type="text" value="{{$cliente->nombre}}" name="nombre">
              </div>
          </div>
          <div class="form-group">
              <label for="colores" class="col-2 col-form-label">Apellido: </label>
              <div class="col-10">
              <input class="form-control" readonly type="text" value="{{$cliente->apellido}}" name="colores">
              </div>
          </div>
          <div class="form-group">
              <label for="colores" class="col-2 col-form-label">DNI: </label>
              <div class="col-10">
              <input class="form-control" readonly type="text" value="{{$cliente->dni}}" name="colores">
              </div>
          </div>
          <div class="form-group">
              <label for="colores" class="col-2 col-form-label">Fecha nacimiento: </label>
              <div class="col-10">
              <input class="form-control" readonly type="text" value="{{$cliente->f_nac}}" name="colores">
              </div>
          </div>
          <div class="form-group">
              <label for="colores" class="col-2 col-form-label">Ciudad: </label>
              <div class="col-10">
              <input class="form-control" readonly type="text" value="{{$cliente->ciudad}}" name="colores">
              </div>
          </div>
          <div class="form-group">
              <label for="colores" class="col-2 col-form-label">Teléfono: </label>
              <div class="col-10">
              <input class="form-control" readonly type="text" value="{{$cliente->telefono}}" name="colores">
              </div>
          </div>


   
  </div>
@endsection
