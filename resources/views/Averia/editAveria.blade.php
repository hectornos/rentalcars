@extends('plantilla')
@section('titulo','Editar')
@include('partials.navBar')
@include('partials.formularioCabecera.divNav')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Editar una averia</h1>
      <form action="{{ route('Averia.update',['id'=>$averia->id])}}" method="POST" id="formulario" onsubmit="return validarOtros()">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="form-group">
              <label for="vehiculo" >Vehiculo: </label>
              <input readonly class="form-control" type="text" value="{{strtoupper ($averia->vehiculo->mat) }}" name="matricula">
          </div>
          <div class="form-group">
              <label for="tipo" >Tipo: </label>
              <select class="form-control" id="tipoaveria_id" name="tipoaveria_id" id="tipo">
              <option hidden name={{$averia->tipoaveria->id}} value={{$averia->tipoaveria->id}}>{{ucfirst($averia->tipoaveria->nom)}}</option>
                @foreach($tipoaverias as $tipoaveria)
                    <option name={{$tipoaveria->id}} value={{$tipoaveria->id}}>{{ucfirst ($tipoaveria->nom)}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
              <label for="descripcion" >Descripcion: </label>
              <input class="form-control" type="text" value="{{ucfirst ($averia->descrip)}}" id="descripcion" name="descripcion">
          </div>
          <div class="form-group">
              <label for="f_nac" >Fecha: </label>
              <input class="form-control" type="date" value="{{$averia->fecha}}" name="fecha">
              
          </div>

          <br>
          <div class="btn-group">
              <button class="btn btn-success" type="submit" name="editar" value="Editar">
                  <span class="glyphicon glyphicon-edit"></span> Editar</button>
                  <a class="btn btn-danger" href="{{ route('Averia.cancel',['mensaje'=>'Edicion de averia cancelada'])}}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>
          </div>
      </form>          
  </div>
  <br>
  <div id="error"></div>

@endsection
