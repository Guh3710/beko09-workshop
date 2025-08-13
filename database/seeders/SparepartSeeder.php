<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SparepartSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('spareparts')->insert([
            [
                'kode' => 'SP001',
                'nama_sparepart' => 'Klep Racing Titanium',
                'merek' => 'Kawahara',
                'stok' => 30,
                'satuan' => 'pcs',
                'harga' => 350000,
                'deskripsi' => 'Klep racing titanium ringan, cocok untuk mesin bore up & drag.'
            ],
            [
                'kode' => 'SP002',
                'nama_sparepart' => 'Noken As Racing',
                'merek' => 'TK Racing',
                'stok' => 25,
                'satuan' => 'pcs',
                'harga' => 550000,
                'deskripsi' => 'Noken as high lift untuk performa mesin maksimal.'
            ],
            [
                'kode' => 'SP003',
                'nama_sparepart' => 'Piston High Compression 62mm',
                'merek' => 'Daytona',
                'stok' => 20,
                'satuan' => 'pcs',
                'harga' => 450000,
                'deskripsi' => 'Piston forged dengan kompresi tinggi untuk balap.'
            ],
            [
                'kode' => 'SP004',
                'nama_sparepart' => 'Set Kruk As Racing',
                'merek' => 'Racing Boy',
                'stok' => 15,
                'satuan' => 'set',
                'harga' => 1200000,
                'deskripsi' => 'Kruk as racing kuat dan tahan rpm tinggi.'
            ],
            [
                'kode' => 'SP005',
                'nama_sparepart' => 'Bore Up Kit 63mm',
                'merek' => 'Uma Racing',
                'stok' => 18,
                'satuan' => 'set',
                'harga' => 750000,
                'deskripsi' => 'Bore up kit 63mm untuk meningkatkan kapasitas mesin.'
            ],
            [
                'kode' => 'SP006',
                'nama_sparepart' => 'Karburator PWK 28',
                'merek' => 'Keihin',
                'stok' => 12,
                'satuan' => 'pcs',
                'harga' => 950000,
                'deskripsi' => 'Karburator PWK 28 Keihin original, respons gas cepat.'
            ],
            [
                'kode' => 'SP007',
                'nama_sparepart' => 'Karburator PE 28 Vespa',
                'merek' => 'Keihin',
                'stok' => 10,
                'satuan' => 'pcs',
                'harga' => 900000,
                'deskripsi' => 'Karburator PE28 untuk mesin Vespa balap.'
            ],
            [
                'kode' => 'SP008',
                'nama_sparepart' => 'Piston Vespa Polini 60mm',
                'merek' => 'Polini',
                'stok' => 10,
                'satuan' => 'pcs',
                'harga' => 500000,
                'deskripsi' => 'Piston Polini 60mm untuk mesin Vespa bore up.'
            ],
            [
                'kode' => 'SP009',
                'nama_sparepart' => 'Kruk As Vespa Racing',
                'merek' => 'Mazzucchelli',
                'stok' => 8,
                'satuan' => 'pcs',
                'harga' => 1350000,
                'deskripsi' => 'Kruk as racing Vespa full balance.'
            ],
            [
                'kode' => 'SP010',
                'nama_sparepart' => 'CDI Racing Adjustable',
                'merek' => 'BRT',
                'stok' => 22,
                'satuan' => 'pcs',
                'harga' => 600000,
                'deskripsi' => 'CDI racing dengan pengaturan kurva pengapian.'
            ],
            [
                'kode' => 'SP011',
                'nama_sparepart' => 'Coil Racing',
                'merek' => 'Yamaha Racing',
                'stok' => 25,
                'satuan' => 'pcs',
                'harga' => 350000,
                'deskripsi' => 'Coil racing untuk api pengapian lebih stabil.'
            ],
            [
                'kode' => 'SP012',
                'nama_sparepart' => 'Velg Racing Tapak Lebar',
                'merek' => 'Racing Boy',
                'stok' => 14,
                'satuan' => 'set',
                'harga' => 2200000,
                'deskripsi' => 'Velg racing aluminium tapak lebar untuk drag race.'
            ],
            [
                'kode' => 'SP013',
                'nama_sparepart' => 'Clutch Set Racing',
                'merek' => 'SND Racing',
                'stok' => 15,
                'satuan' => 'set',
                'harga' => 700000,
                'deskripsi' => 'Clutch set racing kuat untuk tarikan mesin besar.'
            ],
            [
                'kode' => 'SP014',
                'nama_sparepart' => 'Gear Set Drag',
                'merek' => 'TK Racing',
                'stok' => 20,
                'satuan' => 'set',
                'harga' => 400000,
                'deskripsi' => 'Gear set rasio drag khusus untuk balap jarak pendek.'
            ],
            [
                'kode' => 'SP015',
                'nama_sparepart' => 'Shockbreaker Tabung Racing',
                'merek' => 'YSS',
                'stok' => 10,
                'satuan' => 'pcs',
                'harga' => 1800000,
                'deskripsi' => 'Shockbreaker tabung gas racing adjustable.'
            ],
            [
                'kode' => 'SP016',
                'nama_sparepart' => 'Camshaft High Lift',
                'merek' => 'SND Racing',
                'stok' => 12,
                'satuan' => 'pcs',
                'harga' => 550000,
                'deskripsi' => 'Camshaft high lift untuk performa maksimal.'
            ],
            [
                'kode' => 'SP017',
                'nama_sparepart' => 'Filter Udara Racing',
                'merek' => 'K&N',
                'stok' => 25,
                'satuan' => 'pcs',
                'harga' => 250000,
                'deskripsi' => 'Filter udara racing reusable untuk tarikan ringan.'
            ],
            [
                'kode' => 'SP018',
                'nama_sparepart' => 'Master Rem Racing',
                'merek' => 'Racing Boy',
                'stok' => 10,
                'satuan' => 'pcs',
                'harga' => 750000,
                'deskripsi' => 'Master rem racing radial untuk pengereman optimal.'
            ],
            [
                'kode' => 'SP019',
                'nama_sparepart' => 'Throttle Body 34mm',
                'merek' => 'Uma Racing',
                'stok' => 10,
                'satuan' => 'pcs',
                'harga' => 1300000,
                'deskripsi' => 'Throttle body besar untuk motor injeksi balap.'
            ],
            [
                'kode' => 'SP020',
                'nama_sparepart' => 'Ban Slick Drag',
                'merek' => 'IRC',
                'stok' => 30,
                'satuan' => 'pcs',
                'harga' => 500000,
                'deskripsi' => 'Ban slick khusus drag dengan cengkraman maksimal.'
            ]
        ]);
    }
}
