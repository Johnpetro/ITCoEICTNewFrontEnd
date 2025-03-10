<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'homeController@index');

Route::get('/about', function () {
    return view('about');
});
Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/allPageLayout', function () {
    return view('allPageLayout');
});
///////////////////////////////////////////////////////////////////////
Route::get('/innovation', function () {
    return view('inovation/innovation');
});

Route::get('/cng', function () {
    return view('inovation/cng');
});

Route::get('/4ir', function () {
    return view('inovation/4ir');
});

Route::get('/biomedical', function () {
    return view('inovation/biomedical');
});

Route::get('/hydraulic', function () {
    return view('inovation/hydraulic');
});


Route::get('/spare', function () {
    return view('inovation/spare');
});

Route::get('/robot', function () {
    return view('inovation/robot');
});

Route::get('/energy', function () {
    return view('inovation/energy');
});
Route::get('/automation', function () {
    return view('inovation/automation');
});
// for Research
Route::get('/mechanical', function () {
    return view('research/mechanical');
});
Route::get('/ict', function () {
    return view('research/ict');
});
Route::get('/constractors', function () {
    return view('research/constractor');
});
Route::get('/services', function () {
    return view('research/service');
});

// for admini
Route::get('/admin/dashboard', function () {
    return view('admin.general.dashboard');
});
Route::get('/admin/post', function () {
    return view('admin.general.table_post');
});
Route::get('/admin/add_post', function () {
    return view('admin.general.add_post');
});
Route::get('/admin/edit_post', function () {
    return view('admin.general.dashboard');
});
Route::get('/admin/view_post', function () {
    return view('admin.general.dashboard');
});
// Route::get('/admin/view_post', function () {
//     return view('admin.general.dashboard');
// });
// start news
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ViewNewsController;
//use App\Http\Controllers\homeController;

//Route::get('home', [homeController::class, 'index'])->name('home');
Route::get('/admin/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/admin/news', [NewsController::class, 'store'])->name('news.store');
Route::get('/admin/news/view-news', [ViewNewsController::class, 'index'])->name('news.view-news');
Route::get('/admin/news/edit-news?(:num)', [ViewNewsController::class, 'edit'])->name('news.edit-news?$1');
///end news upload

Route::get('', 'App\Http\Controllers\homeController@index');

//Route::get('/admin/news/{id}/edit-news', [NewsController::class, 'edit'])->name('news.edit-news');
Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::get('/admin/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::put('/admin/news/{id}', [NewsController::class, 'update'])->name('news.update');
Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

