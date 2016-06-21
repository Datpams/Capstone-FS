<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ftag extends Model
{
    protected $fillable = [

    		'name',
    	];


    public function flowers () {

    	return $this->belongsToMany('App\Flower');
    }
}
