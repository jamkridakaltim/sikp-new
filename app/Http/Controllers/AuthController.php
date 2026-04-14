<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $username = 'admin';
    private $password = '123456';

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        if (
            $request->username === $this->username &&
            $request->password === $this->password
        ) {
            session(['logged_in' => true]);

            return redirect('/');
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        session()->forget('logged_in');
        return redirect('/login');
    }
}
