<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Register
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  @php
    use Illuminate\Support\Facades\Storage;
  @endphp
 </head>
 <body class="h-screen flex items-center justify-center bg-gray-100">
  <div class="flex w-full h-full">
   <div class="w-1/2 relative">
    <img alt="A delivery person holding packages" class="w-full h-full object-cover" src="{{ asset('storage/auth/delivery-person.jpg') }}"/>
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
     <h1 class="text-white text-4xl font-bold">
      Silakan Membuat Akun!
     </h1>
    </div>
   </div>
   <div class="w-1/2 p-12 flex flex-col justify-center bg-white">
    <h2 class="text-3xl font-bold mb-4">
     Register
    </h2>
    <p class="text-gray-600 mb-6">
     Buat akun untuk mengakses dashboard
    </p>

    @if($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
     <ul>
      @foreach($errors->all() as $error)
       <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
     @csrf
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="name">Nama</label>
      <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" 
             id="name" 
             name="name" 
             type="text" 
             value="{{ old('name') }}" 
             required/>
     </div>
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
      <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" 
             id="email" 
             name="email" 
             type="email" 
             value="{{ old('email') }}" 
             required/>
     </div>
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="password">Password</label>
      <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" 
             id="password" 
             name="password" 
             type="password" 
             required/>
     </div>
     <div class="mb-6">
      <label class="block text-sm font-medium text-gray-700" for="password_confirmation">Konfirmasi Password</label>
      <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" 
             id="password_confirmation" 
             name="password_confirmation" 
             type="password" 
             required/>
     </div>
     <button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" 
             type="submit">
      Register
     </button>
    </form>
    <p class="mt-6 text-center text-sm text-gray-600">
     Sudah punya akun?
     <a class="font-medium text-yellow-600 hover:text-yellow-500" href="{{ route('login') }}">Login</a>
    </p>
   </div>
  </div>
 </body>
</html>
