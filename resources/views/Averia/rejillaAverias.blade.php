@extends('plantilla')
@section('titulo','Listado Averias')
@section('contenido')          
<div class="container-fluid">
    <h1 class="page-header" align="center">Listado de averias</h1>
    @if (isset($subtitulo))
        <h3 class="page-header" align="center">{{$subtitulo}}</h3>
        <br>
    @endif     
    <table class="table table-hover table-striped">
        @if ($ordenar)
          @include('cabeceras.averia')
        @else
          @include('cabeceras.averiaSinorden')
        @endif
        @foreach($averias as $averia)
        <tr class="destacar">
          <td width="150" align="center">{{$averia->tipoaveria->nombre}}</td>
          <td width="150" align="center">
            <a href="{{ route('Vehiculo.show',['id'=>$averia->vehiculo->id]) }}">{{$averia->vehiculo->marca->nombre}} {{ $averia->vehiculo->modelo}}, {{ $averia->vehiculo->matricula}}</a>
          </td>
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