<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Gallery
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-gray-100">
  <div class="flex h-screen">
   <!-- Sidebar -->
   <div class="w-1/5 bg-white shadow-lg">
    <div class="p-4">
     <img alt="Company Logo" class="mx-auto" src="https://placehold.co/150x100"/>
    </div>
    <nav class="mt-10">
     <ul>
      <li class="mb-4">
       <a class="flex items-center text-black p-2 hover:bg-gray-200 rounded" href="#">
        <i class="fas fa-th-large mr-3">
        </i>
        Dashboard
       </a>
      </li>
      <li class="mb-4">
       <a class="flex items-center text-black p-2 hover:bg-gray-200 rounded" href="#">
        <i class="fas fa-check-square mr-3">
        </i>
        Pemasukkan
       </a>
      </li>
      <li class="mb-4">
       <a class="flex items-center text-black p-2 hover:bg-gray-200 rounded" href="#">
        <i class="fas fa-arrow-up mr-3">
        </i>
        Pengeluaran
       </a>
      </li>
      <li class="mb-4">
       <a class="flex items-center text-black p-2 hover:bg-gray-200 rounded" href="#">
        <i class="fas fa-shipping-fast mr-3">
        </i>
        Pengiriman
       </a>
      </li>
      <li class="mb-4">
       <a class="flex items-center text-black p-2 hover:bg-gray-200 rounded" href="#">
        <i class="fas fa-globe mr-3">
        </i>
        Website
       </a>
      </li>
     </ul>
    </nav>
    <div class="absolute bottom-0 w-full p-4">
     <a class="flex items-center text-black p-2 hover:bg-gray-200 rounded" href="#">
      <i class="fas fa-sign-out-alt mr-3">
      </i>
      Log Out
     </a>
    </div>
   </div>
   <!-- Main Content -->
   <div class="flex-1 p-6">
    <div class="flex justify-between items-center mb-6">
     <h1 class="text-3xl font-bold">
      Gallery
     </h1>
     <div class="flex items-center">
      <img alt="User Avatar" class="rounded-full mr-2" src="https://placehold.co/40x40"/>
      <span>
       Bilal Indrajaya
      </span>
     </div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-lg">
     <div class="flex justify-between items-center mb-4">
      <h2 class="text-2xl font-bold">
       Detail Gallery
      </h2>
      <div class="space-x-2">
       <button class="bg-blue-500 text-white px-4 py-2 rounded">
        Edit
       </button>
       <button class="bg-red-500 text-white px-4 py-2 rounded">
        Hapus
       </button>
       <button class="bg-yellow-500 text-white px-4 py-2 rounded">
        Tambah
       </button>
      </div>
     </div>
     <div class="grid grid-cols-1 gap-4">
      <div class="flex items-center bg-gray-100 p-4 rounded-lg">
       <img alt="Promo Diskon 50% Pengiriman Kontainer" class="w-24 h-24 rounded-lg mr-4" src="https://placehold.co/100x100"/>
       <span>
        Promo Diskon 50% Pengiriman Kontainer
       </span>
      </div>
      <div class="flex items-center bg-gray-100 p-4 rounded-lg">
       <img alt="Keamanan Terjamin dalam Pengiriman Cargo" class="w-24 h-24 rounded-lg mr-4" src="https://placehold.co/100x100"/>
       <span>
        Keamanan Terjamin dalam Pengiriman Cargo
       </span>
      </div>
      <div class="flex items-center bg-gray-100 p-4 rounded-lg">
       <img alt="Penawaran Spesial untuk Pengiriman Bulk" class="w-24 h-24 rounded-lg mr-4" src="https://placehold.co/100x100"/>
       <span>
        Penawaran Spesial untuk Pengiriman Bulk
       </span>
      </div>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
