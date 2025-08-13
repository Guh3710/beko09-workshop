<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JasaBubut;

class JasaBubutSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // ['nama_jasa' => 'Bubut Kruk As Vespa', 'deskripsi' => 'Balancing dan bubut kruk as untuk mesin Vespa klasik & modern.', 'harga' => 500000],
            // ['nama_jasa' => 'Bubut Silinder Vespa', 'deskripsi' => 'Boring up dan bubut silinder Vespa sesuai spek racing.', 'harga' => 450000],
            // ['nama_jasa' => 'Bubut Kepala Silinder Vespa', 'deskripsi' => 'Porting & bubut head Vespa untuk menaikkan kompresi.', 'harga' => 350000],
            // ['nama_jasa' => 'Bubut Rumah Kopling Vespa', 'deskripsi' => 'Custom bubut rumah kopling untuk performa Vespa.', 'harga' => 300000],
            // ['nama_jasa' => 'Bubut Tromol Vespa', 'deskripsi' => 'Bubut tromol Vespa untuk menyesuaikan velg racing.', 'harga' => 200000],
            // ['nama_jasa' => 'Bubut Mangkok Ganda Vespa', 'deskripsi' => 'Bubut mangkok ganda untuk respon lebih cepat.', 'harga' => 250000],
        ];

        foreach ($data as $item) {
            JasaBubut::create($item);
        }
    }
}
