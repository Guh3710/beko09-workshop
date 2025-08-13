<div>
    <div class="content-wrapper">
        <section class="content-header"
            style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364); padding:15px;">
            <div class="container-fluid text-white">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            <i class="fas fa-receipt mr-2"></i><b>{{ $title }}</b>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right" style="background: transparent;">
                            <li class="breadcrumb-item">
                                <a class="text-white"><i class="fas fa-home mr-1"></i>Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active text-white">
                                <i class="fas fa-receipt mr-1"></i><b>{{ $title }}</b>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content" style="padding: 15px; margin-bottom:0;">
            <div class="card"
                style="background: #ffffff; border-radius: 10px; box-shadow: 0 3px 8px rgba(0,0,0,0.2);">
                <div class="card-body"
                    style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);
                           color: #fff; border-top-left-radius: 5px; border-top-right-radius: 5px; padding-bottom:0;">
                    <div class="container">
                        <table class="table table-bordered table-striped mb-0">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Merek</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Satuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($spareparts as $index => $sparepart)
                                    <tr>
                                        <td class="text-center"><b>{{ $index + 1 }}.</b></td>
                                        <td>{{ $sparepart->nama_sparepart }}</td>
                                        <td class="text-center">
                                            @if ($sparepart->gambar)
                                                <img src="{{ asset('storage/' . $sparepart->gambar) }}"
                                                    class="img-thumbnail" width="70">
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>{{ $sparepart->merek }}</td>
                                        <td class="text-center">
                                            Rp. {{ number_format($sparepart->harga, 0, ',', '.') }}
                                        </td>
                                        <td class="text-center">{{ $sparepart->stok }}</td>
                                        <td class="text-center">{{ $sparepart->satuan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
