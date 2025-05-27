@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-4">
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Data Dokter</h1>
        <a href="{{ route('dokter.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Dokter</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 p-2 mb-4 text-green-800">{{ session('success') }}</div>
    @endif

    <table class="w-full table-auto border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">Nama</th>
                <th>Spesialisasi</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dokter as $dokter)
            <tr class="text-center border-t">
                <td>{{ $dokter->nama }}</td>
                <td>{{ $dokter->spesialis }}</td>
                <td>{{ $dokter->no_telepon }}</td>
                <td class="flex justify-center space-x-2">
                    <a href="{{ route('dokter.edit', $dokter) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('dokter.destroy', $dokter) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                        @csrf @method('DELETE')
                        <button class="text-red-500">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
