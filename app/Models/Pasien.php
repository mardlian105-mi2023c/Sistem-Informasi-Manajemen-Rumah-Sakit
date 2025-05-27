<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';

    protected $fillable = [
        'nama', 'no_rm', 'alamat', 'telepon', 'tanggal_lahir',
    ];

    public function rawatInaps()
    {
        return $this->hasMany(RawatInap::class);
    }
}