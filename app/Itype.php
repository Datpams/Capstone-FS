<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itype extends Model
{
    protected $fillable = [
    	
	    	'name',
		];


    public function other_items () {

    	return $this->hasMany('App\other_item');
    }
}
