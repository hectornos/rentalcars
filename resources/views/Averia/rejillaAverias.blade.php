@extends('plantilla')
@section('titulo','Listado Averias')
@include('partials.navBar')
@include('partials.formularioCabecera.averias')
@include('partials.formularioCabecera.divNav')
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
          <td width="150" align="center">{{ucfirst ($averia->tipoaveria->nom)}}</td>
          <td width="150" align="center">
            <a href="{{ route('Vehiculo.view',['id'=>$averia->vehiculo->id]) }}">{{ $averia->vehiculo->marc}} {{ $averia->vehiculo->mod}}, {{ $averia->vehiculo->mat}}</a>
          </td>
          <td width="150" align="center">{{$averia->desc}}</td>
          <td width="150" align="center">{{$averia->fecha}}</td>
          <td width="150" align="center">    
              <a href="{{ route('Averia.edit',['id' => $averia->id] )}}" class="btn btn-info" title="Edita la averia seleccionada">
                  <span class="glyphicon glyphicon-edit"/></a>    
          </td>
          <td width="150" align="center">
              <a href="{{ route('Averia.show',['id' => $averia->id] )}}" class="btn btn-danger" title="Borra la averia seleccionada">
                  <span class="glyphicon glyphicon-trash"/></a>
          </td>
          <td width="150" align="center">
              <a href="{{ route('Averia.pdf',['id' => $averia->id] )}}" class="btn-btn-info" title="Exporta averia a PDF">
                  <span class="glyphicon glyphicon-floppy-save"/></a>
          </td>
        </tr>
        @endforeach
    
    </table>
    <div class="row" align="center">
      <div class="col-md-4">Total de Averias: {{$count}}</div>
      <div class="col-md-4">{{ $averias->links("pagination::bootstrap-4") }}</div>
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