<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Category;

class AuthenticationController extends Controller
{
    public function loginIndex () {
        return view('authentication.login' , ['category' => Category::all()]);
    }
    public function registerIndex() {
        return view('authentication.register' , ['category' => Category::all()]);
    }
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ]);
        $checkEmail = User::where('email' , $request->email)->first();
        if($checkEmail) {
            return redirect()->back()->with('error' , 'Email already registered!');
        }
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
            if($user->role == 'user'){
                return redirect()->route('home');
            } else {
                return redirect()->route('admin');
            }
       
        } else {
            return redirect()->back()->with('invalid' , 'invalid email or password!');
        }
    }

    public function logout(){
        Auth::logout(); 
        return view('authentication.login' , ['category' => Category::all()]);
    }
}
