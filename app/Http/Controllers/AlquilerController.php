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
    public function index (Request $request) {
        if ($request->has('criterio')){
            $orden = $request->criterio;
            $alquileres = Alquiler::orderBy($orden)->get();
            $count = $alquileres->count();
        }else{
            $alquileres = Alquiler::all();
            $count = $alquileres->count();
        }
            return \View::make('vistaAlquileres',compact('alquileres'),['count'=>$count]);
    }

    //Detalle de un alquiler dado su id (primary key)
    public function show($id) {
        $alquiler = Alquiler::find($id);
        $numIncidencias = $alquiler->incidencias->count();
		return \View::make('vistaDetAlquiler',compact('alquiler'),['numIncidencias'=>$numIncidencias]);
    }
    
    //Incidencias de un alquiler
    public function listarinc($id) {
        $alquiler = Alquiler::find($id);
        $incidencias = $alquiler->incidencias;
        $count = count($incidencias);
        return \View::make('vistaIncidencias',compact('incidencias'),['count'=>$count]);
 
    }

}
