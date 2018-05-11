@extends('plantilla')
@section('titulo','Crear')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Crear un vehiculo</h1>
      <form action="{{ route('Vehiculo.store')}}" method="POST" onsubmit="return validarCoche()">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="marca_id">Marca</label>
            <select class="form-control" id="marca_id" name="marca_id" id="marca_id">
                    <option selected disabled>Selecciona marca</option>
                @foreach($marcas as $marca)
                    <option name={{$marca->id}} value={{$marca->id}}>{{$marca->nombre}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
              <label for="modelo" >Modelo: </label>
              
              <input class="form-control" type="text" value="" id="modelo" name="modelo">
              
          </div>
          <div class="form-group">
              <label for="matricula" >Matricula: </label>
              
              <input class="form-control" type="text" value="" id="matricula" name="matricula">
              
          </div>
          <div class="form-group">
              <label for="tipo_id">Tipo</label>
              <select class="form-control" id="tipo_id" name="tipo_id">
                    <option selected disabled>Selecciona tipo</option>
                  @foreach($tipos as $tipo)
                      <option name={{$tipo->id}} value={{$tipo->id}}>{{$tipo->nombre}}</option>
                      {{$tipo->id}}
                  @endforeach

              </select>
          </div> 
          <div class="form-group">
              <label for="combustible_id">Combustible</label>
              <select class="form-control" id="combustible_id" name="combustible_id">
                      <option selected disabled>Selecciona combustible</option>
                  @foreach($combustibles as $combustible)
                      <option name={{$combustible->id}} value={{$combustible->id}}>{{$combustible->nombre}}</option>  
                  @endforeach
              </select>
          </div> 
          <div class="form-group">
              <label for="color_id">Color</label>
              <select class="form-control" id="color_id" name="color_id">
                    <option selected disabled>Selecciona color</option>
                  @foreach($colors as $color)
                      <option name={{$color->id}} value={{$color->id}}>{{$color->nombre}}</option>
                  @endforeach
              </select>
          </div> 
          <div class="form-group">
              <label for="cambio_id">Cambio</label>
              <select class="form-control" id="cambio_id" name="cambio_id">
              <option selected disabled>Selecciona cambio</option>
                  @foreach($cambios as $cambio)
                      <option name={{$cambio->id}} value={{$cambio->id}}>{{$cambio->nombre}}</option>
                  @endforeach
              </select>
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
