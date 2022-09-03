<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Register.index');
    }
    public function insertRegister(Request $post)
    {
        $valididatedData = $post->validate([
            'name' => 'required|min:5|max:50',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
        ]);

        $valididatedData['password'] = bcrypt($valididatedData['password']);

        User::create($valididatedData);

        // $post->session()->flash->with('success', 'Registration Success');
        session()->flash('success', 'Register Success ,Please Login');

        // dd('registrasi berhasil');
        return view('/Login.index');
    }
}
