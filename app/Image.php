<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'link',
        'alt'
    ];

    public $timestamps = false;

    public function posts(){
        return $this->belongsToMany('App\Post', 'post_image');
    }
}
