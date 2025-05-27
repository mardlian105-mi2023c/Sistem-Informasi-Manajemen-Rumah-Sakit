@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Tambah Dokter</h1>
    <form action="{{ route('dokter.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border p-2">
        </div>
        <div>
            <label>Spesialisasi</label>
            <input type="text" name="spesialisasi" value="{{ old('spesialisasi') }}" class="w-full border p-2">
        </div>
        <div>
            <label>Telepon</label>
            <input type="text" name="telepon" value="{{ old('telepon') }}" class="w-full border p-2">
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
