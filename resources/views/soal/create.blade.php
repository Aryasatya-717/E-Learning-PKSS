<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Buat Soal - PKSS</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- flatpickr for date picker -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />`
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-50 font-sans">

  <!-- Header -->
  <header class="sticky top-0 z-10 flex items-center justify-between px-6 py-3 bg-white shadow-sm">
    <div class="flex items-center gap-4">
      <img src="/pkss/img/logo-1.png" alt="PKSS Logo" class="h-10" />
      <div>
        <h1 class="text-blue-600 font-semibold text-lg">Buat Soal Ujian</h1>
        <p class="text-xs text-gray-500">PKSS - Sistem Evaluasi Karyawan</p>
      </div>
    </div>
    <div class="flex items-center gap-4">
      <div class="relative group">
        <div class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden cursor-pointer">
          <img src="/pkss/img/pp.png" alt="Profile" class="w-full h-full object-cover">
        </div>
        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden group-hover:block">
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil Saya</a>
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pengaturan</a>
          <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Keluar</a>
        </div>
      </div>
    </div>
  </header>

  <div class="container mx-auto px-4 py-6">
    <!-- Back Navigation -->
    <nav class="mb-6">
      <a href="{{ route('soal.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors">
        <i class="fas fa-arrow-left mr-2"></i>
        Kembali
      </a>
    </nav>

    <!-- Main Form -->
    <form id="ujianForm" action="{{ url('admin/ujian/store') }}" method="POST">
      @csrf
  
      <div class="max-w-4xl mx-auto">
        <!-- Test Info Card -->
        <div class="bg-white rounded-lg shadow-md border-l-4 border-orange-500 p-6 mb-6">
          <h2 class="text-xl font-bold text-gray-800 mb-4">Informasi Ujian</h2>
          
          <div class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Judul Ujian</label>
              <input type="text" name="judul" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: Ujian Evaluasi Karyawan Q3 2023" />
            </div>
            
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Ujian</label>
              <textarea name="deskripsi" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Berikan deskripsi singkat tentang ujian ini"></textarea>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="relative">
                <label class="block text-sm font-medium text-gray-700 mb-1">Batas Waktu</label>
                <input 
                  id="deadline" 
                  name="deadline" 
                  type="text" 
                  class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                  placeholder="Pilih tanggal dan waktu" 
                  required
                />
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                  <i class="far fa-calendar-alt text-gray-400"></i>
                </div>
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Departemen</label>
                <select id="department_id" name="departemen_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                  <option value="">Semua Departemen</option>
                  @foreach ($departemens as $dept)
                    <option value="{{ $dept->id }}">{{ $dept->nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Durasi Ujian (menit)</label>
                <input type="number" name="durasi" min="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="60" />
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Soal</label>
                <input type="number" min="1" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="10" disabled />
                <p class="text-xs text-gray-500 mt-1">Akan terisi otomatis berdasarkan soal yang dibuat</p>
              </div>
            </div>
          </div>
        </div>
  
        <!-- Questions Container -->
        <div id="all-questions" class="space-y-6 mb-6"></div>
  
        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-between gap-4 mt-8">
          <button id="add-btn" class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-md transition-colors">
            <i class="fas fa-plus"></i>
            Tambah Soal Baru
          </button>
          
          <div class="flex gap-4">
            <button class="flex items-center justify-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-md transition-colors">
              <i class="fas fa-save"></i>
              Simpan Draft
            </button>
            
            <button type="button" id="submitButton" class="flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-md transition-colors">
              <i class="fas fa-check-circle"></i>
              Submit Ujian
            </button>
          </div>
        </div>
      </div>
  </form>
  </div>

  <!-- Question Template (Hidden) -->
  <!-- Question Template (Hidden) - Modifikasi -->
  <template id="question-template">
    <div class="question-card bg-white rounded-lg shadow-md p-6 relative transition-all duration-300 hover:shadow-lg" data-question-id="">
      <button class="absolute top-4 right-4 text-gray-400 hover:text-red-500 delete-question">
        <i class="fas fa-trash"></i>
      </button>
      
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Pertanyaan</label>
        <div class="p-2 bg-gray-50 flex flex-wrap gap-1 border border-gray-200 rounded-t-lg">
          <button type="button" class="p-1 hover:bg-gray-200 rounded"><i class="fas fa-bold"></i></button>
          <button type="button" class="p-1 hover:bg-gray-200 rounded"><i class="fas fa-italic"></i></button>
          <button type="button" class="p-1 hover:bg-gray-200 rounded"><i class="fas fa-list-ul"></i></button>
          <button type="button" class="p-1 hover:bg-gray-200 rounded"><i class="fas fa-list-ol"></i></button>
          <button type="button" class="p-1 hover:bg-gray-200 rounded"><i class="fas fa-link"></i></button>
          <button type="button" class="p-1 hover:bg-gray-200 rounded"><i class="fas fa-image"></i></button>
        </div>
        <textarea name="pertanyaan[]" class="w-full p-4 border border-gray-200 border-t-0 rounded-b-lg min-h-[150px]" placeholder="Tulis pertanyaan di sini..." required></textarea>
        <input type="hidden" name="jawaban_benar[]" class="correct-answer-input">
      </div>
      
      <div class="options-container space-y-3">
        <!-- Contoh opsi jawaban -->
        <div class="option-item flex items-center gap-3" data-option-index="0">
          <input type="radio" name="correct-answer-0" class="form-radio text-blue-600 correct-answer-radio" value="0" />
          <input type="text" name="opsi[0][]" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Opsi jawaban" required />
          <button class="text-red-500 hover:text-red-700 remove-option">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      
      <button type="button" class="add-option mt-3 text-sm text-blue-600 hover:text-blue-800 flex items-center gap-1">
        <i class="fas fa-plus"></i>
        Tambah Opsi Jawaban
      </button>
      
      <div class="mt-4 pt-4 border-t">
        <label class="block text-sm font-medium text-gray-700 mb-2">Poin</label>
        <input type="number" name="poin[]" min="1" value="1" class="w-20 px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required />
      </div>
    </div>
  </template>

  <!-- Success Modal -->
  <div id="success-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4 text-center">
      <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
        <i class="fas fa-check text-green-600 text-3xl"></i>
      </div>
      <h3 class="text-xl font-bold text-gray-800 mb-2">Ujian Berhasil Dibuat!</h3>
      <p class="text-gray-600 mb-6">Ujian Anda telah berhasil disimpan dan siap untuk dibagikan kepada peserta.</p>
      <div class="flex flex-col sm:flex-row gap-3 justify-center">
        <button id="modal-close" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
          Tutup
        </button>
        <button class="px-6 py-2 border border-blue-600 text-blue-600 rounded-md hover:bg-blue-50 transition-colors">
          <i class="fas fa-share-alt mr-2"></i>Bagikan
        </button>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    // Variabel global untuk route
    const STORE_ROUTE = "{{ route('ujian.store') }}";
    const CSRF_TOKEN = "{{ csrf_token() }}";
  </script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>