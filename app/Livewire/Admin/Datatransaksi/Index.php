<?php

namespace App\Livewire\Admin\Datatransaksi;

use App\Exports\DataTransaksiExport;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DataTransaksi;
use App\Models\User;
use App\Models\Sparepart;
use App\Models\JasaBubut;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = '10';
    public $search = '';
    public $title = "Data Transaksi";

    public $data_id;
    public $user_id;
    public $jenis_transaksi;
    public $sparepart;
    public $sparepart_id;
    public $jasa_bubut_id;
    public $jumlah;
    public $total_harga;
    public $status = 'pending';
    public $tanggal_transaksi;

    public $gambarSparepartPreview;

    private function resetCreateInput()
    {
        $this->data_id = null;
        $this->user_id = '';
        $this->jenis_transaksi = '';
        $this->sparepart_id = '';
        $this->jasa_bubut_id = '';
        $this->jumlah = '';
        $this->total_harga = '';
        $this->tanggal_transaksi = '';
        $this->status = 'pending';
        $this->gambarSparepartPreview = null;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->resetCreateInput();
    }

    public function updatedSparepartId($value)
    {
        if ($value) {
            $sparepart = Sparepart::find($value);
            $this->gambarSparepartPreview = $sparepart ? $sparepart->gambar : null;
            if ($sparepart && $this->jumlah) {
                $this->total_harga = (float) ($sparepart->harga ?? 0) * (int) $this->jumlah;
            }
        } else {
            $this->gambarSparepartPreview = null;
        }
    }

    public function updatedJumlah()
    {
        if ($this->jenis_transaksi === 'sparepart' && $this->sparepart_id) {
            $sparepart = Sparepart::find($this->sparepart_id);
            $this->total_harga = $sparepart
                ? (int) $sparepart->harga * (int) $this->jumlah
                : 0;
        } elseif ($this->jenis_transaksi === 'jasa' && $this->jasabubut_id) {
            $jasa = JasaBubut::find($this->jasabubut_id);
            $this->total_harga = $jasa
                ? (int) $jasa->harga * (int) $this->jumlah
                : 0;
        } else {
            $this->total_harga = 0;
        }
    }

    public function resetForm()
    {
        $this->resetValidation();
        $this->reset([
            'data_id',
            'user_id',
            'jenis_transaksi',
            'sparepart_id',
            'jasa_bubut_id',
            'jumlah',
            'total_harga',
            'tanggal_transaksi',
            'status',
            'gambarSparepartPreview'
        ]);
        $this->status = 'pending';
    }

    public function store()
    {
        $this->validate([
            'user_id'           => 'required',
            'jenis_transaksi'   => 'required',
            'jumlah'            => 'required|numeric|min:1',
            'total_harga'       => 'required|numeric|min:0',
            'tanggal_transaksi' => 'required|date',
        ], [
            'user_id.required'           => 'Pilih pelanggan terlebih dahulu.',
            'jenis_transaksi.required'   => 'Pilih jenis transaksi.',
            'jumlah.required'            => 'Jumlah harus diisi.',
            'jumlah.numeric'             => 'Jumlah harus berupa angka.',
            'jumlah.min'                 => 'Jumlah minimal 1.',
            'total_harga.required'       => 'Total harga harus diisi.',
            'total_harga.numeric'        => 'Total harga harus berupa angka.',
            'total_harga.min'            => 'Total harga tidak boleh negatif.',
            'tanggal_transaksi.required' => 'Tanggal transaksi wajib diisi.',
            'tanggal_transaksi.date'     => 'Format tanggal tidak valid.',
        ]);

        if ($this->jenis_transaksi === 'sparepart' && !$this->sparepart_id) {
            $this->addError('sparepart_id', 'Pilih sparepart terlebih dahulu.');
            return;
        }

        if ($this->jenis_transaksi === 'jasa' && !$this->jasa_bubut_id) {
            $this->addError('jasa_bubut_id', 'Pilih jasa bubut terlebih dahulu.');
            return;
        }

        DataTransaksi::create([
            'user_id'           => $this->user_id,
            'jenis_transaksi'   => $this->jenis_transaksi,
            'sparepart_id'      => $this->jenis_transaksi === 'sparepart' ? $this->sparepart_id : null,
            'jasa_bubut_id'     => $this->jenis_transaksi === 'jasa' ? $this->jasa_bubut_id : null,
            'jumlah'            => $this->jumlah,
            'total_harga'       => $this->total_harga,
            'status'            => $this->status,
            'tanggal_transaksi' => $this->tanggal_transaksi,
        ]);

        $this->resetCreateInput();
        $this->dispatch('closeCreateModal');
    }

    public function edit($id)
    {
        $transaksi = DataTransaksi::findOrFail($id);

        $this->data_id = $transaksi->id;
        $this->user_id = $transaksi->user_id;
        $this->sparepart_id = $transaksi->sparepart_id;
        $this->jasa_bubut_id = $transaksi->jasa_bubut_id;
        $this->jumlah = $transaksi->jumlah;
        $this->total_harga = $transaksi->total_harga;
        $this->tanggal_transaksi = $transaksi->tanggal_transaksi;
        $this->status = $transaksi->status;
        $this->jenis_transaksi = $transaksi->sparepart_id ? 'sparepart' : 'jasa';

        if ($this->jenis_transaksi === 'sparepart' && $this->sparepart_id) {
            $sparepart = Sparepart::find($this->sparepart_id);
            $this->gambarSparepartPreview = $sparepart ? $sparepart->gambar : null;
        }
    }

    public function update()
    {
        $this->validate([
            'user_id'           => 'required',
            'jenis_transaksi'   => 'required',
            'jumlah'            => 'required|numeric|min:1',
            'total_harga'       => 'required|numeric|min:0',
            'tanggal_transaksi' => 'required|date',
        ], [
            'user_id.required'           => 'Pilih pelanggan terlebih dahulu.',
            'jenis_transaksi.required'   => 'Pilih jenis transaksi.',
            'jumlah.required'            => 'Jumlah harus diisi.',
            'jumlah.numeric'             => 'Jumlah harus berupa angka.',
            'jumlah.min'                 => 'Jumlah minimal 1.',
            'total_harga.required'       => 'Total harga harus diisi.',
            'total_harga.numeric'        => 'Total harga harus berupa angka.',
            'total_harga.min'            => 'Total harga tidak boleh negatif.',
            'tanggal_transaksi.required' => 'Tanggal transaksi wajib diisi.',
            'tanggal_transaksi.date'     => 'Format tanggal tidak valid.',
        ]);

        if ($this->jenis_transaksi === 'sparepart' && !$this->sparepart_id) {
            $this->addError('sparepart_id', 'Pilih sparepart terlebih dahulu.');
            return;
        }

        if ($this->jenis_transaksi === 'jasa' && !$this->jasa_bubut_id) {
            $this->addError('jasa_bubut_id', 'Pilih jasa bubut terlebih dahulu.');
            return;
        }

        $transaksi = DataTransaksi::findOrFail($this->data_id);

        $transaksi->update([
            'user_id'           => $this->user_id,
            'jenis_transaksi'   => $this->jenis_transaksi,
            'sparepart_id'      => $this->jenis_transaksi === 'sparepart' ? $this->sparepart_id : null,
            'jasa_bubut_id'     => $this->jenis_transaksi === 'jasa' ? $this->jasa_bubut_id : null,
            'jumlah'            => $this->jumlah,
            'total_harga'       => $this->total_harga,
            'status'            => $this->status,
            'tanggal_transaksi' => $this->tanggal_transaksi,
        ]);

        $this->resetCreateInput();
        $this->dispatch('closeEditModal');
    }

    public function confirm($id)
    {
        $this->data_id = $id;
    }

    public function delete()
    {
        DataTransaksi::findOrFail($this->data_id)->delete();
        $this->resetCreateInput();
        $this->dispatch('closeDeleteModal');
    }

    public function ubahStatus($id, $status)
    {
        $transaksi = DataTransaksi::find($id);
        if ($transaksi) {
            $transaksi->status = $status;
            $transaksi->save();

            $this->dispatch('statusUpdated', $status);
        }
    }

    public function render()
    {
        $datatransaksi = DataTransaksi::with(['user', 'sparepart', 'jasabubut'])
            ->where(function ($q) {
                $q->whereHas('user', fn($q2) =>
                $q2->where('nama', 'like', "%{$this->search}%"))
                    ->orWhereHas('sparepart', fn($q2) =>
                    $q2->where('nama_sparepart', 'like', "%{$this->search}%"))
                    ->orWhereHas('jasaBubut', fn($q2) =>
                    $q2->where('nama_jasa', 'like', "%{$this->search}%"));
            })
            ->orderBy('tanggal_transaksi', 'desc')
            ->paginate($this->paginate);

        return view('livewire.admin.datatransaksi.index', [
            'datatransaksi' => $datatransaksi,
            'users' => User::where('status', 'active')->get(),
            'spareparts' => Sparepart::all(),
            'jasa_bubuts' => JasaBubut::all(),
        ]);
    }

    public function exportExcel()
    {
        return Excel::download(new DataTransaksiExport, 'Data_Transaksi.xlsx');
    }

    public function exportPdf()
    {
        $data = DataTransaksi::with(['user', 'sparepart', 'jasaBubut'])->get();
        $pdf = Pdf::loadView('exports.datatransaksi-pdf', compact('data'));

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'Data_Transaksi.pdf');
    }
}
