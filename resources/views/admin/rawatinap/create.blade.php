@extends('layouts.app')

@section('title', 'Tambah Rawat Inap')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Tambah Data Rawat Inap</h1>
            <a href="{{ route('rawatinap.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Kembali
            </a>
        </div>

        <form action="{{ route('rawatinap.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Pasien Selection -->
                <div class="col-span-2">
                    <label for="pasien_id" class="block text-sm font-medium text-gray-700 mb-1">Pasien</label>
                    <select name="pasien_id" id="pasien_id" required
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        <option value="">-- Pilih Pasien --</option>
                        @foreach($pasien as $pasien)
                            <option value="{{ $pasien->id }}" {{ old('pasien_id') == $pasien->id ? 'selected' : '' }}>
                                {{ $pasien->nama }} ({{ $pasien->no_rm }})
                            </option>
                        @endforeach
                    </select>
                    @error('pasien_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Ruang/Kamar -->
                <div>
                    <label for="kamar" class="block text-sm font-medium text-gray-700 mb-1">Ruang/Kamar</label>
                    <input type="text" name="kamar" id="kamar" value="{{ old('kamar') }}" required
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                           placeholder="Contoh: A101">
                    @error('kamar')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <div class="flex space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="status" value="dirawat" 
                                   class="text-blue-600 focus:ring-blue-500" 
                                   {{ old('status', 'dirawat') == 'dirawat' ? 'checked' : '' }}>
                            <span class="ml-2">Dirawat</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="status" value="selesai" 
                                   class="text-blue-600 focus:ring-blue-500"
                                   {{ old('status') == 'selesai' ? 'checked' : '' }}>
                            <span class="ml-2">Selesai</span>
                        </label>
                    </div>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Masuk -->
                <div>
                    <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk', date('Y-m-d')) }}" required
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    @error('tanggal_masuk')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Keluar -->
                <div>
                    <label for="tanggal_keluar" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Keluar</label>
                    <input type="date" name="tanggal_keluar" id="tanggal_keluar" value="{{ old('tanggal_keluar') }}"
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    @error('tanggal_keluar')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end pt-6 border-t">
                <button type="reset" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition mr-3">
                    Reset
                </button>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Set default date and validation
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date().toISOString().split('T')[0];
        const tanggalMasuk = document.getElementById('tanggal_masuk');
        const tanggalKeluar = document.getElementById('tanggal_keluar');
        
        // Set minimum date for tanggal keluar based on tanggal masuk
        tanggalMasuk.addEventListener('change', function() {
            tanggalKeluar.min = this.value;
        });
    });
</script>
@endsection