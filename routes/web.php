<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewNewsController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Models\Product;
use App\Models\Service;
//use App\Http\Controllers\homeController;




use App\Http\Controllers\MessageController;
// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [homeController::class, 'index'])->name('home');

//messages
Route::post('/send-message', [MessageController::class, 'store'])->name('send.message');

Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');


//about
Route::get('/about/background', function () {
    return view('about.background');
});
Route::get('/about/vission', function () {
    return view('about.vission');
});
Route::get('/about/core', function () {
    return view('about.core');
});
Route::get('/about/boardmembers', function () {
    return view('about.boardmembers');
});
Route::get('/contacts', function () {
    return view('contacts');
});
//about ends here


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

//mega menu
Route::get('/mega_menu', function () {
    return view('short_course/software');
});
// Route::get('/admin/view_post', function () {
//     return view('admin.general.dashboard');
// });




Route::prefix('admin')->group(function () {
    //products
    Route::resource('products', ProductController::class)->names('admin.products');
    
    //services
    Route::resource('services', ServiceController::class)->names('admin.services');
});







// start news


Route::get('home', [homeController::class, 'index'])->name('home');
Route::get('view-news/{id}', [homeController::class, 'view'])->name('view-news');
//Route::get('home', [homeController::class, 'index'])->name('home');

Route::get('/admin/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/admin/news', [NewsController::class, 'store'])->name('news.store');
Route::get('/admin/news/index', [NewsController::class, 'index'])->name('news.index');
Route::get('/admin/news/view-news', [ViewNewsController::class, 'index'])->name('news.view-news');
Route::get('/admin/news/edit-news?(:num)', [ViewNewsController::class, 'edit'])->name('news.edit-news?$1');
///end news upload

Route::get('', 'App\Http\Controllers\homeController@index');

//Route::get('/admin/news/{id}/edit-news', [NewsController::class, 'edit'])->name('news.edit-news');
Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::get('/admin/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::put('/admin/news/{id}', [NewsController::class, 'update'])->name('news.update');
Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

