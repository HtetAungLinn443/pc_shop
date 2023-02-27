<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Login Page
    public function loginPage()
    {
        return view('login');
    }

    // Register Page
    public function registerPage()
    {
        return view('register');
    }

    // Deshboard
    public function dashboard()
    {

        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin#dashboard');
        } else {
            return redirect()->route('user#homePage');
        }
    }

}
