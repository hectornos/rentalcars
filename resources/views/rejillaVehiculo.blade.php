@extends('plantilla')
@section('titulo','Listado Vehiculos')
@section('contenido')          
<div class="container-fluid">
    <h1 class="page-header" align="center">Listado de vehiculos</h1>     
    <table class="table table-hover table-striped">
        <tr>
          <td width="150" title="Marca del coche" align="center"><a href="{{ route('Vehiculo.index',['criterio' => 'marca'] )}}" >Marca</a></td>
          <td width="150" align="center" title="Modelo de coche"><a href="{{ route('Vehiculo.index',['criterio' => 'modelo'] )}}" >Modelo</a></td>
          <td width="150" align="center" title="Matricula"><a href="{{ route('Vehiculo.index',['criterio' => 'matricula'] )}}" >Matricula</a></td>
          <td width="150" align="center" title="Disponible para alquilar"><a href="{{ route('Vehiculo.index',['criterio' => 'averias'] )}}" >Averias</a></td>
          <td width="150" title="Ordena por numero de alquileres" align="center"><a href="{{ route('Vehiculo.index',['criterio' => 'alquileres'] )}}" >Alquileres</a></td>
          <td width="150" title="Ordena por numero de averias" align="center"><a href="{{ route('Vehiculo.index',['criterio' => 'averias'] )}}" >Averias</a></td>
          <td width="150" align="center"><b>Editar</b></td><td width="150" align="center"><b>Eliminar</b></td><td width="150" align="center"><b>Imprimir</b></td>
        </tr>
        @foreach($vehiculos as $vehiculo)
        <tr class="destacar">
          <td width="150" align="center">{{$vehiculo->marca->nombre}}</td>
          <td width="150" align="center">{{$vehiculo->modelo}}</td>
          <td width="150" align="center">{{$vehiculo->matricula}}</td>
          <td width="150" align="center">
            @if (count($vehiculo->disponible)==0)
              No
            @else
              Si
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
        <div class="col-sm-2">clientes llamados: {{$count}}</div>
    </div>
</div> 
@endsection