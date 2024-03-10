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
    <h1>Kategori Barang</h1>
    <p>{{ $date }}</p>
    <table>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
            </tr>
            @php
                $no = 1;
            @endphp
            @foreach ($kategori as $ktgr)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $ktgr->nama }}</td>
            </tr>
            @endforeach
    </table>
</body>

</html>
