<?php

namespace App\Livewire\Pelanggan\Order;

use Livewire\Component;
use App\Models\Sparepart;
use App\Models\JasaBubut;
use App\Models\DataTransaksi;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $jenis_transaksi = '';
    public $sparepart_id = '';
    public $jasa_bubut_id = '';
    public $step = 1;
    public $jumlah = 1;
    public $total_harga = 0;
    public $title = "Order Jasa Bubut & Sparepart";

    protected $queryString = [
        'step' => ['except' => 1],
        'jenis_transaksi' => ['except' => ''],
        'sparepart_id' => ['except' => ''],
        'jasa_bubut_id' => ['except' => '']
    ];

    public function setJenisTransaksi($jenis)
    {
        $this->jenis_transaksi = $jenis;
        $this->step = 2;
    }

    public function backToStep1()
    {
        $this->step = 1;
        $this->sparepart_id = '';
        $this->jasa_bubut_id = '';
        $this->total_harga = 0;
        $this->jumlah = 1;
        $this->jenis_transaksi = '';
    }

    public function pilihSparepart($id)
    {
        $this->sparepart_id = $id;
        $sp = Sparepart::find($id);

        $this->jumlah = 1;
        $this->total_harga = $sp ? (int) $sp->harga : 0;
        $this->step = 3;
    }

    public function pilihJasaBubut($id)
    {
        $this->jasa_bubut_id = $id;
        $jb = JasaBubut::find($id);

        $this->jumlah = 1;
        $this->total_harga = $jb ? (int) $jb->harga : 0;
        $this->step = 3;
    }

    public function updatedJumlah()
    {
        $this->jumlah = (int) $this->jumlah;

        if ($this->jenis_transaksi === 'sparepart' && $this->sparepart_id) {
            $sp = Sparepart::find($this->sparepart_id);
            $this->total_harga = $sp ? (int) $sp->harga * $this->jumlah : 0;
        } elseif ($this->jenis_transaksi === 'jasa' && $this->jasa_bubut_id) {
            $jb = JasaBubut::find($this->jasa_bubut_id);
            $this->total_harga = $jb ? (int) $jb->harga * $this->jumlah : 0;
        }
    }

    public function buatOrder()
    {
        $this->validate([
            'jenis_transaksi' => 'required',
            'jumlah' => 'required|numeric|min:1',
        ]);

        // CEK STOK SPAREPART
        if ($this->jenis_transaksi === 'sparepart') {

            $sparepart = Sparepart::find($this->sparepart_id);

            // cek stok cukup atau tidak
            if (!$sparepart || $this->jumlah > $sparepart->stok) {

                session()->flash('error', 'Stok sparepart tidak mencukupi');

                return;
            }
        }

        // SIMPAN TRANSAKSI
        DataTransaksi::create([
            'user_id' => Auth::id(),
            'jenis_transaksi' => $this->jenis_transaksi,
            'sparepart_id' => $this->jenis_transaksi === 'sparepart'
                ? $this->sparepart_id
                : null,

            'jasa_bubut_id' => $this->jenis_transaksi === 'jasa'
                ? $this->jasa_bubut_id
                : null,

            'jumlah' => $this->jumlah,
            'total_harga' => $this->total_harga,
            'status' => 'pending',
            'tanggal_transaksi' => now(),
        ]);

        // KURANGI STOK
        if ($this->jenis_transaksi === 'sparepart') {

            $sparepart->decrement('stok', $this->jumlah);
        }

        $this->dispatch('orderSuccess');

        $this->reset([
            'jenis_transaksi',
            'sparepart_id',
            'jasa_bubut_id',
            'jumlah',
            'total_harga',
            'step'
        ]);

        $this->step = 1;
    }

    public function render()
    {
        return view('livewire.pelanggan.order.index', [
            'spareparts' => Sparepart::all(),
            'jasa_bubuts' => JasaBubut::all(),
        ]);
    }
}
