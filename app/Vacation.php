<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    //

    public function vacationWorkings(){
    	return $this->hasMany('App\VacationWorking');
    }
}
