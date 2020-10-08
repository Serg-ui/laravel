<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Post;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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

    public function productEdit(Request $request)
    {

        $product = Post::where('post_name', '=', $request->slug)->firstOrFail();
        $meta = $product->meta();

        /*echo "<pre>";
        print_r($request->all());
        die;*/
        if(isset($request->price2)){
            $meta->updateOrCreate(['meta_key' => 'product-price2'], ['meta_value' => $request->price2]);
        }
        if(isset($request->price1)){
            $meta->updateOrCreate(['meta_key' => 'product-price'], ['meta_value' => $request->price1]);
        }

        if(isset($request->exist)){
            $meta->updateOrCreate(['meta_key' => 'product-exist'], ['meta_value' => $request->exist]);
        }

        if($request->cat){
            $terms = $product->terms();
            foreach ($request->cat as $category){
                if($category['checked'] === 'true'){
                    $terms->attach($category['value']);
                }
                else{
                    $terms->detach($category['value']);
                }
            }
        }

        if($request->brand){
            $brandId = $product->brand_id;
            $product->brand_id = $request->brand;
            $product->save();
            $product->terms()->detach($brandId);
            $product->terms()->attach($request->brand);
        }

        if($request->thumbnail){
            $thumb = Attachment::find($request->thumbnail);
            $product->thumbnail = $thumb->id;
            $product->thumbnail_path = $thumb->guid;
            $product->save();
            $meta->updateOrCreate(['meta_key' => '_thumbnail_id'], ['meta_value' => $thumb->id]);
        }

        if($request->spec1){
            $meta->updateOrCreate(['meta_key' => 'product-spec1'], ['meta_value' => $request->spec1]);
        }

        if($request->spec2){
            $meta->updateOrCreate(['meta_key' => 'product-spec2'], ['meta_value' => $request->spec2]);
        }

        if($request->slider){
            $slider = $meta
                ->where('meta_key', '=','product-images' );
            $slider->delete();

            foreach ($request->slider as $img) {
                $slider->create(['meta_key' => 'product-images',
                    'meta_value' => $img])->save();
            }
        }
    }
}
