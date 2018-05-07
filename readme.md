Ordenar matriculas por LETRA:
ORDER BY SUBSTRING('matricula',5,3)

Validar documentos y matrículas:

function docs (valor) {
  const caracteres = 'TRWAGMYFPDXBNJZSQVHLCKET';
  const nif = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;
  const nie = /^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;
  const passport = /^[a-zA-Z]{3}[0-9]{6}[a-zA-Z]{1}$/i;
  //Pasamos a mayúsculas
  let valo = valor.toString().toUpperCase();
  //Si es pasaporte lo validamos sin mas
  if (passport.test(valor)) return true;
  //Si es un nie, hemos de transformar la primera letra para el cálculo.
  if (nie.test(valo)) { 
    valo = valo
      .replace('X','0')
      .replace('Y','1')
      .replace('Z','2');
  }
  //Luego sea dni o nie, se juzga...
  resultado = parseInt(valo.substr(0,8)) % 23;
  const letra = valo.substr(-1);
  if (letra === caracteres.charAt(resultado)) {
    return true;
  }  
  return false;
}

function matricula (valor) {
  val = valor.toString().toUpperCase();
  const matricula = /^[0-9]{4}[BCDFGHJKLMNPRSTVWXYZ]{3}$/i;
  return matricula.test(val);
}

Una vez definidas las relaciones en los modelos de las distintas tablas, la siguiente parte es definir los métodos necesarios para la gestión CRUD  de la base de datos, así como para obtener todos los detalles y listados necesarios. Asímismo la API deberá permitir filtrar y ordenar los resultados en base a disintos criterios.
Para tal fin haré uso de los métodos del ORM eloquent, de modo que pueda obtener listados de registros o registros únicos, para nutrir las diferentes vistas diseñadas.
Eloquent nos permite realizar consultas por medio de distintos métodos de modo que las querys SQL sean transparentes para el programador. Aun así voy a poner a modo de ejemplo una comparativa de algunas de las consultas empleadas y su función para acabar de documentar la parte del modelo:
Ordenar clientes por nombre:
select * from clientes order by nombre;
$clientes = cliente::orderBy($nombre)->get();
Ordenar clientes por número de incidencias:
select c.*, count(alquiler_id) as inc_count from incidencias i left join cliente_vehiculo cv on i.alquiler_id = cv.id left join clientes c on cv.cliente_id = c.id group by c.id order by incidencias_count'));
$clientes = Cliente::join('cliente_vehiculo', 'clientes.id', '=', 'cliente_vehiculo.cliente_id','left outer') 
->join('incidencias', 'cliente_vehiculo.id', '=', 'incidencias.alquiler_id', 'left outer' ) 
->groupBy('clientes.id') 
->orderBy('inc_count','desc') 
->select('clientes.*', DB::raw('count(alquiler_id) as inc_count')) 
->get();

Ordenar vehiculo por matrícula:
Select * from vehículos ORDER BY SUBSTRING('matricula',5,3) ORDER BY SUBSTRING(‘matricula’,1,2);

$vehiculos = Vehiculo::orderBy(DB::raw(‘substring($matricula,5,3)’)
->orderBy(DB::raw(‘substring($matricula,1,2)
->get();

Además se han utilizado scopes de Laravel, para encadenar querys recurrentes, algo especialmente útil para encadenar filtros, cosa que voy a utilizar en la parte de usuario para escoger un vehiculo entre toda la gama en base a ciertos criterios.
De este modo definimos scopes, tan complejos como deseemos y los utlizamos en nuestras consultas, por ejemplo:

En el modelo del vehiculo definimos:
Public function scopeColor($query, $flag) {
	Return $query->where(‘color’,$flag);
}



Public function scopeCombustible($query, $flag) {
	Return $query->where(‘combustible’,$flag);
}


Luego en el controlador podemos hacer:

$vehiculos = Vehiculo::color(‘verde’)->combustible(‘diesel’)->get();

De modo que filtramos los vehículos verdes y diésel, y obtenemos el listado.



