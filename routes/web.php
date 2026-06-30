<?php

use App\Exports\DataTransaksiExport;
use App\Exports\JasaBubutExport;
use App\Exports\SparepartExport;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Models\DataTransaksi;
use App\Models\JasaBubut;
use App\Models\Sparepart;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

// ================= LANDING PAGE BEKO 09 WORKSHOP================= //
Route::get('/beko09workshop', function () {
    return view('beko09workshop');
})->name('beko09workshop');

Route::get('/logout-beko', function () {
    Auth::logout();
    return redirect()->route('beko09workshop');
})->name('logout.beko');

// ================= GUEST (Register & Login)================= //
Route::get('/', fn() => view('beko09workshop'));

// Login & Register
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

// ================= LOGOUT ================= //
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login')->with('Logout_Success', true);
})->name('logout');

// ================= DASHBOARD (Admin & Pelanggan) ================= //
Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});

// ================= ADMIN ================= //
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::view('admin/user', 'admin.user.index')->name('admin.user.index');
    Route::view('admin/jasabubut', 'admin.jasabubut.index')->name('admin.jasabubut.index');
    Route::view('admin/sparepart', 'admin.sparepart.index')->name('admin.sparepart.index');
    Route::view('admin/datatransaksi', 'admin.datatransaksi.index')->name('admin.datatransaksi.index');

    // ================= EXPORT EXCEL ================= //
    Route::get('/export-jasabubut', fn() => Excel::download(new JasaBubutExport, 'Jasa_Bubut.xlsx'));
    Route::get('/export-sparepart', fn() => Excel::download(new SparepartExport, 'Sparepart.xlsx'));
    Route::get('/export-datatransaksi', fn() => Excel::download(new DataTransaksiExport, 'Data_Transaksi.xlsx'));
});

// ================= EXPORT PDF ================= //
Route::get('/export-jasabubut-pdf', function () {
    $data = JasaBubut::all();
    $pdf = Pdf::loadView('exports.jasabubut-pdf', compact('data'))->setPaper('a4');
    return $pdf->download('Jasa_Bubut.pdf');
});
Route::get('/export/sparepart-pdf', function () {
    $data = Sparepart::all();
    $pdf = Pdf::loadView('exports.sparepart-pdf', compact('data'))->setPaper('a4', 'landscape');
    return $pdf->download('Data_Sparepart.pdf');
});
Route::get('/export/datatransaksi-pdf', function () {
    $data = DataTransaksi::all();
    $pdf = Pdf::loadView('exports.datatransaksi-pdf', compact('data'))->setPaper('a4', 'landscape');
    return $pdf->download('Data_Transaksi.pdf');
});

// ================= PELANGGAN ================= //
Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    Route::view('pelanggan/jasabubut', 'pelanggan.jasabubut.index')->name('pelanggan.jasabubut.index');
    Route::view('pelanggan/sparepart', 'pelanggan.sparepart.index')->name('pelanggan.sparepart.index');
    Route::view('pelanggan/order', 'pelanggan.order.index')->name('pelanggan.order.index');
    Route::view('pelanggan/pesanansaya', 'pelanggan.pesanansaya.index')->name('pelanggan.pesanansaya.index');
});
