<?php

namespace App\Http\Controllers;

use App\Models\Post;

class News extends Controller
{
    public function get($name)
    {
        $post = Post::where('post_name' ,'=', $name)->firstOrFail();

        return view('pages.news', [
            'post' => $post
        ]);

    }
}
