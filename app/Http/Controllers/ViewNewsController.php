<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ViewNewsController extends Controller
{
    public function index(){
        $news = News::all();
        return view('news.view-news', compact('news'));
    }

    // public function edit($id = ''){
    //     $news = News::all($id);
    //     return view('news.edit-news?$id', compact('news'));
    // }
}
