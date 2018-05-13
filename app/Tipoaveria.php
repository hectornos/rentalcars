<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
El modelo TipoAveria hace referencia a la tabla tipoaverias.
Las averías pueden ser de un tipo determinado, a escoger de entre aquellos que 
esten en dicha tabla.
*/

class Tipoaveria extends Model
{
	protected $table = 'tipoaverias';
    protected $fillable = ['id','nombre'];
	//-----------------------------------------------------------------------
    //El tipo de averia puede ser compartido por varias averias
    //-----------------------------------------------------------------------
    public function averias(){
    	return $this->hasMany('App\Averia');
    	
    }
    public $timestamps = false;

    public function getNomAttribute() {
        return ucfirst($this->nombre);
    }
}
