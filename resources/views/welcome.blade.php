@extends('plantilla')
@section('titulo','Login')
@include('partials.formularioCabecera.divNav')
@section('contenido')  
<div class="container">
  <form action="{{ route('Cliente.login')}}" method="POST" id="formulario" onsubmit="return validar()">
  {{ csrf_field() }}
  <br>
  <br>
  <br>
  <br>
  <div class="card text-white bg-secondary mb-3 mx-auto align-middle" style="max-width: 30rem;">
    <div class="card-header">LOGIN</div>
      <div class="card-body">
        <h5 class="card-title">Identificate como cliente</h5>
        <div class="form-group">
          <label for="nombre">DNI: </label>
          <div class="col-12">
            <input class="form-control" type="text" value="" id="dni" name="dni">
          </div>
        </div>
        <div class="btn-group text-center mx-auto">
          <button class="btn btn-success text-center" type="submit" name="acceder" value="acceder">
          <span class="glyphicon glyphicon-ok"></span> Acceder</button>
        </div>
      </div>
    </div>
  </form>
  <br>
  <br>      
  <div id="error"></div>
  @if (session('NoEncontrado'))
      <div class="alert alert-danger">
          {{ session('NoEncontrado') }}
      </div>
  @endif
</div>
  <script>
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
    function validar() {
      let dni = document.getElementById("dni");
      if (!doc(dni.value)){
        document.getElementById("error").outerHTML = "<div id='error' class='alert alert-warning'>DNI invalido</div>";
        dni.style.borderColor="red";
        //alert('nop');
        return false;
      } else {
        //alerta('sip');
        return true;
      }
    }
  </script>

@endsection


