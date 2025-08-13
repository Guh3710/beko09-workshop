<div>
    <div>
        <div class="content-wrapper">
            {{-- HEADER --}}
            <div class="content-header"
                style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364); padding:15px;">
                <div class="container-fluid text-white">
                    <div class="row mb-2 align-items-center">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                <i class="fas fa-home mr-2"></i>
                                <b>@yield('title')</b>
                            </h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <span class="badge badge-light p-2 shadow">
                                <i class="fas fa-user-tag mr-1"></i>
                                Anda login sebagai <b>Pelanggan</b>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CONTENT --}}
            <section class="content mt-3">
                <div class="container-fluid">
                    <div class="row">

                        {{-- PESANAN SAYA --}}
                        <div class="col-lg-4 col-12">
                            <div class="small-box shadow" style="background:#2ecc71; color:white;">
                                <div class="inner text-center">
                                    <h3>{{ $jumlahPesananSaya }}</h3>
                                    <p><strong>Pesanan Saya</strong></p>
                                </div>
                                <div class="icon"><i class="fas fa-shopping-cart fa-2x"></i></div>
                                <a href="{{ route('pelanggan.pesanansaya.index') }}"
                                    class="small-box-footer text-white">
                                    <b>Lihat Pesanan</b> <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        {{-- JASA BUBUT --}}
                        <div class="col-lg-4 col-12">
                            <div class="small-box shadow" style="background:#3498db; color:white;">
                                <div class="inner text-center">
                                    <h3>{{ $jumlahJasaBubut }}</h3>
                                    <p><strong>Daftar Jasa Bubut</strong></p>
                                </div>
                                <div class="icon"><i class="fas fa-tools fa-2x"></i></div>
                                <a href="{{ route('pelanggan.order.index', ['jenis_transaksi' => 'jasa']) }}"
                                    class="small-box-footer text-white">
                                    <b>Pesan Jasa</b> <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        {{-- SPAREPART --}}
                        <div class="col-lg-4 col-12">
                            <div class="small-box shadow" style="background:#9b59b6; color:white;">
                                <div class="inner text-center">
                                    <h3>{{ $jumlahSparepart }}</h3>
                                    <p><strong>Daftar Sparepart</strong></p>
                                </div>
                                <div class="icon"><i class="fas fa-motorcycle fa-2x"></i></div>
                                <a href="{{ route('pelanggan.order.index', ['jenis_transaksi' => 'sparepart']) }}"
                                    class="small-box-footer text-white">
                                    <b>Pesan Sparepart</b> <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
