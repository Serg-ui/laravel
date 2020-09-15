<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    public $timestamps = false;
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
