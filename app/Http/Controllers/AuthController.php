<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // go toLogin
    public function loginPage(){
        return view('login');
    }
    // go to register Page
    public function registerPage(){
        return view('register');
    }

    // if admin go to => go here and if user go to go here
    public function dashboard(){
        if(Auth::user()->role=='admin'){
            return redirect()->route('category#list');
        }
        return redirect()->route('user#home');
    }
}
