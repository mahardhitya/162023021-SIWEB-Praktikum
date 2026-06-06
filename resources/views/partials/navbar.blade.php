<nav class="bg-primary shadow-lg border-b-4 border-accent">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <div>
                <a href="{{ route('home') }}" class="text-2xl font-extrabold text-accent tracking-wider">TIKET KONSER</a>
            </div>
            <div class="flex space-x-6 items-center">
                <a href="{{ route('events.index') }}" class="text-gray-300 hover:text-white font-medium transition duration-200">Events</a>
                
                @guest
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white font-medium transition duration-200">Login</a>
                    <a href="{{ route('register') }}" class="bg-accent text-primary px-5 py-2 rounded-full font-bold hover:bg-teal-400 shadow-md transition duration-200">Register</a>
                @endguest
                
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-white font-medium transition duration-200">Dashboard</a>
                    <div class="relative group">
                        <button class="flex items-center text-gray-300 hover:text-white font-medium transition duration-200">
                            {{ Auth::user()->name }}
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-xl hidden group-hover:block border border-gray-100 z-50">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-secondary hover:bg-gray-50 hover:text-primary transition duration-150">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-3 text-secondary hover:bg-gray-50 hover:text-primary transition duration-150">Logout</button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
