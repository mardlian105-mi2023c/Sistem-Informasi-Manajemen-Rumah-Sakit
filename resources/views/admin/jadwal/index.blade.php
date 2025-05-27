@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-4">
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Jadwal Dokter</h1>
        <a href="{{ route('jadwal.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Jadwal</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 p-2 mb-4 text-green-800">{{ session('success') }}</div>
    @endif

    <table class="w-full table-auto border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">Dokter</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwal_dokter as $jadwal)
            <tr class="text-center border-t">
                <td>{{ $jadwal->dokter->nama }}</td>
                <td>{{ $jadwal->hari }}</td>
                <td>{{ $jadwal->jam_mulai }}</td>
                <td>{{ $jadwal->jam_selesai }}</td>
                <td class="flex justify-center space-x-2">
                    <a href="{{ route('jadwal.edit', $jadwal) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('jadwal.destroy', $jadwal) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
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
