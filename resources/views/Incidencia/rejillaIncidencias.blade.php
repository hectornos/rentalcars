@extends('plantilla')
@section('titulo','Listado Incidencias')
@include('partials.navBar')
@include('partials.formularioCabecera.incidencias')
@include('partials.formularioCabecera.divNav')
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
        <tr class="destacar">
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

    </table>
    <div class="row" align="center">
      <div class="col-md-4">Total de incidencias: {{$count}}</div>
      <div class="col-md-4">{{ $incidencias->links("pagination::bootstrap-4") }}</div>
      <div class="col-md-4">Máximo pagina: 8</div>
    </div>
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