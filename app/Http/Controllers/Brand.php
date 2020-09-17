<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Brand extends Controller
{
    public function get($parent, $child, $child2)
    {
        dump($parent, $child);
    }
}
