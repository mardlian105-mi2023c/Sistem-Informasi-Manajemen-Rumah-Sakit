<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 40; $i++) {
            Pasien::create([
                'nama' => $faker->name,
                'no_rm' => 'RM' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'alamat' => $faker->address,
                'telepon' => $faker->phoneNumber,
                'tanggal_lahir' => $faker->date('Y-m-d', '2005-12-31'),
            ]);
        }
    }
}