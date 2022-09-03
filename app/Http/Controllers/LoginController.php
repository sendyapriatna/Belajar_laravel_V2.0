<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login.index');
    }

    public function insertLogin(Request $post)
    {
        $credential = $post->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
        if (Auth::attempt($credential)) {
            $post->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $post)
    {
        Auth::logout();
        $post->session()->invalidate();
        $post->session()->regenerate();
        return redirect('/login');
    }
}
