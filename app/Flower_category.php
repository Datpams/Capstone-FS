<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flower_category extends Model
{
    protected $table = 'flower_category';//this method overrides the snake case
    									 //flower_category refers to the table in our database :)

    public function flower () {

    	return $this->belongsToMany('App\Flower');
    }
}
