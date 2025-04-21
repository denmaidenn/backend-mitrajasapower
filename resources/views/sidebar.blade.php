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
      <a class="flex items-center text-gray-700 hover:text-black" href="/dashboard">
       <i class="fas fa-tachometer-alt mr-3">
       </i>
       Dashboard
      </a>
     </li>
     <li>
      <a class="flex items-center text-gray-700 hover:text-black" href="/pemasukkan">
       <i class="fas fa-box-open mr-3">
       </i>
       Pemasukkan
      </a>
     </li>
     <li>
      <a class="flex items-center text-gray-700 hover:text-black" href="/pengeluaran">
       <i class="fas fa-box mr-3">
       </i>
       Pengeluaran
      </a>
     </li>
     <li>
      <a class="flex items-center text-gray-700 hover:text-black" href="/pengiriman">
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