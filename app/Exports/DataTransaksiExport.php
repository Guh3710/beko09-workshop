<?php

namespace App\Exports;

use App\Models\DataTransaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DataTransaksiExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    private $no = 0;

    public function collection()
    {
        return DataTransaksi::with(['user', 'jasabubut', 'sparepart'])
            ->orderBy('tanggal_transaksi', 'desc')
            ->get();
    }

    public function map($row): array
    {
        $namaItem = '-';
        $gambar = '-';

        if ($row->jenis_transaksi === 'jasa') {
            $namaItem = optional($row->jasabubut)->nama_jasa ?? '-';
            $gambar = optional($row->jasabubut)->gambar
                ? basename($row->jasabubut->gambar)
                : '-';
        } elseif ($row->jenis_transaksi === 'sparepart') {
            $namaItem = optional($row->sparepart)->nama_sparepart ?? '-';
            $gambar = optional($row->sparepart)->gambar
                ? basename($row->sparepart->gambar)
                : '-';
        }

        return [
            ++$this->no,
            optional($row->user)->nama ?? '-',
            ucfirst($row->jenis_transaksi),
            $namaItem,
            $gambar,
            $row->jumlah,
            'Rp. ' . number_format($row->total_harga, 0, ',', '.'),
            ucfirst($row->status),
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Pelanggan',
            'Jenis Transaksi',
            'Nama Item',
            'Gambar',
            'Jumlah',
            'Total Harga',
            'Status'
        ];
    }
}
