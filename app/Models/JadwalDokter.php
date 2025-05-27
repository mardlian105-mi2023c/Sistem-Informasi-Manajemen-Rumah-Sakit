<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalDokter extends Model
{
    use HasFactory;

    protected $table = 'jadwal_dokter';

    protected $fillable = [
        'dokter_id', 'hari', 'jam_mulai', 'jam_selesai',
    ];

    protected $casts = [
        'jam_mulai' => 'datetime:H:i',
        'jam_selesai' => 'datetime:H:i',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    // Scope untuk filter hari
    public function scopeHari($query, $hari)
    {
        return $hari ? $query->where('hari', $hari) : $query;
    }

    // Scope untuk filter dokter
    public function scopeDokter($query, $dokter_id)
    {
        return $dokter_id ? $query->where('dokter_id', $dokter_id) : $query;
    }
}