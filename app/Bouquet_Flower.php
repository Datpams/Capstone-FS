<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bouquet_Flower extends Model
{
    protected $table = 'bouquets_flowers';

    protected $fillable = ['bouquet_id', 'flower_id', 'quantity'];
}
