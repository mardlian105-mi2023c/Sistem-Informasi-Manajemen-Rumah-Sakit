@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Data Rawat Inap</h1>
            <p class="mt-2 text-gray-600">Daftar pasien yang sedang atau telah dirawat inap.</p>
        </div>
    </div>

    <!-- Filter -->
    <div class="bg-white shadow rounded-lg p-4 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Cari Pasien</label>
                <input type="text" id="search" placeholder="Nama pasien..." class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="kamar" class="block text-sm font-medium text-gray-700 mb-1">Kamar</label>
                <select id="kamar" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Semua Ruangan</option>
                    @foreach($kamar as $kamar)
                        <option value="{{ $kamar }}">{{ $kamar }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select id="status" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Semua Status</option>
                    <option value="aktif">Dirawat</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>
            <div class="flex items-end">
                <button id="filterBtn" class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Filter
                </button>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. RM</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pasien</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kamar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Masuk</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Keluar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($rawatinap as $rawat)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $rawat->pasien->no_rm }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $rawat->pasien->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $rawat->kamar }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ \Carbon\Carbon::parse($rawat->tanggal_masuk)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $rawat->tanggal_keluar ? \Carbon\Carbon::parse($rawat->tanggal_keluar)->format('d/m/Y') : '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $rawat->status }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada data rawat inap</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($rawatinap->hasPages())
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            {{ $rawatinap->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Script filter -->
<script>
    document.getElementById('filterBtn').addEventListener('click', function () {
        const search = document.getElementById('search').value.toLowerCase();
        const kamar = document.getElementById('kamar').value;
        const status = document.getElementById('status').value;

        document.querySelectorAll('tbody tr').forEach(row => {
            const nama = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            const kamarText = row.querySelector('td:nth-child(3)').textContent.trim();
            const statusText = row.querySelector('td:nth-child(6)').textContent.trim();

            const matchNama = nama.includes(search);
            const matchKamar = kamar === "" || kamarText === kamar;
            const matchStatus = status === "" || (status === "aktif" && statusText === "Dirawat") || (status === "selesai" && statusText === "Selesai");

            row.style.display = (matchNama && matchKamar && matchStatus) ? "" : "none";
        });
    });
</script>
@endsection
