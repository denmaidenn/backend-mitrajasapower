<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Detail Pusat Bantuan
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-gray-100">
  <div class="flex h-screen">
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
           <a href="{{ route('website.testimonial') }}" class="block px-4 py-2 text-gray-700 hover:bg-yellow-100">Testimonial</a>
           <a href="{{ route('website.pusatbantuan') }}" class="block px-4 py-2 text-gray-700 hover:bg-yellow-100 bg-yellow-100">Pusat Bantuan</a>
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
   <div class="flex-1 p-6">
    <div class="flex justify-between items-center mb-6">
     <h1 class="text-2xl font-bold">
      Pusat Bantuan
     </h1>
     <div class="flex items-center">
      <img alt="User Avatar" class="h-10 w-10 rounded-full mr-2" src="https://placehold.co/40x40"/>
      <span>
       Bilal Indrajaya
      </span>
     </div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
     <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-bold">
       Detail Pusat Bantuan
      </h2>
      <div>
       <button class="bg-blue-500 text-white px-4 py-2 rounded mr-2">
        Edit
       </button>
       <button class="bg-red-500 text-white px-4 py-2 rounded mr-2">
        Hapus
       </button>
       <button class="bg-yellow-500 text-white px-4 py-2 rounded">
        Tambah
       </button>
      </div>
     </div>
     <table class="w-full text-left">
      <thead>
       <tr>
        <th class="py-2">
         Pertanyaan
        </th>
        <th class="py-2">
         Jawaban
        </th>
        <th class="py-2">
         Kategori
        </th>
       </tr>
      </thead>
      <tbody>
       <tr class="border-b">
        <td class="py-2">
         Bagaimana cara saya memesan jasa pengiriman ini?
        </td>
        <td class="py-2">
         Klik tombol Order Now, lalu nanti akan diarahkan ke Whatsapp. Pemesanan hanya melalui Whatsapp.
        </td>
        <td class="py-2">
         <button class="bg-yellow-200 px-4 py-1 rounded">
          Panduan
         </button>
        </td>
       </tr>
       <tr class="border-b">
        <td class="py-2">
         Bagaimana cara melacak status pengiriman saya?
        </td>
        <td class="py-2">
         Anda bisa melacak status pengiriman melalui halaman "Tracking" dengan memasukkan nomor resi.
        </td>
        <td class="py-2">
         <button class="bg-yellow-200 px-4 py-1 rounded">
          Panduan
         </button>
        </td>
       </tr>
       <tr class="border-b">
        <td class="py-2">
         Berapa lama estimasi pengiriman barang?
        </td>
        <td class="py-2">
         Estimasi pengiriman tergantung pada tujuan dan jenis layanan. Umumnya, pengiriman dalam kota 1-2 hari, luar kota 3-5 hari.
        </td>
        <td class="py-2">
         <button class="bg-yellow-200 px-4 py-1 rounded">
          Panduan
         </button>
        </td>
       </tr>
       <tr>
        <td class="py-2">
         Apakah ada layanan asuransi untuk barang yang dikirim?
        </td>
        <td class="py-2">
         Ya, kami menyediakan layanan asuransi tambahan untuk barang berharga. Silakan hubungi CS untuk informasi lebih lanjut.
        </td>
        <td class="py-2">
         <button class="bg-yellow-200 px-4 py-1 rounded">
          Panduan
         </button>
        </td>
       </tr>
      </tbody>
     </table>
    </div>
   </div>
  </div>
 </body>
</html>
