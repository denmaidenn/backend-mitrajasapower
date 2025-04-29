<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pemasukan</title>
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
    <h1>Laporan Pemasukan</h1>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nominal Pemasukan</th>
                <th>Detail Pemasukan</th>
                <th>Bank/Dompet</th>
                <th>Rekening/Nomor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->tanggal->format('d/m/Y') }}</td>
                <td>Rp{{ number_format($item->nominal_pemasukan, 0, ',', '.') }}</td>
                <td>{{ $item->detail_pemasukan }}</td>
                <td>{{ $item->bank_dompet }}</td>
                <td>{{ $item->rekening_nomor }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 