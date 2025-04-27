<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Dashboard
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                                <a class="flex items-center text-gray-700 hover:text-black px-4 py-3 rounded-lg bg-yellow-100"
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
        <div class="ml-64 flex-1">
            <div class="p-8">
                <!-- Header with title and user info -->
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-bold">Dashboard</h1>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-sm font-medium text-gray-600">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                        <span class="text-gray-600">{{ Auth::user()->name }}</span>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <!-- Total Income Card -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total Income {{ $year }}</p>
                                <h3 class="text-2xl font-bold">Rp{{ number_format($totalPemasukan, 0, ',', '.') }}</h3>
                                <p class="text-xs text-gray-500 mt-1">Tahun {{ $year - 1 }}:
                                    Rp{{ number_format($totalPemasukanTahunSebelumnya, 0, ',', '.') }}</p>
                            </div>
                            <div
                                class="{{ $pemasukanPercentage >= 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} text-xs px-2 py-1 rounded-full flex items-center">
                                <span>{{ $pemasukanPercentage >= 0 ? '+' : '' }}{{ number_format($pemasukanPercentage, 1) }}%</span>

                            </div>
                        </div>
                    </div>

                    <!-- Total Outcome Card -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total Outcome {{ $year }}</p>
                                <h3 class="text-2xl font-bold">Rp{{ number_format($totalPengeluaran, 0, ',', '.') }}
                                </h3>
                                <p class="text-xs text-gray-500 mt-1">Tahun {{ $year - 1 }}:
                                    Rp{{ number_format($totalPengeluaranTahunSebelumnya, 0, ',', '.') }}</p>
                            </div>
                            <div
                                class="{{ $pengeluaranPercentage >= 0 ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }} text-xs px-2 py-1 rounded-full flex items-center">
                                <span>{{ $pengeluaranPercentage >= 0 ? '+' : '' }}{{ number_format($pengeluaranPercentage, 1) }}%</span>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart Section -->
                <div class="bg-white rounded-xl p-6 shadow-sm mb-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold">Analisis</h2>
                        <div class="flex items-center gap-2">
                            <div class="flex items-center gap-6">
                                <div class="flex items-center gap-2">
                                    <span class="inline-block w-2 h-2 rounded-full bg-yellow-400"></span>
                                    <span class="text-sm font-medium">Income</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="inline-block w-2 h-2 rounded-full bg-gray-600"></span>
                                    <span class="text-sm font-medium">Outcome</span>
                                </div>
                            </div>
                        </div>
                        <select id="yearSelect" class="border border-gray-300 rounded-lg px-3 py-1 text-sm"
                            onchange="updateYear(this.value)">
                            @foreach ($years as $yearOption)
                                <option value="{{ $yearOption }}" {{ $yearOption == $year ? 'selected' : '' }}>
                                    {{ $yearOption }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="h-80">
                        <canvas id="analysisChart"></canvas>
                    </div>
                </div>

                <!-- Pengiriman Section -->
                <div class="bg-white rounded-xl p-6 shadow-sm mb-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold">Pengiriman</h2>
                        <button class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-ellipsis-h"></i>
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left text-sm text-gray-500">
                                    <th class="pb-4">Nomor Resi</th>
                                    <th class="pb-4">Dari</th>
                                    <th class="pb-4">Ke</th>
                                    <th class="pb-4">Jenis Barang</th>
                                    <th class="pb-4">Tipe Pengiriman</th>
                                    <th class="pb-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                @forelse($pengiriman as $item)
                                    <tr class="border-t border-gray-100">
                                        <td class="py-4">{{ $item->nomor_resi }}</td>
                                        <td class="py-4">{{ $item->dari }}</td>
                                        <td class="py-4">{{ $item->ke }}</td>
                                        <td class="py-4">{{ $item->jenis_barang }}</td>
                                        <td class="py-4">{{ $item->tipe_pengiriman }}</td>
                                        <td class="py-4">
                                            <span
                                                class="px-3 py-1 text-xs rounded-full 
            @if ($item->status == 'Approved') bg-yellow-100 text-yellow-600 py-2 rounded-lg inline-block text-sm
            @elseif($item->status == 'Pending') bg-blue-100 text-blue-600 py-2 rounded-lg inline-block text-sm
            @elseif($item->status == 'Complete') bg-green-100 text-green-600 py-2 rounded-lg inline-block text-sm
            @elseif($item->status == 'Rejected') bg-red-100 text-red-600 py-2 rounded-lg inline-block text-sm
            @else bg-purple-100 text-purple-600 py-2 rounded-lg inline-block text-sm @endif">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="border-t border-gray-100">
                                        <td colspan="6" class="py-4 text-center text-gray-500">
                                            Tidak ada data pengiriman
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Peta Pengiriman Section -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold">Peta Pengiriman</h2>
                    </div>
                    <div id="map" class="w-full h-[500px] rounded-lg"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('websiteDropdown');
            dropdown.classList.toggle('hidden');
        }

        function updateYear(year) {
            window.location.href = '{{ route('dashboard') }}?year=' + year;
        }

        // Chart initialization
        const ctx = document.getElementById('analysisChart').getContext('2d');
        const chartData = @json($chartData);

        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartData.map(data => data.month),
                datasets: [{
                        label: 'Income',
                        data: chartData.map(data => data.pemasukan),
                        backgroundColor: '#FCD34D',
                        borderRadius: 4
                    },
                    {
                        label: 'Outcome',
                        data: chartData.map(data => data.pengeluaran),
                        backgroundColor: '#4B5563',
                        borderRadius: 4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += 'Rp' + context.parsed.y.toLocaleString('id-ID');
                                return label;
                            }
                        }
                    }
                }
            }
        });
    </script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([-6.2, 106.8], 10); // Jabodetabek area
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const PengirimanData = @json($pengiriman);

        PengirimanData.forEach(k => {
            const marker = L.marker([k.latitude, k.longitude]).addTo(map);
            marker.bindPopup(`<b>${k.ke}</b>`);
        });
    </script>

</body>

</html>
