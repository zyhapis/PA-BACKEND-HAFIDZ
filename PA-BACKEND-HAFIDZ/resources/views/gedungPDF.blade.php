<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF GEDUNG</title>
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
    <h1>Gedung</h1>
    <p>{{ $date }}</p>
    <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Nama Barang</th>
                <th>Kategori Barang</th>
            </tr>
            @php
                $no = 1;
            @endphp
            @foreach ($gedung as $gdng)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $gdng->nama }}</td>
                <td>{{ $gdng->jumlah }}</td>
                <td>{{ $gdng->inventaris->nama_barang }}</td>
                <td>{{ $gdng->kategori->nama }}</td>
            </tr>
            @endforeach
    </table>
</body>

</html>
