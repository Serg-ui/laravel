<?php

namespace App\Http\Controllers;

use App\Models\Post;

class News extends Controller
{
    public function get($name)
    {
        $post = Post::where('post_name' ,'=', $name)->first();

        if(!$post){
            abort(404);
        }



        return view('pages.news', [
            'post' => $post
        ]);

    }
}
