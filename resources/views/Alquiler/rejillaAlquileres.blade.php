@extends('plantilla')
@section('titulo','Listado Alquileres')
@section('contenido')          
<div class="container-fluid">
    <h1 class="page-header" align="center">Listado de alquileres</h1>
    @if (isset($subtitulo))
        <h3 class="page-header" align="center">{{$subtitulo}}</h3>
        <br>
    @endif     
    <table class="table table-hover table-striped">
        @if ($ordenar)
            @include('cabeceras.alquiler')
        @else
            @include('cabeceras.alquilerSinorden')
        @endif
        @foreach($alquileres as $alquiler)
        <tr class="destacar">
          <td width="150" align="center">{{$alquiler->fecha}}</td>
          <td width="150" align="center"><a href="{{ route('Cliente.show',['id'=>$alquiler->cliente->id]) }}">{{$alquiler->cliente->apellido}}, {{ $alquiler->cliente->nombre}}</a></td>
          <td width="150" align="center"><a href="{{ route('Vehiculo.show',['id'=>$alquiler->vehiculo->id]) }}">{{$alquiler->vehiculo->matricula}}</td>
          <td width="150" align="center">
            @if (count($alquiler->incidencias)>0)
                <a href="{{ route('Alquiler.incidencias',['id'=>$alquiler->id]) }}">{{count($alquiler->incidencias)}}</a>
            @else
              Sin incidencias
            @endif
          </td>
          <td width="150" align="center">    
              <a href="{{ route('Incidencia.create',['alquiler_id' => $alquiler->id] )}}" class="btn btn-info" title="Añade una incidencia">
                  <span class="glyphicon glyphicon-edit"/></a>    
          </td>
          <td width="150" align="center">
              <a href="{{ route('Alquiler.show',['id' => $alquiler->id] )}}" class="btn btn-danger" title="Borra el alquiler seleccionado">
                  <span class="glyphicon glyphicon-trash"/></a>
          </td>
          <td width="150" align="center">
              <a href="{{ route('Alquiler.pdf',['id' => $alquiler->id] )}}" class="btn-btn-info" title="Exporta alquiler a PDF">
                  <span class="glyphicon glyphicon-floppy-save"/></a>
          </td>
        </tr>
        @endforeach
    </table>
    <div class="row">                                  
        <div class="col-sm-2">Alquileres: {{$count}}</div>
    </div>
</div> 
@endsection