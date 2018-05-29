@extends('plantilla')
@section('titulo','Listado Clientes')
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
    {!! Form::model(Request::all(), ['route' =>'Cliente.index', 'method' => 'GET', 'class'=>'form-inline my-2 my-lg-0']) !!}
{!! Form::select('filtro',array('nombre'=>'nombre','apellido'=>'apellido','telefono'=>'telefono') ,null, ['class'=>'form-control']) !!}
{!! Form::text('busqueda',null, ['class'=>'form-control mr-sm-2','placeholder'=>'selecciona filtro']) !!}
<div class="btn-group" >
  <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
          <a href="{{ route('Cliente.create')}}" class="btn btn-outline-success my-2 my-sm-0">
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
<h1 class="page-header" align="center">Listado de clientes</h1> 
    <br>
    <table class="table table-hover table-striped">
        
        <tr>
          <td width="150" title="Nombre" align="center"><a href="{{ route('Cliente.index',['criterio' => 'nombre'] )}}" >Nombre</a></td>
          <td width="150" align="center" title="Apellido"><a href="{{ route('Cliente.index',['criterio' => 'apellido'] )}}" >Apellido</a></td>
          <td width="150" align="center" title="Telefono"><a href="{{ route('Cliente.index',['criterio' => 'telefono'] )}}" >Telefono</a></td>
          <td width="150" title="Ordena por alquileres" align="center"><a href="{{ route('Cliente.index',['criterio' => 'alquileres'] )}}" >Alquileres</a></td>
          <td width="150" title="Ordena por incidencias" align="center"><a href="{{ route('Cliente.index',['criterio' => 'incidencias'] )}}" >Incidencias</a></td>
          <td width="150" align="center"><b>Editar</b></td><td width="150" align="center"><b>Eliminar</b></td><td width="150" align="center"><b>Imprimir</b></td>
        </tr>
        @foreach($clientes as $cliente)
        <tr class="destacar">
          <td width="150" align="center">{{ $cliente->nom }}</td>
          <td width="150" align="center">{{ $cliente->ape }}</td>
          <td width="150" align="center">{{$cliente->telefono}}</td>
          <td width="150" align="center" title="Ver alquieres del cliente">
            @if (count($cliente->alquileres)>0)
              <a href="{{ route('Cliente.alquileres',['id'=>$cliente->id]) }}">{{count($cliente->alquileres)}}</a>
            @else
              Sin alquileres
            @endif
          </td>
          <td width="150" align="center" title="Ver incidencias del cliente">
            @if (count($cliente->incidencias)>0)
              <a href="{{ route('Cliente.incidencias',['id'=>$cliente->id]) }}">{{count($cliente->incidencias)}}</a>
            @else
              Sin incidencias
            @endif
          </td>
          <td width="150" align="center">    
              <a href="{{ route('Cliente.edit',['id' => $cliente->id] )}}" class="btn btn-info" title="Edita el cliente seleccionado">
                  <span class="glyphicon glyphicon-edit"/></a>    
          </td>
          <td width="150" align="center">
              <a href="{{ route('Cliente.show',['id' => $cliente->id] )}}" class="btn btn-danger" title="Borra el cliente seleccionado">
                  <span class="glyphicon glyphicon-trash"/></a>
          </td>
          <td width="150" align="center">
              <a href="{{ route('Cliente.pdf',['id' => $cliente->id] )}}" class="btn-btn-info" title="Exporta cliente a PDF">
                  <span class="glyphicon glyphicon-floppy-save"/></a>
          </td>
        </tr>
        @endforeach
    </table>
    <div class="row" align="center">
      <div class="col-md-4">Total de clientes: {{$count}}</div>
      <div class="col-md-4">{{ $clientes->links("pagination::bootstrap-4") }}</div>
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

