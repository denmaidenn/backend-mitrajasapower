<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Menambahkan Pengiriman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-white w-64 h-screen fixed left-0 top-0 border-r border-gray-200">
            <div class="h-full flex flex-col">
                <!-- Top section with menu -->
                <div class="p-6 flex-1 overflow-y-auto">
                    <div class="flex flex-col items-center mb-6">
                        <img alt="PT Mitra Jasa Power Logo" class="h-25 w-25 mb-5"
                            src="{{ asset('images/logo-mjp.png') }}">
                        <div class="w-full px-0">
                            <h1 class="text-xl text-left">Menu</h1>
                        </div>
                    </div>
                    <nav>
                        <ul class="space-y-2">
                            <li>
                                <a class="flex items-center text-gray-700 hover:text-black px-4 py-3 rounded-lg hover:bg-yellow-100"
                                    href="{{ route('dashboard') }}">
                                    <i class="fas fa-tachometer-alt mr-3">
                                    </i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center text-gray-700 hover:text-black px-4 py-3 rounded-lg hover:bg-yellow-100"
                                    href="{{ route('pemasukan.index') }}">
                                    <i class="fas fa-box-open mr-3">
                                    </i>
                                    Pemasukan
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center text-gray-700 hover:text-black px-4 py-3 rounded-lg hover:bg-yellow-100"
                                    href="{{ route('pengeluaran.index') }}">
                                    <i class="fas fa-box mr-3">
                                    </i>
                                    Pengeluaran
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center text-gray-700 hover:text-black px-4 py-3 rounded-lg hover:bg-yellow-100"
                                    href="{{ route('pengiriman.index') }}">
                                    <i class="fas fa-truck mr-3">
                                    </i>
                                    Pengiriman
                                </a>
                            </li>
                            <li>
                                <div class="relative">
                                    <button onclick="toggleDropdown()"
                                        class="flex items-center w-full text-gray-700 hover:text-black px-4 py-3 rounded-lg hover:bg-yellow-100">
                                        <i class="fas fa-globe mr-3">
                                        </i>
                                        Website
                                        <i class="fas fa-chevron-down ml-auto">
                                        </i>
                                    </button>
                                    <div id="websiteDropdown" class="hidden mt-2 py-2 bg-white rounded-md shadow-lg">
                                        <a href="{{ route('website.gallery') }}"
                                            class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Gallery</a>
                                        <a href="{{ route('website.layanan') }}"
                                            class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Layanan</a>
                                        <a href="{{ route('website.testimonial') }}"
                                            class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Testimonial</a>
                                        <a href="{{ route('website.pusatbantuan') }}"
                                            class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Pusat Bantuan</a>
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
                    <h1 class="text-2xl font-bold text-gray-800">Menambahkan Pengiriman</h1>
                    <div class="flex items-center gap-2">
                        <div
                            class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-sm font-medium text-gray-600">
                            JE
                        </div>
                        <span class="text-gray-600">jeki</span>
                    </div>
                </div>

                <!-- Main Card -->
                <div class="bg-white rounded-xl p-8 shadow-sm">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6">Form Pengiriman</h2>

                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('pengiriman.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('tanggal')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="nomor_resi" class="block text-sm font-medium text-gray-700">Nomor Resi</label>
                            <input type="text" name="nomor_resi" value="{{ old('nomor_resi') }}" placeholder="Masukkan nomor resi pengiriman"
                                class="w-full p-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-gray-500 placeholder-gray-400 @error('nomor_resi') border-red-500 @enderror"
                                required>
                            @error('nomor_resi')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Dari</label>
                            <input type="text" name="dari" value="{{ old('dari') }}" placeholder="Masukkan lokasi awal pengiriman"
                                class="w-full p-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-gray-500 placeholder-gray-400 @error('dari') border-red-500 @enderror"
                                required>
                            @error('dari')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Ke</label>
                            <input type="text" name="ke" value="{{ old('ke') }}" placeholder="Masukkan tujuan akhir pengiriman"
                                class="w-full p-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-gray-500 placeholder-gray-400 @error('ke') border-red-500 @enderror"
                                required>
                            @error('ke')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Latitude</label>
                            <input type="number" step="any" name="latitude" value="{{ old('latitude') }}" placeholder="Contoh: -6.8206 (tanpa simbol derajat)"
                                class="w-full p-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-gray-500 placeholder-gray-400 @error('latitude') border-red-500 @enderror">
                            <p class="text-xs text-gray-500 mt-1">Masukkan angka desimal antara -90 sampai 90</p>
                            @error('latitude')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Longitude</label>
                            <input type="number" step="any" name="longitude" value="{{ old('longitude') }}" placeholder="Contoh: 106.8177 (tanpa simbol derajat)"
                                class="w-full p-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-gray-500 placeholder-gray-400 @error('longitude') border-red-500 @enderror">
                            <p class="text-xs text-gray-500 mt-1">Masukkan angka desimal antara -180 sampai 180</p>
                            @error('longitude')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Jenis Barang</label>
                            <input type="text" name="jenis_barang" value="{{ old('jenis_barang') }}" placeholder="Masukkan jenis barang yang ingin dikirim"
                                class="w-full p-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-gray-500 placeholder-gray-400 @error('jenis_barang') border-red-500 @enderror"
                                required>
                            @error('jenis_barang')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Tipe Pengiriman</label>
                            <input type="text" name="tipe_pengiriman" value="{{ old('tipe_pengiriman') }}" placeholder="Masukkan tipe jasa pengiriman"
                                class="w-full p-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-gray-500 placeholder-gray-400 @error('tipe_pengiriman') border-red-500 @enderror"
                                required>
                            @error('tipe_pengiriman')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status Pengiriman</label>
                            <select name="status" class="w-full p-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-gray-500 @error('status') border-red-500 @enderror" required>
                                <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Approved" {{ old('status') == 'Approved' ? 'selected' : '' }}>Approved</option>
                                <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="Complete" {{ old('status') == 'Complete' ? 'selected' : '' }}>Complete</option>
                                <option value="Rejected" {{ old('status') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            @error('status')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end pt-4">
                        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 text-sm font-medium">
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
