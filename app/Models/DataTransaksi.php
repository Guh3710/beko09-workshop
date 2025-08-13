<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataTransaksi extends Model
{
    protected $table = 'transaksis';

    protected $fillable = [
        'user_id',
        'jenis_transaksi',
        'sparepart_id',
        'jasa_bubut_id',
        'jumlah',
        'total_harga',
        'status',
        'tanggal_transaksi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class);
    }

    public function jasaBubut()
    {
        return $this->belongsTo(JasaBubut::class);
    }

    protected $casts = [
        'tanggal_transaksi' => 'datetime',
    ];
}
