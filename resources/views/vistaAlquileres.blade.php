<html>
<head>
	</head>
	<body>
    <table border=1>
    <tr><td>Fecha</td><td colspan='2'>Conductor</td><td colspan='2'>Vehiculo</td><td>Incidencias</td></tr>
    @foreach ($alquileres as $alquiler)
        <tr>
            <td>{{$alquiler->fecha}}</td>
            <td>{{$alquiler->cliente->nombre}}</td>
            <td>{{$alquiler->cliente->apellido}}</td>
            <td>{{$alquiler->vehiculo->modelo}}</td>
            <td>{{$alquiler->vehiculo->matricula}}</td>
            @if (count($alquiler->incidencias)>0)
                <td><a href="{{ route('Incidencia.listar',['alquiler_id'=>$alquiler->id]) }}">{{count($alquiler->incidencias)}}</a></td>
            @else
                <td>Sin incidencias</td>
            @endif
        </tr>
    @endforeach
</body>
</html>

