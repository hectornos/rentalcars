@extends('plantilla')
@section('titulo','Listado Vehiculos')
@section('contenido')          
<div class="container-fluid">
    <h1 class="page-header" align="center">Listado de vehiculos</h1>
    <form method="GET" action="{{ route('Vehiculo.index' )}}">
      <div class="input-group">
          <span class="input-group-btn">
              <button class="btn btn-success" type="submit">Buscar</button>
          </span>
          <input id="bus" type="text" class="form-control" name="busqueda" placeholder="Elige criterio de busqueda" value="">
          <select id="filtro" name="filtro">
              <option value="matricula">Matricula</option>
              <option value="modelo">Modelo</option>

          </select> 
        <div class="btn-group" >
          <a href="{{ route('Vehiculo.create')}}" class="btn btn-success">
            <span class="glyphicon glyphicon-edit"></span> Nuevo</button></a>
        </div>
      </div>       
    </form>
    <br>    
    <table class="table table-hover table-striped">
        <tr>
          <td width="150" align="center" title="Modelo de coche"><a href="{{ route('Vehiculo.index',['criterio' => 'modelo'] )}}" >Modelo</a></td>
          <td width="150" align="center" title="Matricula"><a href="{{ route('Vehiculo.index',['criterio' => 'matricula'] )}}" >Matricula</a></td>
          <td width="150" align="center" title="Disponible para alquilar"><a href="{{ route('Vehiculo.index',['criterio' => 'disponible'] )}}" >Disponible</a></td>
          <td width="150" title="Ordena por numero de alquileres" align="center"><a href="{{ route('Vehiculo.index',['criterio' => 'alquileres'] )}}" >Alquileres</a></td>
          <td width="150" title="Ordena por numero de averias" align="center"><a href="{{ route('Vehiculo.index',['criterio' => 'averias'] )}}" >Averias</a></td>
          <td width="150" align="center" title="Agregar una" >Agregar averia</a></td>
          <td width="150" align="center"><b>Editar</b></td>
          <td width="150" align="center"><b>Eliminar</b></td>
          <td width="150" align="center"><b>Imprimir</b></td>
        </tr>
        @foreach($vehiculos as $vehiculo)
        <tr class="destacar">
          <td width="150" align="center">{{ ucfirst($vehiculo->modelo) }}</td>
          <td width="150" align="center">{{ strtoupper($vehiculo->matricula) }}</td>
          <td width="150" align="center">
            @if ($vehiculo->disponible==0)
            <a href="{{ route('Vehiculo.index',['vehiculo_id' => $vehiculo->id,'criterio'=>'dispo'] )}}" class="btn btn-danger" title="Agrega una averia al vehiculo">
                  <span class="glyphicon"/>No</a> 
            @else
            <a href="{{ route('Vehiculo.index',['vehiculo_id' => $vehiculo->id, 'criterio' =>'dispo'] )}}" class="btn btn-success" title="Agrega una averia al vehiculo">
                  <span class="glyphicon"/>Si</a> 
            @endif
          </td>
          <td width="150" align="center" title="Ver alquieres del vehiculo">
            @if (count($vehiculo->alquileres)>0)
              <a href="{{ route('Vehiculo.alquileres',['id'=>$vehiculo->id]) }}">{{count($vehiculo->alquileres)}}</a>
            @else
              Sin alquileres
            @endif
          </td>
          <td width="150" align="center" title="Ver averias del vehiculo">
            @if (count($vehiculo->averias)>0)
              <a href="{{ route('Vehiculo.averias',['id'=>$vehiculo->id]) }}">{{count($vehiculo->averias)}}</a>
            @else
              Sin averias
            @endif
          </td>

          <td width="150" align="center">    
              <a href="{{ route('Averia.create',['vehiculo_id' => $vehiculo->id] )}}" class="btn btn-info" title="Agrega una averia al vehiculo">
                  <span class="glyphicon glyphicon-edit"/></a>    
          </td>
          <td width="150" align="center">    
              <a href="{{ route('Vehiculo.edit',['id' => $vehiculo->id] )}}" class="btn btn-info" title="Edita el vehiculo seleccionado">
                  <span class="glyphicon glyphicon-edit"/></a>    
          </td>
          <td width="150" align="center">
              <a href="{{ route('Vehiculo.show',['id' => $vehiculo->id] )}}" class="btn btn-danger" title="Borra el vehiculo seleccionado">
                  <span class="glyphicon glyphicon-trash"/></a>
          </td>
          <td width="150" align="center">
              <a href="{{ route('Vehiculo.pdf',['id' => $vehiculo->id] )}}" class="btn-btn-info" title="Exporta vehiculo a PDF">
                  <span class="glyphicon glyphicon-floppy-save"/></a>
          </td>
        </tr>
        @endforeach
    </table>
    <div class="row">
        <div class="col-sm-2">Vehiculos: {{$count}}</div>
    </div>
</div> 
@endsection