@extends('plantilla')
@section('titulo','Agregar')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Crear un pajaro</h1>
      <form action="{{ route('Pajaro.store')}}" method="POST" onsubmit="return validar()">
          {{ csrf_field() }}
          <div class="form-group">
              <label for="nombre" class="col-2 col-form-label">Nombre</label>
              <div class="col-10">
              <input class="form-control" type="text" value="" name="nombre">
              </div>
          </div>
          <div class="form-group">
              <label for="colores" class="col-2 col-form-label">Colores</label>
              <div class="col-10">
              <input class="form-control" type="text" value="" name="colores">
              </div>
          </div>
          <div class="form-group">
              <label for="especie_id">Especie</label>
              <select class="form-control" id="especie_id" name="especie_id">
                  @foreach($especies as $especie)
                      <option name={{$especie->id}} value={{$especie->id}}>{{$especie->id}}-{{$especie->denominacion}}</option>
                  @endforeach
              </select>
          </div> 
          <div class="btn-group">
              <button class="btn btn-success" type="submit" name="editar" value="Editar">
                  <span class="glyphicon glyphicon-ok"></span> Almacenar</button>
              <button class="btn btn-danger" type="submit" name="cancel" value="Cancelar">
                  <span class="glyphicon glyphicon-step-backward"></span> Cancelar</button>
          </div>
      </form>          
  </div>
@endsection
