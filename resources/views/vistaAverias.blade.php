<html>
<head>
	</head>
	<body>
	@foreach ($averias as $averia)
		{{$averia->id}}
		{{$averia->descripcion}}
		{{$averia->vehiculo->matricula}}
	@endforeach


</body>
</html>