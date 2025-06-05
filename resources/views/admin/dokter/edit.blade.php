@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow-xl rounded-2xl mt-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6 border-b pb-2">Edit Dokter</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <strong>Periksa kembali data yang diisi:</strong>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dokter.update', $dokter) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" 
                   value="{{ old('nama', $dokter->nama) }}" 
                   class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="spesialis" class="block text-sm font-medium text-gray-700">Spesialis</label>
            <input type="text" name="spesialis" id="spesialis" 
                   value="{{ old('spesialis', $dokter->spesialis) }}" 
                   class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="no_telepon" class="block text-sm font-medium text-gray-700">No. Telepon</label>
            <input type="text" name="no_telepon" id="no_telepon" 
                   value="{{ old('no_telepon', $dokter->no_telepon) }}" 
                   class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="flex justify-end">
            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
