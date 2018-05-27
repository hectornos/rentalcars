<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';
    protected $fillable = ['id','nombre','apellido','ciudad','dni','f_nac','user_id','telefono','rol','password'];
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

    //-----------------------------------------------------------------------
    //El cliente puede haber alquilado diversos coches
    //-----------------------------------------------------------------------
    public function vehiculos() {
        //return $this->hasManyThrough('App\Vehiculo','App\Alquiler');
        return $this->belongsToMany('App\Vehiculo')
                    ->as('alquileres')
                    ->withPivot('fecha');

        
    }

    //-----------------------------------------------------------------------
    //Concatenar nombre cliente
    //-----------------------------------------------------------------------
    public function getCompletoAttribute() {
        return ucfirst($this->nombre) . ' ' . ucfirst($this->apellido);
    }

    //-----------------------------------------------------------------------
    //Poner nombre y apellido en mayusculas
    //-----------------------------------------------------------------------
    public function getNomAttribute() {
        return ucfirst($this->nombre);
    }
    public function getApeAttribute() {
        return ucfirst($this->apellido);
    }
    public function getCiuAttribute() {
        return ucfirst($this->ciudad);
    }

    public $timestamps = false;
    
}
