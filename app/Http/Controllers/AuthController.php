<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function index()
    {
        return view('admin.login');
    }
    
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('statistik');
        }
 
        return back()->withErrors([
            'email' => 'Email atau Password tidak sesuai.',
            'password' => 'Email atau Password tidak sesuai.'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Session::invalidate();
        Session::regenerateToken();

        return redirect('/');
    }
}
