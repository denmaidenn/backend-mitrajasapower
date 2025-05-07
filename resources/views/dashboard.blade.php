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
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
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
        @include('sidebar')
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
                        <div class="relative">
                            <button id="statusDropdownButton" onclick="toggleStatusDropdown()" class="px-4 py-2 text-sm rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center gap-2">
                                <span id="selectedStatus">Semua</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="statusDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-10">
                                <div class="py-1">
                                    <button onclick="filterStatus('all', 'Semua')" class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Semua
                                    </button>
                                    <button onclick="filterStatus('Approved', 'Approved')" class="block w-full px-4 py-2 text-sm text-yellow-600 hover:bg-yellow-100">
                                        Approved
                                    </button>
                                    <button onclick="filterStatus('Pending', 'Pending')" class="block w-full px-4 py-2 text-sm text-blue-600 hover:bg-blue-100">
                                        Pending
                                    </button>
                                    <button onclick="filterStatus('Complete', 'Complete')" class="block w-full px-4 py-2 text-sm text-green-600 hover:bg-green-100">
                                        Complete
                                    </button>
                                    <button onclick="filterStatus('Rejected', 'Rejected')" class="block w-full px-4 py-2 text-sm text-red-600 hover:bg-red-100">
                                        Rejected
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left text-sm text-gray-500">
                                    <th class="pb-4">Nomor Resi</th>
                                    <th class="pb-4">Tanggal</th>
                                    <th class="pb-4">Dari</th>
                                    <th class="pb-4">Ke</th>
                                    <th class="pb-4">Latitude</th>
                                    <th class="pb-4">Longitude</th>
                                    <th class="pb-4">Jenis Barang</th>
                                    <th class="pb-4">Tipe Pengiriman</th>
                                    <th class="pb-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                @forelse($pengiriman as $item)
                                    <tr class="border-t border-gray-100 shipping-row" data-status="{{ $item->status }}">
                                        <td class="py-4">{{ $item->nomor_resi }}</td>
                                        <td class="py-4">{{ $item->tanggal ? $item->tanggal->format('d/m/Y') : '-' }}</td>
                                        <td class="py-4">{{ $item->dari }}</td>
                                        <td class="py-4">{{ $item->ke }}</td>
                                        <td class="py-4">{{ $item->latitude ?? '-' }}</td>
                                        <td class="py-4">{{ $item->longitude ?? '-' }}</td>
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
                                        <td colspan="8" class="py-4 text-center text-gray-500">
                                            Tidak ada data pengiriman
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <script>
                    function toggleStatusDropdown() {
                        const dropdown = document.getElementById('statusDropdown');
                        dropdown.classList.toggle('hidden');
                    }

                    function filterStatus(status, label) {
                        const rows = document.querySelectorAll('.shipping-row');
                        rows.forEach(row => {
                            if (status === 'all' || row.dataset.status === status) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                        });
                        // Update selected status text
                        document.getElementById('selectedStatus').textContent = label;
                        // Hide dropdown after selection
                        document.getElementById('statusDropdown').classList.add('hidden');
                    }

                    // Close dropdown when clicking outside
                    window.addEventListener('click', function(e) {
                        if (!e.target.closest('#statusDropdownButton')) {
                            document.getElementById('statusDropdown').classList.add('hidden');
                        }
                    });
                </script>
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

        // Initialize map after DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
        const map = L.map('map').setView([-6.2, 106.8], 10); // Jabodetabek area
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const PengirimanData = @json($pengiriman);

        PengirimanData.forEach(k => {
                if (k.latitude && k.longitude) {
                    const marker = L.marker([parseFloat(k.latitude), parseFloat(k.longitude)]).addTo(map);
                    marker.bindPopup(`
                        <b>${k.ke}</b><br>
                        Nomor Resi: ${k.nomor_resi}<br>
                        Status: ${k.status}
                    `);
                }
            });
        });
    </script>

</body>

</html>
