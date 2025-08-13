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

                @if ($pesananList->isEmpty())
                    <div class="text-center p-4 text-muted">
                        <i class="fas fa-info-circle fa-2x mb-2"></i>
                        <p>Belum ada pesanan.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0">
                            <thead class="thead-dark text-center"
                                style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Jenis</th>
                                    <th>Gambar</th>
                                    <th>Item</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesananList as $index => $p)
                                    <tr>
                                        <td class="text-center"><b>{{ $index + 1 }}.</b></td>
                                        <td class="text-center">
                                            {{ $p->jenis_transaksi == 'jasa' ? 'Jasa Bubut' : 'Sparepart' }}
                                        </td>
                                        <td class="text-center">
                                            @if ($p->jenis_transaksi == 'sparepart' && optional($p->sparepart)->gambar)
                                                <img src="{{ asset('storage/' . $p->sparepart->gambar) }}"
                                                    class="img-thumbnail" width="70" style="object-fit: contain;">
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($p->jenis_transaksi == 'jasa')
                                                {{ optional($p->jasaBubut)->nama_jasa ?? '-' }}
                                            @else
                                                <b>{{ optional($p->sparepart)->nama_sparepart ?? '-' }}</b><br>
                                                <small
                                                    class="text-muted">{{ optional($p->sparepart)->merek ?? '' }}</small>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $p->jumlah }}</td>
                                        <td class="text-center">Rp. {{ number_format($p->total_harga, 0, ',', '.') }}
                                        </td>
                                        <td class="text-center">
                                            @if ($p->status == 'pending')
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif($p->status == 'proses')
                                                <span class="badge badge-info">Proses</span>
                                            @elseif($p->status == 'selesai')
                                                <span class="badge badge-success">Selesai</span>
                                            @else
                                                <span class="badge badge-secondary">{{ ucfirst($p->status) }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $p->tanggal_transaksi->format('d-m-Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
