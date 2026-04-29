<?php

namespace App\Http\Controllers; 
use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); 
        return view('dashboard', compact('products'));
    }

    public function create()
    {
        
        return view('create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kode_produk' => 'required|unique:products', 
            'stok'        => 'required|integer',
            'harga'       => 'required|numeric',
        ]);

        Product::create([
            'user_id'     => Auth::id(), 
            'nama_produk' => $request->nama_produk,
            'kode_produk' => $request->kode_produk,
            'stok'        => $request->stok,
            'harga'       => $request->harga,
        ]);

        return redirect('/products')->with('success', 'Produk berhasil ditambahkan!');
    }
}