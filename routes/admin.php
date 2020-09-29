<?php

use App\Http\Controllers\Admin\Index;
use Illuminate\Support\Facades\Route;


Route::get('/', [Index::class, 'index'])
    ->name('admin');

Route::group([
    'prefix' => 'brands'
],
    function () {
        Route::get('/', [Index::class, 'brands'])
            ->name('admin.brands');
        Route::get('edit', [Index::class, 'edit'])
            ->name('admin.brands.edit');
    });

Route::post('sort', [Index::class, 'brandsPost'])
    ->name('admin.sort');


