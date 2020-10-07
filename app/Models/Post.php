<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;


    public function meta()
    {
        return $this->hasMany(PostMeta::class, 'id_post');
    }

    public function terms(){
        return $this->belongsToMany(Term::class);
    }

    public function categories(){
        return $this->belongsToMany(Term::class)->where('id_taxonomy', '<>', 1);
    }
    public function brands(){
        return $this->belongsToMany(Term::class)->where('id_taxonomy', '=', 1)
            ->where('name', '<>', 'Ferri');
    }

  //  public function getPostTypeAttribute($key)
   // {
    //    return $key . '12gfhfhfgh3';
    //}
}
