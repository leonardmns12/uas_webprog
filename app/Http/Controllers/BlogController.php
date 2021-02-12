<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Article;

class BlogController extends Controller
{
    public function blogIndex() {
        $article = Article::where('user_id' , Auth::user()->id)->get();
        return view('blog.view' , ['article' => $article]);
    }
    public function createIndex() {
        $category = Category::all();
        return view('blog.create' , ['category' => $category]);
    }
    public function create(Request $request) {
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
            'description' => 'required',
        ]);

        $article = new Article([
            'title' => $request->title,
            'image' =>  $request->file('image')->store('images/article'),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id
        ]);

        $article->save();
        return redirect()->back()->with('success' , 'success creating blog');
    }
    public function fullstory($id) {
        $article = Article::find($id);
        return view('blog.fullstory' , ['article' => $article]);
    }
    public function delete(Request $request) {
        $article = Article::find($request->id);
        $article->delete();
        return redirect()->back();
    }
}
