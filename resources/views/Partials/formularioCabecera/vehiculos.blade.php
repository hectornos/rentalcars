<form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('Vehiculo.index' )}}" >
  <select class='form-control' id="filtro" name="filtro">
    <option value="matricula">Matricula</option>
    <option value="modelo">Modelo</option>
  </select>
  <input class="form-control mr-sm-2" type="text" placeholder="Elige criterio" name="busqueda" value="">
  <div class="btn-group" >
  <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
          <a href="{{ route('Vehiculo.create')}}" class="btn btn-outline-success my-2 my-sm-0">
            <span class="glyphicon glyphicon-edit"></span> Nuevo</button></a>
        </div>
</form>