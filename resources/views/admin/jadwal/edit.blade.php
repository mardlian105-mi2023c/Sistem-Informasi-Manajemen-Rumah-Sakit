@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Edit Jadwal Dokter</h1>
    
    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-2 mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jadwal.update', $jadwal_dokter->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold mb-1">Dokter</label>
            <select name="dokter_id" class="w-full border p-2 rounded">
                @foreach($dokter as $dokter)
                    <option value="{{ $dokter->id }}" {{ $jadwal_dokter->dokter_id == $dokter->id ? 'selected' : '' }}>
                        {{ $dokter->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold mb-1">Hari</label>
            <input type="text" name="hari" value="{{ old('hari', $jadwal_dokter->hari) }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold mb-1">Jam Mulai</label>
            <input type="time" name="jam_mulai" value="{{ old('jam_mulai', $jadwal_dokter->jam_mulai) }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold mb-1">Jam Selesai</label>
            <input type="time" name="jam_selesai" value="{{ old('jam_selesai', $jadwal_dokter->jam_selesai) }}" class="w-full border p-2 rounded">
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Simpan Perubahan
            </button>
            <a href="{{ route('jadwal.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
