<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

class HomeController extends Controller
{
    public function index() {
        $article = Article::all();
        return view('home' , ['article' => $article , 'category' => Category::all()]);
    }
}
