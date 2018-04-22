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
        if ($orden == 'fecha'){
          $incidencias = Incidencia::join('cliente_vehiculo as c', 'c.id','=','incidencias.alquiler_id')
                                    ->orderBy('c.fecha', 'asc')
                                    ->select('incidencias.*')
                                    ->get();    
        }elseif ($orden == 'conductor') {
          $incidencias = Incidencia::join('cliente_vehiculo', 'incidencias.alquiler_id','=','cliente_vehiculo.id')
                                    ->join('clientes', 'cliente_vehiculo.cliente_id', '=', 'clientes.id')
														        ->select('incidencias.*')
                                    ->orderBy('clientes.apellido','asc')->get();
        }elseif ($orden == 'matricula') {
          $incidencias = Incidencia::join('cliente_vehiculo', 'incidencias.alquiler_id','=','cliente_vehiculo.id')
                                    ->join('vehiculos', 'cliente_vehiculo.vehiculo_id', '=', 'vehiculos.id')
                                    ->select('incidencias.*')
                                    ->orderBy('vehiculos.matricula','asc')->get();
        }else{
          $incidencias = Incidencia::orderBy($orden)->get();
        }
      }else{
        $incidencias = Incidencia::all();
        
      }
      $ordenar = true;
      $count = $incidencias->count();
      return \View::make('rejillaIncidencias',compact('incidencias'),['count'=>$count, 'ordenar'=>$ordenar]);
  }
    
   

}
