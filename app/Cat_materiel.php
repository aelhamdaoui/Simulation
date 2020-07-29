<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat_materiel extends Model
{
    public function materiels(){
    	return $this->hasmany('App\Materiel');
    }
}
