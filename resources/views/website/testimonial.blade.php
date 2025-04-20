<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonial - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('websiteDropdown');
            dropdown.classList.toggle('hidden');
        }
    </script>
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
                                <a class="flex items-center text-gray-700 hover:text-black" href="{{ route('dashboard') }}">
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
                                        <a href="{{ route('website.gallery') }}" class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Gallery</a>
                                        <a href="{{ route('website.layanan') }}" class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Layanan</a>
                                        <a href="{{ route('website.testimonial') }}" class="block px-4 py-2 text-gray-700 hover:bg-yellow-100 bg-yellow-100">Testimonial</a>
                                        <a href="{{ route('website.pusatbantuan') }}" class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Pusat Bantuan</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- Bottom section with logout -->
                <div class="p-6 border-t border-gray-200">
                    <form action="{{ route('logout') }}" method="POST">
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
        <div class="ml-64 flex-1">
            <div class="p-8">
                <!-- Header with title and user info -->
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-bold">Testimonial</h1>
                    <div class="flex items-center">
                        <img src="https://placehold.co/40x40" alt="User Avatar" class="w-10 h-10 rounded-full mr-3">
                        <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    </div>
                </div>

                <!-- Main Card -->
                <div class="bg-white rounded-2xl p-6 shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold">Detail Testimonial</h2>
                        <div class="flex space-x-2">
                            <button id="editBtn" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 font-medium">
                                Edit
                            </button>
                            <button id="deleteBtn" class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 font-medium">
                                Hapus
                            </button>
                            <a href="{{ route('website.testimonial.create') }}" class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 font-medium">
                                Tambah
                            </a>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-100">
                                    @if($testimonials->count() > 0)
                                    <th class="text-left py-4 px-6 w-16">
                                        <input type="checkbox" class="rounded-full border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    </th>
                                    @endif
                                    <th class="text-left py-4 px-6 text-gray-600 font-medium">Nama</th>
                                    <th class="text-left py-4 px-6 text-gray-600 font-medium">Asal</th>
                                    <th class="text-left py-4 px-6 text-gray-600 font-medium">Rating</th>
                                    <th class="text-left py-4 px-6 text-gray-600 font-medium">Testimoni</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse($testimonials as $testimonial)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-6">
                                        <input type="checkbox" class="service-checkbox rounded-full border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="{{ $testimonial->id }}">
                                    </td>
                                    <td class="py-4 px-6 text-gray-800">{{ $testimonial->nama }}</td>
                                    <td class="py-4 px-6 text-gray-800">{{ $testimonial->asal }}</td>
                                    <td class="py-4 px-6 text-gray-800">{{ $testimonial->rating }}</td>
                                    <td class="py-4 px-6 text-gray-600">{{ $testimonial->testimoni }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="py-4 px-6 text-center text-gray-500">Tidak ada data testimonial</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Handle Edit button click
        document.getElementById('editBtn').addEventListener('click', function() {
            const selectedCheckboxes = document.querySelectorAll('.service-checkbox:checked');
            if (selectedCheckboxes.length === 1) {
                const testimonialId = selectedCheckboxes[0].value;
                window.location.href = `/website/testimonial/${testimonialId}/edit`;
            } else {
                alert('Pilih satu testimonial untuk diedit');
            }
        });

        // Handle Delete button click
        document.getElementById('deleteBtn').addEventListener('click', function() {
            const selectedCheckboxes = document.querySelectorAll('.service-checkbox:checked');
            if (selectedCheckboxes.length > 0) {
                if (confirm('Apakah Anda yakin ingin menghapus testimonial yang dipilih?')) {
                    selectedCheckboxes.forEach(checkbox => {
                        const testimonialId = checkbox.value;
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = `/website/testimonial/${testimonialId}`;
                        form.innerHTML = `
                            @csrf
                            @method('DELETE')
                        `;
                        document.body.appendChild(form);
                        form.submit();
                    });
                }
            } else {
                alert('Pilih testimonial yang akan dihapus');
            }
        });
    </script>
</body>
</html>
