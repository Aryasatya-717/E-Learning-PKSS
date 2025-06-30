<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Hasil Ujian Karyawan | PKSS E-Learning</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans">
  <header class="flex items-center justify-between px-6 py-4 bg-white shadow-sm">
    <div class="flex items-center gap-4">
      <img src="/pkss/img/logo-1.png" alt="PKSS Logo" class="h-14" />
      <a href="{{ route('admin.nilai') }}" class="inline-flex item-center text-indigo-600 hover:underline font-bold text-lg">⬅️ Kembali </a>
    </div>
    <div class="flex gap-4">
      <div class="w-20 h-20 bg-gray-300 rounded-full overflow-hidden">
        <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Profile" class="w-full h-full object-cover" />
      </div>
    </div>
  </header>

  <main class="max-w-6xl mx-auto p-4 md:p-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
      <div class="border-b border-gray-200 p-6">
        <h1 class="text-2xl font-bold text-gray-800">Hasil Ujian: {{ $ujian->judul }}</h1>
        <p class="text-gray-600 mt-1">Rekapitulasi hasil ujian seluruh karyawan</p>

        <div class="mt-4 relative max-w-xs">
          <input type="text" id="search-input" placeholder="Cari nama karyawan..." 
                 class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
          <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>
      </div>

      <!-- Tab Navigation -->
      <div class="border-b border-gray-200 px-6">
        <div class="flex flex-wrap gap-2">
          <button onclick="tampilkanTab('lolos', this)" class="tab-btn px-4 py-2 rounded-t-lg font-medium text-sm bg-green-100 text-green-700 hover:bg-green-200">
            <i class="fas fa-check-circle mr-2"></i>Lolos
            <span class="ml-2 bg-green-600 text-white text-xs px-2 py-0.5 rounded-full">{{ $peserta_lolos->count() }}</span>
          </button>
          <button onclick="tampilkanTab('tidak', this)" class="tab-btn px-4 py-2 rounded-t-lg font-medium text-sm bg-red-100 text-red-700 hover:bg-red-200">
            <i class="fas fa-times-circle mr-2"></i>Tidak Lolos
            <span class="ml-2 bg-red-600 text-white text-xs px-2 py-0.5 rounded-full">{{ $peserta_tidak->count() }}</span>
          </button>
        </div>
      </div>

      <!-- Tab Contents -->
      <div class="p-6">
        <!-- Lolos -->
        <div id="lolos" class="tab-content">
          @include('admin.partials.hasil-table', ['pesertas' => $peserta_lolos, 'color' => 'green'])
        </div>

        <!-- Tidak Lolos -->
        <div id="tidak" class="tab-content hidden">
          @include('admin.partials.hasil-table', ['pesertas' => $peserta_tidak, 'color' => 'red'])
        </div>
      </div>
    </div>
  </main>

  <script>
    function tampilkanTab(id, el) {
      document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
      document.getElementById(id).classList.remove('hidden');

      document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('bg-green-200', 'bg-red-200'));
      el.classList.add(id === 'lolos' ? 'bg-green-200' : 'bg-red-200');
    }

    // Default: tampilkan tab lolos
    window.onload = () => tampilkanTab('lolos', document.querySelector('[onclick*="lolos"]'));
  </script>
</body>
</html>
