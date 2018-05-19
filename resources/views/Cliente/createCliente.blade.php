@extends('plantilla')
@section('titulo','Agregar')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Agregar un cliente</h1>
      <form action="{{ route('Cliente.store')}}" method="POST" id="formulario" onsubmit="return validarCliente()">
          {{ csrf_field() }}
          <div class="form-group">
              <label for="nombre" class="col-2 col-form-label">Nombre: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="" id="nombre" name="nombre">
              </div>
          </div>
          <div class="form-group">
              <label for="Apellido" class="col-2 col-form-label">Apellido: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="" id="apellido" name="apellido">
              </div>
          </div>
          <div class="form-group">
              <label for="dni" class="col-2 col-form-label">DNI: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="" id="dni" name="dni">
              </div>
          </div>
          <div class="form-group">
              <label for="f_nac" class="col-2 col-form-label">Fecha nacimiento: </label>
              <div class="col-10">
              <input class="form-control" type="date" value="" id="f_nac" name="f_nac">
              </div>
          </div>
          <div class="form-group">
              <label for="ciudad" class="col-2 col-form-label">Ciudad: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="" id="ciudad" name="ciudad">
              </div>
          </div>
          <div class="form-group">
              <label for="telefono" class="col-2 col-form-label">Teléfono: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="" id="telefono" name="telefono">
              </div>
          </div>
          <br>
          <div class="btn-group">
              <button class="btn btn-success" type="submit" name="guardar" value="Almacenar">
                  <span class="glyphicon glyphicon-ok"></span> Almacenar</button>           
            <a class="btn btn-danger" href="{{ route('Cliente.cancel',['mensaje'=>'Creacion de cliente cancelada'])}}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>
            

          </div>
      </form>          
  </div>

  <br>
  <div id="error"></div>
@endsection
