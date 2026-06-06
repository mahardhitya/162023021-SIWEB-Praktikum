<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tugas Akhir')</title>
    <!-- Tailwind CSS (via Vite from Breeze) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f4f7fb] font-sans antialiased text-gray-800">
    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Main Content -->
    <main class="container mx-auto mt-8 px-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
