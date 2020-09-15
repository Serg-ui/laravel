<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Post;
use App\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product extends Controller
{
    //
    public function get()
    {
        $all = Post::all();
        dump($all);

    }

    public function term()
    {
        echo "121212";
    }
}
