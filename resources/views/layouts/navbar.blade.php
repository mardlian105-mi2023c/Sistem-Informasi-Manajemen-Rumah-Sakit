<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <!-- Logo Section -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="flex items-center">
                    <i class="fas fa-heartbeat text-blue-500 text-3xl mr-3"></i>
                    <span class="text-2xl font-semibold text-gray-800 font-serif">RS Sehat Medika</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:ml-10 md:flex md:items-center md:space-x-6">
                <a href="{{ route('about') }}" class="text-gray-600 hover:text-blue-500 px-3 py-2 text-sm font-medium transition-colors duration-200">Tentang Kami</a>
                <a href="{{ route('jadwalDokter') }}" class="text-gray-600 hover:text-blue-500 px-3 py-2 text-sm font-medium transition-colors duration-200">Jadwal Praktek</a>
                <a href="{{ route('dokters') }}" class="text-gray-600 hover:text-blue-500 px-3 py-2 text-sm font-medium transition-colors duration-200">Dokter</a>
                <a href="{{ route('ruangan') }}" class="text-gray-600 hover:text-blue-500 px-3 py-2 text-sm font-medium transition-colors duration-200">Rawat Inap</a>
                <a href="{{ route('pasien') }}" class="bg-blue-50 text-blue-600 hover:bg-blue-100 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 border border-blue-100">Data Pasien</a>
                
                <!-- Authentication Links -->
                @guest
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-500 px-3 py-2 text-sm font-medium">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium shadow-sm transition-all duration-200">Register</a>
                @else
                    <!-- User Dropdown -->
                    <div class="relative ml-3">
                        <button type="button" class="flex items-center text-sm rounded-full focus:outline-none" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <div class="h-9 w-9 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span class="ml-2 text-gray-700 text-sm font-medium">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down ml-1 text-gray-500 text-xs"></i>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                            <a href="{{ Auth::user()->role === 'admin' ? route('admin') : route('admin') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Dashboard</a>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Profil Saya</a>
                            @if(Auth::user()->role === 'admin')
                                <a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Pengaturan</a>
                                <a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Kelola User</a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Logout</button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                @guest
                    <a href="{{ route('login') }}" class="text-gray-600 px-3 py-2 text-sm font-medium mr-2">Login</a>
                @else
                    <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold mr-3">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                @endguest
                <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="md:hidden hidden" id="mobile-menu">
        <div class="pt-2 pb-3 space-y-1 px-2">
            <a href="{{ route('about') }}" class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-blue-500 hover:bg-gray-50">Tentang Kami</a>
            <a href="/schedule" class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-blue-500 hover:bg-gray-50">Jadwal Praktek</a>
            <a href="{{ route('dokters') }}" class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-blue-500 hover:bg-gray-50">Dokter</a>
            <a href="/ruangan" class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-blue-500 hover:bg-gray-50">Rawat Inap</a>
            <a href="/pasien" class="block px-3 py-2 text-base font-medium text-blue-600 bg-blue-50 rounded-md">Data Pasien</a>
            
            @auth
                <div class="border-t border-gray-200 pt-4">
                    <a href="{{ Auth::user()->role === 'admin' ? route('admin') : route('admin') }}"class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-blue-500 hover:bg-gray-50">Dashboard</a>
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profil Saya</a>
                    @if(Auth::user()->role === 'admin')
                        <a href="/" class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-blue-500 hover:bg-gray-50">Pengaturan</a>
                        <a href="/" class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-blue-500 hover:bg-gray-50">Kelola User</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2 text-base font-medium text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>

<script>
    // Toggle mobile menu
    document.querySelector('[aria-controls="mobile-menu"]').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });

    // Toggle user dropdown
    const userMenuButton = document.getElementById('user-menu-button');
    if (userMenuButton) {
        userMenuButton.addEventListener('click', function() {
            const menu = this.nextElementSibling;
            menu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!userMenuButton.contains(e.target) && !userMenuButton.nextElementSibling.contains(e.target)) {
                userMenuButton.nextElementSibling.classList.add('hidden');
            }
        });
    }
</script>