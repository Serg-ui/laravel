<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    protected $table = "post_meta";
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
