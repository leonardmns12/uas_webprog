<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin');
    }
    public function userIndex() {
    	$user = User::where('role' , 'user')->get();
        return view('admin.user' , ['user' => $user]);
    }
    public function userBlog($id) {
    	$article = Article::where('user_id' , $id)->get(); 
    	return view('admin.userblog' , ['article' => $article]);
    }
    public function blog() {
        return view('admin.blog' , ['article' => Article::with('users')->get()]);
    }
    public function blogDelete(Request $request) {
        $article = Article::find($request->id);
        $article->delete();
        return redirect()->back();
    }
}
