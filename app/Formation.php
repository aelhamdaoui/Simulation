<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;


class Formation extends Model
{
	
	
    use SoftDeletes;

    
    
    public function participants(){
        return $this->belongsToMany('App\Participant','formation_participant')->withPivot('participant_id','formation_id','encadrant');

    }

    public function materiels(){
        return $this->belongsToMany('App\Materiel','materiel_formation');
    }

    public function salles(){
        return $this->belongsToMany('App\Salle','salle_formation');
    }

    public function user(){
        return $this->belongsTo('App\User');

    }

}
