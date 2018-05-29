@extends('plantilla')
@section('titulo','Revisar datos')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Cliente existente:</h1>
  <h2 class="page-header">Revisa tus datos</h2>
              
          <div class="form-group">
              <label for="nombre" >Nombre: </label>
              <input readonly class="form-control" type="text" value="{{$cliente->nom}}" id="nombre" name="nombre">
          </div>
          <div class="form-group">
              <label for="colores" >Apellido: </label>
              <input readonly class="form-control" type="text" value="{{$cliente->ape}}" id="apellido" name="apellido">
          </div>
          <div class="form-group">
              <label for="colores" >DNI: </label>
              <input readonly class="form-control" type="text" value="{{$cliente->dni}}" id="dni" name="dni">
          </div>
          <div class="form-group">
              <label for="colores" >Fecha nacimiento: </label>
              <input readonly class="form-control" type="text" value="{{$cliente->f_nac}}" id="f_nac" name="f_nac">
          </div>
          <div class="form-group">
              <label for="colores" >Ciudad: </label>
              <input readonly class="form-control" type="text" value="{{$cliente->ciu}}" id="ciudad" name="ciudad">
          </div>
          <div class="form-group">
              <label for="colores" >Teléfono: </label>
              <input readonly class="form-control" type="text" value="{{$cliente->telefono}}" id="telefono" name="telefono">
          </div>
          <br>
          
            <a href="{{ route('Vehiculo.elegir',['cliente_id' => $cliente->id] )}}" class="btn btn-success" title="Continua hacia eleccion de vehiculo">
                  <span class="glyphicon glyphicon-ok"/> Seguir </a> 
            
  <br>
  <div id="error"></div>
@endsection
