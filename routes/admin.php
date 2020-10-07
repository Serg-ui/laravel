<?php

use App\Http\Controllers\Admin\Ajax;
use App\Http\Controllers\Admin\Index;
use App\Http\Controllers\Admin\Products;
use Illuminate\Support\Facades\Route;


Route::get('/', [Index::class, 'index'])
    ->name('admin');

Route::group([
    'prefix' => 'brands'
],
    function () {
        Route::get('/', [Products::class, 'index'])
            ->name('admin.brands');
        Route::get('edit', [Products::class, 'edit'])
            ->name('admin.brands.edit');
    });

Route::post('sort', [Ajax::class, 'productsFilter'])
    ->name('admin.sort');

Route::post('images', [Ajax::class, 'images'])
    ->name('admin.images');

Route::post('product-edit', [Ajax::class, 'productEdit'])
    ->name('admin.productEdit');
Route::post('uploadImg', [\App\Http\Controllers\Admin\UploadImage::class, 'uploadImage'])
    ->name('admin.uploadImg');

