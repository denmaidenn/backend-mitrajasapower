<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengiriman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Laporan Pengiriman</h1>
    <table>
        <thead>
            <tr>
                <th>Nomor Resi</th>
                <th>Dari</th>
                <th>Ke</th>
                <th>Jenis Barang</th>
                <th>Tipe Pengiriman</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->nomor_resi }}</td>
                <td>{{ $item->dari }}</td>
                <td>{{ $item->ke }}</td>
                <td>{{ $item->jenis_barang }}</td>
                <td>{{ $item->tipe_pengiriman }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 