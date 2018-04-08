<html>
<head>
	</head>
	<body>
	
	<!--Obtenemos las incidencias del cliente 1-->
	@foreach ($cliente->incidencias as $incidencia)
		{{$incidencia->descripcion}}
	@endforeach
</body>
</html>