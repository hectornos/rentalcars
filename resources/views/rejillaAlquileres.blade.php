@extends('plantilla')
@section('titulo','Listado Alquileres')
@section('contenido')          
<div class="container-fluid">
    <h1 class="page-header" align="center">Listado de alquileres</h1>     
    <table class="table table-hover table-striped">
        <tr>
          <td width="150" title="Fecha del alquiler" align="center"><a href="{{ route('Alquiler.index',['criterio' => 'fecha'] )}}" ><b>Fecha</b></a></td>
          <td width="150" align="center" title="Datos conductor"><a href="{{ route('Alquiler.index',['criterio' => 'conductor'] )}}" ><b>Conductor</b></a></td>
          <td width="150" align="center" title="Matricula"><a href="{{ route('Alquiler.index',['criterio' => 'matricula'] )}}" ><b>Matricula</b></a></td>
          <td width="150" align="center" title="Incidencias sufridas"><a href="{{ route('Alquiler.index',['criterio'=>'incidencias']) }}"><b>Incidencias</b></a></td>
          <td width="150" align="center"><b>Editar</b></td>
          <td width="150" align="center"><b>Eliminar</b></td>
          <td width="150" align="center"><b>Imprimir</b></td>
        </tr>
        @foreach($alquileres as $alquiler)
        <tr class="destacar">
          <td width="150" align="center">{{$alquiler->fecha}}</td>
          <td width="150" align="center">{{$alquiler->cliente->apellido}}, {{ $alquiler->cliente->nombre}}</td>
          <td width="150" align="center">{{$alquiler->vehiculo->matricula}}</td>
          <td width="150" align="center">
            @if (count($alquiler->incidencias)>0)
              {{count($alquiler->incidencias)}}
            @else
              Sin incidencias
            @endif
          </td>
          <td width="150" align="center">    
              <a href="{{ route('Alquiler.edit',['id' => $alquiler->id] )}}" class="btn btn-info" title="Edita el alquiler seleccionado">
                  <span class="glyphicon glyphicon-edit"/></a>    
          </td>
          <td width="150" align="center">
              <a href="{{ route('Alquiler.show',['id' => $alquiler->id] )}}" class="btn btn-danger" title="Borra el alquiler seleccionado">
                  <span class="glyphicon glyphicon-trash"/></a>
          </td>
          <td width="150" align="center">
              <a href="{{ route('Alquiler.pdf',['id' => $alquiler->id] )}}" class="btn-btn-info" title="Exporta alquiler a PDF">
                  <span class="glyphicon glyphicon-floppy-save"/></a>
          </td>
        </tr>
        @endforeach
    </table>
    <div class="row">
        <div class="col-sm-2">Aqluileres: {{$count}}</div>
    </div>
</div> 
@endsection