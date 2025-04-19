<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Edit Gallery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="bg-white w-64 h-screen fixed left-0 top-0 border-r border-gray-200">
            <div class="h-full flex flex-col">
                <!-- Top section with menu -->
                <div class="p-6 flex-1 overflow-y-auto">
                    <div class="flex items-center mb-8">
                        <img alt="Company Logo" class="h-10 w-10 mr-3" src="https://placehold.co/50x50"/>
                        <div>
                            <h1 class="text-xl font-bold">Menu</h1>
                        </div>
                    </div>
                    <nav>
                        <ul class="space-y-4">
                            <li>
                                <a class="flex items-center text-gray-700 hover:text-black" href="#">
                                    <i class="fas fa-tachometer-alt mr-3"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center text-gray-700 hover:text-black" href="#">
                                    <i class="fas fa-box-open mr-3"></i>
                                    Pemasukkan
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center text-gray-700 hover:text-black" href="#">
                                    <i class="fas fa-box mr-3"></i>
                                    Pengeluaran
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center text-gray-700 hover:text-black" href="#">
                                    <i class="fas fa-truck mr-3"></i>
                                    Pengiriman
                                </a>
                            </li>
                            <li>
                                <div class="relative">
                                    <button onclick="toggleDropdown()" class="flex items-center w-full text-gray-700 hover:text-black">
                                        <i class="fas fa-globe mr-3"></i>
                                        Website
                                        <i class="fas fa-chevron-down ml-auto"></i>
                                    </button>
                                    <div id="websiteDropdown" class="hidden mt-2 py-2 bg-white rounded-md shadow-lg">
                                        <a href="{{ route('website.gallery') }}" class="block px-4 py-2 text-gray-700 hover:bg-yellow-100 bg-yellow-100">Gallery</a>
                                        <a href="{{ route('website.layanan') }}" class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Layanan</a>
                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Testimonial</a>
                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Pusat Bantuan</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- Bottom section with logout -->
                <div class="p-6 border-t border-gray-200">
                    <a class="flex items-center text-gray-700 hover:text-black" href="#">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Log Out
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="ml-64 flex-1">
            <div class="p-8">
                <!-- Header with title and user info -->
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-bold">Edit Gallery</h1>
                    <div class="flex items-center">
                        <img src="https://placehold.co/40x40" alt="User Avatar" class="w-10 h-10 rounded-full mr-3">
                        <span class="text-gray-700">Bilal Indrajaya</span>
                    </div>
                </div>

                <!-- Main Card -->
                <div class="bg-white rounded-2xl p-6 shadow-sm">
                    <form action="{{ route('website.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Judul Foto</label>
                                <input type="text" name="title" value="{{ $gallery->title }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Foto Cover</label>
                                @if($gallery->image)
                                    <img src="{{ asset('storage/'.$gallery->image) }}" alt="Current Image" class="w-32 h-32 object-cover rounded-lg mb-2">
                                @endif
                                <input type="file" name="image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar</p>
                            </div>
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('website.gallery') }}" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Batal</a>
                                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Simpan</button>
                            </div>
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