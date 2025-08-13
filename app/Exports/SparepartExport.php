<?php


namespace App\Exports;

use App\Models\Sparepart;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SparepartExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    private $no = 0;

    public function collection()
    {
        return Sparepart::select('nama_sparepart', 'gambar', 'merek', 'harga', 'stok', 'satuan')->get();
    }

    public function map($row): array
    {
        return [
            ++$this->no,
            $row->nama_sparepart,
            $row->gambar,
            $row->merek,
            $row->harga,
            $row->stok,
            $row->satuan,
        ];
    }

    public function headings(): array
    {
        return ['No', 'Nama Sparepart', 'Gambar', 'Merek', 'Harga', 'Stok', 'Satuan'];
    }
}
