<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Layanan
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
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
   @include('sidebar')
   <!-- Main Content -->
   <div class="ml-64 flex-1">
    <div class="p-8">
     <!-- Header with title and user info -->
     <div class="flex justify-between items-center mb-8">
      <h1 class="text-2xl font-bold">Layanan</h1>
      <div class="flex items-center">
       <img src="https://placehold.co/40x40" alt="User Avatar" class="w-10 h-10 rounded-full mr-3">
       <span class="text-gray-700">{{ Auth::user()->name }}</span>
      </div>
     </div>
     <!-- Main Card -->
     <div class="bg-white rounded-2xl p-6 shadow-sm">
      <div class="flex justify-between items-center mb-6">
       <h2 class="text-xl font-bold">Detail Layanan</h2>
       <div class="flex space-x-2">
        <button id="editBtn" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 font-medium">
         Edit
        </button>
        <button id="deleteBtn" class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 font-medium">
         Hapus
        </button>
        <a href="{{ route('website.layanan.create') }}" class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 font-medium">
         Tambah
        </a>
       </div>
      </div>
      <div class="overflow-x-auto">
       <table class="w-full">
        <thead>
         <tr class="border-b border-gray-100">
          @if($services->count() > 0)
          <th class="text-left py-4 px-6 w-16">
            <input type="checkbox" class="rounded-full border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          </th>
          @endif
          <th class="text-left py-4 px-6 text-gray-600 font-medium">Foto Cover</th>
          <th class="text-left py-4 px-6 text-gray-600 font-medium">Judul Layanan</th>
          <th class="text-left py-4 px-6 text-gray-600 font-medium">Deskripsi layanan</th>
         </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
         @forelse($services as $service)
         <tr class="hover:bg-gray-50">
          <td class="py-4 px-6">
           <input type="checkbox" class="service-checkbox rounded-full border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="{{ $service->id }}">
          </td>
          <td class="py-4 px-6">
           @if($service->image)
               <img src="{{ asset('storage/'.$service->image) }}" alt="Service Image" class="w-16 h-16 object-cover rounded-lg">
           @else
               <img src="https://placehold.co/64x64" alt="No Image" class="w-16 h-16 object-cover rounded-lg">
           @endif
          </td>
          <td class="py-4 px-6 text-gray-800 font-medium">{{ $service->title }}</td>
          <td class="py-4 px-6 text-gray-600">{{ $service->description }}</td>
         </tr>
         @empty
         <tr>
           <td colspan="4" class="py-4 px-6 text-center text-gray-500">Tidak ada data layanan</td>
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
     const serviceId = selectedCheckboxes[0].value;
     window.location.href = `/website/layanan/${serviceId}/edit`;
    } else {
     alert('Pilih satu layanan untuk diedit');
    }
   });
   // Handle Delete button click
   document.getElementById('deleteBtn').addEventListener('click', function() {
    const selectedCheckboxes = document.querySelectorAll('.service-checkbox:checked');
    if (selectedCheckboxes.length > 0) {
     if (confirm('Apakah Anda yakin ingin menghapus layanan yang dipilih?')) {
      selectedCheckboxes.forEach(checkbox => {
       const serviceId = checkbox.value;
       const form = document.createElement('form');
       form.method = 'POST';
       form.action = `/website/layanan/${serviceId}`;
       form.innerHTML = `
        @csrf
        @method('DELETE')
       `;
       document.body.appendChild(form);
       form.submit();
      });
     }
    } else {
     alert('Pilih layanan yang akan dihapus');
    }
   });
  </script>
 </body>
</html>
