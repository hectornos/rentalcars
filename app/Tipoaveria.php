<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
