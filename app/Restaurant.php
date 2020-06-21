<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //
    protected $table = "Restaurants";
    public function comment(){
    	return $this->hasMany('App\Comment','resID','id');
    }

    public function user(){
        return $this->belongsTo('App\User','userID','id');
    }
}
