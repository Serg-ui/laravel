<?php

namespace App\Http\Controllers;


use App\Attachment;
use App\MyClasses\SortProductsByBrands;
use App\MyInterfaces\SortProductInterface;
use App\Post;
use App\Term;
use Illuminate\Support\Facades\App;

class Main extends Controller
{
    public function Index(SortProductInterface $sort)
    {
        $brands = Term::where('id_taxonomy', 1)->get()->toarray();
        $products = Term::find(26)->posts->toarray();

       /* $terms3 = Term::with('posts')->where([['id_taxonomy', 1], ['name','<>', 'Ferri']])->get();
        foreach ($terms3 as $t){
            dump($t->name);
            dump($t->posts);
        }*/

        $inLeft = [13, 17, 18];

        $sort->doSort($brands, $products, $inLeft);
        $title = 'Привет';

        return view('pages.main', [
            'left' => $sort->leftColumn(),
            'right' => $sort->rightColumn(),
            'title' => $title
        ]);

    }
}

