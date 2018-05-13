@extends('plantilla')
@section('titulo','Listado Averias')
@section('contenido')       
<div class="container-fluid">
    <h1 class="page-header" align="center">Listado de averias</h1>
    @if (isset($subtitulo))
        <h3 class="page-header" align="center">{{$subtitulo}}</h3>
        <br>
    @endif
    <form method="GET" action="{{ route('Averia.index' )}}">
      <div class="input-group">
        <span class="input-group-btn">
          <button class="btn btn-success" type="submit">Buscar</button>
        </span>
        <input id="bus" type="text" class="form-control" name="busqueda" placeholder="Elige criterio de busqueda" value="">
        <select id="filtro" name="filtro">
            <option value="matricula">Matricula</option>
            <option value="tipo">Tipo</option>
        </select>   
        <div class="col-2">Fecha inicio</div>
          <div class="col-2">
            <input class="form-control" type="date" value="" name="date1">
          </div>
          <div class="col-2">Fecha fin</div>
          <div class="col-2">
              <input class="form-control" type="date" value="{{date('Y-m-d')}}" name="date2">   
          </div>      
      </div>       
    </form>
    <br>    
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
    <tr class="table-light">
        <td align='center' colspan="2">Total de averias: {{$count}}</td>
        <td align='center' colspan="2">
          {{ $averias->links() }}
        </td>
        <td align='center' colspan="2">Máximo pagina: 10</td>
    </tr>
    </table>
    
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
@endsection