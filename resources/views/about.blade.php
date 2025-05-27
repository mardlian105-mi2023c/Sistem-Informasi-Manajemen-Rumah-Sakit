@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Hero Section -->
    <div class="text-center mb-16">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Tentang Kami</h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Memberikan pelayanan kesehatan terbaik dengan keunggulan teknologi dan keramahan yang tulus.
        </p>
    </div>

    <!-- About Content -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
        <div>
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Visi & Misi Kami</h2>
            <div class="space-y-6">
                <div class="bg-blue-50 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold text-blue-700 mb-3 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Visi
                    </h3>
                    <p class="text-gray-700">
                        Menjadi pusat layanan kesehatan terdepan yang memberikan solusi kesehatan holistik dengan standar internasional.
                    </p>
                </div>
                <div class="bg-green-50 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold text-green-700 mb-3 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        Misi
                    </h3>
                    <ul class="list-disc pl-5 space-y-2 text-gray-700">
                        <li>Menyediakan layanan kesehatan berkualitas tinggi</li>
                        <li>Mengutamakan kepuasan dan keselamatan pasien</li>
                        <li>Mengembangkan sumber daya manusia yang profesional</li>
                        <li>Menerapkan teknologi medis terkini</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="rounded-xl overflow-hidden shadow-lg">
            <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Klinik Sehat Bahagia" class="w-full h-full object-cover">
        </div>
    </div>

    <!-- Values Section -->
    <div class="mb-16">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Nilai-Nilai Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="text-blue-600 mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Komitmen</h3>
                <p class="text-gray-600">
                    Kami berkomitmen untuk memberikan pelayanan terbaik dengan integritas dan profesionalisme tinggi.
                </p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="text-green-600 mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Keunggulan</h3>
                <p class="text-gray-600">
                    Terus berinovasi dan mengembangkan standar pelayanan kesehatan yang unggul dan terkini.
                </p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="text-purple-600 mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Kolaborasi</h3>
                <p class="text-gray-600">
                    Bekerja sama dengan berbagai pihak untuk memberikan solusi kesehatan yang komprehensif.
                </p>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="mb-16">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Tim Dokter Spesialis Kami</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
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

    <!-- CTA Section -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-700 rounded-xl p-8 text-center text-white">
        <h2 class="text-2xl font-bold mb-4">Siap Memulai Perawatan Kesehatan Anda?</h2>
        <p class="text-blue-100 mb-6 max-w-2xl mx-auto">
            Hubungi kami sekarang untuk informasi lebih lanjut atau buat janji temu dengan dokter spesialis kami.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="#" class="px-6 py-3 bg-white text-blue-600 font-medium rounded-lg hover:bg-blue-50 transition duration-300">
                <i class="fas fa-phone-alt mr-2"></i> Hubungi Kami
            </a>
            <a href="#" class="px-6 py-3 border-2 border-white text-white font-medium rounded-lg hover:bg-white hover:bg-opacity-10 transition duration-300">
                <i class="fas fa-calendar-alt mr-2"></i> Buat Janji
            </a>
        </div>
    </div>
</div>
@endsection
