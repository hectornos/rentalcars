<html>
<head>
	</head>
	<body>
	<table border=1>
    @if (@isset($ordenar))
		<tr><td>Tipo</td><td colspan='3'>Coche</td><td>Descripcion</td><td><a href="{{ route('Averia.index',['criterio' => 'fecha'] )}}" ><b>Fecha</b></a></tr>
    @else
		<tr><td>Tipo</td><td colspan='3'>Coche</td><td>Descripcion</td><td><b>Fecha</b></td></tr>
	@endif
	@foreach ($averias as $averia)
        <tr>
			<td>{{$averia->tipoaveria->nombre}}</td>

			<td><a href="{{ route('Vehiculo.show', ['id'=>$averia->vehiculo->id]) }}">{{$averia->vehiculo->matricula}}</a></td>

			<td>{{$averia->vehiculo->marca->nombre}}</td>
			<td>{{$averia->vehiculo->modelo}}</td>
			<td>{{$averia->descripcion}}</td>
			<td>{{$averia->fecha}}</td>
		</tr>
    @endforeach
	Contador: {{$count}}
</body>
</html>


