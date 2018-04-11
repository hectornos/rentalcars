<html>
<head>
	</head>
	<body>
    <table border=1>
    <tr><td>marca</td><td>modelo</td><td>matricula</td><td>Alquileres</td><td>Averias</td></tr>
    @foreach ($vehiculos as $vehiculo)
        <tr><td>{{$vehiculo->marca->nombre}}</td><td>{{$vehiculo->modelo}}</td><td>{{$vehiculo->matricula}}</td><td>{{count($vehiculo->alquileres)}}</td><td>{{count($vehiculo->averias)}}</td></tr>
    @endforeach
</body>
</html>