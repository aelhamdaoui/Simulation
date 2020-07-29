<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;

class Salle extends Model
{
    use SoftDeletes;
    public $table = "salles";

    public function formations(){
    	return $this->belongstoMany('App\Salle');
    }
}
