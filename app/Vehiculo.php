<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $fillable=['id','disponible','tipo_id','color_id','combustible_id','cambio_id','marca_id','modelo','matricula'];

    protected $table='vehiculos';

    //-----------------------------------------------------------------------
    //El vehiculo tiene una de estas propiedades
    //-----------------------------------------------------------------------

    public function tipo(){
    	return $this->hasOne('App\Tipo','id','tipo_id');
    	
    }
    public function color(){
    	return $this->hasOne('App\Color','id','color_id');
    	
    }
    public function combustible(){
    	return $this->hasOne('App\Combustible','id','combustible_id');
    	
    }
    public function cambio(){
    	return $this->hasOne('App\Cambio','id','cambio_id');
    	
    }
    public function marca(){
    	return $this->hasOne('App\Marca','id','marca_id');
    	
    }

    //-----------------------------------------------------------------------
    //El vehiculo tiene muchas averias y alquileres.
    //-----------------------------------------------------------------------

    public function averias(){
    	return $this->hasMany('App\Averia');
    }

    public function alquileres(){
        return $this->hasMany('App\Alquiler');
    }

    //-----------------------------------------------------------------------
    //El vehiculo tiene varias incidencias asociadas a los alquileres
    //-----------------------------------------------------------------------
    public function incidencias(){
        return $this->hasManyThrough('App\Incidencia','App\Alquiler');
            
    }
    //-----------------------------------------------------------------------
    //El vehiculo tiene varios clientes que lo han alquilado
    //-----------------------------------------------------------------------
    public function clientes(){
        return $this->hasManyThrough('App\Cliente','App\Alquiler');
            
    }
    public $timestamps = false;

}
