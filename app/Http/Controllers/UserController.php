<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function profile() {
        return view('profile');
    }

    public function deleteUser(Request $request) {
    	$user = User::find($request->id);
    	$user->delete();
    	return redirect()->bacK();
    }
}
