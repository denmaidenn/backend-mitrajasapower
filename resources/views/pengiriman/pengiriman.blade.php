<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Pengiriman
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('sidebar')
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">
                    Pengiriman
                </h2>
                <div class="flex items-center">
                    <img alt="User Avatar" class="h-10 w-10 rounded-full mr-3" src="https://placehold.co/40x40" />
                    <span>
                        Bilal Indrajaya
                    </span>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold">
                        Detail Pengiriman
                    </h3>
                    <div class="space-x-2">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded">
                            Edit
                        </button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded">
                            Hapus
                        </button>
                        <button class="bg-yellow-500 text-white px-4 py-2 rounded">
                            Tambah
                        </button>
                    </div>
                </div>
                <table class="w-full text-left">
                    <thead>
                        <tr>
                            <th class="py-2">
                                Nomor Resi
                            </th>
                            <th class="py-2">
                                Dari
                            </th>
                            <th class="py-2">
                                Ke
                            </th>
                            <th class="py-2">
                                Jenis Barang
                            </th>
                            <th class="py-2">
                                Tipe Pengiriman
                            </th>
                            <th class="py-2">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="py-2">
                                MJP1234567890
                            </td>
                            <td class="py-2">
                                Bandung
                            </td>
                            <td class="py-2">
                                Surabaya
                            </td>
                            <td class="py-2">
                                Mobil
                            </td>
                            <td class="py-2">
                                Kendaraan
                            </td>
                            <td class="py-2">
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
                                    Approved
                                </span>
                            </td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-2">
                                MJP876543210
                            </td>
                            <td class="py-2">
                                Depok
                            </td>
                            <td class="py-2">
                                Semarang
                            </td>
                            <td class="py-2">
                                Motor
                            </td>
                            <td class="py-2">
                                Kendaraan
                            </td>
                            <td class="py-2">
                                <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded">
                                    Pending
                                </span>
                            </td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-2">
                                MJP765432109
                            </td>
                            <td class="py-2">
                                Bekasi
                            </td>
                            <td class="py-2">
                                Yogyakarta
                            </td>
                            <td class="py-2">
                                Mobil
                            </td>
                            <td class="py-2">
                                Kendaraan
                            </td>
                            <td class="py-2">
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
                                    Complete
                                </span>
                            </td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-2">
                                MJP654321098
                            </td>
                            <td class="py-2">
                                Tangerang
                            </td>
                            <td class="py-2">
                                Malang
                            </td>
                            <td class="py-2">
                                Motor
                            </td>
                            <td class="py-2">
                                Kendaraan
                            </td>
                            <td class="py-2">
                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded">
                                    Rejected
                                </span>
                            </td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-2">
                                MJP543210987
                            </td>
                            <td class="py-2">
                                Jakarta
                            </td>
                            <td class="py-2">
                                Medan
                            </td>
                            <td class="py-2">
                                Mobil
                            </td>
                            <td class="py-2">
                                Kendaraan
                            </td>
                            <td class="py-2">
                                <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded">
                                    In Progress
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
