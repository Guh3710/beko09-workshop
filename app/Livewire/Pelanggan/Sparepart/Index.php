<?php

namespace App\Livewire\Pelanggan\Sparepart;

use App\Models\Sparepart;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $spareparts = Sparepart::all();

        return view('livewire.pelanggan.sparepart.index', [
            'spareparts' => $spareparts,
            'title' => 'Daftar Sparepart'
        ]);
    }
}
