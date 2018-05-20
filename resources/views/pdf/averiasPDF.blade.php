@extends('plantillaPDF')
@section('contenido')  

<h1 class="page-header" >Listado de averias</h1>
    @if (isset($subtitulo))
        <h3 class="page-header" >{{$subtitulo}}</h3>
        <br>
    @endif
    <table class="table table-hover table-striped">
    <tr>
  <td width="150" title="tipo de averia" ><b>Tipo</b></a></td>
  <td width="150"  title="Datos vehiculo"><b>Vehiculo</b></a></td>
  <td width="150"  title="Breve descripcion"><b>Desccripcion</b></td>
  <td width="150"  title="Fecha de la averia"><b>Fecha</b></a></td>

</tr>
@foreach($averias as $averia)
        <tr class="destacar">
          <td width="150" >{{$averia->tipoaveria->nom}}</td>
          <td width="150" >
            <a href="{{ route('Vehiculo.view',['id'=>$averia->vehiculo->id]) }}">{{ $averia->vehiculo->marc}} {{ $averia->vehiculo->mod}}, {{ $averia->vehiculo->mat}}</a>
          </td>
          <td width="150" >{{$averia->desc}}</td>
          <td width="150" >{{$averia->fecha}}</td>
        </tr>
        @endforeach
    
    </table>

@endsection