<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
            'events' => Event::orderBy('tanggal')->get(),
            'success' => $request->session()->get('success'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_konser' => 'required|string|max:255',
            'artis' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
        ]);

        Event::create([
            'nama_konser' => $request->nama_konser,
            'artis' => $request->artis,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'harga' => $request->harga,
            'image' => 'assets/banner.png',
        ]);

        return redirect()->route('home')->with('success', 'Event berhasil ditambahkan.');
    }
}
