@extends('layouts.main')

@section('title', 'Tambah Event')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Tambah Event Baru</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Nama Konser</label>
            <input type="text" name="nama_konser" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:border-blue-500" value="{{ old('nama_konser') }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Artis</label>
            <input type="text" name="artis" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:border-blue-500" value="{{ old('artis') }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Tanggal</label>
            <input type="date" name="tanggal" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:border-blue-500" value="{{ old('tanggal') }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Lokasi</label>
            <input type="text" name="lokasi" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:border-blue-500" value="{{ old('lokasi') }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Harga</label>
            <input type="number" name="harga" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:border-blue-500" value="{{ old('harga') }}" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Gambar Banner</label>
            <input type="file" name="image" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:border-blue-500" accept="image/*" required>
        </div>
        
        <div class="flex justify-end space-x-3">
            <a href="{{ route('events.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
        </div>
    </form>
</div>
@endsection
