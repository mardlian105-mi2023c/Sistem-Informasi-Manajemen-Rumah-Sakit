@extends('layouts.app')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold mb-4">Jadwal Praktik Dokter</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Temukan waktu praktik dokter spesialis kami untuk membuat janji konsultasi.
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Filter Section -->
        <div class="mb-8 bg-white rounded-lg shadow p-6">
            <form action="{{ route('jadwalDokter') }}" method="GET">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="w-full">
                        <label for="doctor" class="block text-sm font-medium text-gray-700 mb-1">Pilih Dokter</label>
                        <select name="dokter_id" id="doctor" class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                            <option value="">Semua Dokter</option>
                            @foreach($dokter as $d)
                            <option value="{{ $d->id }}" {{ $selectedDokter == $d->id ? 'selected' : '' }}>
                                {{ $d->nama }} - {{ $d->spesialisasi }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="specialty" class="block text-sm font-medium text-gray-700 mb-1">Spesialisasi</label>
                        <select name="spesialisasi" id="specialty" class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                            <option value="">Semua Spesialisasi</option>
                            @foreach($spesialis as $sp)
                            <option value="{{ $sp }}" {{ $selectedSpesialisasi == $sp ? 'selected' : '' }}>{{ $sp }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full md:w-auto self-end">
                        <button type="submit" class="w-full md:w-auto px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="flex overflow-x-auto pb-2 mb-6 scrollbar-hide">
            <div class="flex space-x-2">
                @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                <a 
                    href="{{ route('jadwalDokter', array_merge(request()->query(), ['hari' => $day])) }}"
                    class="day-tab px-4 py-2 rounded-md text-sm font-medium {{ $activeDay == $day ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}"
                >
                    {{ $day }}
                </a>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($jadwals as $jadwal)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition duration-300 hover:shadow-lg">
                <div class="p-6">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $jadwal->dokter->nama }}</h3>
                            <p class="text-gray-600 mb-2">{{ $jadwal->dokter->spesialis }}</p>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            {{ $jadwal->jam_mulai->format('H:i') }} - {{ $jadwal->jam_selesai->format('H:i') }}
                        </span>
                    </div>
                    
                    <div class="mt-4 flex items-center text-gray-500">
                        <i class="fas fa-calendar-day mr-2 text-blue-500"></i>
                        <span class="font-medium">{{ $jadwal->hari }}</span>
                    </div>
                    
                    <div class="mt-6 flex justify-between items-center">
                        <a href="{{ route('chat.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800">
                            Buat Janji <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                        <div class="flex space-x-2">
                            <a href="tel:{{ $jadwal->dokter->nomor_telepon }}" class="p-2 rounded-full bg-blue-50 text-blue-600 hover:bg-blue-100">
                                <i class="fas fa-phone-alt"></i>
                            </a>
                            <button class="p-2 rounded-full bg-blue-50 text-blue-600 hover:bg-blue-100">
                                <i class="fas fa-map-marker-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Empty State -->
        @if($jadwals->isEmpty())
        <div class="text-center py-16 bg-white rounded-lg shadow">
            <i class="fas fa-calendar-times text-5xl text-gray-300 mb-4"></i>
            <h3 class="text-lg font-medium text-gray-900">Tidak ada jadwal tersedia</h3>
            <p class="mt-1 text-sm text-gray-500">Belum ada jadwal praktik dokter yang terdaftar.</p>
        </div>
        @endif

        <!-- Pagination -->
        @if($jadwals->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $jadwals->appends(request()->query())->links() }}
        </div>
        @endif
    </div>
@endsection