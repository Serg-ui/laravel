<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;


    public function meta()
    {
        return $this->hasMany('App\PostMeta', 'id_post');
    }

    public function terms(){
        return $this->belongsToMany(Term::class);
    }

  //  public function getPostTypeAttribute($key)
   // {
    //    return $key . '12gfhfhfgh3';
    //}
}
