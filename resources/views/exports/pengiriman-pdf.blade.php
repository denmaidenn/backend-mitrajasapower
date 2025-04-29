<!DOCTYPE html>
<html>
<head>
    <title>Data Pengiriman</title>
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
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .status {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
        }
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        .status-approved {
            background-color: #d4edda;
            color: #155724;
        }
        .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Data Pengiriman</h2>
        <p>Tanggal Export: {{ date('d/m/Y') }}</p>
    </div>

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
            @forelse($data as $item)
                <tr>
                    <td>{{ $item->nomor_resi }}</td>
                    <td>{{ $item->dari }}</td>
                    <td>{{ $item->ke }}</td>
                    <td>{{ $item->jenis_barang }}</td>
                    <td>{{ $item->tipe_pengiriman }}</td>
                    <td>
                        <span class="status status-{{ strtolower($item->status) }}">
                            {{ $item->status }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada data pengiriman</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html> 