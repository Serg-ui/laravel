<?php

namespace App\Http\Controllers;



use App\Models\Attachment;
use App\Models\Post;
use App\Models\Term;

class Product extends Controller
{
   public function get($name)
   {
       $product = Post::with('meta')->where('post_name', '=', $name)->firstOrFail();

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
       $ajaxUrlRequest = route('send_mail');

       return view('pages.product', [
           'seo' => $seo,
           'product' => $product,
           'slider' => $slider,
           'fields' => $fields,
           'topNav' => $topNav,
           'youtube' => $youtubeLink,
           'ajaxUrl' => $ajaxUrlRequest
       ]);
   }
}
