<html>
<head>
	</head>
	<body>
	
	<!--Obtenemos las incidencias del cliente 1-->
	@foreach ($cliente->vehiculos as $vehiculo)
		{{$vehiculo}}
	@endforeach
</body>
</html>