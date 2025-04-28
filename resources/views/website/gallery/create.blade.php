<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Tambah Gallery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-50">
    <div class="flex min-h-screen">
        @include('sidebar')
        <div class="ml-64 flex-1 p-8">
            <!-- Header dengan judul dan user info -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-bold">Tambah Gallery</h1>
                <div class="flex items-center">
                    <img src="https://placehold.co/40x40" alt="User Avatar" class="w-10 h-10 rounded-full mr-3">
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-sm">
                <form action="{{ route('website.gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Judul Foto</label>
                            <input type="text" name="title"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Foto Cover</label>
                            <input type="file" name="image" accept="image/*"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500"
                                required>
                        </div>
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('website.gallery') }}"
                                class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Batal</a>
                            <button type="submit"
                                class="px-6 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Simpan</button>
                        </div>
                    </div>
                </form>
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
