<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;
use App\Marca as Marca;
use App\Tipo as Tipo;
use App\Combustible as Combustible;
use App\Cambio as Cambio;
use App\Color as Color;
use Barryvdh\DomPDF\Facade as PDF;
class VehiculoController extends Controller {
    /*Listado completo de vehiculos.
    @ Recibe: Criterios de ordenación o de filtro.
    @ Devuelve: Objeto vehiculos y count de vehiculos.
    */
    public function index(Request $request) {
        //Si lo que queremos es imprimir...
        if ($request->has('imp')){
            if ($request->busqueda!=""){
                $vehiculos = Vehiculo::where($request->filtro,$request->busqueda)
                                        ->orderBy(\DB::raw('substr(matricula,5,3)'))
                                        ->orderBy(\DB::raw('substr(vehiculos.matricula,1,4)'))
                                        ->paginate(8);
                $file = 'vehiculos-'.$request->filtro.'-'.$request->busqueda.'.pdf';
            }else{
                $vehiculos = Vehiculo::all();
                $file = 'vehiculos.pdf';
            }
            $pdf = PDF::loadView('pdf.vehiculosPDF',compact('vehiculos'))->setPaper('a4', 'landscape');
            return $pdf->download($file);
        }
        
        if ($request->has('criterio')){
            $orden = $request->criterio;
            if ($orden == 'alquileres') {
              $vehiculos = Vehiculo::join('cliente_vehiculo', 'vehiculos.id','=','cliente_vehiculo.vehiculo_id', 'left outer')
                                ->select('vehiculos.*',DB::raw('count(vehiculo_id) as vehi_count'))
                                ->groupBy('vehiculos.id')
                                ->orderBy('vehi_count','desc')
                                ->paginate(8);
            } elseif ($orden == 'averias') {
              $vehiculos = Vehiculo::join('averias', 'vehiculos.id','=','averias.vehiculo_id','left outer')
                                ->select('vehiculos.*',DB::raw('count(vehiculo_id) as vehi_count'))
                                ->groupBy('vehiculos.id')
                                ->orderBy('vehi_count','desc')
                                ->paginate(8);
            } elseif ($orden == 'marca') {
              $vehiculos = Vehiculo::join('marcas', 'vehiculos.marca_id','=','marcas.id')
                                ->select('vehiculos.*')
                                ->orderBy('marcas.nombre','desc')
                                ->paginate(8);                                
            } elseif ($orden == 'matricula') {
              $vehiculos = Vehiculo::orderBy(\DB::raw('substr(matricula,5,3)'))
                                ->orderBy(\DB::raw('substr(vehiculos.matricula,1,4)'))
                                ->paginate(8);                             
            } elseif ($orden == 'dispo') {
              $vehiculo = Vehiculo::find($request->vehiculo_id);
              if ($vehiculo->disponible == '0'){
                $vehiculo->disponible='1';
              }else{
                $vehiculo->disponible='0';
              }
              $vehiculo->save();
              $vehiculos = Vehiculo::paginate(8);
            } else {
              $vehiculos = Vehiculo::orderBy($orden)->paginate(8);
            }
        }else{
            if ($request->busqueda!=""){
                $vehiculos = Vehiculo::where($request->filtro,$request->busqueda)
                                        ->orderBy(\DB::raw('substr(matricula,5,3)'))
                                        ->orderBy(\DB::raw('substr(vehiculos.matricula,1,4)'))
                                        ->paginate(8);               
			}else{
				//POR AQUI PASA LA PRIMERA VEZ, TAL CUAL CARGA LA APLICACION
				$vehiculos = Vehiculo::paginate(8);               
			}              
			
        }
        $count = Vehiculo::all()->count();
        return \View::make('Vehiculo/rejillaVehiculos',compact('vehiculos'),['count'=>$count]);
    }
    /*Pantalla para crear un vehiculo nuevo
    @ Recibe:
    @ Devuelve: marcas, tipos, cambios, combustibles y colores */
	public function create() {
        $marcas = Marca::all();
        $tipos = Tipo::all();
        $cambios = Cambio::all();
        $combustibles = Combustible::all();
        $colors = Color::all();
        return \View::make('Vehiculo/createVehiculo',['marcas'=>$marcas,'tipos'=>$tipos,'cambios'=>$cambios,'combustibles'=>$combustibles,'colors'=>$colors]);
	}
    /*Metodo de añadir un vehiculo
    @ Recibe: Request con campos a insertar.
    @ Devuelve: */
	public function store(Request $request) { //Recibe campos a insertar
		Vehiculo::create($request->all());
		$alerta = 'Creado';
		$mensaje = "Vehiculo con matricula ".$request->matrciula. " añadido.";
		return redirect(url('/Vehiculo'))->with($alerta,$mensaje);
    }
    /*Pantalla para editar un vehiculo
    @ Recibe: id del vehiculo.
    @ Devuelve: marcas, tipos, cambios, combustibles y colores*/
	public function edit($id) { 
        $vehiculo = Vehiculo::find($id);
        $marcas = Marca::all();
        $tipos = Tipo::all();
        $cambios = Cambio::all();
        $combustibles = Combustible::all();
        $colors = Color::all();
		return \View::make('Vehiculo/editVehiculo',compact('vehiculo'),['marcas'=>$marcas,'tipos'=>$tipos,'cambios'=>$cambios,'combustibles'=>$combustibles,'colors'=>$colors]);
    }
    /*Almacena los cambios realizados en el vehiculo
    @ Recibe: Request con campos a editar
    @ Devuelve: */
	public function update(Request $request) {
		$alerta = 'Modificado';
        $mensaje = 'Vehiculo con matricula '. $request->matricula .' modificado';
        Vehiculo::find($request->id)->update($request->all());
        return redirect(url('/Vehiculo'))->with($alerta,$mensaje);
    }
    /*Detalle de un vehiculo para su borrado
    @ Recibe: id del vehiculo
    @ Devuelve: objeto vehiculo a borrar*/
    public function show($id) {
		$vehiculo = Vehiculo::find($id);
        return \View::make('Vehiculo/showVehiculo',compact('vehiculo'));
    }
    /*Detalle de un vehiculo
    @ Recibe: id del vehiculo
    @ Devuelve: objeto vehiculo a ver*/
    public function view($id) {
		$vehiculo = Vehiculo::find($id);
        return \View::make('Vehiculo/viewVehiculo',compact('vehiculo'));
    }
    /*Borrado de un vehiculo
    @ Recibe: request con vehiculo a borrar
    @ Devuelve: */
	public function destroy(Request $request) {
			if ($request->has('cancel')) {
				$alerta = 'Cancelado';
				$mensaje = 'Operacion cancelada';
			} else {
				$vehiculo = Vehiculo::find($request->id);
				$vehiculo -> delete();
				$alerta = 'Borrado';
				$mensaje = "Vehiculo ".$request->matricula. " ha sido borrado.";
			}
			return redirect(url('/Vehiculo'))->with($alerta,$mensaje);
    }
        
