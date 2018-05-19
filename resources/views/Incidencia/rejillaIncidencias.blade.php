@extends('plantilla')
@section('titulo','Listado Incidencias')
@section('formularioCabecera')
<form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('Vehiculo.index' )}}" >
<font color="white">De</font>::
<input class="form-control" type="date" value="" name="date1">::
<font color="white">Hasta </font>::
<input class="form-control" type="date" value="{{date('Y-m-d')}}" name="date2">
__
  <select class='form-control' id="filtro" name="filtro">
    <option value="matricula">Matricula</option>
    <option value="modelo">Modelo</option>
  </select>
  <input class="form-control mr-sm-2" type="text" placeholder="Elige criterio" name="busqueda" value="">
  <div class="btn-group" >
  <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
         
        </div>
</form>
@endsection
@section('contenido')

<div class="container-fluid">
    <h1 class="page-header" align="center">Listado de incidencias</h1>
		@if (isset($subtitulo))
        <h3 class="page-header" align="center">{{$subtitulo}}</h3>
				<br>
    @endif
    <table class="table table-hover table-striped">
    
        @if ($ordenar)
					@include('cabeceras.incidencias')
				@else
					@include('cabeceras.incidenciasSinorden')
				@endif
        @foreach($incidencias as $incidencia)
        <tr>
          <td width="150" align="center">
            <a href="{{ route('Cliente.view',['id'=>$incidencia->alquiler->cliente->id]) }}">{{$incidencia->alquiler->cliente->completo}}</a>
          </td>
					<td width="150" align="center">
            <a href="{{ route('Vehiculo.view',['id'=>$incidencia->alquiler->vehiculo->id]) }}">{{$incidencia->alquiler->vehiculo->mat }}</a>
          </td>
          <td width="150" align="center">{{$incidencia->alquiler->fecha}}</td>
          <td width="150" align="center">{{$incidencia->desc}}</td>
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
    <tr class="table-light">
        <td align='center' colspan="2">Total de incidencias: {{$count}}</td>
        <td align='center' colspan="4">
          {{ $incidencias->links() }}
        </td>
        <td align='center' colspan="2">Máximo pagina: 8</td>
    </tr>
    </table>
    
</div> 
@if (session('Cancelado'))
      <div class="alert alert-danger">
          {{ session('Cancelado') }}
      </div>
  @endif

  @if (session('Creado'))
      <div class="alert alert-success">
          {{ session('Creado') }}
      </div>
  @endif

  @if (session('Borrado'))
      <div class="alert alert-warning">
          {{ session('Borrado') }}
      </div>
  @endif
  @if (session('Modificado'))
      <div class="alert alert-info">
          {{ session('Modificado') }}
      </div>
  @endif
@endsection