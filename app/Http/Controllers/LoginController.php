<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function index()
    {
        return Inertia::render('Login');
    }

    public function authentication(Request $request)
    {
        $request->validate([
           'email' => ['required'],
           'password' => ['required'],
        ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],true))
        {
            Inertia::share('user', function () {
                  return Auth::user();
               });
            return Redirect::route('home');
        }

        return Redirect::route('login')->with('errorLogin','Ups Algo salio mal');

    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('home');
    }
}
