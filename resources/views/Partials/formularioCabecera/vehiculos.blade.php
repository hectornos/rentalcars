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