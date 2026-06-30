<div class="content-wrapper">
    <section class="content-header" style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364); padding:15px;">
        <div class="container-fluid text-white">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <i class="fas fa-shopping-bag mr-2"></i><b>{{ $title }}</b>
                    </h1>
                </div>
                <div class="col-sm-6 text-right">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}" class="text-white">
                                <i class="fas fa-home mr-1"></i> Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-white">
                            <i class="fas fa-shopping-bag mr-1"></i> Pesanan Saya
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content mt-3 mb-0">
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-body"
                style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);
                       color: #fff; border-top-left-radius: 2px; border-top-right-radius: 2px;">

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($pesananList->isEmpty())
                    <div class="text-center p-4 text-muted">
                        <i class="fas fa-info-circle fa-2x mb-2"></i>
                        <p>Belum ada pesanan.</p>
                    </div>
                @else
                    <table class="table table-bordered table-striped mb-0">
                        <thead class="thead-dark text-center"
                            style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);">
                            <tr>
                                <th width="5%">No</th>
                                <th>Produk/Layanan</th>
                                <th>Jenis</th>
                                <th>Gambar</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Status Pesanan</th>
                                <th>Tanggal Pesanan</th>
                                <th width="12%">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesananList as $index => $p)
                                <tr>
                                    <td class="text-center">
                                        <b>{{ $index + 1 }}.</b>
                                    </td>
                                    <td>
                                        @if ($p->jenis_transaksi == 'jasa')
                                            {{ optional($p->jasaBubut)->nama_jasa ?? '-' }}
                                        @else
                                            <b>{{ optional($p->sparepart)->nama_sparepart ?? '-' }}</b>
                                            <br>
                                            <small class="text-muted">
                                                {{ optional($p->sparepart)->merek ?? '' }}
                                            </small>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($p->jenis_transaksi == 'jasa')
                                            <span class="badge badge-success">
                                                Jasa Bubut
                                            </span>
                                        @else
                                            <span class="badge badge-primary">
                                                Sparepart
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($p->jenis_transaksi == 'sparepart' && optional($p->sparepart)->gambar)
                                            <img src="{{ asset('storage/' . $p->sparepart->gambar) }}"
                                                class="img-thumbnail" width="70" style="object-fit: contain;">
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $p->jumlah }}
                                    </td>
                                    <td class="text-center">
                                        Rp. {{ number_format($p->total_harga, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center">
                                        @if (strtolower($p->status) == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif(strtolower($p->status) == 'proses')
                                            <span class="badge badge-info">Proses</span>
                                        @elseif(strtolower($p->status) == 'selesai')
                                            <span class="badge badge-success">Selesai</span>
                                        @elseif(strtolower($p->status) == 'dibatalkan')
                                            <span class="badge badge-danger">Dibatalkan</span>
                                        @else
                                            <span class="badge badge-secondary">
                                                {{ ucfirst($p->status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($p->tanggal_transaksi)->format('d-m-Y H:i') }}
                                    </td>
                                    <td class="text-center">
                                        @if (strtolower($p->status) == 'pending')
                                            <button onclick="confirmCancel({{ $p->id }})"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-times"></i> Batalkan
                                            </button>
                                        @elseif(strtolower($p->status) == 'dibatalkan')
                                            <span class="badge badge-danger">
                                                Dibatalkan
                                            </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </section>
</div>
<script>
    function confirmCancel(id) {
        Swal.fire({
            title: 'Batalkan Pesanan?',
            text: 'Yakin ingin membatalkan pesanan ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Batalkan',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.find(
                    document.querySelector('[wire\\:id]').getAttribute('wire:id')
                ).call('cancel', id);
            }
        });
    }
</script>
