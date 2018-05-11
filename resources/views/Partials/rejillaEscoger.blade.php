<table class="table table-hover">
  <thead>
  <tr class='table-primary'>
    <td width="150" align="center" title="Marca de coche"><a href="{{ route('Vehiculo.index',['criterio' => 'marca'] )}}" >Marca</a></td>
    <td width="150" align="center" title="Modelo de coche"><a href="{{ route('Vehiculo.index',['criterio' => 'modelo'] )}}" >Modelo</a></td>
    <td width="150" align="center" title="Tipo de coche"><a href="{{ route('Vehiculo.index',['criterio' => 'tipo'] )}}" >Tipo</a></td>
    <td width="150" align="center" title="Combustible de coche"><a href="{{ route('Vehiculo.index',['criterio' => 'combustible'] )}}" >Combustible</a></td>
    <td width="150" align="center" title="Cambio de coche"><a href="{{ route('Vehiculo.index',['criterio' => 'cambio'] )}}" >Cambio</a></td>
    <td width="150" align="center" title="Modelo de coche"><a href="{{ route('Vehiculo.index',['criterio' => 'color'] )}}" >Color</a></td>
    <td width="50" align="center" title="Alquilar">Alquilar</td>
  </tr>
  </thead>
  @foreach($vehiculos as $vehiculo)
  <tr>
    <td width="150" align="center">{{ $vehiculo->marc }}</td>
    <td width="150" align="center">{{ $vehiculo->mod }}</td>
    <td width="150" align="center">{{ ucfirst($vehiculo->tipo->nombre) }}</td>
    <td width="150" align="center">{{ ucfirst($vehiculo->combustible->nombre) }}</td>
    <td width="150" align="center">{{ ucfirst($vehiculo->cambio->nombre) }}</td>
    <td width="150" align="center">{{ ucfirst($vehiculo->color->nombre) }}</td>
    <td width="50" align="center"><a href="{{ route('Cliente.alquilar',['vehiculo_id' => $vehiculo->id, 'cliente_id' => $cliente_id] )}}" class="btn btn-info" title="Alquilar vehiculo">
                  <span class="glyphicon glyphicon-edit"/></td>
  </tr>
  
  @endforeach
  <tr>
    <td colspan="7" align="center">Vehiculos encontrados: {{ $count }}</td>
  </tr>
  @if (isset($mensajito))
    <tr>
      <td colspan="7" align="center">{{ $mensajito }}</td>
    </tr>
  @endif
</table>