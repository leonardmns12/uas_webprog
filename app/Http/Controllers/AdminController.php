<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;

class AdminController extends Controller
{
    public function userIndex() {
    	$user = User::where('role' , 'user')->get();
        return view('admin.user' , ['user' => $user]);
    }
    public function userBlog($id) {
    	$article = Article::where('user_id' , $id)->get(); 
    	return view('admin.userblog' , ['article' => $article]);
    }
}
