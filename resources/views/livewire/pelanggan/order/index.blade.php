<div>
    <div class="content-wrapper">
        {{-- HEADER --}}
        <section class="content-header"
            style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364); padding:15px;">
            <div class="container-fluid text-white">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            <i class="fas fa-shopping-cart mr-2"></i><b>{{ $title }}</b>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right" style="background: transparent;">
                            <li class="breadcrumb-item">
                                <a class="text-white">
                                    <i class="fas fa-home mr-1"></i> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-white">
                                <i class="fas fa-shopping-cart mr-1"></i><b>{{ $title }}</b>
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

                    {{-- ALERT ERROR --}}
                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">
                                &times;
                            </button>

                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($step == 1)
                        <h4 class="mb-3 text-center text-black mb-4">
                            <i class="fas fa-list mr-3"></i><b>Pilih Jenis Transaksi</b>
                        </h4>

                        <div class="row text-center">
                            <div class="col-md-6 mb-3">
                                <button type="button" wire:click="setJenisTransaksi('jasa')"
                                    class="btn btn-success btn-lg px-4 py-3 w-100 shadow-sm">
                                    <i class="fas fa-tools mr-2"></i><b>Jasa Bubut</b>
                                </button>
                            </div>

                            <div class="col-md-6 mb-3">
                                <button type="button" wire:click="setJenisTransaksi('sparepart')"
                                    class="btn btn-primary btn-lg px-4 py-3 w-100 shadow-sm">
                                    <i class="fas fa-motorcycle mr-2"></i><b>Sparepart</b>
                                </button>
                            </div>
                        </div>
                    @endif

                    @if ($step == 2)
                        <div class="d-flex justify-content-start mb-3">
                            <button wire:click="backToStep1" class="btn btn-md btn-danger">
                                <i class="fas fa-arrow-left mr-1"></i>Kembali
                            </button>
                        </div>

                        @if ($jenis_transaksi == 'jasa')
                            <h4 class="mb-4 text-center text-success">
                                <i class="fas fa-cogs mr-2"></i><b>Pilih Jasa Bubut</b>
                            </h4>

                            <div class="row">
                                @foreach ($jasa_bubuts as $jb)
                                    <div class="col-md-4 mb-3">
                                        <div class="card shadow-lg border-0">
                                            <div class="card-body text-center">
                                                <h5><b>{{ $jb->nama_jasa }}</b></h5>

                                                <p class="text-success">
                                                    <b>Rp.{{ number_format((float) $jb->harga, 0, ',', '.') }}</b>
                                                </p>

                                                <button wire:click="pilihJasaBubut({{ $jb->id }})"
                                                    class="btn btn-success btn-md btn-block px-3">
                                                    Pilih
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if ($jenis_transaksi == 'sparepart')
                            <h4 class="mb-4 text-center text-primary">
                                <i class="fas fa-motorcycle mr-2"></i><b>Pilih Sparepart</b>
                            </h4>

                            <div class="row">
                                @foreach ($spareparts as $sp)
                                    <div class="col-md-4 mb-3">
                                        <div class="card shadow-lg border-0">

                                            <div class="card-body text-center">

                                                @if ($sp->gambar)
                                                    <img src="{{ asset('storage/' . $sp->gambar) }}"
                                                        class="img-fluid mb-2"
                                                        style="max-height:120px; object-fit:contain;">
                                                @else
                                                    <img src="{{ asset('images/no-image.png') }}" class="img-fluid mb-2"
                                                        style="max-height:120px; object-fit:contain;">
                                                @endif

                                                <h5 class="mb-1">
                                                    <b>{{ $sp->nama_sparepart }}</b>
                                                </h5>

                                                <b class="text-muted d-block mb-1">
                                                    {{ $sp->merek }}
                                                </b>

                                                {{-- STOK --}}
                                                <p class="mb-1">
                                                    <b>
                                                        Stok :
                                                        @if ($sp->stok > 0)
                                                            <span class="text-success">
                                                                {{ $sp->stok }}
                                                            </span>
                                                        @else
                                                            <span class="text-danger">
                                                                Habis
                                                            </span>
                                                        @endif
                                                    </b>
                                                </p>

                                                <p class="text-success mb-2">
                                                    <b>
                                                        Rp.{{ number_format((float) $sp->harga, 0, ',', '.') }}
                                                    </b>
                                                </p>

                                                <button wire:click="pilihSparepart({{ $sp->id }})"
                                                    class="btn btn-primary btn-md btn-block px-3"
                                                    {{ $sp->stok <= 0 ? 'disabled' : '' }}>

                                                    {{ $sp->stok <= 0 ? 'Stok Habis' : 'Pilih' }}
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endif

                    @if ($step == 3)
                        <button wire:click="$set('step', 2)" class="btn btn-mb btn-danger mb-3">
                            <i class="fas fa-arrow-left mr-1"></i>Kembali
                        </button>

                        <div class="card p-4 shadow-sm border-0">

                            <h4 class="text-info">
                                <b>Konfirmasi Pesanan</b>
                            </h4>

                            @if ($jenis_transaksi == 'sparepart')
                                @php $item = $spareparts->where('id', $sparepart_id)->first(); @endphp
                            @else
                                @php $item = $jasa_bubuts->where('id', $jasa_bubut_id)->first(); @endphp
                            @endif

                            @if ($item)
                                <div class="mb-3 text-center">

                                    @if ($jenis_transaksi == 'sparepart' && $item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid mb-3"
                                            style="max-height:150px; object-fit:contain;">
                                    @endif

                                    <h5 class="mb-1">
                                        <b>{{ $item->nama_sparepart ?? $item->nama_jasa }}</b>
                                    </h5>

                                    @if ($jenis_transaksi == 'sparepart')
                                        <b class="text-muted mb-1 d-block">
                                            Merek : {{ $item->merek }}
                                        </b>

                                        <b class="d-block mb-2">
                                            Stok Tersedia :
                                            <span class="text-success">
                                                {{ $item->stok }}
                                            </span>
                                        </b>
                                    @endif

                                    <p>
                                        <b>
                                            Harga Satuan :
                                            Rp. {{ number_format((float) $item->harga, 0, ',', '.') }}
                                        </b>
                                    </p>
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Jumlah</label>

                                <input type="number" wire:model.live="jumlah" min="1" class="form-control"
                                    style="max-width: 120px;">
                            </div>

                            <h5 class="mt-3">
                                Total:
                                <b class="text-success">
                                    Rp.{{ number_format((float) $total_harga, 0, ',', '.') }}
                                </b>
                            </h5>

                            <button wire:click="buatOrder" class="btn btn-success btn-lg mt-3">

                                <i class="fas fa-check-circle mr-1"></i>
                                Buat Pesanan
                            </button>

                        </div>
                    @endif

                </div>
            </div>
        </section>

        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
                Livewire.on('orderSuccess', () => {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Pesanan berhasil dibuat. Mohon menunggu konfirmasi dari Admin.',
                        icon: 'success',
                        confirmButtonText: '<i class="fas fa-check"></i> Lihat Pesanan Saya'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('pelanggan.pesanansaya.index') }}";
                        }
                    });
                });

                Livewire.on('stokHabis', () => {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Stok sparepart tidak mencukupi',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
            </script>
        @endpush

    </div>
</div>
