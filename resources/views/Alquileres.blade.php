<html>
<head>
	</head>
	<body>
    @foreach ($alquileres as $alquiler)
        {{$alquiler->vehiculo->modelo}}
        {{$alquiler->cliente->nombre}}
    @endforeach
	

</body>
</html>