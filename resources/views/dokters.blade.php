@extends('layouts.app')

@section('content')
     <div class="bg-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold mb-4">Tim Dokter Profesional Kami</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Bertemu dengan tim dokter spesialis kami yang berpengalaman dan berdedikasi untuk memberikan perawatan terbaik.
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <form method="GET" action="{{ route('dokters') }}">
            <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <!-- Search -->
                <div class="w-full md:w-auto">
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Cari dokter..."
                        >
                    </div>
                </div>
        
                <select name="spesialis" onchange="this.form.submit()" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                    <option value="">Semua Spesialis</option>
                    @foreach($spesialisasi as $spesialis)
                        <option value="{{ $spesialis }}" {{ request('spesialis') == $spesialis ? 'selected' : '' }}>
                            {{ $spesialis }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>             
        
        <!-- Doctors Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($dokter as $dokter)
            <div class="bg-white rounded-lg shadow-md overflow-hidden doctor-card transition duration-300">
                <div class="relative">
                    <div class="h-48 bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center">
                        <i class="fas fa-user-md text-white text-6xl"></i>
                    </div>
                    <div class="absolute top-4 right-4">
                        <span class="specialty-badge inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            {{ $dokter->spesialis }}
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $dokter->nama }}</h3>
                    <p class="text-gray-600 mb-4">{{ $dokter->spesialis}}</p>
                    
                    <div class="flex items-center text-gray-500 mb-2">
                        <i class="fas fa-phone-alt mr-2 text-blue-500"></i>
                        <span>{{ $dokter->no_telepon }}</span>
                    </div>
                    
                    <div class="mt-6 flex justify-between items-center">
                        <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">
                            Lihat Jadwal <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                        <div class="flex space-x-2">
                            <button class="p-2 rounded-full bg-blue-50 text-blue-600 hover:bg-blue-100">
                                <i class="fas fa-calendar-alt"></i>
                            </button>
                            <a href="{{ route('chat.index') }}" class="p-2 rounded-full bg-blue-50 text-blue-600 hover:bg-blue-100">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script>
        document.getElementById('filterBtn').addEventListener('click', function () {
            const searchValue = document.getElementById('searchInput').value.toLowerCase();
            const spesialisasiValue = document.getElementById('spesialisasiSelect').value;
        
            const rows = document.querySelectorAll('#dokterTableBody tr');
        
            rows.forEach(row => {
                const nama = row.children[0].textContent.toLowerCase();
                const spesialisasi = row.children[1].textContent;
        
                const matchNama = nama.includes(searchValue);
                const matchSpesialisasi = spesialisasiValue === '' || spesialisasi === spesialisasiValue;
        
                row.style.display = (matchNama && matchSpesialisasi) ? '' : 'none';
            });
        });
        </script>        
@endsection
