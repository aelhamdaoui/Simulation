<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;

class Materiel extends Model
{
    use SoftDeletes;
	    
    public function catMateriel(){
    	return $this->belongsTo('App\Cat_materiel');

    }
}
