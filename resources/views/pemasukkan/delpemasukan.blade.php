<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Pemasukan
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-gray-100 font-sans">
  <div class="flex h-screen">
   <!-- Sidebar -->
   @include('sidebar')
   <!-- Main Content -->
   <div class="flex-1 p-6">
    <div class="flex justify-between items-center mb-6">
     <h1 class="text-3xl font-bold">
      Pemasukan
     </h1>
     <div class="flex items-center space-x-4">
      <span>
       Bilal Indrajaya
      </span>
      <img alt="User Avatar" class="rounded-full h-10 w-10" src="https://placehold.co/40x40"/>
     </div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-lg">
     <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-bold">
       Hapus Pemasukan
      </h2>
      <div class="space-x-2">
       <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">
        Edit
       </button>
       <button class="bg-red-500 text-white px-4 py-2 rounded-lg">
        Hapus
       </button>
       <button class="bg-yellow-500 text-white px-4 py-2 rounded-lg">
        Tambah
       </button>
      </div>
     </div>
     <table class="w-full text-left">
      <thead>
       <tr>
        <th class="py-2">
         Tanggal
        </th>
        <th class="py-2">
         Nominal Pemasukan
        </th>
        <th class="py-2">
         Detail Pemasukan
        </th>
        <th class="py-2">
         Bank/Dompet
        </th>
        <th class="py-2">
         Rekening/Nomor
        </th>
       </tr>
      </thead>
      <tbody>
       <tr class="border-t">
        <td class="py-2 flex items-center space-x-2">
         <i class="fas fa-minus-circle text-red-500">
         </i>
         <span>
          20/02/2025
         </span>
        </td>
        <td class="py-2">
         Rp100.000.000
        </td>
        <td class="py-2">
         Pembayaran dari Customer
        </td>
        <td class="py-2">
         Mandiri
        </td>
        <td class="py-2">
         12213401239012
        </td>
       </tr>
       <tr class="border-t">
        <td class="py-2 flex items-center space-x-2">
         <i class="fas fa-minus-circle text-red-500">
         </i>
         <span>
          17/02/2025
         </span>
        </td>
        <td class="py-2">
         Rp75.000.000
        </td>
        <td class="py-2">
         Pembayaran dari Customer
        </td>
        <td class="py-2">
         BCA
        </td>
        <td class="py-2">
         12213401239014
        </td>
       </tr>
       <tr class="border-t">
        <td class="py-2 flex items-center space-x-2">
         <i class="fas fa-minus-circle text-red-500">
         </i>
         <span>
          19/02/2025
         </span>
        </td>
        <td class="py-2">
         Rp200.000.000
        </td>
        <td class="py-2">
         Pembayaran dari Customer
        </td>
        <td class="py-2">
         BNI
        </td>
        <td class="py-2">
         12213401239013
        </td>
       </tr>
       <tr class="border-t">
        <td class="py-2 flex items-center space-x-2">
         <i class="fas fa-minus-circle text-red-500">
         </i>
         <span>
          21/02/2025
         </span>
        </td>
        <td class="py-2">
         Rp125.000.000
        </td>
        <td class="py-2">
         Pembayaran dari Customer
        </td>
        <td class="py-2">
         BRI
        </td>
        <td class="py-2">
         12213401239012
        </td>
       </tr>
       <tr class="border-t">
        <td class="py-2 flex items-center space-x-2">
         <i class="fas fa-minus-circle text-red-500">
         </i>
         <span>
          15/02/2025
         </span>
        </td>
        <td class="py-2">
         Rp90.000.000
        </td>
        <td class="py-2">
         Pembayaran dari Vendor
        </td>
        <td class="py-2">
         Mandiri
        </td>
        <td class="py-2">
         12213401239017
        </td>
       </tr>
      </tbody>
     </table>
    </div>
   </div>
  </div>
 </body>
</html>
