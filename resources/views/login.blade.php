<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Login Page
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="h-screen flex items-center justify-center bg-gray-100">
  <div class="flex w-full h-full">
   <div class="w-1/2 relative">
    <img alt="A delivery person holding packages in an urban setting" class="w-full h-full object-cover" src="https://placehold.co/600x800"/>
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
     <h1 class="text-white text-4xl font-bold">
      Selamat Datang Kembali!
     </h1>
    </div>
   </div>
   <div class="w-1/2 p-12 flex flex-col justify-center bg-white">
    <h2 class="text-3xl font-bold mb-4">
     Login
    </h2>
    <p class="mb-6">
     Masukkan detail login Anda untuk melanjutkan
    </p>
    <form>
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="email">
       Email
      </label>
      <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" id="email" type="email"/>
     </div>
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="password">
       Password
      </label>
      <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" id="password" type="password"/>
     </div>
     <div class="flex items-center justify-between mb-6">
      <div class="flex items-center">
       <input class="h-4 w-4 text-yellow-600 focus:ring-yellow-500 border-gray-300 rounded" id="remember_me" type="checkbox"/>
       <label class="ml-2 block text-sm text-gray-900" for="remember_me">
        Remember Me
       </label>
      </div>
      <div class="text-sm">
       <a class="font-medium text-yellow-600 hover:text-yellow-500" href="#">
        Forgot Password?
       </a>
      </div>
     </div>
     <div>
      <button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" type="submit">
       Login
      </button>
     </div>
    </form>
    <p class="mt-6 text-center text-sm text-gray-600">
     Tidak punya akun?
     <a class="font-medium text-yellow-600 hover:text-yellow-500" href="#">
      Register
     </a>
    </p>
   </div>
  </div>
 </body>
</html>
