<?php

namespace App\Livewire\Pelanggan\JasaBubut;

use App\Models\JasaBubut;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $jasa_bubuts = JasaBubut::all();

        return view('livewire.pelanggan.jasabubut.index', [
            'jasa_bubuts' => $jasa_bubuts,
            'title' => 'Daftar Jasa Bubut'
        ]);
    }
}
