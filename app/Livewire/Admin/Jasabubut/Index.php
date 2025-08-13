<?php

namespace App\Livewire\Admin\Jasabubut;

use App\Exports\JasaBubutExport;
use App\Models\JasaBubut;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = '10';
    public $search = '';

    public $nama_jasa, $harga, $deskripsi, $jasa_id, $jasa;

    public function render()
    {
        $data = [
            'title' => 'Data Jasa Bubut',
            'jasabubut' => JasaBubut::where('nama_jasa', 'like', '%' . $this->search . '%')
                ->orWhere('deskripsi', 'like', '%' . $this->search . '%')
                ->orderBy('nama_jasa', 'asc')
                ->paginate($this->paginate),
        ];

        return view('livewire.admin.jasabubut.index', $data);
    }

    public function create()
    {
        $this->resetValidation();
        $this->reset(['nama_jasa', 'harga', 'deskripsi']);
    }

    public function store()
    {
        $this->validate([
            'nama_jasa' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string|max:255',
        ], [
            'nama_jasa.required' => 'Nama jasa tidak boleh kosong',
            'harga.required' => 'Harga tidak boleh kosong',
            'harga.numeric' => 'Harga harus berupa angka',
        ]);

        JasaBubut::create([
            'nama_jasa' => $this->nama_jasa,
            'harga' => $this->harga,
            'deskripsi' => $this->deskripsi,
        ]);

        $this->dispatch('closeCreateModal');
    }

    public function edit($id)
    {
        $this->resetValidation();

        $jasa = JasaBubut::findOrFail($id);
        $this->jasa_id = $jasa->id;
        $this->nama_jasa = $jasa->nama_jasa;
        $this->harga = $jasa->harga;
        $this->deskripsi = $jasa->deskripsi;
    }

    public function update()
    {
        $jasa = JasaBubut::findOrFail($this->jasa_id);

        $this->validate([
            'nama_jasa' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string|max:255',
        ], [
            'nama_jasa.required' => 'Nama jasa tidak boleh kosong',
            'harga.required' => 'Harga tidak boleh kosong',
            'harga.numeric' => 'Harga harus berupa angka',
        ]);

        $jasa->nama_jasa = $this->nama_jasa;
        $jasa->harga = $this->harga;
        $jasa->deskripsi = $this->deskripsi;
        $jasa->save();

        $this->dispatch('closeEditModal');
    }

    public function confirm($id)
    {
        $jasa = JasaBubut::findOrFail($id);
        $this->jasa_id = $jasa->id;
        $this->nama_jasa = $jasa->nama_jasa;
        $this->harga = $jasa->harga;
        $this->deskripsi = $jasa->deskripsi;
    }

    public function destroy($id)
    {
        $jasa = JasaBubut::findOrFail($id);
        $jasa->delete();

        $this->dispatch('closeDeleteModal');
    }

    public function exportExcel()
    {
        return Excel::download(new JasaBubutExport, 'Jasa_Bubut.xlsx');
    }

    public function exportPdf()
    {
        $data = JasaBubut::all();
        $pdf = Pdf::loadView('exports.jasabubut-pdf', compact('data'));

        // return response untuk download
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'Jasa_Bubut.pdf');
    }
}
