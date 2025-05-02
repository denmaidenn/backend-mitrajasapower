<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pusat Bantuan - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('websiteDropdown');
            dropdown.classList.toggle('hidden');
        }

        function selectCategory(button, category) {
            document.querySelectorAll('button[onclick^="selectCategory"]').forEach(btn => {
                btn.classList.remove('bg-yellow-100');
            });
            button.classList.add('bg-yellow-100');
            document.getElementById('kategori').value = category;
        }
    </script>
</head>

<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="bg-white w-64 h-screen fixed left-0 top-0 border-r border-gray-200">
            <div class="h-full flex flex-col">
                <!-- Top -->
                <div class="p-6 flex-1 overflow-y-auto">
                    <div class="flex flex-col items-center mb-6">
                        <img alt="PT Mitra Jasa Power Logo" class="h-25 w-25 mb-5" src="{{ asset('images/logo-mjp.png') }}">
                        <div class="w-full px-0">
                            <h1 class="text-xl text-left">Menu</h1>
                        </div>
                    </div>
                    <nav>
                        <ul class="space-y-4">
                            <li><a href="{{ route('dashboard') }}" class="flex items-center text-gray-700 hover:text-black px-4 py-3 rounded-lg hover:bg-yellow-100"><i class="fas fa-tachometer-alt mr-3"></i>Dashboard</a></li>
                            <li><a href="{{ route('pemasukan.index') }}" class="flex items-center text-gray-700 hover:text-black px-4 py-3 rounded-lg hover:bg-yellow-100"><i class="fas fa-box-open mr-3"></i>Pemasukan</a></li>
                            <li><a href="{{ route('pengeluaran.index') }}" class="flex items-center text-gray-700 hover:text-black px-4 py-3 rounded-lg hover:bg-yellow-100"><i class="fas fa-box mr-3"></i>Pengeluaran</a></li>
                            <li><a href="{{ route('pengiriman.index') }}" class="flex items-center text-gray-700 hover:text-black px-4 py-3 rounded-lg hover:bg-yellow-100"><i class="fas fa-truck mr-3"></i>Pengiriman</a></li>
                            <li>
                                <div class="relative">
                                    <button onclick="toggleDropdown()" class="flex items-center w-full text-gray-700 hover:text-black px-4 py-3 rounded-lg hover:bg-yellow-100">
                                        <i class="fas fa-globe mr-3"></i>Website<i class="fas fa-chevron-down ml-auto"></i>
                                    </button>
                                    <div id="websiteDropdown" class="hidden mt-2 py-2 bg-white rounded-md shadow-lg">
                                        <a href="{{ route('website.gallery') }}" class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Gallery</a>
                                        <a href="{{ route('website.layanan') }}" class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Layanan</a>
                                        <a href="{{ route('website.testimonial') }}" class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Testimonial</a>
                                        <a href="{{ route('website.pusatbantuan') }}" class="block px-4 py-2 text-gray-700 bg-yellow-100 hover:bg-yellow-100">Pusat Bantuan</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Logout -->
                <div class="p-6 border-t border-gray-200">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center text-gray-700 hover:text-black w-full">
                            <i class="fas fa-sign-out-alt mr-3"></i>Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="ml-64 flex-1">
            <div class="p-8">
                <!-- Header -->
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-bold">Edit Pusat Bantuan</h1>
                    <div class="flex items-center">
                        <img src="https://placehold.co/40x40" alt="User Avatar" class="w-10 h-10 rounded-full mr-3">
                        <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="bg-white rounded-2xl p-6 shadow-sm">
                    <h2 class="text-xl font-bold mb-6">Form Pusat Bantuan</h2>
                    <form action="{{ route('website.pusatbantuan.update', $pusatBantuan->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pertanyaan</label>
                            <input type="text" name="pertanyaan" value="{{ $pusatBantuan->pertanyaan }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jawaban</label>
                            <textarea name="jawaban" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>{{ $pusatBantuan->jawaban }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Kategori</label>
                            <div class="flex flex-wrap gap-2">
                                <button type="button" onclick="selectCategory(this, 'FAQ')" class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-yellow-100 {{ $pusatBantuan->kategori == 'FAQ' ? 'bg-yellow-100' : '' }}">FAQ</button>
                                <button type="button" onclick="selectCategory(this, 'Panduan')" class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-yellow-100 {{ $pusatBantuan->kategori == 'Panduan' ? 'bg-yellow-100' : '' }}">Panduan</button>
                                <button type="button" onclick="selectCategory(this, 'Layanan & Kebijakan')" class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-yellow-100 {{ $pusatBantuan->kategori == 'Layanan & Kebijakan' ? 'bg-yellow-100' : '' }}">Layanan & Kebijakan</button>
                            </div>
                            <input type="hidden" name="kategori" id="kategori" value="{{ $pusatBantuan->kategori }}" required>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 font-medium">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
