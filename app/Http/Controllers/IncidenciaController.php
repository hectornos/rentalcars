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
    //Listado completo de las incidencias
    public function index() {
		$incidencias = Incidencia::all();
		return $incidencias;
    }
    
    //Detalle de una incidencia dado su id (primary key)
    public function show($id) {
		$incidencia = Incidencia::find($id);
		return $incidencia;
	}
}
