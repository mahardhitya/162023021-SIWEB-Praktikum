@extends('layouts.main')

@section('title', 'Detail Event - ' . $event->nama_konser)

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow flex flex-col md:flex-row gap-8 border-t-4 border-primary">
    <div class="w-full md:w-1/2">
        @if($event->image)
            @if(Str::startsWith($event->image, 'assets/'))
                <img src="{{ asset($event->image) }}" alt="{{ $event->nama_konser }}" class="w-full rounded shadow object-cover">
            @else
                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->nama_konser }}" class="w-full rounded shadow object-cover">
            @endif
        @else
            <div class="w-full h-64 bg-gray-100 flex items-center justify-center text-tertiary font-medium rounded">No Image</div>
        @endif
    </div>
    
    <div class="w-full md:w-1/2">
        <h1 class="text-3xl font-extrabold mb-4 text-primary">{{ $event->nama_konser }}</h1>
        <div class="space-y-3 mb-6 text-lg text-secondary">
            <p><strong>Artis:</strong> {{ $event->artis }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->tanggal)->format('d F Y') }}</p>
            <p><strong>Lokasi:</strong> {{ $event->lokasi }}</p>
            <div class="bg-slate-50 p-4 rounded-lg mt-4 border border-gray-100">
                <p class="text-sm text-gray-500 uppercase tracking-wider font-semibold">Harga Tiket</p>
                <p class="text-3xl text-accent font-bold mt-1">Rp {{ number_format($event->harga, 0, ',', '.') }}</p>
            </div>
        </div>
        
        <div class="flex space-x-3 mt-6">
            <a href="{{ route('events.index') }}" class="bg-gray-400 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-500 transition duration-200 font-medium">Kembali</a>
            
            @auth
                <button onclick="alert('Fitur pemesanan tiket sedang dalam pengembangan!')" class="flex-1 bg-accent text-white px-6 py-2 rounded-lg shadow hover:bg-teal-500 transition duration-200 font-bold">Beli Tiket</button>
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('events.edit', $event->id) }}" class="bg-yellow-500 text-white px-6 py-2 rounded-lg shadow hover:bg-yellow-600 transition duration-200 font-medium">Edit</a>
                @endif
            @else
                <a href="{{ route('login') }}" class="flex-1 text-center bg-accent text-white px-6 py-2 rounded-lg shadow hover:bg-teal-500 transition duration-200 font-bold">Login untuk Beli Tiket</a>
            @endauth
        </div>
    </div>
</div>
@endsection
