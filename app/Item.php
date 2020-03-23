<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
     public function product(){
    	return $this->hasMany(Product::class);
    }

    public function offer(){
    	return $this->hasMany(Offer::class);
    }

     public function deal(){
    	return $this->hasMany(Deal::class);
    }
}
