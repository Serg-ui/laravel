<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Post;
use App\Models\Term;
use Illuminate\Http\Request;

class Products extends Controller
{
    public function index()
    {
        $products = Post::where('post_type', '=', 'product')
            ->orderBy('id', 'desc')
            ->get();
        $brands = Term::where('id_taxonomy', 1)->select('name', 'slug')->get();
        $top = Term::where('id_taxonomy', 3)->select('name', 'slug')->get();

        return view('admin.brands', [
            'product' => $products,
            'brands' => $brands,
            'tops' => $top
        ]);
    }

    public function edit(Request $request)
    {
        $product = Post::where('post_name', $request->id)->firstOrFail();
        $imagesId = $product->meta()->where('meta_key', '=', 'product-images')->get()->toArray();

        $images = Attachment::find(array_column($imagesId, 'meta_value'));

        return view('admin.brandsEdit', [
            'product' => $product,
            'images' => $images
        ]);
    }
}
