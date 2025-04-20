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
    
    @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
     @csrf
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="login">
       Email atau Nama
      </label>
      <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" 
             id="login" 
             name="login" 
             type="text" 
             value="{{ old('login') }}" 
             required 
             placeholder="Masukkan email atau nama"/>
     </div>
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="password">
       Password
      </label>
      <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" id="password" name="password" type="password" required/>
     </div>
     <div class="flex items-center justify-between mb-6">
      <div class="flex items-center">
       <input class="h-4 w-4 text-yellow-600 focus:ring-yellow-500 border-gray-300 rounded" id="remember" name="remember" type="checkbox"/>
       <label class="ml-2 block text-sm text-gray-900" for="remember">
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
     <a class="font-medium text-yellow-600 hover:text-yellow-500" href="{{ route('register') }}">
      Register
     </a>
    </p>
   </div>
  </div>
 </body>
</html>
