@extends('plantillaPDF')
@section('contenido')  

    <h1 class="page-header" align="center">Listado de alquileres</h1>
    
    <table class="table table-hover table-striped">
    <tr>
  <td width="150" title="Fecha del alquiler" align="center"><b>Fecha</b></a></td>
  <td width="150" align="center" title="Datos conductor"><b>Conductor</b></a></td>
  <td width="150" align="center" title="Matricula"><b>Matricula</b></a></td>
  <td width="150" align="center" title="Incidencias sufridas"><b>Incidencias</b></a></td>

</tr>
      @foreach($alquileres as $alquiler)
      <tr class="destacar">
        <td width="150" align="center">{{$alquiler->fecha}}</td>
        <td width="150" align="center"><a href="{{ route('Cliente.view',['id'=>$alquiler->cliente->id]) }}">{{$alquiler->cliente->completo}}</a></td>
        <td width="150" align="center"><a href="{{ route('Vehiculo.view',['id'=>$alquiler->vehiculo->id]) }}">{{$alquiler->vehiculo->mat}}</td>
        <td width="50" align="center">
          @if (count($alquiler->incidencias)>0)
              <a href="{{ route('Alquiler.incidencias',['id'=>$alquiler->id]) }}">{{count($alquiler->incidencias)}}</a>
          @else
            NO
          @endif
        </td>

      </tr>
      @endforeach
    </table>

@endsection