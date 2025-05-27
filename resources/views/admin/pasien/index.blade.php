@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-4">
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Data Pasien</h1>
        <a href="{{ route('pasien.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Pasien</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 p-2 mb-4 text-green-800">{{ session('success') }}</div>
    @endif

    <table class="w-full table-auto border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">Nama</th>
                <th>No RM</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pasien as $pasien)
            <tr class="text-center border-t">
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->no_rm }}</td>
                <td>{{ $pasien->alamat }}</td>
                <td>{{ $pasien->telepon }}</td>
                <td>{{ $pasien->tanggal_lahir }}</td>
                <td class="flex justify-center space-x-2">
                    <a href="{{ route('pasien.edit', $pasien) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('pasien.destroy', $pasien) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
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
