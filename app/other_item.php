<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class other_item extends Model
{
  //  protected $fillable = ['item_name', 'item_desc', 'item_image', 'price', 'itype_id'];

    public function itype () {

    	return $this->belongsTo('App\Itype');
    }

}
