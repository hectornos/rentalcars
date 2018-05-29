@extends('plantilla')
@section('titulo','Listado Vehiculos')
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
    {!! Form::model(Request::all(), ['route' =>'Vehiculo.index', 'method' => 'GET', 'class'=>'form-inline my-2 my-lg-0']) !!}
{!! Form::select('filtro',array('matricula'=>'matricula','modelo'=>'modelo') ,null, ['class'=>'form-control']) !!}
{!! Form::text('busqueda',null, ['class'=>'form-control mr-sm-2','placeholder'=>'selecciona filtro']) !!}
<div class="btn-group" >
  <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
          <a href="{{ route('Vehiculo.create')}}" class="btn btn-outline-success my-2 my-sm-0">
            <span class="glyphicon glyphicon-edit"></span> Nuevo</button></a>
        </div>
        ----
        <div class="btn-group" >
    <button class="btn btn-outline-warning my-2 my-sm-0" name="imp" id="imp" type="submit">Imprimir</button>      
  </div>
{!! Form::close() !!}
</div>
</nav>
@section('contenido')

<div class="container-fluid">
    <h1 class="page-header" align="center">Listado de vehiculos</h1>
    
    <table class="table table-hover table-striped">

        <tr>
          <td width="150" align="center" title="Modelo de coche"><a href="{{ route('Vehiculo.index',['criterio' => 'modelo'] )}}" >Modelo</a></td>
          <td width="150" align="center" title="Matricula"><a href="{{ route('Vehiculo.index',['criterio' => 'matricula'] )}}" >Matricula</a></td>
          <td width="150" align="center" title="Disponible para alquilar"><a href="{{ route('Vehiculo.index',['criterio' => 'disponible'] )}}" >Disponible</a></td>
          <td width="150" title="Ordena por numero de alquileres" align="center"><a href="{{ route('Vehiculo.index',['criterio' => 'alquileres'] )}}" >Alquileres</a></td>
          <td width="150" title="Ordena por numero de averias" align="center"><a href="{{ route('Vehiculo.index',['criterio' => 'averias'] )}}" >Averias</a></td>
          <td width="150" align="center" title="Agregar una" >Agregar averia</a></td>
          <td width="150" align="center"><b>Editar</b></td>
          <td width="150" align="center"><b>Eliminar</b></td>
          <td width="150" align="center"><b>Imprimir</b></td>
        </tr>
        @foreach($vehiculos as $vehiculo)
        <tr class="destacar">
          <td width="150" align="center">{{ ucfirst($vehiculo->modelo) }}</td>
          <td width="150" align="center">{{ strtoupper($vehiculo->matricula) }}</td>
          <td width="150" align="center">
            @if ($vehiculo->disponible==0)
            <a href="{{ route('Vehiculo.index',['vehiculo_id' => $vehiculo->id,'criterio'=>'dispo'] )}}" class="btn btn-danger" title="Agrega una averia al vehiculo">
                  <span class="glyphicon"/>No</a> 
            @else
            <a href="{{ route('Vehiculo.index',['vehiculo_id' => $vehiculo->id, 'criterio' =>'dispo'] )}}" class="btn btn-success" title="Agrega una averia al vehiculo">
                  <span class="glyphicon"/>Si</a> 
            @endif
          </td>
          <td width="150" align="center" title="Ver alquieres del vehiculo">
            @if (count($vehiculo->alquileres)>0)
              <a href="{{ route('Vehiculo.alquileres',['id'=>$vehiculo->id]) }}">{{count($vehiculo->alquileres)}}</a>
            @else
              Sin alquileres
            @endif
          </td>
          <td width="150" align="center" title="Ver averias del vehiculo">
            @if (count($vehiculo->averias)>0)
              <a href="{{ route('Vehiculo.averias',['id'=>$vehiculo->id]) }}">{{count($vehiculo->averias)}}</a>
            @else
              Sin averias
            @endif
          </td>

          <td width="150" align="center">    
              <a href="{{ route('Averia.create',['vehiculo_id' => $vehiculo->id] )}}" class="btn btn-info" title="Agrega una averia al vehiculo">
                  <span class="glyphicon glyphicon-edit"/></a>    
          </td>
          <td width="150" align="center">    
              <a href="{{ route('Vehiculo.edit',['id' => $vehiculo->id] )}}" class="btn btn-info" title="Edita el vehiculo seleccionado">
                  <span class="glyphicon glyphicon-edit"/></a>    
          </td>
          <td width="150" align="center">
              <a href="{{ route('Vehiculo.show',['id' => $vehiculo->id] )}}" class="btn btn-danger" title="Borra el vehiculo seleccionado">
                  <span class="glyphicon glyphicon-trash"/></a>
          </td>
          <td width="150" align="center">
              <a href="{{ route('Vehiculo.pdf',['id' => $vehiculo->id] )}}" class="btn-btn-info" title="Exporta vehiculo a PDF">
                  <span class="glyphicon glyphicon-floppy-save"/></a>
          </td>
        </tr>
        @endforeach
    </table>
    <div class="row" align="center">
      <div class="col-md-4">Total de vehiculos: {{$count}}</div>
      <div class="col-md-4">{{ $vehiculos->links("pagination::bootstrap-4") }}</div>
      <div class="col-md-4">Máximo pagina: 8</div>
    </div>
</div> 
  @if (session('Cancelado'))
      <div class="alert alert-danger">
          {{ session('Cancelado') }}
      </div>
  @endif

  @if (session('Modificado'))
      <div class="alert alert-info">
          {{ session('Modificado') }}
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