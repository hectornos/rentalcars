<form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('Averia.index' )}}" >
<font color="white">De</font>::
<input class="form-control" type="date" value="" name="date1">::
<font color="white">Hasta </font>::
<input class="form-control" type="date" value="{{date('Y-m-d')}}" name="date2">
__
  <select class='form-control' id="filtro" name="filtro">
    <option value="matricula">Matricula</option>
    <option value="tipo">Tipo</option>
  </select>
  <input class="form-control mr-sm-2" type="text" placeholder="Elige criterio" name="busqueda" value="">
  <div class="btn-group" >
  <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
          
        </div>
</form>