<html>
<head>
	</head>
	<body>
    <table border=1>
    <tr><td><a href="{{ route('Alquiler.index',['criterio' => 'fecha'] )}}" ><b>Fecha</b></a></td><td colspan='2'>Conductor</td><td>Vehiculo</td><td>Incidencias</td></tr>
    @foreach ($alquileres as $alquiler)
        <tr>
            <td>{{$alquiler->fecha}}</td>
            <td><a href="{{ route('Cliente.show',['cliente_id'=>$alquiler->cliente->id]) }}">{{$alquiler->cliente->nombre}}</td>
            <td>{{$alquiler->cliente->apellido}}</td>
            <td><a href="{{ route('Vehiculo.show',['vehiculo_id'=>$alquiler->vehiculo->id]) }}">{{$alquiler->vehiculo->matricula}}</td>
            @if (count($alquiler->incidencias)>0)
                <td><a href="{{ route('Alquiler.incidencias',['alquiler_id'=>$alquiler->id]) }}">{{count($alquiler->incidencias)}}</a></td>
            @else
                <td>Sin incidencias</td>
            @endif
        </tr>
    @endforeach
    Contador: {{$count}}

</body>
</html>

