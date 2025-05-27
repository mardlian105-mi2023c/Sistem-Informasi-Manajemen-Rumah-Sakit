@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Dashboard Admin</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card Dokter -->
        <a href="{{ route('dokter.index') }}" class="block bg-white shadow hover:shadow-lg rounded-lg p-6 border border-gray-200 transition">
            <div class="text-blue-600 text-3xl mb-2"><i class="fas fa-user-md"></i></div>
            <h2 class="text-xl font-semibold text-gray-800">Data Dokter</h2>
            <p class="text-sm text-gray-500 mt-1">Kelola informasi dokter</p>
        </a>

        <!-- Card Pasien -->
        <a href="{{ route('pasien.index') }}" class="block bg-white shadow hover:shadow-lg rounded-lg p-6 border border-gray-200 transition">
            <div class="text-green-600 text-3xl mb-2"><i class="fas fa-user-injured"></i></div>
            <h2 class="text-xl font-semibold text-gray-800">Data Pasien</h2>
            <p class="text-sm text-gray-500 mt-1">Kelola informasi pasien</p>
        </a>

        <!-- Card Rawat Inap -->
        <a href="{{ route('rawatinap.index') }}" class="block bg-white shadow hover:shadow-lg rounded-lg p-6 border border-gray-200 transition">
            <div class="text-purple-600 text-3xl mb-2"><i class="fas fa-procedures"></i></div>
            <h2 class="text-xl font-semibold text-gray-800">Rawat Inap</h2>
            <p class="text-sm text-gray-500 mt-1">Data ruang inap pasien</p>
        </a>

        <!-- Card Jadwal Dokter -->
        <a href="{{ route('jadwal.index') }}" class="block bg-white shadow hover:shadow-lg rounded-lg p-6 border border-gray-200 transition">
            <div class="text-yellow-500 text-3xl mb-2"><i class="fas fa-calendar-alt"></i></div>
            <h2 class="text-xl font-semibold text-gray-800">Jadwal Dokter</h2>
            <p class="text-sm text-gray-500 mt-1">Atur jadwal praktik dokter</p>
        </a>
    </div>
</div>
@endsection
