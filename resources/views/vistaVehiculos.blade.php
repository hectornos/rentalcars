<html>
<head>
	</head>
	<body>
    <table border=1>
    <tr><td>marca</td><td>modelo</td><td>matricula</td><td>Alquileres</td><td>Averias</td></tr>
    @foreach ($vehiculos as $vehiculo)
        <tr>
            <td>{{$vehiculo->marca->nombre}}</td>
            <td>{{$vehiculo->modelo}}</td>
            <td>{{$vehiculo->matricula}}</td>
            @if (count($vehiculo->alquileres)>0)
                <td><a href="{{ route('Alquiler.listarveh',['vehiculo_id'=>$vehiculo->id]) }}">{{count($vehiculo->alquileres)}}</a></td>
            @else
                <td>Sin alquileres</td>
            @endif
            @if (count($vehiculo->averias)>0)
                <td><a href="{{ route('Averia.listar',['vehiculo_id'=>$vehiculo->id]) }}">{{count($vehiculo->averias)}}</a></td>
            @else
                <td>Sin averias</td>
            @endif
        </tr>
    @endforeach
</body>
</html>