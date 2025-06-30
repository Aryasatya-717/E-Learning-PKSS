<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PKSS e-learning - Dashboard</title>
  <link rel="icon" type="image/png" href="/pkss/img/logo-transparent.png">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="{{ asset('pkss/style.css') }}" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @yield('head')
</head>
<body class="bg-gray-50 font-inter">
  <div class="flex min-h-screen">
    
    {{-- Sidebar Kiri --}}
    @include('layouts.sidebar-left')

    {{-- Konten --}}
    <main class="flex-1 p-6">
      @yield('content')
    </main>

    {{-- Sidebar Kanan --}}
    @include('layouts.sidebar-right')

    <!-- Scripts -->
    @stack('scripts')
    @yield('scripts')

  </div>
</body>
</html>
