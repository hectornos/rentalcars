<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incidencias as Incidencias;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;

class IncidenciaController extends Controller
{
    //Listado completo de alquileres
    public function index () {
      $incidencias = Incidencia::all();
      $count = $incidencias->count();
      return \View::make('vistaIncidencias',compact('incidencias'),['count'=>$count]);
  }
    
    //Detalle de una incidencia dado su id (primary key)
    public function show($id) {
		$incidencia = Incidencia::find($id);
		return $incidencia;
	}
}
