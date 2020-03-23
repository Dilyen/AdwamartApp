<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
   public function item(){
    	return $this->belongsTo(Item::class);
    }
}
