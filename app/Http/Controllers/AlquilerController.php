<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            if ($orden == 'incidencias'){
              $alquileres = Alquiler::join('incidencias', 'cliente_vehiculo.id','=','incidencias.alquiler_id','left outer')
														->select('cliente_vehiculo.*', DB::raw('count(alquiler_id) as alq_count'))
														->groupBy('cliente_vehiculo.id')
														->orderBy('alq_count','desc')->get();
            }elseif ($orden == 'conductor'){
              $alquileres = Alquiler::join('clientes', 'cliente_vehiculo.cliente_id','=','clientes.id')
														->select('cliente_vehiculo.*')
														->orderBy('clientes.apellido','asc')->get();
            }elseif ($orden == 'matricula'){
              $alquileres = Alquiler::join('vehiculos', 'cliente_vehiculo.vehiculo_id','=','vehiculos.id')
														->select('cliente_vehiculo.*')
														->orderBy('vehiculos.matricula','asc')->get();
            }else{
                $alquileres = Alquiler::orderBy($orden)->get();
            }
        }else{
            $alquileres = Alquiler::all();
        }
            $count = count($alquileres);
            return \View::make('rejillaAlquileres',compact('alquileres'),['count'=>$count]);
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

    //Editar un alquiler
    public function edit($id) {
        $alquiler = Alquiler::find($id);
        echo $alquiler;
    }

    //Imprimir un alquiler
    public function pdf($id) {
        $alquiler = Alquiler::find($id);
        echo 'IMPRIMIR: '+$alquiler;
    }


}
