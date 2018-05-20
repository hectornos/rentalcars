
{!! Form::model(Request::all(), ['route' =>'Averia.index', 'method' => 'GET', 'class'=>'form-inline my-2 my-lg-0']) !!}
<font color="white">De</font>::
<input class="form-control" type="date" value="" name="date1">::
<font color="white">Hasta </font>::
<input class="form-control" type="date" value="{{date('Y-m-d')}}" name="date2">
__
{!! Form::select('filtro',array('matricula'=>'matricula','tipo'=>'tipo') ,null, ['class'=>'form-control']) !!}
{!! Form::text('busqueda',null, ['class'=>'form-control mr-sm-2','placeholder'=>'selecciona filtro']) !!}
<div class="btn-group" >
  <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button> 
        <div class="btn-group" >
    <button class="btn btn-outline-warning my-2 my-sm-0" name="imp" id="imp" type="submit">Imprimir</button>      
  </div>
{!! Form::close() !!}