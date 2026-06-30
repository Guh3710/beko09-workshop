{{-- @extends('layouts.errors')
@section('content')
    <div style="text-align:center;">
        <h1 style="font-size: 80px; margin: 0;">666</h1>
        <p style="font-size: 24px; margin-top: 5px;">
            <b>Wayae Wayae</b>
        </p>
        <p style="font-size: 24px; margin-top: 5px;">
            <b>Ngapain Icikbozzz ?</b>
        </p>
    </div>
@endsection --}}
@extends('layouts.errors')

@section('title', '403 Akses Ditolak')

@section('content')
    <h1>403</h1>
    <p><strong>Upsss Maaf Ada Yang Salah🚫</strong><br><br>
        Anda tidak memiliki hak untuk mengakses halaman ini!
    </p>
    <p>
        <strong>Akses Dibatasi🚫</strong>
    </p>

    <a href="{{ route('logout.beko') }}">Kembali ke Beranda</a>
@endsection
