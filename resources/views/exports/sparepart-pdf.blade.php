<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Data Sparepart</title>
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
            background: #007BFF;
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
    <h3 style="text-align:center;">Laporan Data Sparepart</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Sparepart</th>
                <th>Gambar</th>
                <th>Merek</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Satuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->nama_sparepart }}</td>
                    <td>
                        @if ($item->gambar)
                            <img src="{{ public_path('storage/' . $item->gambar) }}" alt="gambar">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $item->merek }}</td>
                    <td align="right">Rp.{{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>{{ $item->satuan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
