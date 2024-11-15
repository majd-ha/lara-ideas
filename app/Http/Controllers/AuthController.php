<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function store()
    {
        $validate = request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);
        User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password'])
        ]);
        return redirect(route('home'))->with('message', 'suuccesfully registered');
    }
    public function showlogin()
    {
        return view('auth.login');
    }
    public function login()
    {
        $validate = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (auth()->attempt($validate)) {
            request()->session()->regenerate();
            return redirect(route('home'))->with('message', 'logged in successfully');
        }
        return redirect(route('user.showlogin'))->withErrors([
            'email' => 'invalide credintial'
        ]);
    }
    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(route('home'))->with('message', 'logged out ');
    }
}
