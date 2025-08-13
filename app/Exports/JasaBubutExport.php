<?php

namespace App\Exports;

use App\Models\JasaBubut;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class JasaBubutExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    private $no = 0;

    public function collection()
    {
        return JasaBubut::select('nama_jasa', 'deskripsi', 'harga')->get();
    }

    public function map($row): array
    {
        return [
            ++$this->no,
            $row->nama_jasa,
            $row->deskripsi,
            $row->harga,
        ];
    }

    public function headings(): array
    {
        return ['No', 'Nama Jasa', 'Deskripsi', 'Harga'];
    }
}
