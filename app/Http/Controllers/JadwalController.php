<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use App\Models\Dokter;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $hari = $request->query('hari', 'Senin');
        $dokter_id = $request->query('dokter_id');
        $spesialis = $request->query('spesialis');

        $jadwals = JadwalDokter::with('dokter')
            ->hari($hari)
            ->dokter($dokter_id)
            ->when($spesialis, function($query) use ($spesialis) {
                return $query->whereHas('dokter', function($q) use ($spesialis) {
                    $q->where('spesialis', $spesialis);
                });
            })
            ->orderBy('jam_mulai')
            ->paginate(9);

        $dokter = Dokter::orderBy('nama')->get();
        $spesialis = Dokter::distinct()->pluck('spesialis');

        return view('jadwalDokter', [
            'jadwals' => $jadwals,
            'dokter' => $dokter,
            'spesialis' => $spesialis,
            'activeDay' => $hari,
            'selectedDokter' => $dokter_id,
            'selectedSpesialisasi' => $spesialis
        ]);
    }
}