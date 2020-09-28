<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Term;


class Brand extends Controller
{
    public function get($parent, $child = null)
    {
        if($child){
            $brand = Term::where('slug', '=', $child)->firstOrFail();

            $products = $this->generateProducts($brand);
            $blade = 'products';
        }
        else {
            $brand = Term::where('slug', '=', $parent)->firstOrFail();

            $children = $this->hasChild($brand);
            if ($children) {
                $products = $this->generateChildren($children);
                $blade = 'brands';
            }
            else {
                $products = $this->generateProducts($brand);
                $blade = 'products';

            }
        }
        //dd($blade);
        return view('pages.brand', [
            'brand' => $brand,
            'seo' => getSeo($brand),
            'topNav' => getTopNavigate($brand),
            'products' => $products,
            'blade' => $blade
        ]);
    }

    private function hasChild(Term $brand)
    {
        $brands = Term::where('parent', '=', $brand->id)->get();

        if($brands->isEmpty()){
            return null;
        }
        else{
            return $brands;
        }
    }

    private function generateChildren($children) :array
    {
        $children = $children->toArray();

        foreach ($children as $k => $v){
            $a = Attachment::select('guid')->where('id', $v['thumbnail'])->first();
            $children[$k]['thumb_path'] = $a->guid;
        }
        return $children;
    }

    private function generateProducts(Term $brand)
    {
        return $products = $brand->posts->toarray();
    }
}
