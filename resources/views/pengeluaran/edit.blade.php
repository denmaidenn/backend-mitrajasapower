<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Edit Pengeluaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-white w-64 h-screen fixed left-0 top-0 border-r border-gray-200">
            <div class="h-full flex flex-col">
                <!-- Top section with menu -->
                <div class="p-6 flex-1 overflow-y-auto">
                    <div class="flex flex-col items-center mb-6">
                        <img alt="PT Mitra Jasa Power Logo" class="h-25 w-25 mb-5" src="{{ asset('images/logo-mjp.png') }}">
                        <div class="w-full px-0">
                            <h1 class="text-xl text-left">Menu</h1>
                        </div>
                    </div>
                    <nav>
                        <ul class="space-y-2">
                            <li>
                                <a class="flex items-center text-gray-700 hover:text-black px-4 py-3 rounded-lg hover:bg-yellow-100" href="{{ route('dashboard') }}">
                                    <i class="fas fa-tachometer-alt mr-3"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center text-gray-700 hover:text-black px-4 py-3 rounded-lg hover:bg-yellow-100" href="{{ route('pemasukan.index') }}">
                                    <i class="fas fa-box-open mr-3"></i>
                                    Pemasukan
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center text-gray-700 hover:text-black px-4 py-3 rounded-lg bg-yellow-100" href="{{ route('pengeluaran.index') }}">
                                    <i class="fas fa-box mr-3"></i>
                                    Pengeluaran
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center text-gray-700 hover:text-black px-4 py-3 rounded-lg hover:bg-yellow-100" href="{{ route('pengiriman.index') }}">
                                    <i class="fas fa-truck mr-3"></i>
                                    Pengiriman
                                </a>
                            </li>
                            <li>
                                <div class="relative">
                                    <button onclick="toggleDropdown()" class="flex items-center w-full text-gray-700 hover:text-black px-4 py-3 rounded-lg hover:bg-yellow-100">
                                        <i class="fas fa-globe mr-3"></i>
                                        Website
                                        <i class="fas fa-chevron-down ml-auto"></i>
                                    </button>
                                    <div id="websiteDropdown" class="hidden mt-2 py-2 bg-white rounded-md shadow-lg">
                                        <a href="{{ route('website.gallery') }}" class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Gallery</a>
                                        <a href="{{ route('website.layanan') }}" class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Layanan</a>
                                        <a href="{{ route('website.testimonial') }}" class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Testimonial</a>
                                        <a href="{{ route('website.pusatbantuan') }}" class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Pusat Bantuan</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- Bottom section with logout -->
                <div class="p-6 border-t border-gray-200">
                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="flex items-center text-gray-700 hover:text-black w-full">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="ml-64 flex-1 bg-gray-50">
            <div class="p-8">
                <!-- Header with title and user info -->
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-800">Edit Pengeluaran</h1>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-sm font-medium text-gray-600">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                        <span class="text-gray-600">{{ Auth::user()->name }}</span>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="bg-white rounded-xl p-8 shadow-sm max-w-4xl mx-auto">
                    <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2" for="tanggal">
                                    Tanggal
                                </label>
                                <input type="date" name="tanggal" id="tanggal" required
                                    value="{{ $pengeluaran->tanggal->format('Y-m-d') }}"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2" for="nominal_pengeluaran">
                                    Nominal Pengeluaran
                                </label>
                                <input type="number" name="nominal_pengeluaran" id="nominal_pengeluaran" required
                                    value="{{ $pengeluaran->nominal_pengeluaran }}"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan nominal">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2" for="detail_pengeluaran">
                                    Detail Pengeluaran
                                </label>
                                <input type="text" name="detail_pengeluaran" id="detail_pengeluaran" required
                                    value="{{ $pengeluaran->detail_pengeluaran }}"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan detail">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2" for="bank_dompet">
                                    Bank/Dompet
                                </label>
                                <input type="text" name="bank_dompet" id="bank_dompet" required
                                    value="{{ $pengeluaran->bank_dompet }}"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan bank/dompet">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2" for="rekening_nomor">
                                    Rekening/Nomor
                                </label>
                                <input type="text" name="rekening_nomor" id="rekening_nomor" required
                                    value="{{ $pengeluaran->rekening_nomor }}"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan rekening/nomor">
                            </div>
                        </div>
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('pengeluaran.index') }}" 
                                class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                                Batal
                            </a>
                            <button type="submit" 
                                class="px-6 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('websiteDropdown');
            dropdown.classList.toggle('hidden');
        }
    </script>
</body>
</html> 