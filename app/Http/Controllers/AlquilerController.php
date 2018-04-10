<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incidencias as Incidencias;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;

class AlquilerController extends Controller
{
    //Listado completo de alquileres
    public function index () {
        $alquileres = Alquiler::all();
        return $alquileres;
    }

    //Detalle de un alquiler dado su id (primary key)
    public function show($id) {
		$alquiler = Alquiler::find($id);
		return $alquiler;
	}
}
