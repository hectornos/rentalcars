@extends('plantilla')
@section('titulo','Detalle')
@section('contenido')  
<div class="container">
  <h1 class="page-header">Eliminar cliente</h1>
      <form action="{{ route('Cliente.destroy',['id' => $cliente->id] )}}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <div class="form-group">
              <label for="nombre" >Nombre: </label>
             
              <input class="form-control" type="text" value="{{$cliente->nom}}" name="nombre">
      
          </div>
          <div class="form-group">
              <label for="colores" >Apellido: </label>
      
              <input class="form-control" type="text" value="{{$cliente->ape}}" name="colores">

          </div>
          <div class="form-group">
              <label for="colores" >DNI: </label>
   
              <input class="form-control" type="text" value="{{$cliente->dni}}" name="colores">
  
          </div>
          <div class="form-group">
              <label for="colores" >Fecha nacimiento: </label>
              <input class="form-control" type="text" value="{{$cliente->f_nac}}" name="colores">
          </div>
          <div class="form-group">
              <label for="colores" >Ciudad: </label>
              <input class="form-control" type="text" value="{{$cliente->ciu}}" name="colores">
          </div>
          <div class="form-group">
              <label for="colores" >Teléfono: </label>
              <input class="form-control" type="text" value="{{$cliente->telefono}}" name="colores">
          </div>
            <br>
          <div class="btn-group">

                <button class="btn btn-info" type="submit" name="borrar" value="borrar" id="borra">
                    <span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                    <a class="btn btn-danger" href="{{ route('Cliente.cancel')}}"><span class="glyphicon glyphicon-step-backward"></span> Cancelar</a>            </div>
            </div>
      </form>   
  </div>
  <br>
  <div id="error"></div>
@endsection
