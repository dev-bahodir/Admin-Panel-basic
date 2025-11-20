<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NewsController;
use App\Models\Menu;
use App\Models\News;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('menu', MenuController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('news', NewsController::class);
});

Route::get('/', function () {
    $menus = Menu::whereNull('parent_id')->with('children')->get();
    $news = News::with('previewImage')->latest()->paginate(6);
    return view('front.home', compact('menus', 'news'));
})->name('home');


Route::get('/news/{news}', function (News $news) {
    $menus = Menu::whereNull('parent_id')->with('children')->get();
    $news->load('images');
    return view('front.news_detail', compact('menus', 'news'));
})->name('news.detail');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::resource('menu', MenuController::class);
    Route::resource('news', NewsController::class);
});

