@extends('layouts.main')

@section('title', 'Daftar Event')

@section('content')
<div class="mb-8 flex justify-between items-center bg-white p-6 rounded-xl shadow-sm border-l-4 border-accent">
    <h1 class="text-3xl font-extrabold text-primary">Daftar Konser</h1>
    @auth
        @if(Auth::user()->role === 'admin')
            <a href="{{ route('events.create') }}" class="bg-primary text-white px-5 py-2.5 rounded-lg shadow hover:bg-secondary transition duration-200 font-semibold">+ Tambah Event</a>
        @endif
    @endauth
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    @foreach($events as $event)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 border border-gray-100">
            @if($event->image)
                @if(Str::startsWith($event->image, 'assets/'))
                    <img src="{{ asset($event->image) }}" alt="{{ $event->nama_konser }}" class="w-full h-56 object-cover">
                @else
                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->nama_konser }}" class="w-full h-56 object-cover">
                @endif
            @else
                <div class="w-full h-56 bg-gray-100 flex items-center justify-center text-tertiary font-medium">No Image</div>
            @endif
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-3 text-secondary">{{ $event->nama_konser }}</h2>
                <div class="space-y-2 mb-4">
                    <p class="text-gray-600 flex items-center"><svg class="w-4 h-4 mr-2 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg> {{ $event->artis }}</p>
                    <p class="text-gray-600 flex items-center"><svg class="w-4 h-4 mr-2 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}</p>
                </div>
                <div class="bg-slate-50 p-3 rounded-lg mb-4 border border-gray-100 text-center">
                    <span class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Harga Tiket Mulai Dari</span>
                    <p class="text-xl font-bold text-accent mt-1">Rp {{ number_format($event->harga, 0, ',', '.') }}</p>
                </div>
                
                <div class="flex space-x-2 mt-2">
                    <a href="{{ route('events.show', $event->id) }}" class="flex-1 text-center bg-tertiary text-white px-4 py-2 rounded-lg hover:bg-secondary transition duration-200 font-medium">Detail</a>
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('events.edit', $event->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-200">Edit</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus event ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-200">Hapus</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