    /*Listar los alquileres de un vehiculo
    @ Recibe: id del vehiculo
    @ Devuelve: Objeto alquileres, count de alquileres, boolean ordenar, subtitulo*/
    public function listaralc($id) {
        $vehiculo = Vehiculo::find($id);
        $alquileres = Alquiler::join('vehiculos', 'vehiculos.id', '=', 'cliente_vehiculo.vehiculo_id')
                                ->select('cliente_vehiculo.*')
                                ->where('cliente_vehiculo.vehiculo_id', '=', $id)
                                ->paginate(8);
        $count = count($alquileres);
        $ordenar = false;
        $subtitulo = 'Alquileres del vehiculo: '.$vehiculo->mat;
        return \View::make('Alquiler/rejillaAlquileres',compact('alquileres'),['count'=>$count, 'ordenar'=>$ordenar, 'subtitulo'=>$subtitulo]);
    }
    /*Listar las averias de un vehiculo
    @ Recibe: id del vehiculo
    @ Devuelve: Objeto averias, count de averias, boolean ordenar, subtitulo*/
    public function listarave($id) {
        $vehiculo = Vehiculo::find($id);
        $averias = Averia::join('vehiculos', 'vehiculos.id', '=', 'averias.vehiculo_id')
                                ->select('averias.*')
                                ->where('averias.vehiculo_id', '=', $id)
                                ->paginate(8);
        $count = count($averias);
        $ordenar = false;
        $subtitulo = 'Averias del vehiculo: '.$vehiculo->mat;
        return \View::make('Averia/rejillaAverias',compact('averias'),['count'=>$count, 'ordenar'=>$ordenar, 'subtitulo'=>$subtitulo]);
    }
    /*Imprimir en pdf un vehiculo
    @ Recibe: id del vehiculo
    @ Devuelve: pdf creado*/
    public function pdf($id) {
        $vehiculo = Vehiculo::find($id);
        $pdf = PDF::loadView('pdf.vehiculoPDF',compact('vehiculo'));
        return $pdf->download($vehiculo->mat.'detalle.pdf');
    }
    /*Filtar vehiculos
    @ Recibe: request con criterios de búsqueda
    @ Devuelve: vehiculos coincidentes, count, todos los colores, tipos, cambios y combustibles*/
    public function elegir (Request $request) {
       
        if ($request->has('tipo_id') || $request->has('cambio_id') || $request->has('combustible_id') || $request->has('color_id')) {
            
            $cliente_id = $request->cliente_id;
            $vehiculos = Vehiculo::disponibles()
                                    ->cambio($request->cambio_id)
                                    ->color($request->color_id)
                                    ->combustible($request->combustible_id)
                                    ->tipo($request->tipo_id)
                                    ->get();
            $tipos = Tipo::all();
            $combustibles = Combustible::all();
            $cambios = Cambio::all();
            $coloresPrevio = Color::pluck('nombre','id')->toArray();
            $coloresZero = array('0'=>'Todos los colores');
            $colores= array_merge($coloresZero,$coloresPrevio);
            $count = count($vehiculos);
            $cliente=Cliente::find($cliente_id);
            return \View::make('Eleccion/elegirVehiculos',compact('vehiculos'),['count'=>$count,'tipos'=>$tipos, 'colores'=>$colores, 'combustibles'=>$combustibles, 'cambios'=>$cambios,'cliente_id'=>$cliente_id,'cliente'=>$cliente]);
        }
            
            //Si le hemos dado a cancel o no vienen datos (primera entrada en el selector)...
            $cliente_id = $request->cliente_id;
            $vehiculos = Vehiculo::disponibles()->get();
            $tipos = Tipo::all();
            $combustibles = Combustible::all();
            $cambios = Cambio::all();
            $coloresPrevio = Color::pluck('nombre','id')->toArray();
            $coloresZero = array('0'=>'Todos los colores');
            $colores= array_merge($coloresZero,$coloresPrevio);
            $count= count($vehiculos);
            $cliente=Cliente::find($cliente_id);
           
        return \View::make('Eleccion/elegirVehiculos',compact('vehiculos'),['count'=>$count,'tipos'=>$tipos, 'colores'=>$colores, 'combustibles'=>$combustibles, 'cambios'=>$cambios,'cliente_id'=>$cliente_id,'cliente'=>$cliente]);
    }
    /*Cancela operación, lleva al index.
    @ Recibe: Request con mensaje a mostrar
    @ Devuelve: */
	public function cancel(Request $request) {
		$alerta = 'Cancelado';
		$mensaje = $request->mensaje;
		$vehiculos = Vehiculo::all();
		return redirect(url('/Vehiculo'))->with($alerta,$mensaje,$vehiculos);
	}
}
