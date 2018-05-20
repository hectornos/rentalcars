@extends('plantillaPDF')
@section('contenido')  

<h1 class="page-header" >Listado de incidencias</h1>    
    <table class="table table-hover table-striped">
    <tr>
  <td width="150" title="Conductor del vehiculo" ><b>Conductor</b></a></td>
  <td width="150"  title="Datos vehiculo"><b>Matricula</b></a></td>
  <td width="150"  title="Fecha incidencia"><b>Fecha</b></td>
  <td width="150"  title="Descripcion de la incidencia"><b>Descripccion</b></a></td>
  <td width="150"  title="Incidencia resuelta o no"><b>Resuelta</b></a></td>

</tr>
        
    @foreach($incidencias as $incidencia)
        <tr class="destacar">
          <td width="150" >
            <a href="{{ route('Cliente.view',['id'=>$incidencia->alquiler->cliente->id]) }}">{{$incidencia->alquiler->cliente->completo}}</a>
          </td>
					<td width="150" >
            <a href="{{ route('Vehiculo.view',['id'=>$incidencia->alquiler->vehiculo->id]) }}">{{$incidencia->alquiler->vehiculo->mat }}</a>
          </td>
          <td width="150" >{{$incidencia->alquiler->fecha}}</td>
          <td width="150" >{{$incidencia->desc}}</td>
					<td width="150" >
						@if (($incidencia->resuelto)>0)
							Si  
						@else
							No
						@endif
					</td>
          
        </tr>
        @endforeach
    </table>

@endsection