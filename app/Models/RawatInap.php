<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatInap extends Model
{
    use HasFactory;

    protected $table = 'rawatinap';

    protected $fillable = [
        'pasien_id',
        'kamar',
        'status',
        'tanggal_masuk',
        'tanggal_keluar',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}