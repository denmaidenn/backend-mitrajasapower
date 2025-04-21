<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Edit Pusat Bantuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('sidebar')
        <!-- Main Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm">
            <h2 class="text-xl font-bold mb-6">Form Pusat Bantuan</h2>
            <form action="{{ route('website.pusatbantuan.update', $pusatBantuan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pertanyaan</label>
                        <input type="text" name="pertanyaan" value="{{ $pusatBantuan->pertanyaan }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jawaban</label>
                        <textarea name="jawaban" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>{{ $pusatBantuan->jawaban }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Kategori</label>
                        <div class="flex space-x-2">
                            <button type="button" onclick="selectCategory(this, 'FAQ')"
                                class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-yellow-100 {{ $pusatBantuan->kategori == 'FAQ' ? 'bg-yellow-100' : '' }}">FAQ</button>
                            <button type="button" onclick="selectCategory(this, 'Panduan')"
                                class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-yellow-100 {{ $pusatBantuan->kategori == 'Panduan' ? 'bg-yellow-100' : '' }}">Panduan</button>
                            <button type="button" onclick="selectCategory(this, 'Layanan & Kebijakan')"
                                class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-yellow-100 {{ $pusatBantuan->kategori == 'Layanan & Kebijakan' ? 'bg-yellow-100' : '' }}">Layanan
                                & Kebijakan</button>
                        </div>
                        <input type="hidden" name="kategori" id="kategori" value="{{ $pusatBantuan->kategori }}"
                            required>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('website.pusatbantuan') }}"
                            class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Batal</a>
                        <button type="submit"
                            class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Simpan</button>
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

        function selectCategory(button, category) {
            // Reset semua button
            document.querySelectorAll('button[onclick^="selectCategory"]').forEach(btn => {
                btn.classList.remove('bg-yellow-100');
            });

            // Highlight button yang dipilih
            button.classList.add('bg-yellow-100');

            // Set nilai kategori
            document.getElementById('kategori').value = category;
        }
    </script>
</body>

</html>
