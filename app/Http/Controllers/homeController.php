<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class homeController extends Controller
{
    public function index(){
        $news = News::all();
        return view('home', compact('news'));
    }

    public function view($id){
        $news = News::findOrFail($id);
        return view('view-news', compact('news'));
    }
}

