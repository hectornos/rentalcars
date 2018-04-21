@extends('plantilla')
@section('titulo','Listado Incidencias')
@section('contenido')          
<div class="container-fluid">
    <h1 class="page-header" align="center">Listado de incidencias</h1>     
    <table class="table table-hover table-striped">
        <tr>
          <td width="150" title="Conductor del vehiculo" align="center"><a href="{{ route('Incidencia.index',['criterio' => 'conductor'] )}}" ><b>Conductor</b></a></td>
          <td width="150" align="center" title="Datos vehiculo"><a href="{{ route('Incidencia.index',['criterio' => 'matricula'] )}}" ><b>Matricula</b></a></td>
          <td width="150" align="center" title="Fecha incidencia"><a href="{{ route('Incidencia.index',['criterio' => 'fecha'] )}}"><b>Fecha</b></td><td width="150" align="center" title="Descripcion de la averia"><b>Descripccion</b></a></td>
          <td width="150" align="center"><b>Editar</b></td>
          <td width="150" align="center"><b>Eliminar</b></td>
          <td width="150" align="center"><b>Imprimir</b></td>
        </tr>
        @foreach($incidencias as $incidencia)
        <tr class="destacar">
          <td width="150" align="center">{{$incidencia->alquiler->cliente->apellido}}, {{$incidencia->alquiler->cliente->nombre}}</td>
          <td width="150" align="center">{{$incidencia->alquiler->vehiculo->matricula}}</td>
          <td width="150" align="center">{{$incidencia->alquiler->fecha}}</td>
          <td width="150" align="center">{{$incidencia->descripcion}}</td>
          <td width="150" align="center">    
              <a href="{{ route('Incidencia.edit',['id' => $incidencia->id] )}}" class="btn btn-info" title="Edita el alquiler seleccionado">
                  <span class="glyphicon glyphicon-edit"/></a>    
          </td>
          <td width="150" align="center">
              <a href="{{ route('Incidencia.show',['id' => $incidencia->id] )}}" class="btn btn-danger" title="Borra el alquiler seleccionado">
                  <span class="glyphicon glyphicon-trash"/></a>
          </td>
          <td width="150" align="center">
              <a href="{{ route('Incidencia.pdf',['id' => $incidencia->id] )}}" class="btn-btn-info" title="Exporta alquiler a PDF">
                  <span class="glyphicon glyphicon-floppy-save"/></a>
          </td>
        </tr>
        @endforeach
    </table>
    <div class="row">
        <div class="col-sm-2">Incidencias: {{$count}}</div>
    </div>
</div> 
@endsection