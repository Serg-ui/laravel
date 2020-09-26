<?php

namespace App\Http\Controllers;

use App\MyInterfaces\SortProductInterface;
use App\Models\Post;
use App\Models\Term;

class Main extends Controller
{
    public function Index(SortProductInterface $sort)
    {
        $brands = Term::where('id_taxonomy', 1)
            ->get()
            ->toarray();
        $products = Term::find(26)
            ->posts
            ->toarray();
        $topSale = Term::find(24)
            ->posts()
            ->select('post_name', 'post_title', 'thumbnail_path')
            ->get();
        $news = Post::with(['meta' => function($query){
            $query
                ->where('meta_key', '=', '_thumbnail_id');
            }])
            ->where('post_type', 'post')
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();




       /* $terms3 = Term::with('posts')->where([['id_taxonomy', 1], ['name','<>', 'Ferri']])->get();
        foreach ($terms3 as $t){
            dump($t->name);
            dump($t->posts);
        }
        dump($terms3);*/
        $inLeft = [13, 17, 18];

        $sort->doSort($brands, $products, $inLeft);
        $title = 'Привет';
        $productUrl = route('product', '');
        $newsUrl = route('news', '');
        //$brands = getBrandsUrl($brands);
        //dd($brands);
        return view('pages.main', [
            'left' => $sort->leftColumn(),
            'right' => $sort->rightColumn(),
            'top' => $topSale,
            'news' => $news,
            'title' => $title,
            'productUrl' => $productUrl,
            'newsUrl' => $newsUrl,
            'brands' => $brands
        ]);

    }
}

