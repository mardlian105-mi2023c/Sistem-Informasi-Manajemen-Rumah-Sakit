@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-4">
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Data Rawat Inap</h1>
        <a href="{{ route('rawatinap.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Tambah Rawat Inap</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border">Pasien</th>
                    <th class="px-4 py-2 border">Kamar</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Tanggal Masuk</th>
                    <th class="px-4 py-2 border">Tanggal Keluar</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rawatinap as $rawat)
                <tr class="text-center border-t hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $rawat->pasien->nama ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $rawat->kamar }}</td>
                    <td class="px-4 py-2 border capitalize">{{ $rawat->status }}</td>
                    <td class="px-4 py-2 border">{{ $rawat->tanggal_masuk }}</td>
                    <td class="px-4 py-2 border">
                        {{ $rawat->tanggal_keluar ?? '-' }}
                    </td>
                    <td class="px-4 py-2 border flex justify-center space-x-2">
                        <a href="{{ route('rawatinap.edit', $rawat) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('rawatinap.destroy', $rawat) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data rawat inap.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
