<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class Index extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
