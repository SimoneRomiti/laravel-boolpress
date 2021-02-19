<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;

    public function post(){
        return $this->belongsTo('App\Post');
    }

    protected $fillable = [
        'author',
        'text',
        'published_at',
        'post_id'
    ];
}
