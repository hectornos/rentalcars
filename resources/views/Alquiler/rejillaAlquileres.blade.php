@extends('plantilla')
@section('titulo','Listado Alquileres')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ route('welcome') }}">RentalCars <span class="glyphicon glyphicon-home"></span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item" title="Clientes">
        <a class="nav-link" href="{{ route('Cliente.index') }}"><span class="glyphicon glyphicon-user"></span> </a>
      </li>
      <li class="nav-item" title="Vehiculos">
        <a class="nav-link" href="{{ route('Vehiculo.index') }}"><span class="glyphicon glyphicon-road"></span> </a>
      </li>
      <li class="nav-item" title="Alquileres">
        <a class="nav-link" href="{{ route('Alquiler.index') }}"><span class="glyphicon glyphicon-euro"></span> </a>
      </li>
      <li class="nav-item" title="Incidencias">
        <a class="nav-link" href="{{ route('Incidencia.index') }}"><span class="glyphicon glyphicon-tasks"></span> </a>
      </li>
      <li class="nav-item" title="Averias">
        <a class="nav-link" href="{{ route('Averia.index') }}"><span class="glyphicon glyphicon-wrench"></span> </a>
      </li>
    </ul>
{!! Form::model(Request::all(), ['route' =>'Alquiler.index', 'method' => 'GET', 'class'=>'form-inline my-2 my-lg-0']) !!}
<font color="white">De</font>::
<input class="form-control" type="date" value="" name="date1">::
<font color="white">Hasta </font>::
<input class="form-control" type="date" value="{{date('Y-m-d')}}" name="date2">
__
{!! Form::select('filtro',array('matricula'=>'matricula','apellido'=>'apellido') ,null, ['class'=>'form-control']) !!}
{!! Form::text('busqueda',null, ['class'=>'form-control mr-sm-2','placeholder'=>'selecciona filtro']) !!}
<div class="btn-group" >
  <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button> 
        <div class="btn-group" >
    <button class="btn btn-outline-warning my-2 my-sm-0" name="imp" id="imp" type="submit">Imprimir</button>      
  </div>
{!! Form::close() !!}
</div>
</nav>
@section('contenido')
       
<div class="container-fluid">
    <h1 class="page-header" align="center">Listado de alquileres</h1>
    @if (isset($subtitulo))
        <h3 class="page-header" align="center">{{$subtitulo}}</h3>
        <br>
    @endif
    
      
    <table class="table table-hover table-striped">
      @if ($ordenar)
      <tr>
  <td width="150" title="Fecha del alquiler" align="center"><a href="{{ route('Alquiler.index',['criterio' => 'fecha'] )}}" ><b>Fecha</b></a></td>
  <td width="150" align="center" title="Datos conductor"><a href="{{ route('Alquiler.index',['criterio' => 'conductor'] )}}" ><b>Conductor</b></a></td>
  <td width="150" align="center" title="Matricula"><a href="{{ route('Alquiler.index',['criterio' => 'matricula'] )}}" ><b>Matricula</b></a></td>
  <td width="150" align="center" title="Incidencias sufridas"><a href="{{ route('Alquiler.index',['criterio'=>'incidencias']) }}"><b>Incidencias</b></a></td>
  <td width="150" align="center"><b>Añade incidencia</b></td>
  <td width="150" align="center"><b>Eliminar</b></td>
  <td width="150" align="center"><b>Imprimir</b></td>
</tr>
      @else
      <tr>
  <td width="150" title="Fecha del alquiler" align="center"><b>Fecha</b></a></td>
  <td width="150" align="center" title="Datos conductor"><b>Conductor</b></a></td>
  <td width="150" align="center" title="Matricula"><b>Matricula</b></a></td>
  <td width="150" align="center" title="Incidencias sufridas"><b>Incidencias</b></a></td>
  <td width="150" align="center"><b>Añade incidencia</b></td>
  <td width="150" align="center"><b>Eliminar</b></td>
  <td width="150" align="center"><b>Imprimir</b></td>
</tr>
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