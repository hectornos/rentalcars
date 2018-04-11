<html>
<head>
	</head>
	<body>
	<table border=1>
    <tr><td>Tipo</td><td colspan='3'>Coche</td><td>Descripcion</td></tr>
    @foreach ($averias as $averia)
        <tr>
			<td>{{$averia->tipoaveria->nombre}}</td>

			<td><a href="{{ route('Vehiculo.show', ['id'=>$averia->vehiculo->id]) }}">{{$averia->vehiculo->matricula}}</a></td>

			<td>{{$averia->vehiculo->marca->nombre}}</td>
			<td>{{$averia->vehiculo->modelo}}</td>
			<td>{{$averia->descripcion}}</td>
		</tr>
    @endforeach
	Contador: {{$count}}
</body>
</html>


