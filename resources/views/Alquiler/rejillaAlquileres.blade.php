@extends('plantilla')
@section('titulo','Listado Alquileres')
@include('partials.navBar')
@include('partials.formularioCabecera.alquileres')
@include('partials.formularioCabecera.divNav')
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
        <td width="150" align="center"><a href="{{ route('Cliente.view',['id'=>$alquiler->cliente->id]) }}">{{$alquiler->cliente->completo}}</a></td>
        <td width="150" align="center"><a href="{{ route('Vehiculo.view',['id'=>$alquiler->vehiculo->id]) }}">{{$alquiler->vehiculo->mat}}</td>
        <td width="50" align="center">
          @if (count($alquiler->incidencias)>0)
              <a href="{{ route('Alquiler.incidencias',['id'=>$alquiler->id]) }}">{{count($alquiler->incidencias)}}</a>
          @else
            NO
          @endif
        </td>
        <td width="50" align="center">    
            <a href="{{ route('Incidencia.create',['alquiler_id' => $alquiler->id] )}}" class="btn btn-info" title="Añade una incidencia">
                <span class="glyphicon glyphicon-edit"/></a>    
        </td>
        <td width="50" align="center">
            <a href="{{ route('Alquiler.show',['id' => $alquiler->id] )}}" class="btn btn-danger" title="Borra el alquiler seleccionado">
                <span class="glyphicon glyphicon-trash"/></a>
        </td>
        <td width="50" align="center">
            <a href="{{ route('Alquiler.pdf',['id' => $alquiler->id] )}}" class="btn-btn-info" title="Exporta alquiler a PDF">
                <span class="glyphicon glyphicon-floppy-save"/></a>
        </td>
      </tr>
      @endforeach
    </table>
    <div class="row" align="center">
      <div class="col-md-4">Total de alquileres: {{$count}}</div>
      <div class="col-md-4">{{ $alquileres->links("pagination::bootstrap-4") }}</div>
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