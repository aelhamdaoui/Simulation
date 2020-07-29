<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;

class Participant extends Model
{

	    use SoftDeletes;
	    
    public function typeParticipant(){
    	return $this->belongsTo('App\Type_participant');
    }

    public function formations(){
    	return $this->belongsToMany('App\Formation','formation_participant');
    }
}
