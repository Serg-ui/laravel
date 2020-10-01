<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Post;
use App\Models\Term;
use Illuminate\Http\Request;

class Ajax extends Controller
{
    public function productsFilter(Request $request)
    {
        $inputs = $request->except('_token');
        $fields = ['id', 'post_name', 'post_title'];

        if(!array_filter($inputs)){
            return view('admin.api.productsList', [
                'product' => Post::where('post_type', '=', 'product')
                    ->select($fields)
                    ->get()

            ]);

        }

        foreach ($inputs as $k => $v){
            $terms = Term::where('slug', '=', $v)->get();
            foreach ($terms as $term){
                $products = $term->posts()
                    ->select($fields)
                    ->get();
                if($products){
                    $res[] = $products;
                }
            }
        }

        if(!empty($res)) {
            $c = count($res);
            $return = $res[0];

            if ($c > 1) {
                //$return = $res[0]->intersect($res[1]);
                for ($i = 0; $i <= $c - 1; $i++) {
                    if (isset($res[$i + 1])) {
                        $return = $res[$i]->intersect($res[$i + 1]);
                    }
                }
            }
        }

        if($request->find){
            $f = Post::where('post_title', 'like', "%$request->find%")
                ->select($fields)
                ->get();
            if(!empty($res)) {
                $return = $return->intersect($f);
            }
            else{
                $return = $f;
            }
        }

        return view('admin.api.productsList', [
            'product' => $return
        ]);
    }

    public function images(Request $request)
    {
        if($request->filter){
            return view('admin.api.imagesList', [
                'images' => Attachment::select('id', 'post_title', 'guid')
                    ->where('post_title', 'like', "%$request->filter%")
                    ->get()
            ]);
        }
        return view('admin.api.imagesList', [
            'images' => Attachment::select('id', 'post_title', 'guid')->take(5)->get()
        ]);
    }
}
