@extends('escoger')
@section('titulo','Escoge')
@section('formulario')

<div class="container-fluid">
    <input type="hidden" value="{{$cliente_id}}"/>
    {!! Form::model(Request::only(['tipo_id','color_id','cambio_id','combustible_id']), ['route' =>'Vehiculo.elegir', 'method' => 'GET']) !!}
    <table class="table">
      <tr>
      <td></td><td class='table-primary'><b>Tipos:</b></td><td class='table-primary'><b>Combustibles:</b></td><td class='table-primary'><b>Colores:</b></td><td class='table-primary'><b>Cambios:</b></td><td class='table-primary'></td>
      </tr>
      <tr>
      <div class="form-group">
      <td rowspan = '3' width="350"></td>
      <td class='table-primary' rowspan = '2' width="150">
      @foreach ($tipos as $tipo)
        <div class="form-group">
        {{$tipo->nombre}}
        {!! Form::checkbox('tipo_id[]', $tipo->id, null)!!}
        </div>
      @endforeach
      </td><td class='table-primary' rowspan = '2' width="150">
      @foreach ($combustibles as $combustible)
        <div class="form-group">
        {{$combustible->nombre}}
        {!! Form::checkbox('combustible_id[]', $combustible->id, null)!!}
        </div>
      @endforeach
      </td><td class='table-primary' align='left' rowspan = '3' width="150">
      {!! Form::select('color_id[]',$colores ,null, ['class'=>'form-control']) !!}
      </td><td class='table-primary' rowspan = '2' width="150">
      @foreach ($cambios as $cambio)
        <div class="form-group">
        {{$cambio->nombre}}
        {!! Form::checkbox('cambio_id[]', $cambio->id, null)!!}
        </div>
      @endforeach
      </td><td class='table-primary' align='center' width="120">
      <button type="submit" class="btn btn-info btn-lg">Buscar</button>
      
      </td><td rowspan = '2' width="350"></td>
      </div>
      </tr>
      <tr class='table-primary'><td align='center'><button type="submit" name='cancel' id='cancel' class="btn btn-danger btn-lg">Cancel</button></td></tr>
      </table>
      

    {!! Form::close() !!}
  
@endsection