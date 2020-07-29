<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_participant extends Model
{
    public function participants(){
    	return $this->hasmany('App\Participant');
    }
}
