<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthenticationController extends Controller
{
    public function loginIndex () {
        return view('authentication.login');
    }
    public function registerIndex() {
        return view('authentication.register');
    }
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        return redirect()->back()->with('success' , 'Success creating user!');
    }
    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credential = $request->only('email' , 'password');
        if(Auth::attempt($credential)){
            $user = Auth::user();
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('invalid' , 'invalid email or password!');
        }
    }
}
