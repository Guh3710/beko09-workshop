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

    public function cancel($id)
    {
        $pesanan = DataTransaksi::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if (strtolower($pesanan->status) == 'pending') {

            if (
                $pesanan->jenis_transaksi == 'sparepart' &&
                $pesanan->sparepart
            ) {
                $pesanan->sparepart->increment(
                    'stok',
                    $pesanan->jumlah
                );
            }

            $pesanan->update([
                'status' => 'dibatalkan'
            ]);

            session()->flash(
                'success',
                'Pesanan berhasil dibatalkan.'
            );
        } else {
            session()->flash(
                'error',
                'Pesanan tidak dapat dibatalkan.'
            );
        }

        $this->mount();
    }

    public function render()
    {
        return view('livewire.pelanggan.pesanansaya.index', [
            'title' => 'Pesanan Saya',
            'pesananList' => $this->pesananList
        ]);
    }
}
