<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PKSS e-learning - Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="{{ asset('pkss/style.css') }}" rel="stylesheet">

</head>
<body class="bg-gray-50 font-inter">
  <div class="main-container">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-white p-4 space-y-8 shadow-md md:h-screen">
      <div class="text-center">
        
          <img class="w-full h-full object-contain" src="/pkss/img/logo-1.png" alt="Logo" />
        
      </div>
      <nav class="space-y-4">
        <a href="#" class="flex items-center space-x-2 text-[#1d4ed8] font-medium">
          <div class="w-10 h-10 bg-[#1d4ed8] text-white rounded grid place-items-center">🏠</div>
          <span>Dashboard</span>
        </a>
        <a href="course.html" class="flex items-center space-x-2 text-gray-600">
          <div class="w-10 h-10 bg-gray-200 rounded grid place-items-center">📘</div>
          <span>Upload Materi</span>
        </a>
        <a href="#" class="flex items-center space-x-2 text-gray-600">
          <div class="w-10 h-10 bg-gray-200 rounded grid place-items-center">📝</div>
          <span>Buat Ujian</span>
        </a>
        <a href="#" class="flex items-center space-x-2 text-gray-600">
          <div class="w-10 h-10 bg-gray-200 rounded grid place-items-center">📊 </div>
          <span>Management Karyawan</span>
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="content">
      <div>
        <p class="text-lg font-medium text-blue-600">Selamat Pagi, <span class="font-bold">joshua</span></p>
        <p class="text-sm text-gray-500 mb-2">don’t miss your examination today!</p>
        <div class="text-center my-4">
          <p class="text-md text-black font-semibold">Live Watch</p>
          <div id="clock" class="text-5xl font-semibold tracking-widest">00 : 00 : 00</div>
          <div id="date" class="text-md mt-2">Hari, DD Bulan YYYY</div>
        </div>
      </div>

      <div> 
      <section class="grid grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-sm card-hover text-center">
          <div class="text-3xl mb-1">📘</div>
          <h3 class="font-semibold text-lg">Materi</h3>
          <p class="text-gray-600 mt-2">Upload Materi</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm card-hover text-center">
          <div class="text-3xl mb-1">📝</div>
          <h3 class="font-semibold text-lg">Ujian</h3>
          <p class="text-gray-600 mt-2">Buat Soal Ujian</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm card-hover text-center">
          <div class="text-3xl mb-1">📊</div>
          <h3 class="font-semibold text-lg">Management</h3>
          <p class="text-gray-600 mt-2">Nilai Karyawan</p>
        </div>
      </section>
      </div>  
      <section class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="text-xl font-semibold mb-4">Pengumuman</h3>
        <div class="space-y-4">
          <div class="border-b pb-4">
            <h4 class="font-medium">Ujian Kedisplinan Karyawan</h4>
            <p class="text-gray-600 mt-1">Ujian Kedisplinan Karyawan Telah Ditambahkan....</p>
            <span class="text-sm text-gray-500 mt-2 block">2 hours ago</span>
          </div>
          <div class="border-b pb-4">
            <h4 class="font-medium">Ujian Komunikasi Aktif</h4>
            <p class="text-gray-600 mt-1">semua Karyawan Sudah Mengerjakan Ujian....</p>
            <span class="text-sm text-gray-500 mt-2 block">1 day ago</span>
          </div>
          <div>
            <h4 class="font-medium">Ujian SOP Satpam</h4>
            <p class="text-gray-600 mt-1">Ujian SOP Satpam telah Ditambahkan...</p>
            <span class="text-sm text-gray-500 mt-2 block">2 days ago</span>
          </div>
        </div>
      </section>
    </main>

    <!-- Right Sidebar -->
<aside class="right-sidebar">
    <div class="text-center mb-10">
      <!-- Profile Image -->
      <div class="profile-img w-24 h-24 mx-auto rounded-full overflow-hidden mb-4">
        <img src="/pkss/img/pp.png" alt="Profile" class="w-full h-full object-cover">
      </div>
      <h1>Dinda</h1>
      <p>Admin</p>
      
    </div>
    <div>
      <a href="{{ route ('logout') }}">
        <button class="w-full bg-red-500 text-white py-2 rounded-xl font-semibold">Log out</button>
      </a>
    </div> 
    <div class="bg-white rounded-lg shadow p-4">
      <div class="flex justify-between items-center mb-4">
        <button onclick="prevMonth()" class="text-blue-500">&lt;</button>
        <h2 id="calendar-title" class="font-semibold text-lg">Maret 2025</h2>
        <button onclick="nextMonth()" class="text-blue-500">&gt;</button>
      </div>
      <div class="grid grid-cols-7 gap-2 text-center text-sm font-semibold text-gray-600">
        <div>S</div><div>S</div><div>S</div><div>R</div><div>K</div><div>J</div><div>S</div>
      </div>
      <div id="calendar-days" class="grid grid-cols-7 gap-2 mt-2 text-center text-sm text-gray-800"></div>
    </div>

    
  
    <!-- Exam Reminders -->
    <div>
      <h3 class="font-semibold mb-4">Exam Reminders</h3>
      <div class="space-y-4">
        <div class="bg-red-50 p-3 rounded-lg">
          <div class="flex items-center text-red-800 mb-2">
            <i class="fas fa-clock mr-2"></i><span class="font-medium">Today</span>
          </div>
          <p class="text-sm">Mathematics Final Exam</p>
          <p class="text-xs text-red-600 mt-1">09:00 AM - 11:00 AM</p>
        </div>
        <div class="bg-gray-50 p-3 rounded-lg">
          <div class="flex items-center text-gray-800 mb-2">
            <i class="fas fa-clock mr-2"></i><span class="font-medium">Tomorrow</span>
          </div>
          <p class="text-sm">Physics Mid-term</p>
          <p class="text-xs text-gray-600 mt-1">02:00 PM - 04:00 PM</p>
        </div>
      </div>
    </div>
  </aside>

<!-- Clock Script -->
<script src="/pkss/main.js"></script>

<!-- Calendar Script -->
<script src="/pkss/main.js"></script>

  
    

  
  
</body>
</html>
