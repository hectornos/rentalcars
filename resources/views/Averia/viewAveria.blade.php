@extends('plantilla')
@section('titulo','Detalle')
@include('partials.navBar')
@include('partials.formularioCabecera.divNav')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Detalle averia</h1>
      
          <div class="form-group">
              <label for="nombre" >Vehiculo: </label>
              <input class="form-control" readonly type="text" value="{{$averia->vehiculo->marca->nombre}} {{$averia->vehiculo->modelo}} {{$averia->vehiculo->matricula}}" name="vehiculo_id">
          </div>
          <div class="form-group">
              <label for="Apellido" >Tipo: </label>
              <input class="form-control" readonly type="text" value="{{$averia->tipoaveria->nombre}}" name="tipoaveria_id">
          </div>
          <div class="form-group">
              <label for="dni" >Descripcion: </label>
              <input class="form-control" readonly type="text" value="{{$averia->descripcion}}" name="descripcion">
          </div>
          <div class="form-group">
              <label for="f_nac">Fecha: </label>
              <input class="form-control" readonly type="date" value="{{$averia->fecha}}" name="fecha">
          </div>
            <br>
          <div class="btn-group">
          <a class="btn btn-danger" href="{{ URL::previous() }}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>
        </div>
              
  </div>
  <br>
  <div id="error"></div>
@endsection
