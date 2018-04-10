<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;

class AveriaController extends Controller
{
	//Listado completo de averias
    public function index() {
    $averias = Averia::all();
    	return $averias;
	}

	//Detalle de una averia dado su id (primary key)
	public function show($id) {
		$averia = Averia::find($id);
		return $averia;
	}
}
