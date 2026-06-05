<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->has('username')) {
            return redirect()->route('login');
        }

        return view('home', [
            'username' => $request->session()->get('username'),
        ]);
    }
}
