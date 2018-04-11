<html>
<head>
	</head>
	<body>
	<table border=1>
    <tr><td colspan='2'>Conductor</td><td colspan='3'>Coche</td><td>Fecha</td><td>Descripcion</td><td>Resolución</td></tr>
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

</body>
</html>