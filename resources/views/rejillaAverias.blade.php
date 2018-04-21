@extends('plantilla')
@section('titulo','Listado Averias')
@section('contenido')          
<div class="container-fluid">
    <h1 class="page-header" align="center">Listado de averias</h1>     
    <table class="table table-hover table-striped">
        <tr><td width="150" title="tipo de averia" align="center"><a href="{{ route('Averia.index',['criterio' => 'tipo'] )}}" ><b>Tipo</b></a></td><td width="150" align="center" title="Datos vehiculo"><a href="{{ route('Averia.index',['criterio' => 'vehiculo'] )}}" ><b>Vehiculo</b></a></td><td width="150" align="center" title="Breve descripcion"><b>Desccripcion</b></td><td width="150" align="center" title="Fecha de la averia"><a href="{{ route('Alquiler.index',['criterio'=>'fecha']) }}"><b>Fecha</b></a></td><td width="150" align="center"><b>Editar</b></td><td width="150" align="center"><b>Eliminar</b></td><td width="150" align="center"><b>Imprimir</b></td></tr>
        @foreach($averias as $averia)
        <tr class="destacar">
          <td width="150" align="center">{{$averia->tipoaveria->nombre}}</td>
          <td width="150" align="center">{{$averia->vehiculo->marca->nombre}} {{ $averia->vehiculo->modelo}}, {{ $averia->vehiculo->matricula}}</td>
          <td width="150" align="center">{{$averia->descripcion}}</td>
          <td width="150" align="center">{{$averia->fecha}}</td>
          <td width="150" align="center">    
              <a href="{{ route('Averia.edit',['id' => $averia->id] )}}" class="btn btn-info" title="Edita el alquiler seleccionado">
                  <span class="glyphicon glyphicon-edit"/></a>    
          </td>
          <td width="150" align="center">
              <a href="{{ route('Averia.show',['id' => $averia->id] )}}" class="btn btn-danger" title="Borra el alquiler seleccionado">
                  <span class="glyphicon glyphicon-trash"/></a>
          </td>
          <td width="150" align="center">
              <a href="{{ route('Averia.pdf',['id' => $averia->id] )}}" class="btn-btn-info" title="Exporta alquiler a PDF">
                  <span class="glyphicon glyphicon-floppy-save"/></a>
          </td>
        </tr>
        @endforeach
    </table>
    <div class="row">
        <div class="col-sm-2">Averias: {{$count}}</div>
    </div>
</div> 
@endsection