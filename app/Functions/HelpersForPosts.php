<?php

function getFieldsFromPost(array $fields) :array {
    $array = [];
    foreach ($fields as $f){
        switch ($f['meta_key']){
            case 'product-exist';
                $array['product-exist'] = $f['meta_value'];
                break;
            case 'product-price';
                $array['product-price'] = $f['meta_value'];
                break;
            case 'product-price2';
                $array['product-price2'] = $f['meta_value'];
                break;
            case 'product-spec1';
                $array['product-spec1'] = $f['meta_value'];
                break;
            case 'product-spec2';
                $array['product-spec2'] = $f['meta_value'];
                break;
            case 'product-youtube';
                $array['product-youtube'] = $f['meta_value'];
        }
    }
    return $array;
}

function getTopNavigate(\App\Term $brand, array &$slugs = []):array {
    $slugs[$brand->name] = $brand->slug;
    if($brand->parent){
        $brand = \App\Term::find($brand->parent);
        return getTopNavigate($brand, $slugs);
    }
    $slugs = array_reverse($slugs);
    foreach ($slugs as $k => $v){
        $i[] = $v;
        $nav[$k] = route('brand', $i);
    }
    return $nav;
}

function getYoutubeVideoId($link){
    if(!$link){
        return false;
    }
    preg_match( "/^.*(?:(?:youtu\.be\/|v\/|vi\/|u\/\w\/|embed\/)|(?:(?:watch)?\?v(?:i)?=|\&v(?:i)?=))([^#\&\?]*).*/", $link, $match );
    return $match[1];
}

function getSeo(\Illuminate\Database\Eloquent\Model $seo):array {
    $s = ['%%title%%', '%%sep%%', '%%sitename%%'];
    $r = [$seo->post_title, ' - ', 'palwood'];
    $array= [];
    $array['title'] = str_replace($s, $r, $seo->seo_title);
    $array['desc'] = str_replace($s, $r, $seo->seo_desc);
    return $array;
}
