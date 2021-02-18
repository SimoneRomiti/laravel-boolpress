<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function info(){
        return $this->hasOne('App\InfoPost');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
