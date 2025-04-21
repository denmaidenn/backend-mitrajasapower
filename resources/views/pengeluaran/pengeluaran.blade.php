<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Pengeluaran
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('sidebar')
        <!-- Main Content -->
        <div class="flex-1 p-10">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">
                    Pengeluaran
                </h1>
                <div class="flex items-center">
                    <img alt="User Avatar" class="rounded-full mr-2" src="https://placehold.co/40x40" />
                    <span>
                        Bilal Indrajaya
                    </span>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4">
                    Hapus Pengeluaran
                </h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">
                                    Tanggal
                                </th>
                                <th class="py-2 px-4 border-b">
                                    Nominal Pengeluaran
                                </th>
                                <th class="py-2 px-4 border-b">
                                    Detail Pengeluaran
                                </th>
                                <th class="py-2 px-4 border-b">
                                    Bank/Dompet
                                </th>
                                <th class="py-2 px-4 border-b">
                                    Rekening/Nomor
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-2 px-4 border-b">
                                    20/02/2025
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Rp75.000.000
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Biaya Operasional
                                </td>
                                <td class="py-2 px-4 border-b">
                                    BCA
                                </td>
                                <td class="py-2 px-4 border-b">
                                    1231401239013
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b">
                                    20/02/2025
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Rp50.000.000
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Gaji &amp; Upah
                                </td>
                                <td class="py-2 px-4 border-b">
                                    BNI
                                </td>
                                <td class="py-2 px-4 border-b">
                                    1231401239014
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b">
                                    20/02/2025
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Rp200.000.000
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Pembayaran Vendor
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Mandiri
                                </td>
                                <td class="py-2 px-4 border-b">
                                    1231401239015
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b">
                                    20/02/2025
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Rp125.000.000
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Biaya Marketing
                                </td>
                                <td class="py-2 px-4 border-b">
                                    BRI
                                </td>
                                <td class="py-2 px-4 border-b">
                                    1231401239016
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b">
                                    20/02/2025
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Rp90.000.000
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Pembayaran Supplier
                                </td>
                                <td class="py-2 px-4 border-b">
                                    BCA
                                </td>
                                <td class="py-2 px-4 border-b">
                                    1231401239017
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-end mt-4">
                    <button class="bg-blue-500 text-white py-2 px-4 rounded mr-2">
                        Edit
                    </button>
                    <button class="bg-red-500 text-white py-2 px-4 rounded mr-2">
                        Hapus
                    </button>
                    <button class="bg-yellow-500 text-white py-2 px-4 rounded">
                        Tambah
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
