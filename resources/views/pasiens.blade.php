@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-blue-50 to-white min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-gray-800 mb-3">Data Pasien</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Informasi lengkap data pasien yang terdaftar di RS Sehat Medika
            </p>
        </div>

        <div class="mb-8 bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 bg-gradient-to-r from-blue-50 to-blue-100">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <!-- Search Input with Icon -->
                    <div class="w-full md:w-1/2 relative">
                        <label for="search" class="block text-sm font-medium text-blue-800 mb-1">Cari Pasien</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none mt-6">
                                <svg class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                id="search" 
                                placeholder="Masukkan nama pasien atau nomor RM..." 
                                class="block w-full pl-10 pr-3 py-3 border border-blue-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700 placeholder-blue-300 transition duration-200"
                            >
                        </div>
                    </div>
        
                    <!-- Filter Button -->
                    <div class="w-full md:w-auto flex items-end">
                        <button class="flex items-center justify-center px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow-md transition duration-200 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            Filter
                        </button>
                    </div>
                </div>
        
                <!-- Advanced Filters (Hidden by default) -->
                <div class="mt-4 hidden" id="advancedFilters">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-4 border-t border-blue-200">
                        <div>
                            <label class="block text-sm font-medium text-blue-800 mb-1">Jenis Kelamin</label>
                            <select class="block w-full pl-3 pr-10 py-2 text-base border-blue-200 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-lg shadow-sm">
                                <option>Semua</option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-blue-800 mb-1">Tanggal Pendaftaran</label>
                            <input type="date" class="block w-full pl-3 pr-10 py-2 text-base border-blue-200 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-lg shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-blue-800 mb-1">Status</label>
                            <select class="block w-full pl-3 pr-10 py-2 text-base border-blue-200 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-lg shadow-sm">
                                <option>Semua</option>
                                <option>Aktif</option>
                                <option>Non-Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Patient Table -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-blue-50">
                        <tr>
                            <th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <span>No. RM</span>
                                    <i class="fas fa-sort ml-2 text-blue-400"></i>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                Nama Pasien
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                Umur
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                Jenis Kelamin
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                Alamat
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                Detail
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($pasien as $pasien)
                        <tr class="hover:bg-blue-50 transition duration-150">
                            <td class="px-8 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user-injured text-blue-600"></i>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $pasien->no_rm }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-gray-900">{{ $pasien->nama }}</div>
                                <div class="text-sm text-gray-500">{{ $pasien->nik }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->age }} tahun</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $pasien->jenis_kelamin == 'Laki-laki' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                                    {{ $pasien->jenis_kelamin }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900 max-w-xs truncate">{{ $pasien->alamat }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-blue-600 hover:text-blue-900 inline-flex items-center">
                                    <i class="far fa-eye mr-1"></i> Lihat
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('search').addEventListener('input', function () {
        const search = this.value.toLowerCase();

        document.querySelectorAll('tbody tr').forEach(row => {
            const nama = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            const matchNama = nama.includes(search);

            row.style.display = matchNama ? "" : "none";
        });
    });
</script>
@endsection