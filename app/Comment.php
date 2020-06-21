<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "Comments";

    public function restaurant(){
    	return $this->belongsTo('App\Restaurant','resID','id');
    }

    public function user(){
    	return $this->belongsTo('App\User','userID','id');
    }
}
