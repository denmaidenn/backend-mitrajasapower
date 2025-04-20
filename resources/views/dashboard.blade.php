<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Dashboard
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
       <ul class="space-y-4">
        <li>
         <a class="flex items-center text-gray-700 hover:text-black bg-yellow-100" href="#">
          <i class="fas fa-tachometer-alt mr-3">
          </i>
          Dashboard
         </a>
        </li>
        <li>
         <a class="flex items-center text-gray-700 hover:text-black" href="#">
          <i class="fas fa-box-open mr-3">
          </i>
          Pemasukkan
         </a>
        </li>
        <li>
         <a class="flex items-center text-gray-700 hover:text-black" href="#">
          <i class="fas fa-box mr-3">
          </i>
          Pengeluaran
         </a>
        </li>
        <li>
         <a class="flex items-center text-gray-700 hover:text-black" href="#">
          <i class="fas fa-truck mr-3">
          </i>
          Pengiriman
         </a>
        </li>
        <li>
         <div class="relative">
          <button onclick="toggleDropdown()" class="flex items-center w-full text-gray-700 hover:text-black">
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
      <div class="flex items-center">
       <img src="https://placehold.co/40x40" alt="User Avatar" class="w-10 h-10 rounded-full mr-3">
       <span class="text-gray-700">{{ Auth::user()->name }}</span>
      </div>
     </div>
     <!-- Main Card -->
     <div class="bg-white rounded-2xl p-6 shadow-sm">
      <div class="flex justify-between items-center mb-6">
       <h2 class="text-xl font-bold">Selamat Datang di Dashboard</h2>
      </div>
      <p class="text-gray-600">
       Ini adalah halaman dashboard Anda. Silakan gunakan menu di sidebar untuk navigasi.
      </p>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
