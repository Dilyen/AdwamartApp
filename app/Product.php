<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function item(){
    	return $this->belongsTo(Item::class);
    }

    public function cart(){
    	return $this->hasMany(Cart::class);
    }
}
