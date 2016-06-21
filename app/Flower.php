<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    protected $fillable = ['desc', 'name', 'price', 'fimage'];   

    public function bouquet () {

    	return $this->belongsToMany('App\Bouqet', 'bouquets_flowers');
    }

    public function ftags () {

    	return $this->belongsToMany('App\Ftag')->withTimestamps();
    }
}
