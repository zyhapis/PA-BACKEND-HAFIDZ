<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF BARANG</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #e2e8f0;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f8fafc;
        }
    </style>
</head>

<body>
    <h1>Inventaris Barang</h1>
    <p>{{ $date }}</p>
    <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Kondisi</th>
            </tr>
            @php
                $no = 1;
            @endphp
            @foreach ($inventaris as $invt)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $invt->nama_barang }}</td>
                <td>{{ $invt->kategori->nama }}</td>
                <td>{{ $invt->jumlah }}</td>
                <td>{{ $invt->harga }}</td>
                <td>{{ $invt->kondisi }}</td>
            </tr>
            @endforeach
    </table>
</body>

</html>
