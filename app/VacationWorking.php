<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacationWorking extends Model
{
    //
    public function vacation(){
    	return $this->belongsTo('App\Vacation');
    }
}
