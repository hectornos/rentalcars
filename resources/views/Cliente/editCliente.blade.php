@extends('plantilla')
@section('titulo','Detalle')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Detalle de cliente</h1>
      <form action="{{ route('Cliente.update',['id' => $cliente->id] )}}" method="POST" onsubmit="return validarCliente()">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="form-group">
              <label for="nombre" class="col-2 col-form-label">Nombre: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$cliente->nombre}}" id="nombre" name="nombre">
              </div>
          </div>
          <div class="form-group">
              <label for="colores" class="col-2 col-form-label">Apellido: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$cliente->apellido}}" id="apellido" name="apellido">
              </div>
          </div>
          <div class="form-group">
              <label for="colores" class="col-2 col-form-label">DNI: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$cliente->dni}}" id="dni" name="dni">
              </div>
          </div>
          <div class="form-group">
              <label for="colores" class="col-2 col-form-label">Fecha nacimiento: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$cliente->f_nac}}" id="f_nac" name="f_nac">
              </div>
          </div>
          <div class="form-group">
              <label for="colores" class="col-2 col-form-label">Ciudad: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$cliente->ciudad}}" id="ciudad" name="ciudad">
              </div>
          </div>
          <div class="form-group">
              <label for="colores" class="col-2 col-form-label">Teléfono: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{$cliente->telefono}}" id="telefono" name="telefono">
              </div>
          </div>

          <div class="btn-group">

                <button class="btn btn-info" type="submit" name="editar" value="editar" id="editar">
                    <span class="glyphicon glyphicon-edit"></span> Editar</button>
                <a class="btn btn-danger" href="{{ URL::previous() }}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>
                
            </div>
      </form>          
  </div>
@endsection
