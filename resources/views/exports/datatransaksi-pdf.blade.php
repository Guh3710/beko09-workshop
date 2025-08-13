<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Data Transaksi</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th {
            background: #6f42c1;
            color: #fff;
            padding: 5px;
            text-align: center;
        }

        td {
            padding: 5px;
            text-align: center;
        }

        img {
            width: 50px;
            height: auto;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <h3 style="text-align:center;">Laporan Data Transaksi</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Pelanggan</th>
                <th>Jenis Transaksi</th>
                <th>Item</th>
                <th>Gambar</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->user->nama ?? '-' }}</td>
                    <td>{{ ucfirst($item->jenis_transaksi) }}</td>
                    <td>
                        @if (strtolower($item->jenis_transaksi) == 'jasa bubut' || strtolower($item->jenis_transaksi) == 'jasa')
                            {{ $item->jasabubut->nama_jasa ?? '-' }}
                        @elseif(strtolower($item->jenis_transaksi) == 'sparepart')
                            {{ $item->sparepart->nama_sparepart ?? '-' }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if (strtolower($item->jenis_transaksi) == 'sparepart' && $item->sparepart && $item->sparepart->gambar)
                            <img src="{{ public_path('storage/' . $item->sparepart->gambar) }}" alt="gambar">
                        @elseif (strtolower($item->jenis_transaksi) == 'jasa bubut' && $item->jasabubut && $item->jasabubut->gambar)
                            <img src="{{ public_path('storage/' . $item->jasabubut->gambar) }}" alt="gambar">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $item->jumlah }}</td>
                    <td align="right">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
