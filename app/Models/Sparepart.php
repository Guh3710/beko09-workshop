<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;

    protected $table = 'spareparts';

    protected $casts = [
        'harga' => 'integer',
    ];

    protected $fillable = [
        'nama_sparepart',
        'merek',
        'harga',
        'stok',
        'satuan',
        'gambar',
    ];
    public function dataTransaksis()
    {
        return $this->hasMany(DataTransaksi::class);
    }
}
