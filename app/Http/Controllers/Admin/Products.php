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
        $brandsList = Term::where('id_taxonomy', 1)->where('name', '<>', 'Ferri')->get();
        $categoryList = Term::where('id_taxonomy', 3)->get();
        $brand = $product->brands()->first();
        $categories = $product->categories;
        $categoryList = $categoryList->diff($categories);

        $metaFields = $product->meta;
        $meta = [];

        $meta['productExist'] = $metaFields->where('meta_key', 'product-exist')->first();
        $meta['price1'] = $metaFields->where('meta_key', 'product-price')->first();
        $meta['price2'] = $metaFields->where('meta_key', 'product-price2')->first();
        $meta['spec1'] = $metaFields->where('meta_key', 'product-spec1')->first();
        $meta['spec2'] = $metaFields->where('meta_key', 'product-spec2')->first();

        $imagesId = $product->meta()->where('meta_key', '=', 'product-images')->get()->toArray();
        $images = Attachment::find(array_column($imagesId, 'meta_value'));

        return view('admin.brandsEdit', [
            'product' => $product,
            'images' => $images,
            'brandsList' => $brandsList,
            'categoryList' => $categoryList,
            'brand' => $brand,
            'categories' => $categories,
            'meta' => $meta
        ]);
    }
}
