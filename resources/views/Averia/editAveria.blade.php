@extends('plantilla')
@section('titulo','Editar')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Editar una averia</h1>
      <form action="{{ route('Averia.update',['id'=>$averia->id])}}" method="POST">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="form-group">
              <label for="vehiculo" class="col-2 col-form-label">Vehiculo: </label>
              <div class="col-10">
              <input readonly class="form-control" type="text" value="{{strtoupper ($averia->vehiculo->matricula) }}" name="matricula">
              </div>
          </div>
          <div class="form-group">
              <label for="tipo" class="col-2 col-form-label">Tipo: </label>
              <select class="form-control" id="tipoaveria_id" name="tipoaveria_id" id="tipo">
              <option hidden name='1252' value='1252'>{{ucfirst($averia->tipoaveria->nombre)}}</option>
                @foreach($tipoaverias as $tipoaveria)
                    <option name={{$tipoaveria->id}} value={{$tipoaveria->id}}>{{ucfirst ($tipoaveria->nombre)}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
              <label for="descripcion" class="col-2 col-form-label">Descripcion: </label>
              <div class="col-10">
              <input class="form-control" type="text" value="{{ucfirst ($averia->descripcion)}}" name="descripcion">
              </div>
          </div>
          <div class="form-group">
              <label for="f_nac" class="col-2 col-form-label">Fecha: </label>
              <div class="col-10">
              <input class="form-control" type="date" value="{{$averia->fecha}}" name="fecha">
              </div>
          </div>

          <br>
          <div class="btn-group">
              <button class="btn btn-danger" type="submit" name="cancel" value="Cancelar">
                  <span class="glyphicon glyphicon-step-backward"></span> Cancelar</button>
          </div>
      </form>          
  </div>
@endsection
