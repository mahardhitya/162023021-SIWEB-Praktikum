<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    private const USERNAME = 'mahardhitya';
    private const PASSWORD = '123456';

    public function showLogin(Request $request)
    {
        if ($request->session()->has('username')) {
            return redirect()->route('home');
        }

        return view('auth.login', [
            'username' => $request->cookie('username'),
            'error' => $request->query('error'),
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($request->username === self::USERNAME && $request->password === self::PASSWORD) {
            $request->session()->put('username', $request->username);

            $response = redirect()->route('home');

            if ($request->filled('remember')) {
                $response->withCookie(cookie()->forever('username', $request->username));
            } else {
                $response->withCookie(cookie()->forget('username'));
            }

            return $response;
        }

        return redirect()->route('login', ['error' => 1]);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $response = redirect()->route('login');
        if ($request->hasCookie('username')) {
            $response->withCookie(cookie()->forget('username'));
        }

        return $response;
    }
}
