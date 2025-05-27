@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Tambah Jadwal Dokter</h1>
    <form action="{{ route('jadwal.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label>Dokter</label>
            <select name="dokter_id" class="w-full border p-2">
                @foreach($dokter as $dokter)
                    <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Hari</label>
            <input type="text" name="hari" value="{{ old('hari') }}" class="w-full border p-2">
        </div>
        <div>
            <label>Jam Mulai</label>
            <input type="time" name="jam_mulai" value="{{ old('jam_mulai') }}" class="w-full border p-2">
        </div>
        <div>
            <label>Jam Selesai</label>
            <input type="time" name="jam_selesai" value="{{ old('jam_selesai') }}" class="w-full border p-2">
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
