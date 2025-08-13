<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaBubut extends Model

{

    use HasFactory;

    protected $casts = [
        'harga' => 'integer',
    ];

    public function dataTransaksis()
    {
        return $this->hasMany(DataTransaksi::class);
    }

    protected $fillable = ['nama_jasa', 'deskripsi', 'harga'];
}
