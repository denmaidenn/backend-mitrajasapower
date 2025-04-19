@php
use Illuminate\Support\Facades\Storage;
@endphp
<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Gallery</title>
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
      <h1 class="text-2xl font-bold">Gallery</h1>
      <div class="flex items-center">
       <img src="https://placehold.co/40x40" alt="User Avatar" class="w-10 h-10 rounded-full mr-3">
       <span class="text-gray-700">Bilal Indrajaya</span>
      </div>
     </div>

     <!-- Main Card -->
     <div class="bg-white rounded-2xl p-6 shadow-sm">
      <div class="flex justify-between items-center mb-6">
       <h2 class="text-xl font-bold">Detail Gallery</h2>
       <div class="flex space-x-2">
        <button id="editBtn" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 font-medium">
         Edit
        </button>
        <button id="deleteBtn" class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 font-medium">
         Hapus
        </button>
        <a href="{{ route('website.gallery.create') }}" class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 font-medium">
         Tambah
        </a>
       </div>
      </div>

      <div class="grid grid-cols-1 gap-4">
       @foreach($galleries as $gallery)
       <div class="flex items-center bg-gray-50 p-4 rounded-lg hover:bg-gray-100 transition-colors">
        <input type="checkbox" class="gallery-checkbox w-5 h-5 rounded-md border-gray-300 text-blue-600 focus:ring-blue-500 mr-4" value="{{ $gallery->id }}">
        <div class="flex items-center flex-1">
         @if($gallery->image)
          <img src="{{ asset('storage/'.$gallery->image) }}" alt="{{ $gallery->title }}" class="w-24 h-24 rounded-lg mr-4 object-cover">
         @else
          <img src="https://placehold.co/100x100" alt="No Image" class="w-24 h-24 rounded-lg mr-4 object-cover">
         @endif
         <span class="text-gray-800 flex-1">{{ $gallery->title }}</span>
        </div>
       </div>
       @endforeach
      </div>
     </div>
    </div>
   </div>
  </div>

  <script>
   // Handle Edit button click
   document.getElementById('editBtn').addEventListener('click', function() {
    const selectedCheckboxes = document.querySelectorAll('.gallery-checkbox:checked');
    if (selectedCheckboxes.length === 1) {
     const galleryId = selectedCheckboxes[0].value;
     window.location.href = `/website/gallery/${galleryId}/edit`;
    } else {
     alert('Pilih satu gallery untuk diedit');
    }
   });

   // Handle Delete button click
   document.getElementById('deleteBtn').addEventListener('click', function() {
    const selectedCheckboxes = document.querySelectorAll('.gallery-checkbox:checked');
    if (selectedCheckboxes.length > 0) {
     if (confirm('Apakah Anda yakin ingin menghapus gallery yang dipilih?')) {
      selectedCheckboxes.forEach(checkbox => {
       const galleryId = checkbox.value;
       const form = document.createElement('form');
       form.method = 'POST';
       form.action = `/website/gallery/${galleryId}`;
       form.innerHTML = `
        @csrf
        @method('DELETE')
       `;
       document.body.appendChild(form);
       form.submit();
      });
     }
    } else {
     alert('Pilih gallery yang akan dihapus');
    }
   });
  </script>
 </body>
</html>
