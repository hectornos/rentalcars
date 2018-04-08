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
    public function index () {
        $alquileres = Alquiler::all();
        return view('Alquileres',['alquileres'=>$alquileres]);
    }
}
