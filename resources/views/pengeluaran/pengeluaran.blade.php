<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Pengeluaran
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
  <div class="flex h-screen">
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
          <i class="fas fa-tachometer-alt mr-3">
          </i>
          Dashboard
         </a>
        </li>
        <li>
         <a class="flex items-center text-gray-700 hover:text-black px-4 py-3 rounded-lg hover:bg-yellow-100" href="{{ route('pemasukan.index') }}">
          <i class="fas fa-box-open mr-3">
          </i>
          Pemasukan
         </a>
        </li>
        <li>
         <a class="flex items-center text-gray-700 hover:text-black px-4 py-3 rounded-lg bg-yellow-100" href="{{ route('pengeluaran.index') }}">
          <i class="fas fa-box mr-3">
          </i>
          Pengeluaran
         </a>
        </li>
        <li>
         <a class="flex items-center text-gray-700 hover:text-black px-4 py-3 rounded-lg hover:bg-yellow-100" href="{{ route('pengiriman.index') }}">
          <i class="fas fa-truck mr-3">
          </i>
          Pengiriman
         </a>
        </li>
        <li>
         <div class="relative">
          <button onclick="toggleDropdown()" class="flex items-center w-full text-gray-700 hover:text-black px-4 py-3 rounded-lg hover:bg-yellow-100">
           <i class="fas fa-globe mr-3">
           </i>
           Website
           <i class="fas fa-chevron-down ml-auto">
           </i>
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
        <i class="fas fa-sign-out-alt mr-3">
        </i>
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
       <h1 class="text-2xl font-bold text-gray-800">Pengeluaran</h1>
       <div class="flex items-center gap-2">
        <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-sm font-medium text-gray-600">
         {{ substr(Auth::user()->name, 0, 2) }}
        </div>
        <span class="text-gray-600">{{ Auth::user()->name }}</span>
       </div>
      </div>
 <!-- Main Card -->
 <div class="bg-white rounded-xl p-8 shadow-sm">
       <div class="flex justify-between items-center mb-6">
        <div class="flex items-center space-x-4">
            <form action="{{ route('pengeluaran.index') }}" method="GET" class="flex items-center space-x-4">
                <input type="text" name="search" value="{{ request('search') }}" 
                    class="w-64 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Cari pengeluaran" id="searchInput">
                <select name="year" onchange="this.form.submit()" 
                    class="w-32 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Semua Tahun</option>
                    @foreach($years as $year)
                        <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="flex space-x-2">
            <button id="editBtn" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 font-medium">
                Edit
            </button>
            <button onclick="showExportModal('pengeluaran')" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 font-medium">
                Export
            </button>
            <button id="deleteBtn" class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 font-medium">
                Hapus
            </button>
            <a href="{{ route('pengeluaran.create') }}" class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 font-medium">
                Tambah
            </a>
        </div>
       </div>

       <div class="overflow-x-auto">
        <table class="w-full">
         <thead>
          <tr class="border-b border-gray-100">
            <th class="text-left py-4 px-6 w-16"></th>
           <th class="text-left py-4 px-6 text-gray-600 font-medium">Tanggal</th>
           <th class="text-left py-4 px-6 text-gray-600 font-medium">Nominal Pengeluaran</th>
           <th class="text-left py-4 px-6 text-gray-600 font-medium">Detail Pengeluaran</th>
           <th class="text-left py-4 px-6 text-gray-600 font-medium">Bank/Dompet</th>
           <th class="text-left py-4 px-6 text-gray-600 font-medium">Rekening/Nomor</th>
          </tr>
         </thead>
         <tbody class="divide-y divide-gray-50">
          @forelse($pengeluaran as $item)
          <tr class="hover:bg-gray-50">
           <td class="py-4 px-6">
            <input type="checkbox" class="pengeluaran-checkbox rounded-full border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="{{ $item->id }}">
           </td>
           <td class="py-4 px-6 text-gray-800">{{ $item->tanggal->format('d/m/Y') }}</td>
           <td class="py-4 px-6 text-gray-800">Rp{{ number_format($item->nominal_pengeluaran, 0, ',', '.') }}</td>
           <td class="py-4 px-6 text-gray-800">{{ $item->detail_pengeluaran }}</td>
           <td class="py-4 px-6 text-gray-800">{{ $item->bank_dompet }}</td>
           <td class="py-4 px-6 text-gray-800">{{ $item->rekening_nomor }}</td>
          </tr>
          @empty
          <tr>
           <td colspan="6" class="py-4 px-6 text-center text-gray-500">Tidak ada data pengeluaran</td>
          </tr>
          @endforelse
         </tbody>
        </table>
       </div>
      </div>
     </div>
    </div>
   </div>

   <!-- Export Modal -->
   <div id="exportModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
       <div class="bg-white p-6 rounded-lg shadow-xl w-96">
           <h3 class="text-xl font-semibold mb-4">Export Data</h3>
           <form id="exportForm" class="space-y-4">
               <!-- Date Range Selection -->
               <div class="space-y-2">
                   <label class="block text-sm font-medium text-gray-700">Rentang Tanggal</label>
                   <div class="flex space-x-2">
                       <input type="date" name="export_start_date" id="export_start_date"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                       <input type="date" name="export_end_date" id="export_end_date"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                   </div>
               </div>
               
               <!-- Export Buttons -->
               <div class="space-y-2">
                   <button type="button" onclick="exportData('excel')" class="w-full bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                       Export ke Excel
                   </button>
                   <button type="button" onclick="exportData('pdf')" class="w-full bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                       Export ke PDF
                   </button>
                   <button type="button" onclick="hideExportModal()" class="w-full bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                       Batal
                   </button>
               </div>
           </form>
       </div>
   </div>

   <script>
    function toggleDropdown() {
     const dropdown = document.getElementById('websiteDropdown');
     dropdown.classList.toggle('hidden');
    }

    // Handle Edit button click
    document.getElementById('editBtn').addEventListener('click', function() {
     const selectedCheckboxes = document.querySelectorAll('.pengeluaran-checkbox:checked');
     if (selectedCheckboxes.length === 1) {
      const pengeluaranId = selectedCheckboxes[0].value;
      window.location.href = `/pengeluaran/${pengeluaranId}/edit`;
     } else {
      alert('Pilih satu pengeluaran untuk diedit');
     }
    });

    // Handle Delete button click
    document.getElementById('deleteBtn').addEventListener('click', function() {
     const selectedCheckboxes = document.querySelectorAll('.pengeluaran-checkbox:checked');
     if (selectedCheckboxes.length > 0) {
      if (confirm('Apakah Anda yakin ingin menghapus pengeluaran yang dipilih?')) {
       selectedCheckboxes.forEach(checkbox => {
        const pengeluaranId = checkbox.value;
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/pengeluaran/${pengeluaranId}`;
        form.innerHTML = `
         @csrf
         @method('DELETE')
        `;
        document.body.appendChild(form);
        form.submit();
       });
      }
     } else {
      alert('Pilih pengeluaran yang akan dihapus');
     }
    });

    function showExportModal(type) {
        const modal = document.getElementById('exportModal');
        const exportForm = document.getElementById('exportForm');
        
        // Set today's date as default
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('export_start_date').value = today;
        document.getElementById('export_end_date').value = today;
        
        modal.classList.remove('hidden');
    }

    function hideExportModal() {
        const modal = document.getElementById('exportModal');
        modal.classList.add('hidden');
    }

    function exportData(format) {
        const startDate = document.getElementById('export_start_date').value;
        const endDate = document.getElementById('export_end_date').value;
        const type = 'pengeluaran';
        
        // Redirect to export URL with date parameters
        window.location.href = `/export/${type}/${format}?export_start_date=${startDate}&export_end_date=${endDate}`;
    }

    // Handle real-time search
    document.getElementById('searchInput').addEventListener('input', function(e) {
        const searchTerm = this.value;
        const form = this.form;
        
        // Submit form when user types
        form.submit();
    });

    // Remove the Enter key handler since we're using real-time search
    document.querySelector('input[name="search"]').removeEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            this.form.submit();
        }
    });
   </script>
</body>

</html>
