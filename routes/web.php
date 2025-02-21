<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home');
});

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