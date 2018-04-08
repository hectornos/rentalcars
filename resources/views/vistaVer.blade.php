<html>
<head>
	</head>
	<body>
	@foreach ($clientes as $cliente)
		{{$cliente->alquilers}}
	@endforeach


</body>
</html>