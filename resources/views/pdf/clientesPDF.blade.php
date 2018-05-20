@extends('plantillaPDF')
@section('contenido')  

<h1 class="page-header" >Listado de clientes</h1> 
    <br>
    <table class="table table-hover table-striped">
        
        <tr class="destacar">
          <td width="150" title="Nombre" ><a href="{{ route('Cliente.index',['criterio' => 'nombre'] )}}" >Nombre</a></td>
          <td width="150"  title="Apellido"><a href="{{ route('Cliente.index',['criterio' => 'apellido'] )}}" >Apellido</a></td>
          <td width="150"  title="Telefono"><a href="{{ route('Cliente.index',['criterio' => 'telefono'] )}}" >Telefono</a></td>
          <td width="150" title="Ordena por alquileres" ><a href="{{ route('Cliente.index',['criterio' => 'alquileres'] )}}" >Alquileres</a></td>
          <td width="150" title="Ordena por incidencias" ><a href="{{ route('Cliente.index',['criterio' => 'incidencias'] )}}" >Incidencias</a></td>
        </tr>
        @foreach($clientes as $cliente)
        <tr>
          <td width="150" ><a href="{{ route('Vehiculo.elegir',['cliente_id'=>$cliente->id]) }}">{{ $cliente->nom }}</a></td>
          <td width="150" >{{ $cliente->ape }}</td>
          <td width="150" >{{$cliente->telefono}}</td>
          <td width="150"  title="Ver alquieres del cliente">
            @if (count($cliente->alquileres)>0)
              <a href="{{ route('Cliente.alquileres',['id'=>$cliente->id]) }}">{{count($cliente->alquileres)}}</a>
            @else
              Sin alquileres
            @endif
          </td>
          <td width="150"  title="Ver incidencias del cliente">
            @if (count($cliente->incidencias)>0)
              <a href="{{ route('Cliente.incidencias',['id'=>$cliente->id]) }}">{{count($cliente->incidencias)}}</a>
            @else
              Sin incidencias
            @endif
          </td>
        </tr>
        @endforeach
    </table>

@endsection