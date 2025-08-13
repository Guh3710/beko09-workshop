<div>
    <div class="content-wrapper">
        <div class="content-header" style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364); padding:15px;">
            <div class="container-fluid text-white">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            <i class="fas fa-home mr-2"></i>
                            <b>{{ $title }}</b>
                        </h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <span class="badge badge-light p-2 shadow">
                            <i class="fas fa-user-tag mr-1"></i>
                            Anda login sebagai <b>{{ ucfirst($role) }}</b>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <section class="content mt-3">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <h4 class="text-white border-bottom pb-2">
                            <i class="fas fa-user-shield text-info mr-2"></i>
                            <strong>FITUR ADMIN</strong>
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box shadow" style="background:#f1c40f; color:white;">
                            <div class="inner text-center">
                                <h3>{{ $jumlahUser }}</h3>
                                <p><strong>User Terdaftar</strong></p>
                            </div>
                            <div class="icon" style="top:10px; right:10px;">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <a href="{{ route('admin.user.index') }}" class="small-box-footer text-white">
                                <b>Lihat User</b> <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box shadow" style="background:#e74c3c; color:white;">
                            <div class="inner text-center">
                                <h3>{{ $jumlahJasaBubut }}</h3>
                                <p><strong>Data Jasa Bubut</strong></p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-tools fa-2x"></i>
                            </div>
                            <a href="{{ route('admin.jasabubut.index') }}" class="small-box-footer text-white">
                                <b>Lihat Jasa Bubut</b> <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box shadow" style="background:#7f8c8d; color:white;">
                            <div class="inner text-center">
                                <h3>{{ $jumlahSparepart }}</h3>
                                <p><strong>Data Sparepart</strong></p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-motorcycle fa-2x"></i>
                            </div>
                            <a href="{{ route('admin.sparepart.index') }}" class="small-box-footer text-white">
                                <b>Lihat Sparepart</b> <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box shadow" style="background:#2ecc71; color:white;">
                            <div class="inner text-center">
                                <h3>{{ $jumlahTransaksi }}</h3>
                                <p><strong>Data Transaksi</strong></p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-file-invoice-dollar fa-2x"></i>
                            </div>
                            <a href="{{ route('admin.datatransaksi.index') }}" class="small-box-footer text-white">
                                <b>Lihat Transaksi</b> <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 mb-2">
                    <div class="col-12">
                        <h4 class="text-white border-bottom pb-2">
                            <i class="fas fa-user-friends text-success mr-2"></i>
                            <strong>FITUR PELANGGAN</strong>
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box shadow" style="background:#3498db; color:white;">
                            <div class="inner text-center">
                                <h3>{{ $jumlahJasaBubut }}</h3>
                                <p><strong>Daftar Jasa Bubut</strong></p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-tools fa-2x"></i>
                            </div>
                            <a href="{{ route('pelanggan.jasabubut.index') }}" class="small-box-footer text-white">
                                <b>Lihat Jasa Bubut</b> <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box shadow" style="background:#1abc9c; color:white;">
                            <div class="inner text-center">
                                <h3>{{ $jumlahSparepart }}</h3>
                                <p><strong>Daftar Sparepart</strong></p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-motorcycle fa-2x"></i>
                            </div>
                            <a href="{{ route('pelanggan.sparepart.index') }}" class="small-box-footer text-white">
                                <b>Lihat Sparepart</b> <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box shadow" style="background:#8e44ad; color:white;">
                            <div class="inner text-center">
                                <h3>Jasa & Barang</h3>
                                <p><strong>Order Jasa & Barang</strong></p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart fa-2x"></i>
                            </div>
                            <a href="{{ route('pelanggan.order.index') }}" class="small-box-footer text-white">
                                <b>Order Sekarang</b> <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box shadow" style="background:#34495e; color:white;">
                            <div class="inner text-center">
                                <h3>{{ $jumlahPesananSaya }}</h3>
                                <p><strong>Pesanan Saya</strong></p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-bag fa-2x"></i>
                            </div>
                            <a href="{{ route('pelanggan.pesanansaya.index') }}" class="small-box-footer text-white">
                                <b>Lihat Pesanan</b> <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
