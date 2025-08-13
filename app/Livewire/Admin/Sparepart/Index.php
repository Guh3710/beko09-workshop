<?php

namespace App\Livewire\Admin\Sparepart;

use App\Exports\SparepartExport;
use App\Models\Sparepart;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $paginate = '10', $search = '';
    public $sparepart_id, $nama_sparepart, $merek, $harga, $stok, $satuan, $gambar, $gambar_lama, $gambar_lama_delete;

    protected $listeners = ['resetModal'];

    protected $messages = [
        'nama_sparepart.required' => 'Nama sparepart wajib diisi.',
        'nama_sparepart.max'      => 'Nama sparepart maksimal :max karakter.',
        'merek.required'          => 'Merek wajib diisi.',
        'merek.max'               => 'Merek maksimal :max karakter.',
        'harga.required'          => 'Harga wajib diisi.',
        'harga.numeric'           => 'Harga harus berupa angka.',
        'harga.min'               => 'Harga minimal :min.',
        'stok.required'           => 'Stok wajib diisi.',
        'stok.integer'            => 'Stok harus berupa angka.',
        'stok.min'                => 'Stok minimal :min.',
        'satuan.required'         => 'Satuan wajib diisi.',
        'satuan.max'              => 'Satuan maksimal :max karakter.',
        'gambar.image'            => 'File harus berupa gambar.',
        'gambar.max'              => 'Ukuran gambar maksimal 2MB.',
    ];

    public function render()
    {
        return view('livewire.admin.sparepart.index', [
            'title' => 'Data Sparepart',
            'spareparts' => Sparepart::where('nama_sparepart', 'like', '%' . $this->search . '%')
                ->orWhere('merek', 'like', '%' . $this->search . '%')
                ->orderBy('nama_sparepart', 'asc')
                ->paginate($this->paginate),
        ]);
    }

    public function create()
    {
        $this->resetForm();
    }

    public function store()
    {
        $this->validate([
            'nama_sparepart' => 'required|string|max:255',
            'merek'          => 'required|string|max:255',
            'harga'          => 'required|numeric|min:0',
            'stok'           => 'required|integer|min:0',
            'satuan'         => 'required|string|max:50',
            'gambar'         => 'nullable|image|max:2048',
        ]);

        $path_gambar = $this->gambar ? $this->gambar->store('sparepart', 'public') : null;

        Sparepart::create([
            'nama_sparepart' => $this->nama_sparepart,
            'merek'          => $this->merek,
            'harga'          => (float) $this->harga,
            'stok'           => $this->stok,
            'satuan'         => $this->satuan,
            'gambar'         => $path_gambar
        ]);

        $this->dispatch('closeCreateModal');
        $this->resetForm();
    }

    public function edit($id)
    {
        $this->resetForm();

        $sparepart = Sparepart::findOrFail($id);
        $this->sparepart_id   = $sparepart->id;
        $this->nama_sparepart = $sparepart->nama_sparepart;
        $this->merek          = $sparepart->merek;
        $this->harga          = $sparepart->harga !== null ? (float) $sparepart->harga : null;
        $this->stok           = $sparepart->stok;
        $this->satuan         = $sparepart->satuan;
        $this->gambar_lama    = $sparepart->gambar;
    }

    public function update()
    {
        $sparepart = Sparepart::findOrFail($this->sparepart_id);

        $this->validate([
            'nama_sparepart' => 'required|string|max:255',
            'merek'          => 'required|string|max:255',
            'harga'          => 'nullable|numeric|min:0',
            'stok'           => 'required|integer|min:0',
            'satuan'         => 'required|string|max:50',
            'gambar'         => 'nullable|image|max:2048',
        ]);

        // handle gambar
        $path_gambar = $this->gambar_lama;
        if ($this->gambar) {
            if ($this->gambar_lama && Storage::disk('public')->exists($this->gambar_lama)) {
                Storage::disk('public')->delete($this->gambar_lama);
            }
            $path_gambar = $this->gambar->store('sparepart', 'public');
        }

        $sparepart->update([
            'nama_sparepart' => $this->nama_sparepart,
            'merek'          => $this->merek,
            'harga'          => $this->harga !== null ? (float) $this->harga : null,
            'stok'           => $this->stok,
            'satuan'         => $this->satuan,
            'gambar'         => $path_gambar,
        ]);

        $this->dispatch('closeEditModal');
        $this->resetForm();
    }

    public function confirm($id)
    {
        $sparepart = Sparepart::findOrFail($id);
        $this->sparepart_id = $id;
        $this->nama_sparepart = $sparepart->nama_sparepart;
        $this->merek = $sparepart->merek;
        $this->harga = $sparepart->harga;
        $this->stok = $sparepart->stok;
        $this->satuan = $sparepart->satuan;
        $this->gambar_lama_delete = $sparepart->gambar;
    }

    public function destroy()
    {
        $sparepart = Sparepart::findOrFail($this->sparepart_id);

        if ($sparepart->gambar && Storage::disk('public')->exists($sparepart->gambar)) {
            Storage::disk('public')->delete($sparepart->gambar);
        }

        $sparepart->delete();

        $this->resetForm();
        $this->gambar_lama_delete = null;

        $this->dispatch('closeDeleteModal');
    }

    public function resetModal()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['sparepart_id', 'nama_sparepart', 'merek', 'harga', 'stok', 'satuan', 'gambar', 'gambar_lama']);
        $this->resetValidation();
    }
    public function exportExcel()
    {
        return Excel::download(new SparepartExport, 'DataSparepart.xlsx');
    }

    public function exportPdf()
    {
        $data = Sparepart::all();
        $pdf = Pdf::loadView('exports.sparepart-pdf', compact('data'));

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'Data_Sparepart.pdf');
    }
}
