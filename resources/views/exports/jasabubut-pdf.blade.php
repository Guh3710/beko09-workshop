<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Data Jasa Bubut</title>
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
        }
    </style>
</head>

<body>
    <h3 style="text-align:center;">Laporan Data Jasa Bubut</h3>
    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 25%;">Nama Jasa</th>
                <th>Deskripsi</th>
                <th style="width: 15%;">Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td>{{ $item->nama_jasa }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td style="text-align: right;">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
