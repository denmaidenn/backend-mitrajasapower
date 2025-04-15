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
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Inter', sans-serif;
        }
  </style>
 </head>
 <body class="bg-gray-100">
  <div class="flex min-h-screen">
   <!-- Sidebar -->
   <div class="w-64 bg-white shadow-md">
    <div class="p-4">
     <img alt="Company Logo" class="mb-4" src="https://placehold.co/150x100"/>
     <nav>
      <ul>
       <li class="mb-2">
        <a class="flex items-center p-2 text-black bg-yellow-100 rounded-md" href="#">
         <i class="fas fa-tachometer-alt mr-2">
         </i>
         Dashboard
        </a>
       </li>
       <li class="mb-2">
        <a class="flex items-center p-2 text-black hover:bg-gray-200 rounded-md" href="#">
         <i class="fas fa-wallet mr-2">
         </i>
         Pemasukkan
        </a>
       </li>
       <li class="mb-2">
        <a class="flex items-center p-2 text-black hover:bg-gray-200 rounded-md" href="#">
         <i class="fas fa-money-bill-wave mr-2">
         </i>
         Pengeluaran
        </a>
       </li>
       <li class="mb-2">
        <a class="flex items-center p-2 text-black hover:bg-gray-200 rounded-md" href="#">
         <i class="fas fa-truck mr-2">
         </i>
         Pengiriman
        </a>
       </li>
       <li class="mb-2">
        <a class="flex items-center p-2 text-black hover:bg-gray-200 rounded-md" href="#">
         <i class="fas fa-globe mr-2">
         </i>
         Website
        </a>
       </li>
      </ul>
     </nav>
    </div>
    <div class="absolute bottom-0 w-full p-4">
     <a class="flex items-center p-2 text-black hover:bg-gray-200 rounded-md" href="#">
      <i class="fas fa-sign-out-alt mr-2">
      </i>
      Log Out
     </a>
    </div>
   </div>
   <!-- Main Content -->
   <div class="flex-1 p-6">
    <div class="flex justify-between items-center mb-6">
     <h1 class="text-2xl font-bold">
      Dashboard
     </h1>
     <div class="flex items-center">
      <img alt="User Avatar" class="rounded-full mr-2" src="https://placehold.co/40x40"/>
      <span>
       Bilal Indrajaya
      </span>
     </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
     <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
      <div class="bg-black p-3 rounded-full text-white mr-4">
       <i class="fas fa-arrow-up">
       </i>
      </div>
      <div>
       <p class="text-gray-500">
        Total Income
       </p>
       <p class="text-2xl font-bold">
        Rp632.000
       </p>
       <p class="text-green-500">
        +1.29%
       </p>
      </div>
     </div>
     <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
      <div class="bg-black p-3 rounded-full text-white mr-4">
       <i class="fas fa-arrow-up">
       </i>
      </div>
      <div>
       <p class="text-gray-500">
        Total Outcome
       </p>
       <p class="text-2xl font-bold">
        Rp632.000
       </p>
       <p class="text-red-500">
        +1.29%
       </p>
      </div>
     </div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
     <h2 class="text-xl font-bold mb-4">
      Analisis
     </h2>
     <div class="flex justify-between items-center mb-4">
      <div>
       <span class="text-yellow-500 font-bold">
        Income
       </span>
       <span class="text-black font-bold ml-4">
        Outcome
       </span>
      </div>
      <div>
       <select class="border border-gray-300 rounded-md p-2">
        <option>
         2025
        </option>
       </select>
      </div>
     </div>
     <img alt="Graph showing income and outcome analysis over months" src="https://placehold.co/600x300"/>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
     <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-bold">
       Pengiriman
      </h2>
      <i class="fas fa-ellipsis-h">
      </i>
     </div>
     <table class="w-full text-left">
      <thead>
       <tr>
        <th class="py-2">
         Nomor Resi
        </th>
        <th class="py-2">
         Dari
        </th>
        <th class="py-2">
         Ke
        </th>
        <th class="py-2">
         Jenis Barang
        </th>
        <th class="py-2">
         Tipe Pengiriman
        </th>
        <th class="py-2">
         Status
        </th>
       </tr>
      </thead>
      <tbody>
       <tr>
        <td class="py-2">
         MJP1234567890
        </td>
        <td class="py-2">
         Bogor
        </td>
        <td class="py-2">
         Jakarta
        </td>
        <td class="py-2">
         Mobil
        </td>
        <td class="py-2">
         Kendaraan
        </td>
        <td class="py-2">
         <span class="bg-yellow-100 text-yellow-600 py-1 px-3 rounded-full">
          Approved
         </span>
        </td>
       </tr>
       <tr>
        <td class="py-2">
         MJP1234567890
        </td>
        <td class="py-2">
         Bogor
        </td>
        <td class="py-2">
         Jakarta
        </td>
        <td class="py-2">
         Mobil
        </td>
        <td class="py-2">
         Kendaraan
        </td>
        <td class="py-2">
         <span class="bg-blue-100 text-blue-600 py-1 px-3 rounded-full">
          Pending
         </span>
        </td>
       </tr>
       <tr>
        <td class="py-2">
         MJP1234567890
        </td>
        <td class="py-2">
         Bogor
        </td>
        <td class="py-2">
         Jakarta
        </td>
        <td class="py-2">
         Mobil
        </td>
        <td class="py-2">
         Kendaraan
        </td>
        <td class="py-2">
         <span class="bg-green-100 text-green-600 py-1 px-3 rounded-full">
          Complete
         </span>
        </td>
       </tr>
       <tr>
        <td class="py-2">
         MJP1234567890
        </td>
        <td class="py-2">
         Bogor
        </td>
        <td class="py-2">
         Jakarta
        </td>
        <td class="py-2">
         Mobil
        </td>
        <td class="py-2">
         Kendaraan
        </td>
        <td class="py-2">
         <span class="bg-red-100 text-red-600 py-1 px-3 rounded-full">
          Rejected
         </span>
        </td>
       </tr>
      </tbody>
     </table>
    </div>
   </div>
  </div>
 </body>
</html>
