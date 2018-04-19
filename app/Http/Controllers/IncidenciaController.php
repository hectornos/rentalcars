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
    //Listado completo de incidencias
    public function index (Request $request) {
      if ($request->has('criterio')){
        $orden = $request->criterio;
        if ($orden != 'fecha'){
          $incidencias = Incidencia::orderBy($orden)->get();         
        }else{
          $incidencias = Incidencia::join('cliente_vehiculo as c', 'c.id','=','incidencias.alquiler_id')
          ->orderBy('c.fecha', 'asc')
          ->select('incidencias.*')
          ->get();
        }
      }else{
        $incidencias = Incidencia::all();
        
      }
      $ordenar = true;
      $count = $incidencias->count();
      return \View::make('vistaIncidencias',compact('incidencias'),['count'=>$count, 'ordenar'=>$ordenar]);
  }
    
    //Listado completo de incidencias por alquiler
    public function listar ($alquiler_id) {
      $incidencias = Incidencia::where('alquiler_id',$alquiler_id)->get();
      $count = $incidencias->count();
      $ordenar = false;
      return \View::make('vistaIncidencias',compact('incidencias'),['count'=>$count, 'ordenar'=>$ordenar]);
    }

    //Listado completo de incidencias por cliente
    public function listarcli ($cliente_id) {
      $incidencias = Incidencia::where('alquiler_id',$alquiler_id)->get();
      $count = $incidencias->count();
      $ordenar = false;
      return \View::make('vistaIncidencias',compact('incidencias'),['count'=>$count, 'ordenar'=>$ordenar]);
    }


}
