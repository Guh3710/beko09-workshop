<?php

namespace App\Livewire\Pelanggan\Pesanansaya;

use Livewire\Component;
use App\Models\DataTransaksi;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $pesananList = [];

    public function mount()
    {
        $this->pesananList = DataTransaksi::where('user_id', Auth::id())
            ->with(['jasaBubut', 'sparepart']) // eager load relasi
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.pelanggan.pesanansaya.index', [
            'title' => 'Pesanan Saya',
            'pesananList' => $this->pesananList
        ]);
    }
}
