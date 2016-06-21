<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment_method extends Model
{
        protected $fillable = ['payment_name', 'payment_desc'];

}
