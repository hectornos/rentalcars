@extends('plantilla')
@section('titulo','Detalle')
@include('partials.navBar')
@include('partials.formularioCabecera.divNav')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Detalle de cliente</h1>
      <form action="{{ route('Cliente.update',['id' => $cliente->id] )}}" method="POST" id="formulario" onsubmit="return validarCliente()">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="form-group">
              <label for="nombre" >Nombre: </label>
              <input class="form-control" type="text" value="{{$cliente->nom}}" id="nombre" name="nombre">
          </div>
          <div class="form-group">
              <label for="colores" >Apellido: </label>
              <input class="form-control" type="text" value="{{$cliente->ape}}" id="apellido" name="apellido">
          </div>
          <div class="form-group">
              <label for="colores" >DNI: </label>
              <input class="form-control" type="text" value="{{$cliente->dni}}" id="dni" name="dni">
          </div>
          <div class="form-group">
              <label for="colores" >Fecha nacimiento: </label>
              <input class="form-control" type="text" value="{{$cliente->f_nac}}" id="f_nac" name="f_nac">
          </div>
          <div class="form-group">
              <label for="colores" >Ciudad: </label>
              <input class="form-control" type="text" value="{{$cliente->ciu}}" id="ciudad" name="ciudad">
          </div>
          <div class="form-group">
              <label for="colores" >Teléfono: </label>
              <input class="form-control" type="text" value="{{$cliente->telefono}}" id="telefono" name="telefono">
          </div>
          <br>
          <div class="btn-group">

                <button class="btn btn-info" type="submit" name="editar" value="editar" id="editar">
                    <span class="glyphicon glyphicon-edit"></span> Editar</button>
                    <a class="btn btn-danger" href="{{ route('Cliente.cancel',['mensaje'=>'Edicion de cliente cancelada'])}}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>            </div>
      </form>          
  </div>
  <br>
  <div id="error"></div>
@endsection
