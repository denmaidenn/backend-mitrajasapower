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
   @include('sidebar')
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
