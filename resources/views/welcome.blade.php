@extends('layouts.main')

@section('title', 'Welcome to Tiket Konser')

@section('content')
<div class="text-center py-20">
    <h1 class="text-4xl font-bold mb-4">Selamat Datang di Sistem Informasi Tiket Konser</h1>
    <p class="text-gray-600 mb-8">Pesan tiket konser artis favoritmu dengan mudah dan cepat.</p>
    <a href="{{ route('events.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded shadow hover:bg-blue-600">Lihat Events</a>
</div>
@endsection
