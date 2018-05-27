
//Funciones para validar formularios completos.
//Formularios de vehiculos.
function validarCoche () {
  let marca = document.getElementById("marca_id");
  let matricula = document.getElementById("matricula");
  let modelo = document.getElementById("modelo");
  let tipo = document.getElementById("tipo_id");
  let combustible = document.getElementById("combustible_id");
  let color = document.getElementById("color_id");
  let cambio = document.getElementById("cambio_id");
  let salida = true;

    if (marca.selectedIndex==0) {
      marca.style.borderColor="red";
      salida = false;
    }else{
      if (marca.style.borderColor=="red"){
        marca.style.borderColor="grey";
      }
    }
    if (!mat(matricula.value)) {
      matricula.style.borderColor="red";
      salida = false;
    }else{
      if (matricula.style.borderColor=="red"){
        matricula.style.borderColor="grey";
      }
    }
    if (combustible.selectedIndex==0) {
      combustible.style.borderColor="red";
      salida = false;
    }else{
      if (combustible.style.borderColor=="red"){
        combustible.style.borderColor="grey";
      }
    }
    if (color.selectedIndex==0) {
      color.style.borderColor="red";
      salida = false;
    }else{
      if (color.style.borderColor=="red"){
        color.style.borderColor="grey";
      }
    }
    if (cambio.selectedIndex==0) {
      cambio.style.borderColor="red";
      salida = false;
    }else{
      if (cambio.style.borderColor=="red"){
        cambio.style.borderColor="grey";
      }     
    }
    if (tipo.selectedIndex==0) {
      tipo.style.borderColor="red";
      salida = false;
    }else{
      if (tipo.style.borderColor=="red"){
        tipo.style.borderColor="grey";
      }
    }
    if (modelo.value=="") {
      modelo.style.borderColor="red";
      salida = false;
    }else{
      if (modelo.style.borderColor=="red"){
        modelo.style.borderColor="green";
      }
    }
    if (!salida) {
      document.getElementById("error").outerHTML = "<div id='error' class='alert alert-warning'>Introduce todos los campos</div>";
    }
    return salida;

}

//Formularios de clientes.

function validarCliente () {
  let form = document.getElementById('formulario');
  let inputs = form.getElementsByTagName("input");
  let salida = true;
  let dni = document.getElementById("dni").value;
  let telefono = document.getElementById("telefono").value;



  for (let i=1; i<7; i++){
    if ((inputs[i].value)=="") {
      document.getElementById("error").outerHTML = "<div id='error' class='alert alert-warning'>Introduce todos los campos</div>";
      inputs[i].style.borderColor="red";
      salida = false;
    } else {
      if (inputs[i].style.borderColor="red"){
        inputs[i].style.borderColor="grey";
      }
    }
  }

  if (!doc(dni)){
    document.getElementById("error").outerHTML = "<div id='error' class='alert alert-warning'>DNI invalido</div>";
    inputs[3].style.borderColor="red";
    salida = false;
  } else {
    if (inputs[3].style.borderColor="red"){
      inputs[3].style.borderColor="grey";
    }
  }

  if (!tel(telefono)){
    document.getElementById("error").outerHTML = "<div id='error' class='alert alert-warning'>Telefono invalido</div>";
    inputs[6].style.borderColor="red";
    salida = false;
  } else {
    if (inputs[6].style.borderColor="red"){
      inputs[6].style.borderColor="grey";
    }
  }

  return salida;
}

//Formularios de login.

function validarLogin () {
  let form = document.getElementById('formulario');
  let dni = document.getElementById("dni").value;

  
  if (!doc(dni)){
    document.getElementById("error").outerHTML = "<div id='error' class='alert alert-warning'>DNI invalido</div>";
    inputs[3].style.borderColor="red";
    salida = false;
  } else {
    if (inputs[3].style.borderColor="red"){
      inputs[3].style.borderColor="grey";
    }
  }


  return salida;
}

//Formularios de incidencias y averias.
function validarOtros () {
  //La descripcion no puede estar vacia.
  let descripcion = document.getElementById("descripcion");
  let longitud = descripcion.value.length;
  let sal = true;

  if (longitud<1) {
    descripcion.style.borderColor = "red";
    sal = false;
    document.getElementById("error").outerHTML = "<div id='error' class='alert alert-warning'>Introduce descripcion</div>";
  }

  return sal;

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