<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Pemasukkan
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
                <h1 class="text-2xl font-bold">
                    Pemasukkan
                </h1>
                <div class="flex items-center">
                    <img alt="User Avatar" class="rounded-full mr-2" src="https://placehold.co/40x40" />
                    <span>
                        Bilal Indrajaya
                    </span>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold mb-4">
                    Detail Pemasukkan
                </h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">
                                    Tanggal
                                </th>
                                <th class="py-2 px-4 border-b">
                                    Nominal Pemasukkan
                                </th>
                                <th class="py-2 px-4 border-b">
                                    Detail Pemasukkan
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
                                    Rp100.000.000
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Pembayaran dari Customer
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Mandiri
                                </td>
                                <td class="py-2 px-4 border-b">
                                    12213401239012
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b">
                                    17/02/2025
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Rp75.000.000
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Pembayaran dari Customer
                                </td>
                                <td class="py-2 px-4 border-b">
                                    BCA
                                </td>
                                <td class="py-2 px-4 border-b">
                                    12213401239014
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b">
                                    19/02/2025
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Rp200.000.000
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Pembayaran dari Customer
                                </td>
                                <td class="py-2 px-4 border-b">
                                    BNI
                                </td>
                                <td class="py-2 px-4 border-b">
                                    12213401239013
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b">
                                    21/02/2025
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Rp125.000.000
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Pembayaran dari Customer
                                </td>
                                <td class="py-2 px-4 border-b">
                                    BRI
                                </td>
                                <td class="py-2 px-4 border-b">
                                    12213401239012
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b">
                                    15/02/2025
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Rp90.000.000
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Pembayaran dari Vendor
                                </td>
                                <td class="py-2 px-4 border-b">
                                    Mandiri
                                </td>
                                <td class="py-2 px-4 border-b">
                                    12213401239017
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-end mt-4 space-x-2">
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
        </div>
    </div>
</body>

</html>
