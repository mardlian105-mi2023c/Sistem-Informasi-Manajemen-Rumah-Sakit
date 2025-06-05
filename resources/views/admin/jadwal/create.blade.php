@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-xl overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-6 py-5">
                <h1 class="text-2xl font-bold text-white">Tambah Jadwal Dokter Baru</h1>
                <p class="text-blue-100 mt-1">Isi formulir berikut untuk menambahkan jadwal praktik dokter</p>
            </div>
            
            <!-- Form Content -->
            <form action="{{ route('jadwal.store') }}" method="POST" class="p-8 space-y-8">
                @csrf
                
                <!-- Doctor Selection -->
                <div class="space-y-3">
                    <label class="block text-sm font-medium text-gray-700">Pilih Dokter</label>
                    <select name="dokter_id" class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        @foreach($dokter as $dokter)
                            <option value="{{ $dokter->id }}" class="py-2">{{ $dokter->nama }}</option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Day Input -->
                <div class="space-y-3">
                    <label class="block text-sm font-medium text-gray-700">Hari Praktik</label>
                    <input type="text" name="hari" value="{{ old('hari') }}" 
                           class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                           placeholder="Contoh: Senin, Selasa, Rabu, etc.">
                </div>
                
                <!-- Time Inputs -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-3">
                        <label class="block text-sm font-medium text-gray-700">Jam Mulai Praktik</label>
                        <div class="relative">
                            <input type="time" name="jam_mulai" value="{{ old('jam_mulai') }}" 
                                   class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <label class="block text-sm font-medium text-gray-700">Jam Selesai Praktik</label>
                        <div class="relative">
                            <input type="time" name="jam_selesai" value="{{ old('jam_selesai') }}" 
                                   class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        </div>
                    </div>
                </div>
                
                <!-- Form Actions -->
                <div class="pt-6 flex justify-end space-x-4">
                    <button type="button" class="px-6 py-2.5 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                        Batal
                    </button>
                    <button type="submit" class="px-6 py-2.5 border border-transparent rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                        Simpan Jadwal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
