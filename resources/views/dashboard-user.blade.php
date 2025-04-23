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
    @include('sidebar-kiri-user')

    <!-- Main Content -->
    <main class="content">
      <div>
        <p class="text-lg font-medium text-blue-600">Selamat Pagi, <span class="font-bold">{{ Auth::user()->name }}</span></p>
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
          <h3 class="font-semibold text-lg">Ujian</h3>
          <p class="text-gray-600 mt-2">Mulai Ujian</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm card-hover text-center">
          <div class="text-3xl mb-1">📆</div>
          <h3 class="font-semibold text-lg">Jadwal</h3>
          <p class="text-gray-600 mt-2">Cek Jadwal Ujian</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm card-hover text-center">
          <div class="text-3xl mb-1">📜</div>
          <h3 class="font-semibold text-lg">Sertifikat</h3>
          <p class="text-gray-600 mt-2">Lihat Pencapaian</p>
        </div>
      </section>
      </div>  
      <section class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="text-xl font-semibold mb-4">Announcements</h3>
        <div class="space-y-4">
          <div class="border-b pb-4">
            <h4 class="font-medium">Ujian Kedisplinan Karyawan</h4>
            <p class="text-gray-600 mt-1">Ujian Kedisplinan Karyawan Telah Ditambahkan....</p>
            <span class="text-sm text-gray-500 mt-2 block">2 hours ago</span>
          </div>
          <div class="border-b pb-4">
            <h4 class="font-medium">>Ujian Komunikasi Aktif</h4>
            <p class="text-gray-600 mt-1">Kamu telah selesai Mengerjakan Ujian...</p>
            <span class="text-sm text-gray-500 mt-2 block">1 day ago</span>
          </div>
          <div>
            <h4 class="font-medium">Ujian SOP Satpam</h4>
            <p class="text-gray-600 mt-1">Ujian SOP Satpam akan berakhir pada...</p>
            <span class="text-sm text-gray-500 mt-2 block">2 days ago</span>
          </div>
        </div>
      </section>
    </main>

    <!-- Right Sidebar -->

@include('sidebar-kanan-user')


<!-- Clock Script -->
<script src="/pkss/main.js"></script>

<!-- Calendar Script -->
<script src="/pkss/main.js"></script>

  
    

  
  
</body>
</html>
