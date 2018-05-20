@extends('plantillaPDF')
@section('contenido')  


    <h1 class="page-header" >Listado de vehiculos</h1>
    
    <table class="table table-hover table-striped">

        <tr>
          <td width="150"  title="Modelo de coche"><a href="{{ route('Vehiculo.index',['criterio' => 'modelo'] )}}" >Modelo</a></td>
          <td width="150"  title="Matricula"><a href="{{ route('Vehiculo.index',['criterio' => 'matricula'] )}}" >Matricula</a></td>
          <td width="150"  title="Disponible para alquilar"><a href="{{ route('Vehiculo.index',['criterio' => 'disponible'] )}}" >Disponible</a></td>
          <td width="150" title="Ordena por numero de alquileres" ><a href="{{ route('Vehiculo.index',['criterio' => 'alquileres'] )}}" >Alquileres</a></td>
          <td width="150" title="Ordena por numero de averias" ><a href="{{ route('Vehiculo.index',['criterio' => 'averias'] )}}" >Averias</a></td>

        </tr>
        @foreach($vehiculos as $vehiculo)
        <tr class="destacar">
          <td width="150" >{{$vehiculo->mod }}</td>
          <td width="150" >{{ $vehiculo->mat }}</td>
          <td width="150" >
            @if ($vehiculo->disponible==0)
            <a href="{{ route('Vehiculo.index',['vehiculo_id' => $vehiculo->id,'criterio'=>'dispo'] )}}" class="btn btn-danger" title="Agrega una averia al vehiculo">
                  <span class="glyphicon"/>No</a> 
            @else
            <a href="{{ route('Vehiculo.index',['vehiculo_id' => $vehiculo->id, 'criterio' =>'dispo'] )}}" class="btn btn-success" title="Agrega una averia al vehiculo">
                  <span class="glyphicon"/>Si</a> 
            @endif
          </td>
          <td width="150"  title="Ver alquieres del vehiculo">
            @if (count($vehiculo->alquileres)>0)
              <a href="{{ route('Vehiculo.alquileres',['id'=>$vehiculo->id]) }}">{{count($vehiculo->alquileres)}}</a>
            @else
              Sin alquileres
            @endif
          </td>
          <td width="150"  title="Ver averias del vehiculo">
            @if (count($vehiculo->averias)>0)
              <a href="{{ route('Vehiculo.averias',['id'=>$vehiculo->id]) }}">{{count($vehiculo->averias)}}</a>
            @else
              Sin averias
            @endif
          </td>
        </tr>
        @endforeach
    </table>


@endsection