<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required', // O nome de usuário (admin)
            'password' => 'required', // A senha (123456)
        ]);

        $authData = [
            'name'     => $credentials['username'],
            'password' => $credentials['password'],
        ];

        if (Auth::attempt($authData)) {
            $request->session()->regenerate();

            return redirect()->intended('contacts');
        }

        return back()->withErrors([
            'username' => 'Usuário ou senha incorretos.',
        ])->withInput($request->only('username'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/contacts');
    }
}