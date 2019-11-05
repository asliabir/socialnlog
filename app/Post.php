<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    private $body;

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function likes(){
        return $this->hasOne('App\Like');
    }
}
