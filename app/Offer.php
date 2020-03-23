<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
     public function item(){
    	return $this->hasMany(Item::class);
    }

    public function category(){
    	return $this->hasMany(Category::class);
    }
}
