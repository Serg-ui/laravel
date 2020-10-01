<?php

namespace App\Console\Commands;

use App\Models\Attachment;
use Illuminate\Console\Command;

class ResizeImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate differents image sizes and extensions';

    protected $size =[
        150 => '-thumb',
        350 => '-small',
        600 => '-medium',
        1200 => '-large'
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $imga = Attachment::all();

        foreach ($imga as $img) {
            $r = explode('/', $img->guid);
            $fileName = $r[count($r) - 1];
            $ex = explode('.', $fileName);
            $ex = $ex[count($ex) - 1];
            $tmp = explode('.', $fileName);
            $fileNameClear = $tmp[0];

            if($ex === 'jpg' or $ex === 'jpeg' or $ex === 'png') {
                if($fileName !== 'welding.jpg') {
                    $p = base_path('public/assets/uploads/2020/04');
                    $path = $p . '/' . $fileName;
                    $newPath = base_path('public/assets/uploads/2020/04_new/');
                    $imgStr = file_get_contents($path);
                    if ($imgStr) {
                        copy($path, $newPath . $fileName);
                        $img = imagecreatefromstring($imgStr);
                        imagewebp($img, $newPath . $fileNameClear . '.webp');
                        $width = imagesx($img);
                        foreach ($this->size as $k => $v) {
                            if ($width > $k) {
                                $imgRez = imagescale($img, $k);
                                $fileNameNew = $fileNameClear . $v;
                                $this->doImage($fileNameNew, $ex, $imgRez, $newPath);
                            }
                        }
                        imagedestroy($img);
                    }
                }
            }
        }
        return 1;
    }

    private function doImage($fileName, $ex, $img, $path)
    {
        if($ex === 'jpg' or $ex === 'jpeg'){
            imagejpeg($img, $path . $fileName . '.' . $ex);
            echo $fileName . '.' . $ex . "...done\n\r";
        }
        if($ex === 'png'){
            imagepng($img, $path . $fileName . '.' . $ex);
            echo $fileName . '.' . $ex . "...done\n\r";
        }
        imagewebp($img, $path . $fileName . '.webp');
        echo $fileName . '.wepb' . "...done\n\r";
    }
}
