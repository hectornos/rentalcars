<html>
<head>
	</head>
	<body>
    <table border=1>
    <tr><td>Nombre</td><td>Apellido</td><td>Telefono</td><td>Alquileres</td></tr>
    @foreach ($clientes as $cliente)
        <tr><td>{{$cliente->nombre}}</td><td>{{$cliente->apellido}}</td><td>{{$cliente->telefono}}</td><td>{{count($cliente->alquileres)}}</td></tr>
    @endforeach
</body>
</html>