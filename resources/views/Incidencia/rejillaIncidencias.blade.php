@extends('plantilla')
@section('titulo','Listado Incidencias')
@section('contenido') 
<div class="container-fluid">
    <h1 class="page-header" align="center">Listado de incidencias</h1>
		@if (isset($subtitulo))
        <h3 class="page-header" align="center">{{$subtitulo}}</h3>
				<br>
    @endif 
    <form method="GET" action="{{ route('Incidencia.index' )}}">
      <div class="input-group">
        <span class="input-group-btn">
            <button class="btn btn-success" type="submit">Buscar</button>
        </span>
        <input id="bus" type="text" class="form-control" name="busqueda" placeholder="Selecciona criterio de busqueda" value="">
        <select id="filtro" name="filtro">
            <option value="matricula">Matricula</option>
            <option value="apellido">Apellido</option>
        </select>
        <div class="col-1">Fecha inicio</div>
          <div class="col-2">
            <input class="form-control" type="date" value="" name="date1">
          </div>
          <div class="col-1">Fecha fin</div>
          <div class="col-2">
              <input class="form-control" type="date" value="{{date('Y-m-d')}}" name="date2">   
          </div>
      </div>       
    </form>
    <br>    
    <table class="table table-hover table-striped">
        @if ($ordenar)
					@include('cabeceras.incidencias')
				@else
					@include('cabeceras.incidenciasSinorden')
				@endif
        @foreach($incidencias as $incidencia)
        <tr class="destacar">
          <td width="150" align="center">
            <a href="{{ route('Cliente.view',['id'=>$incidencia->alquiler->cliente->id]) }}">{{$incidencia->alquiler->cliente->completo}}</a>
          </td>
					<td width="150" align="center">
            <a href="{{ route('Vehiculo.view',['id'=>$incidencia->alquiler->vehiculo->id]) }}">{{$incidencia->alquiler->vehiculo->mat }}</a>
          </td>
          <td width="150" align="center">{{$incidencia->alquiler->fecha}}</td>
          <td width="150" align="center">{{$incidencia->descripcion}}</td>
					<td width="150" align="center">
						@if (($incidencia->resuelto)>0)
							Si  
						@else
							No
						@endif
					</td>
          <td width="150" align="center">    
              <a href="{{ route('Incidencia.edit',['id' => $incidencia->id] )}}" class="btn btn-info" title="Edita la incidencia seleccionada">
                  <span class="glyphicon glyphicon-edit"/></a>    
          </td>
          <td width="150" align="center">
              <a href="{{ route('Incidencia.show',['id' => $incidencia->id] )}}" class="btn btn-danger" title="Borra la incidencia seleccionada">
                  <span class="glyphicon glyphicon-trash"/></a>
          </td>
          <td width="150" align="center">
              <a href="{{ route('Incidencia.pdf',['id' => $incidencia->id] )}}" class="btn-btn-info" title="Exporta incidencia a PDF">
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