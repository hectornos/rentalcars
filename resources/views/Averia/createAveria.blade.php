@extends('plantilla')
@section('titulo','Agregar')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Agregar una averia</h1>
      <form action="{{ route('Averia.store')}}" method="POST">
          {{ csrf_field() }}
          <input name="vehiculo_id" type="hidden" value="{{$vehiculo->id}}"/>
          <div class="form-group">
              Vehiculo: {{$vehiculo->marca->nombre}} {{$vehiculo->modelo}}, {{$vehiculo->matricula}}
          </div>
          <div class="form-group">
              <label for="tipo">Tipo: </label>
              <select class="form-control" id="tipoaveria_id" name="tipoaveria_id" id="tipo">
                @foreach($tipoaverias as $tipoaveria)
                    <option name={{$tipoaveria->id}} value={{$tipoaveria->id}}>{{$tipoaveria->nombre}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
              <label for="dni" >Descripcion: </label>
              
              <input class="form-control" type="text" value="" name="descripcion">
              
          </div>
          <div class="form-group">
              <label for="f_nac" >Fecha: </label>
              <input  class="form-control" type="date" value="" name="fecha">
          </div>

          <br>
          <div class="btn-group">
              <button class="btn btn-success" type="submit" name="guardar" value="Almacenar">
                  <span class="glyphicon glyphicon-ok"></span> Almacenar</button>
              <button class="btn btn-danger" type="submit" name="cancel" value="Cancelar">
                  <span class="glyphicon glyphicon-step-backward"></span> Cancelar</button>
          </div>
      </form>          
  </div>
@endsection
