<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $table = "post_meta";
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
