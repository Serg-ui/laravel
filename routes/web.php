<?php

use App\Http\Controllers\Admin\Index;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\RegisterUser;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Main@Index')->name('index');

Route::get('/product/{name}', 'Product@get')->name('product');

Route::get('/news/{name}', 'News@get')->name('news');

Route::get('/brand/{parent}/{child?}', 'Brand@get')->name('brand');

Route::post('send_mail', 'SendMail@index')->name('send_mail');

// Register user
Route::get('register', [RegisterUser::class, 'get'])->name('register');
Route::post('register', [RegisterUser::class, 'post'])->name('registerPost');

// Login
Route::get('login', [Login::class, 'login'])->name('login');
Route::post('login', [Login::class, 'loginPost'])->name('loginPost');
Route::get('logout', [Login::class, 'logout'])->name('logout');



