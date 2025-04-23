<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Project E-Learning</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white-100 relative min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">

  <!-- Background pattern -->
  <img src="/pkss/img/DC8-1.png" alt="Pattern Top Right" class="absolute top-0 right-0 w-24 sm:w-32 md:w-40 opacity-100 z-0">
  <img src="/pkss/img/DC8-2.png" alt="Pattern Bottom Left" class="absolute bottom-0 left-0 w-24 sm:w-32 md:w-40 opacity-100 z-0">

  <!-- Login Box -->
  <div class="bg-gray-100 rounded-2xl shadow-xl p-6 sm:p-8 w-full max-w-md z-10 relative">
    <div class="flex justify-center mb-6">
      <img src="/pkss/img/logo-1.png" alt="Logo" class="w-32 sm:w-40">
    </div>
    <h1 class="text-xl sm:text-2xl font-bold text-center text-orange-500 mb-6">Welcome</h1>

    <form action="{{ url('/login') }}" method="POST">
      @csrf 
      <div class="space-y-4">
        <div>
          <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
          <input type="text" id="nik" placeholder="Masukkan NIK" class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-2 text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-blue-500" name="email" />
        </div>
  
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" id="password" placeholder="Masukkan Password" class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-2 text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-blue-500" name="password"/>
        </div>
  
        <div class="text-right text-sm text-blue-600 hover:underline">
          <a href="#">Lupa Password?</a>
        </div>
  
        <button onclick="login()" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition text-sm sm:text-base">
          Login
        </button>
      </div>
    </div>  
    </form>
    

  <!-- Script login -->
  <script> src="/pkss/main.js"</script>
</body>
</html>
