<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    public $timestamps = false;
    protected $fillable = ['seo_title', 'seo_desc'];
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
