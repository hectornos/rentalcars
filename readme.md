PARTE DE CONTROLADOR:
Multiples wheres en VehiculoController::escoger. No consigo que filtre por varias columnas.


PARTE DE VISTA:
Poner todos los nombres a primera mayuscula o todas mayusculas: ucfirst o strtoupper.
Cambiar anchura de las columnas.

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

