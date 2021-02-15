<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function profileUpdate(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $user = User::find(Auth::user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->back()->with('success' , 'User profile updated!');
    }
}
