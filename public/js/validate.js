
//Funciones para validar formularios completos.
//Formularios de vehiculos.
function validarCoche () {
  let marca = document.getElementById("marca_id").selectedIndex;
  let matricula = document.getElementById("matricula").value;
  let modelo = document.getElementById("modelo").value;
  let tipo = document.getElementById("tipo_id").selectedIndex;
  let combustible = document.getElementById("combustible_id").selectedIndex;
  let color = document.getElementById("color_id").selectedIndex;
  let cambio = document.getElementById("cambio_id").selectedIndex;
  
    if (marca==0 || tipo==0 || combustible==0 || color==0 || cambio==0 ) {
      alert('Introduce todos los datos');
      return false;
    } else {
      if (!mat(matricula)) {
        alert('Matricula inválida');
        return false;
      } else {
        if (modelo=="") {
          alert('Rellena todos los campos');
          return false;
        }
      }
    }
    return true;

}
//Formularios de clientes.
function validarCliente () {
  let nombre = document.getElementById("nombre").value;
  let apellido = document.getElementById("apellido").value;
  let dni = document.getElementById("dni").value;
  let f_nac = document.getElementById("f_nac").value;
  let ciudad = document.getElementById("ciudad").value;
  let telefono = document.getElementById("telefono").value;
  
    if (nombre=="" || apellido=="" || ciudad=="" ) {
      alert('Introduce todos los datos');
      return false;
    } else {
      if (!doc(dni)) {
        alert('DNI invalido');
        return false;
      } else {
        if (f_nac=="") {                      
          alert('Introduce una fecha de nacimiento');
          return false;
        } else {
          if (!tel(telefono)) {
            alert('Telefono invalido');
            return false;
          }
        }
      }
    }
    return true;

}
//Formularios de incidencias y averias.
function validarOtros () {
  //La descripcion no puede estar vacia.
  let descripcion = document.getElementById("descripcion");
  let longitud = descripcion.value.length;
  if (longitud<1) {
    alert('Introduce descripcion');
    return false;
  } else {
    return true;
  }
 /*
  if (String(descripcion) = "") {
    alert('Debes introducir una descripcion.')
    return false;
  }else{
    alert((String(descripcion)).length);
    return true;
  }
  */
}
//Funciones para validar campos con expresiones regulares.
function tel (valor) {
  val = valor.toString().toUpperCase();
  const telefono = /^[0-9]{9}$/i;
  return telefono.test(val);
}

function doc (valor) {
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

function mat (valor) {
  val = valor.toString().toUpperCase();
  const matricula = /^[0-9]{4}[BCDFGHJKLMNPRSTVWXYZ]{3}$/i;
  return matricula.test(val);
}