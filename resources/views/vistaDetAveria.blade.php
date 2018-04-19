<html>
<head>
	</head>
	<body>
    <table border=1>
    <tr><td>Información</td><td>Valores</td></tr>
    <tr><td>Vehiculo:</td><td>{{$averia->vehiculo->marca->nombre}} {{$averia->vehiculo->modelo}} matricula: {{$averia->vehiculo->matricula}}</td></tr>
    <tr><td>Tipo averia:</td><td>{{$averia->tipoaveria->nombre}}</td></tr>
    <tr><td>Descripcion:</td><td>{{$averia->descripcion}}</td></tr>
    <tr><td>Fecha:</td><td>{{$averia->fecha}}</td></tr>
</body>
</html>