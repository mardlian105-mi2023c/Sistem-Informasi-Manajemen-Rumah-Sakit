@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-6 max-w-3xl mx-auto">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Data Pasien</h2>
        
        <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama -->
                <div class="col-span-2">
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $pasien->nama) }}"
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                           required>
                    @error('nama')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- No RM -->
                <div>
                    <label for="no_rm" class="block text-sm font-medium text-gray-700 mb-1">No. Rekam Medis</label>
                    <input type="text" name="no_rm" id="no_rm" value="{{ old('no_rm', $pasien->no_rm) }}"
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                           required>
                    @error('no_rm')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Lahir -->
                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}"
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                           required>
                    @error('tanggal_lahir')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jenis Kelamin -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                    <div class="flex space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="jenis_kelamin" value="L" 
                                   class="text-blue-600 focus:ring-blue-500"
                                   {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'L' ? 'checked' : '' }}>
                            <span class="ml-2">Laki-laki</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="jenis_kelamin" value="P" 
                                   class="text-blue-600 focus:ring-blue-500"
                                   {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'P' ? 'checked' : '' }}>
                            <span class="ml-2">Perempuan</span>
                        </label>
                    </div>
                    @error('jenis_kelamin')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Telepon -->
                <div>
                    <label for="telepon" class="block text-sm font-medium text-gray-700 mb-1">No. Telepon</label>
                    <input type="text" name="telepon" id="telepon" value="{{ old('telepon', $pasien->telepon) }}"
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                           required>
                    @error('telepon')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alamat -->
                <div class="col-span-2">
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3"
                              class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                              required>{{ old('alamat', $pasien->alamat) }}</textarea>
                    @error('alamat')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-3">
                <a href="{{ route('pasien.index') }}" 
                   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    Batal
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                    Update Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection