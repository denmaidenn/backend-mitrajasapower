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
                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <input type="text" id="searchInput" class="w-64 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari pengiriman...">
                            </div>

                            <div class="relative">
                                <button id="yearDropdownButton" onclick="toggleYearDropdown()" class="px-4 py-2 text-sm rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center gap-2">
                                    <span id="selectedYear">{{ date('Y') }}</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="yearDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-10">
                                    <div class="py-1 max-h-60 overflow-y-auto">
                                        @php
                                            $currentYear = date('Y');
                                            $startYear = 2010;
                                            $endYear = 2030;
                                        @endphp
                                        @for($year = $endYear; $year >= $startYear; $year--)
                                            <button onclick="filterYear('{{ $year }}')" 
                                                    class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 text-left {{ $year == $currentYear ? 'bg-gray-100' : '' }}">
                                                {{ $year }}
                                            </button>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            <div class="relative">
                                <button id="statusDropdownButton" onclick="toggleStatusDropdown()" class="px-4 py-2 text-sm rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center gap-2">
                                    <span id="selectedStatus">Semua</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="statusDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-10">
                                    <div class="py-1">
                                        <button onclick="filterStatus('all', 'Semua')" class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Semua</button>
                                        <button onclick="filterStatus('Approved', 'Approved')" class="block w-full px-4 py-2 text-sm text-yellow-600 hover:bg-yellow-100">Approved</button>
                                        <button onclick="filterStatus('Pending', 'Pending')" class="block w-full px-4 py-2 text-sm text-blue-600 hover:bg-blue-100">Pending</button>
                                        <button onclick="filterStatus('Complete', 'Complete')" class="block w-full px-4 py-2 text-sm text-green-600 hover:bg-green-100">Complete</button>
                                        <button onclick="filterStatus('Rejected', 'Rejected')" class="block w-full px-4 py-2 text-sm text-red-600 hover:bg-red-100">Rejected</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <div class="max-h-[340px] overflow-y-auto [&::-webkit-scrollbar]:hidden" style="scrollbar-width: none; -ms-overflow-style: none;">
                            <table class="w-full" id="pengirimanTable">
                                <thead class="bg-gray-50 sticky top-0 z-10">
                                    <tr class="text-left text-sm text-gray-500">
                                        <th class="pb-4 cursor-pointer hover:bg-gray-100" onclick="sortTable(0)">Nomor Resi</th>
                                        <th class="pb-4 cursor-pointer hover:bg-gray-100" onclick="sortTable(1)">Tanggal</th>
                                        <th class="pb-4 cursor-pointer hover:bg-gray-100" onclick="sortTable(2)">Dari</th>
                                        <th class="pb-4 cursor-pointer hover:bg-gray-100" onclick="sortTable(3)">Ke</th>
                                        <th class="pb-4 cursor-pointer hover:bg-gray-100" onclick="sortTable(4)">Latitude</th>
                                        <th class="pb-4 cursor-pointer hover:bg-gray-100" onclick="sortTable(5)">Longitude</th>
                                        <th class="pb-4 cursor-pointer hover:bg-gray-100" onclick="sortTable(6)">Jenis Barang</th>
                                        <th class="pb-4 cursor-pointer hover:bg-gray-100" onclick="sortTable(7)">Tipe Pengiriman</th>
                                        <th class="pb-4 cursor-pointer hover:bg-gray-100" onclick="sortTable(8)">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm pt-4">
                                    @php
                                        $pengiriman = $pengiriman->sortByDesc('tanggal');
                                    @endphp
                                    @forelse($pengiriman as $item)
                                        <tr class="border-t border-gray-100 shipping-row" data-status="{{ $item->status }}" data-year="{{ $item->tanggal ? $item->tanggal->format('Y') : '' }}">
                                            <td class="py-4">{{ $item->nomor_resi }}</td>
                                            <td class="py-4">{{ $item->tanggal ? $item->tanggal->format('d/m/Y') : '-' }}</td>
                                            <td class="py-4">{{ $item->dari }}</td>
                                            <td class="py-4">{{ $item->ke }}</td>
                                            <td class="py-4">{{ $item->latitude ?? '-' }}</td>
                                            <td class="py-4">{{ $item->longitude ?? '-' }}</td>
                                            <td class="py-4">{{ $item->jenis_barang }}</td>
                                            <td class="py-4">{{ $item->tipe_pengiriman }}</td>
                                            <td class="py-4">
                                                <span class="px-3 py-1 text-xs rounded-full 
                                                    @if ($item->status == 'Approved') bg-yellow-100 text-yellow-600
                                                    @elseif($item->status == 'Pending') bg-blue-100 text-blue-600
                                                    @elseif($item->status == 'Complete') bg-green-100 text-green-600
                                                    @elseif($item->status == 'Rejected') bg-red-100 text-red-600
                                                    @else bg-purple-100 text-purple-600 @endif">
                                                    {{ $item->status }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="border-t border-gray-100">
                                            <td colspan="9" class="py-4 text-center text-gray-500">
                                                Tidak ada data pengiriman
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
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

        // Initialize map after DOM is loaded
        document.addEventListener('DOMContentLoaded', async function() {
            const map = L.map('map').setView([-6.2, 106.8], 10); // Jabodetabek area
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            let markers = []; // Store markers for later manipulation

            try {
                const response = await fetch('/api/pengiriman');
                const result = await response.json();
                
                if (result.success) {
                    const pengirimanData = result.data;
                    
                    // Function to update markers based on search
                    window.updateMapMarkers = function(searchText, status, year) {
                        // Clear existing markers
                        markers.forEach(marker => map.removeLayer(marker));
                        markers = [];
                        
                        // Filter data
                        const filteredData = pengirimanData.filter(k => {
                            if (!k.latitude || !k.longitude) return false;
                            
                            const rowText = `${k.nomor_resi} ${k.dari} ${k.ke} ${k.jenis_barang} ${k.tipe_pengiriman}`.toLowerCase();
                            const statusMatch = status === 'all' || k.status === status;
                            const yearMatch = k.tanggal && k.tanggal.startsWith(year);
                            const searchMatch = searchText === '' || rowText.includes(searchText.toLowerCase());
                            
                            return statusMatch && yearMatch && searchMatch;
                        }).sort((a, b) => new Date(b.tanggal) - new Date(a.tanggal));
                        
                        // Add markers for all filtered data
                        filteredData.forEach(k => {
                            const marker = L.marker([parseFloat(k.latitude), parseFloat(k.longitude)]).addTo(map);
                            marker.bindPopup(`
                                <b>${k.ke}</b><br>
                                Nomor Resi: ${k.nomor_resi}<br>
                                Status: ${k.status}
                            `);
                            markers.push(marker);
                        });
                    };

                    // Initial markers with current year
                    updateMapMarkers('', 'all', '{{ date('Y') }}');
                }
            } catch (error) {
                console.error('Error fetching pengiriman data:', error);
            }
        });
    </script>

    <script>
        let currentStatus = 'all';
        let currentYear = '{{ date('Y') }}';
        let allPengirimanData = @json($pengiriman);
        
        // Function to get filtered data
        function getFilteredData(searchText, status, year) {
            const rows = document.querySelectorAll('.shipping-row');
            const filteredRows = Array.from(rows).filter(row => {
                const text = row.textContent.toLowerCase();
                const rowStatus = row.dataset.status;
                const rowYear = row.dataset.year;
                
                const statusMatch = status === 'all' || rowStatus === status;
                const yearMatch = rowYear === year;
                const searchMatch = searchText === '' || text.includes(searchText.toLowerCase());
                
                return statusMatch && yearMatch && searchMatch;
            });

            // Sort by date (newest first)
            return filteredRows.sort((a, b) => {
                const dateA = a.querySelector('td:nth-child(2)').textContent;
                const dateB = b.querySelector('td:nth-child(2)').textContent;
                return new Date(dateB.split('/').reverse().join('-')) - new Date(dateA.split('/').reverse().join('-'));
            });
        }

        // Function to update view
        function updateView() {
            const searchText = document.getElementById('searchInput').value.toLowerCase();
            const filteredRows = getFilteredData(searchText, currentStatus, currentYear);
            
            // Hide all rows first
            document.querySelectorAll('.shipping-row').forEach(row => row.style.display = 'none');
            
            // Show all filtered rows
            filteredRows.forEach(row => row.style.display = '');

            // Update map markers
            if (window.updateMapMarkers) {
                window.updateMapMarkers(searchText, currentStatus, currentYear);
            }
        }

        // Initialize view when page loads
        document.addEventListener('DOMContentLoaded', function() {
            updateView();
        });
        
        document.getElementById('searchInput').addEventListener('keyup', function() {
            updateView();
        });

        function filterStatus(status, label) {
            currentStatus = status;
            updateView();

            // Update selected status text
            document.getElementById('selectedStatus').textContent = label;
            // Hide dropdown after selection
            document.getElementById('statusDropdown').classList.add('hidden');
        }

        function filterYear(year) {
            currentYear = year;
            updateView();

            // Update selected year text
            document.getElementById('selectedYear').textContent = currentYear;
            // Hide dropdown after selection
            document.getElementById('yearDropdown').classList.add('hidden');
        }

        function toggleYearDropdown() {
            const dropdown = document.getElementById('yearDropdown');
            dropdown.classList.toggle('hidden');
        }

        function toggleStatusDropdown() {
            const dropdown = document.getElementById('statusDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Close dropdowns when clicking outside
        window.addEventListener('click', function(e) {
            if (!e.target.closest('#statusDropdownButton')) {
                document.getElementById('statusDropdown').classList.add('hidden');
            }
            if (!e.target.closest('#yearDropdownButton')) {
                document.getElementById('yearDropdown').classList.add('hidden');
            }
        });

        
        // Filter ascending descending pada table pengiriman
        let sortOrders = Array(9).fill('asc'); // Track sort order for each column

        function sortTable(columnIndex) {
        const table = document.getElementById('pengirimanTable');
        const tbody = table.getElementsByTagName('tbody')[0];
        const rows = Array.from(tbody.getElementsByTagName('tr'));
        
        // Skip if there's only one row (empty message) or no rows
        if (rows.length <= 1) return;

        // Toggle sort order for this column
        sortOrders[columnIndex] = sortOrders[columnIndex] === 'asc' ? 'desc' : 'asc';
        const multiplier = sortOrders[columnIndex] === 'asc' ? 1 : -1;

        rows.sort((a, b) => {
            let aValue = a.cells[columnIndex].textContent.trim();
            let bValue = b.cells[columnIndex].textContent.trim();

            // Special handling for date column (index 1)
            if (columnIndex === 1) {
                // Convert DD/MM/YYYY to YYYY-MM-DD for proper comparison
                aValue = aValue.split('/').reverse().join('-');
                bValue = bValue.split('/').reverse().join('-');
            }
            // Special handling for numeric columns (latitude, longitude)
            else if (columnIndex === 4 || columnIndex === 5) {
                aValue = parseFloat(aValue) || 0;
                bValue = parseFloat(bValue) || 0;
                return (aValue - bValue) * multiplier;
            }

            return aValue.localeCompare(bValue) * multiplier;
        });

        // Reinsert sorted rows
        rows.forEach(row => tbody.appendChild(row));
    }
    </script>

<script>

    </script>

</body>

</html>
