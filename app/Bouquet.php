<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bouquet extends Model
{
    protected $fillable = ['desc', 'name', 'fimage'];

    public function flower () {

    	return $this->belongsToMany('Flower', 'bouquets_flowers');
    }
}
