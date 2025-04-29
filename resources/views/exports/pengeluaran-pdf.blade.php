<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengeluaran</title>
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
    <h1>Laporan Pengeluaran</h1>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nominal Pengeluaran</th>
                <th>Detail Pengeluaran</th>
                <th>Bank/Dompet</th>
                <th>Rekening/Nomor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->tanggal->format('d/m/Y') }}</td>
                <td>Rp{{ number_format($item->nominal_pengeluaran, 0, ',', '.') }}</td>
                <td>{{ $item->detail_pengeluaran }}</td>
                <td>{{ $item->bank_dompet }}</td>
                <td>{{ $item->rekening_nomor }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 