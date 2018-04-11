<html>
<head>
	</head>
	<body>
    <table border=1>
    <tr><td>Nombre</td><td>Apellido</td><td>Telefono</td><td>Alquileres</td></tr>
    @foreach ($clientes as $cliente)
        <tr><td>{{$cliente->nombre}}</td>
            <td>{{$cliente->apellido}}</td>
            <td>{{$cliente->telefono}}</td>
            @if (count($cliente->alquileres)>0)
                <td><a href="{{ route('Alquiler.listarcli',['cliente_id'=>$cliente->id]) }}">{{count($cliente->alquileres)}}</a></td>
            @else
                <td>Sin alquileres</td>
            @endif
        </tr>
    @endforeach
</body>
</html>