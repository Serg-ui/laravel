<?php
if(!function_exists('storeImage')){
    function getPathForNewImage() :array {
        $p = base_path('public/assets/');
        $year = date('Y');
        $mon = date('m');
        $dir = $p . "uploads/$year/$mon";
        if(!is_dir($dir)){
            mkdir($dir);
        }

        $path['store'] = $p . "uploads/$year/$mon";
        $path['forDataBase'] = "uploads/$year/$mon/";
        return $path;
    }
}
if(!function_exists('createImgThumbnails')){
    function createImgThumbnails(string $path, string $fileName, string $ext){
        $size =[
            150 => '-thumb',
            350 => '-small',
            600 => '-medium',
            1200 => '-large'
        ];

        $imgStr = file_get_contents($path . '/' . $fileName . ".$ext");
        $img = imagecreatefromstring($imgStr);
        imagewebp($img, $path . '/' . $fileName . '.webp');

        $imgWidth = imagesx($img);

        foreach ($size as $k => $v){
            if ($imgWidth > $k) {
                $imgNewSize = imagescale($img, $k);

                if($ext === 'jpg' or $ext === 'jpeg'){
                    imagejpeg($imgNewSize, $path . '/' . $fileName . $v .  '.' . $ext);
                }
                if($ext === 'png'){
                    imagepng($imgNewSize, $path . '/' . $fileName . $v .  '.' . $ext);
                }
                imagewebp($imgNewSize, $path . '/' . $fileName . $v . '.webp');

            }
        }
    }
}
