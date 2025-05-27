<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokter;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokter = [
            ['nama' => 'Dr. Andi Susanto',     'spesialis' => 'Penyakit Dalam', 'no_telepon' => '081234567891'],
            ['nama' => 'Dr. Rina Kartika',     'spesialis' => 'Anak',           'no_telepon' => '081234567892'],
            ['nama' => 'Dr. Budi Hartono',     'spesialis' => 'Bedah Umum',     'no_telepon' => '081234567893'],
            ['nama' => 'Dr. Lestari Wulandari','spesialis' => 'Gigi',           'no_telepon' => '081234567894'],
            ['nama' => 'Dr. Yudi Saputra',     'spesialis' => 'Saraf',          'no_telepon' => '081234567895'],
            ['nama' => 'Dr. Sari Utami',       'spesialis' => 'Kandungan',      'no_telepon' => '081234567896'],
            ['nama' => 'Dr. Ahmad Fauzi',      'spesialis' => 'Kulit & Kelamin','no_telepon' => '081234567897'],
        ];

        foreach ($dokter as $dokter) {
            Dokter::create($dokter);
        }
    }
}