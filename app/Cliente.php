<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';
    protected $fillable = ['id','nombre','apellido','ciudad','dni','f_nac','user_id'];
	//-----------------------------------------------------------------------
    //El cliente tiene varios alquileres
    //-----------------------------------------------------------------------
    public function alquileres(){
    	return $this->hasMany('App\Alquiler');
    		
    }
    //-----------------------------------------------------------------------
    //El cliente tiene varias incidencias asociadas a los alquileres
    //-----------------------------------------------------------------------
    public function incidencias(){
    	return $this->hasManyThrough('App\Incidencia','App\Alquiler');
    		
    }

}
