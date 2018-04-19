<html>
<head>
	</head>
	<body>
    <table border=1>
    <tr><td>Información</td><td>Valores</td></tr>
    <tr><td>Cliente:</td><td>{{$alquiler->cliente->nombre}} {{$alquiler->cliente->apellido}}</td></tr>
    <tr><td>Vehiculo:</td><td>{{$alquiler->vehiculo->marca->nombre}} {{$alquiler->vehiculo->modelo}} {{$alquiler->vehiculo->matricula}}</td></tr>
    <tr><td>Fecha:</td><td>{{$alquiler->fecha}}</td></tr>
    <tr><td colspan=2>Incidencias:</td></tr>
    @foreach ($alquiler->incidencias as $incidencia)
        <tr><td colspan=2>{{$incidencia->descripcion}}</td>
            @if ($incidencia->resuelto = 1)
                <td>Resuelta</td>
            @else
                <td>No resuelta</td>
            @endif
        </tr>
    @endforeach
    </table>
</body>
</html>