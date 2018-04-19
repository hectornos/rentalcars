<html>
<head>
	</head>
	<body>
    <table border=1>
    <tr><td>Información</td><td>Valores</td></tr>
    <tr><td>Marca:</td><td>{{$vehiculo->marca->nombre}}</td></tr>
    <tr><td>Modelo:</td><td>{{$vehiculo->modelo}}</td></tr>
    <tr><td>Matricula:</td><td>{{$vehiculo->matricula}}</td></tr>
    <tr><td>Color:</td><td>{{$vehiculo->color->nombre}}</td></tr>
    <tr><td>Combustible:</td><td>{{$vehiculo->combustible->nombre}}</td></tr>
    <tr><td>Cambio:</td><td>{{$vehiculo->cambio->nombre}}</td></tr>
    <tr><td>Tipo:</td><td>{{$vehiculo->tipo->nombre}}</td></tr>
    @if (count($vehiculo->averias)>0)
        <tr><td colspan=2>Averias:</td></tr>
        @foreach ($vehiculo->averias as $averia)
            <tr><td colspan=2>{{$averia->descripcion}} el {{$averia->fecha}}</td></tr>
        @endforeach
    @endif
</body>
</html>