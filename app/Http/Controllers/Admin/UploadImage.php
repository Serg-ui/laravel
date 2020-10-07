<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Post;
use Illuminate\Http\Request;

class UploadImage extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->file('image');
        $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $ext = $image->getClientOriginalExtension();

        $path = getPathForNewImage();
        $newName = $name . "-" . time();
        $newNameFull = $newName . ".$ext";

        $image->move($path['store'], $newNameFull);

        createImgThumbnails($path['store'], $newName, $ext);

        $attach = Attachment::create([
            'post_title' => $name,
            'guid' => $path['forDataBase'] . $newNameFull
        ]);
        $attach->save();

        Post::where('post_name', $request->id)->first()->meta()
            ->create([
                'meta_key' => 'product-images',
                'meta_value' => $attach->id
            ])->save();

        $src = url('assets') . '/' . getImgSizeUrl($attach->guid, 'thumb');

        return response()->json([
            'name' => $name,
            'id' => $attach->id,
            'src' => $src
        ], 200);
    }
}
