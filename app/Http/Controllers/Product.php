<?php

namespace App\Http\Controllers;



use App\Attachment;
use App\Post;
use App\PostMeta;
use App\Term;

class Product extends Controller
{
   public function get($name)
   {
       $product = Post::with('meta')->where('post_name', '=', $name)->first();
       $brand = Term::find($product->brand_id);
       $productMeta = $product->meta->toarray();

       $productImages = array_filter($productMeta, function ($k){
           return $k['meta_key'] === 'product-images';
       });

       $productImagesKeys =[];
       foreach ($productImages as $i){
           $productImagesKeys[] = $i['meta_value'];
       }

       $seo = getSeo($product);
       $slider = Attachment::find($productImagesKeys);
       $fields = getFieldsFromPost($productMeta);
       $topNav = getTopNavigate($brand);
       $youtubeLink = getYoutubeVideoId(@$fields['product-youtube']);

       return view('pages.product', [
           'seo' => $seo,
           'product' => $product,
           'slider' => $slider,
           'fields' => $fields,
           'topNav' => $topNav,
           'assetsUrl' => url('/assets/'),
           'youtube' => $youtubeLink
       ]);
   }
}
