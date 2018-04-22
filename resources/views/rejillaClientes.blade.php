@extends('plantilla')
@section('titulo','Listado Clientes')
@section('contenido')          
<div class="container-fluid">
    <h1 class="page-header" align="center">Listado de clientes</h1>     
    <table class="table table-hover table-striped">
        <tr>
          <td width="150" title="Nombre" align="center"><a href="{{ route('Cliente.index',['criterio' => 'nombre'] )}}" >Nombre</a></td>
          <td width="150" align="center" title="Apellido"><a href="{{ route('Cliente.index',['criterio' => 'apellido'] )}}" >Apellido</a></td>
          <td width="150" align="center" title="Telefono"><a href="{{ route('Cliente.index',['criterio' => 'telefono'] )}}" >Telefono</a></td>
          <td width="150" title="Ordena por alquileres" align="center"><a href="{{ route('Cliente.index',['criterio' => 'alquileres'] )}}" >Alquileres</a></td>
          <td width="150" title="Ordena por incidencias" align="center"><a href="{{ route('Cliente.index',['criterio' => 'incidencias'] )}}" >Incidencias</a></td>
          <td width="150" align="center"><b>Editar</b></td><td width="150" align="center"><b>Eliminar</b></td><td width="150" align="center"><b>Imprimir</b></td>
        </tr>
        @foreach($clientes as $cliente)
        <tr class="destacar">
          <td width="150" align="center">{{$cliente->nombre}}</td>
          <td width="150" align="center">{{$cliente->apellido}}</td>
          <td width="150" align="center">{{$cliente->telefono}}</td>
          <td width="150" align="center" title="Ver alquieres del cliente">
            @if (count($cliente->alquileres)>0)
              <a href="{{ route('Cliente.alquileres',['id'=>$cliente->id]) }}">{{count($cliente->alquileres)}}</a>
            @else
              Sin alquileres
            @endif
          </td>
          <td width="150" align="center" title="Ver incidencias del cliente">
            @if (count($cliente->incidencias)>0)
              <a href="{{ route('Cliente.incidencias',['id'=>$cliente->id]) }}">{{count($cliente->incidencias)}}</a>
            @else
              Sin incidencias
            @endif
          </td>
          <td width="150" align="center">    
              <a href="{{ route('Cliente.edit',['id' => $cliente->id] )}}" class="btn btn-info" title="Edita el cliente seleccionado">
                  <span class="glyphicon glyphicon-edit"/></a>    
          </td>
          <td width="150" align="center">
              <a href="{{ route('Cliente.show',['id' => $cliente->id] )}}" class="btn btn-danger" title="Borra el cliente seleccionado">
                  <span class="glyphicon glyphicon-trash"/></a>
          </td>
          <td width="150" align="center">
              <a href="{{ route('Cliente.pdf',['id' => $cliente->id] )}}" class="btn-btn-info" title="Exporta cliente a PDF">
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