<html>
<head>
	</head>
	<body>
	<table border=1>
	@if (@isset ($ordenar)) <!--Si pedimos la rejilla desde public/Incidencia se puede ordenar-->
    	<tr><td colspan='2'>Conductor</td><td colspan='3'>Coche</td><td><a href="{{ route('Incidencia.index',['criterio' => 'fecha'] )}}" ><b>Fecha</b></a></td><td>Descripcion</td><td><a href="{{ route('Incidencia.index',['criterio' => 'resuelto'] )}}" ><b>Resolucion</b></a></td></tr>
	@else <!--Si pedimos la rejilla desde public/Incidencias/{id} no se puede ordenar-->
		<tr><td colspan='2'>Conductor</td><td colspan='3'>Coche</td><td><b>Fecha</b></a></td><td>Descripcion</td><td><b>Resolucion</b></a></td></tr>
	@endif
    @foreach ($incidencias as $incidencia)
        <tr>
			<td>{{$incidencia->alquiler->cliente->nombre}}</td>
			<td>{{$incidencia->alquiler->cliente->apellido}}</td>
			<td>{{$incidencia->alquiler->vehiculo->matricula}}</td>
			<td>{{$incidencia->alquiler->vehiculo->marca->nombre}}</td>
			<td>{{$incidencia->alquiler->vehiculo->modelo}}</td>
			<td>{{$incidencia->alquiler->fecha}}</td>
			<td>{{$incidencia->descripcion}}</td>
			@if ($incidencia->resuelto===1)
				<td>Resuelto</td>
			@else
				<td>Sin resolver</td>
			@endif
		</tr>
    @endforeach
	Contador: {{$count}}
	
</body>
</html>



@isset($usersType)
  // $usersType is defined and is not null...
@endisset

