<html>
<head>
	</head>
	<body>
    <table border=1>
    <tr><td>Nombre</td><td>Apellido</td><td>Telefono</td><td><a href="{{ route('Cliente.index',['criterio'=>'algohayqueponer']) }}">Alquileres</a></td><td><a href="{{ route('Cliente.index',['criterio'=>'algohayqueponer']) }}">Incidencias</a></td></tr>
    @foreach ($clientes as $cliente)
        <tr><td>{{$cliente->nombre}}</td>
            <td>{{$cliente->apellido}}</td>
            <td>{{$cliente->telefono}}</td>
            @if (count($cliente->alquileres)>0)
                <td><a href="{{ route('Cliente.alquileres',['id'=>$cliente->id]) }}">{{count($cliente->alquileres)}}</a></td>
            @else
                <td>Sin alquileres</td>
            @endif
            @if (count($cliente->incidencias)>0)
                <td><a href="{{ route('Cliente.incidencias',['id'=>$cliente->id]) }}">{{count($cliente->incidencias)}}</a></td>
            @else
                <td>Sin incidencias</td>
            @endif
        </tr>
    @endforeach

    	Contador: {{$count}}

</body>
</html>
<!--
select c.*, count(cliente_id) as cli_count from clientes c left join cliente_vehiculo cv on c.id = cv.cliente_id group by c.id order by cli_count;
-->