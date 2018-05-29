<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incidencias as Incidencias;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;
use Barryvdh\DomPDF\Facade as PDF;

class IncidenciaController extends Controller
{
    //Listado completo de incidencias
    public function index (Request $request) {
      //Si lo que queremos es imprimir...
      if ($request->has('imp')){
        if ($request->busqueda!=""){
          if ($request->filtro == 'matricula') {
            $incidencias = Incidencia::join('cliente_vehiculo','incidencias.alquiler_id','=','cliente_vehiculo.id')
                            ->join('vehiculos','cliente_vehiculo.vehiculo_id','=','vehiculos.id')
                            ->select('incidencias.*')
                            ->where('vehiculos.matricula',$request->busqueda)
                            ->orderBy('cliente_vehiculo.fecha','desc')
                            ->get();
                  $file = 'incidencias-'.$request->filtro.'-'.$request->busqueda.'.pdf';
            }elseif ($request->filtro == 'apellido') {
            $incidencias = Incidencia::join('cliente_vehiculo','incidencias.alquiler_id','=','cliente_vehiculo.id')
                            ->join('clientes','cliente_vehiculo.cliente_id','=','clientes.id')
                            ->select('incidencias.*')
                            ->where('clientes.apellido',$request->busqueda)
                            ->orderBy('cliente_vehiculo.fecha','desc')
                            ->get();
                  $file = 'incidencias-'.$request->filtro.'-'.$request->busqueda.'.pdf';
          }        
        }else{
            $incidencias = Incidencia::all();
            $file = 'incidencias.pdf';
        }
        $pdf = PDF::loadView('pdf.incidenciasPDF',compact('incidencias'))->setPaper('a4', 'landscape');
        return $pdf->download($file);
      }

      if ($request->has('criterio')){
        $orden = $request->criterio;
        if ($orden == 'fecha'){
          $incidencias = Incidencia::join('cliente_vehiculo as c', 'c.id','=','incidencias.alquiler_id')
                                    ->select('incidencias.*')
                                    ->orderBy('c.fecha', 'asc')
                                 
                                    ->paginate(8);    
        }elseif ($orden == 'conductor') {
          $incidencias = Incidencia::join('cliente_vehiculo', 'incidencias.alquiler_id','=','cliente_vehiculo.id')
                                    ->join('clientes', 'cliente_vehiculo.cliente_id', '=', 'clientes.id')
														        ->select('incidencias.*')
                                    ->orderBy('clientes.apellido','asc')
                                    ->paginate(8);
        }elseif ($orden == 'matricula') {
          $incidencias = Incidencia::join('cliente_vehiculo', 'incidencias.alquiler_id','=','cliente_vehiculo.id')
                                    ->join('vehiculos', 'cliente_vehiculo.vehiculo_id', '=', 'vehiculos.id')
                                    ->select('incidencias.*')
                                    ->orderBy(\DB::raw('substr(vehiculos.matricula,5,3)'))
                                    ->orderBy(\DB::raw('substr(vehiculos.matricula,1,4)'))
                                    ->paginate(8);
        }else{
          $incidencias = Incidencia::orderBy($orden)->paginate(8);
        }
      }else{
        if ($request->busqueda!=""){
          if ($request->filtro == 'matricula') {
            $incidencias = Incidencia::join('cliente_vehiculo','incidencias.alquiler_id','=','cliente_vehiculo.id')
                            ->join('vehiculos','cliente_vehiculo.vehiculo_id','=','vehiculos.id')
                            ->select('incidencias.*')
                            ->where('vehiculos.matricula',$request->busqueda)
                            ->orderBy('cliente_vehiculo.fecha','desc')
                            ->paginate(8);
          }elseif ($request->filtro == 'apellido') {
            $incidencias = Incidencia::join('cliente_vehiculo','incidencias.alquiler_id','=','cliente_vehiculo.id')
                            ->join('clientes','cliente_vehiculo.cliente_id','=','clientes.id')
                            ->select('incidencias.*')
                            ->where('clientes.apellido',$request->busqueda)
                            ->orderBy('cliente_vehiculo.fecha','desc')
                            ->paginate(8);
          }        
        }else{
          if ($request->date1 != "" && $request->date2 != "") {
            $incidencias = Incidencia::join('cliente_vehiculo','incidencias.alquiler_id','=','cliente_vehiculo.id')
                              ->select('incidencias.*')
                              ->whereBetween('cliente_vehiculo.fecha', [$request->date1, $request->date2])
                              ->orderBy('cliente_vehiculo.fecha','desc')
                              ->paginate(8);
          } else {
            $incidencias = Incidencia::paginate(8);
          }
        } 
      }
      $ordenar = true;
      $count = $incidencias->count();
      return \View::make('Incidencia/rejillaIncidencias',compact('incidencias'),['count'=>$count, 'ordenar'=>$ordenar]);
  }
  
  //Detalle de un alquiler dado su id (primary key)
  public function create($alquiler_id) {
    $alquiler = Alquiler::find($alquiler_id);
    return \View::make('Incidencia/createIncidencia',['alquiler'=>$alquiler]);
  }

  //Detalle de un alquiler dado su id (primary key)
  public function show($id) {
    $incidencia = Incidencia::find($id);
    return \View::make('Incidencia/showIncidencia',compact('incidencia'));
  }

  //Metodo de añadir una incidencia
	public function store(Request $request) {
      $incidencia = Incidencia::create(['alquiler_id' => $request->alquiler_id, 'descripcion'=>$request->descripcion]);
			$alerta = 'Creado';
			$mensaje = "Incidencia para vehiculo ".$request->matricula. " añadida.";
		return redirect(url('/Vehiculo'))->with($alerta,$mensaje);
  }

  //Metodo de borrar un alquiler
  public function destroy(Request $request) {
    if ($request->has('cancel')) {
      $alerta = 'Cancelado';
      $mensaje = 'Operacion cancelada';
    } else {
      $incidencia = Incidencia::find($request->id);
      $incidencia -> delete();
      $alerta = 'Borrado';
      $mensaje = "Incidencia borrada.";
    }
    return redirect(url('/Incidencia'))->with($alerta,$mensaje);
  }

  //Editar un alquiler
  public function edit($id) {
      $incidencia = Incidencia::find($id);
      return \View::make('Incidencia/editIncidencia',compact('incidencia'));
  }

  /*Cancela operación, lleva al index.
    @ Recibe: Request con mensaje a mostrar
    @ Devuelve: */
	public function cancel(Request $request) {
		$alerta = 'Cancelado';
		$mensaje = $request->mensaje;
		$incidencias = Incidencia::all();
		return redirect(url('/Incidencia'))->with($alerta,$mensaje,$incidencias);
	}

  //Almacena los cambios realizados en la incidencia
	public function update(Request $request) {
		$alerta = 'Modificado';
    $mensaje = "Incidencia para vehiculo ".$request->matricula. " modificada.";
    Incidencia::find($request->id)->update($request->all());
    return redirect(url('/Incidencia'))->with($alerta,$mensaje);
  }

    /*Imprimir en pdf una incidencia
    @ Recibe: id de incidencia
    @ Devuelve: pdf creado*/
    public function pdf($id) {
      $incidencia = Incidencia::find($id);
      $pdf = PDF::loadView('pdf.incidenciaPDF',compact('incidencia'));
      return $pdf->download('incidencia'.$incidencia->id.'detalle.pdf');
  }
  
}
