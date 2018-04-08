<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Alquiler extends Model
{
    protected $fillable=['id','cliente_id','vehiculo_id','fecha_fin'];

    protected $table='alquilers';

//------------------------------------------------------------------------
//El alquiler se efectua sobre un vehiculo
//-----------------------------------------------------------------------
    public function vehiculo(){
    	return $this->hasOne('App\Vehiculo','id','vehiculo_id');
    	
    }
//------------------------------------------------------------------------
//El alquiler lo efectua un cliente
//-----------------------------------------------------------------------
    public function cliente(){
    	return $this->hasOne('App\Cliente','id','cliente_id');
    	
    }
//------------------------------------------------------------------------
//El alquiler puede tener varias incidencias
//-----------------------------------------------------------------------
    public function incidencias(){
    	return $this->hasMany('App\Incidencia');
    	
    }

}
