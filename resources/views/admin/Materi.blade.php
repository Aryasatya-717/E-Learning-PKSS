<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Upload Modul | PKSS E-Learning</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="{{ asset('css/upload-modul.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans">

  <!-- Navbar -->
  <header class="bg-white shadow-sm p-4 flex items-center justify-between sticky top-0 z-10">
    <div class="flex items-center gap-4">
      <img src="/pkss/img/logo-1.png" alt="PKSS Logo" class="w-24" />
      <h1 class="text-lg font-semibold text-blue-600">Upload Modul</h1>
    </div>
    <div class="flex items-center gap-4">
      <div class="w-10 h-10 rounded-full">
        <img src="img/pp.png" alt="Profile" class="w-full h-full object-cover rounded-full"> 
      </div>
    </div>
  </header>

  <!-- Content -->
  <main class="max-w-6xl mx-auto mt-8 px-4 pb-8">
    <a href="{{ route('modul.index') }}" class="inline-flex items-center text-gray-600 hover:text-blue-600 transition-colors mb-6">
      <i class="fas fa-arrow-left mr-2"></i>
      <span>Kembali</span>
    </a>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
      <h2 class="text-xl font-bold text-gray-800 mb-6">Upload Modul Baru</h2>
      
      <form id="uploadForm" action="{{ route('admin.materi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid lg:grid-cols-2 gap-8">
          <!-- Upload Box -->
          <div id="uploadBox" class="border-2 border-dashed border-gray-300 rounded-xl p-8 flex flex-col items-center justify-center transition-all hover:border-blue-600 hover:bg-blue-50 cursor-pointer">
            <div class="text-5xl mb-4 text-blue-600">
              <i class="fas fa-cloud-upload-alt"></i>
            </div>
            <p class="text-center mb-2 text-lg font-medium text-gray-800">Seret & lepas file disini</p>
            <p class="text-center mb-4 text-gray-500">Atau</p>
            <button type="button" id="browseBtn" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-800 transition-colors text-sm font-medium flex items-center">
              <i class="fas fa-folder-open mr-2"></i>
              Pilih File
            </button>
            <p class="text-xs text-gray-500 mt-4">Format yang didukung: PDF, DOCX, PPTX (Max. 50MB)</p>
            <input type="file" id="fileInput" name="file" class="hidden" accept=".pdf,.docx,.pptx">
          </div>

          <!-- Uploaded Files & Form -->
          <div>
            <div class="mb-6">
              <h3 class="text-lg font-semibold text-gray-800 mb-4">File Terupload</h3>
              <div id="uploadedFiles" class="space-y-3">
                <!-- Placeholder when no files -->
                <div id="noFiles" class="text-center py-8 text-gray-400 border border-dashed rounded-lg">
                  <i class="fas fa-file-alt text-3xl mb-2"></i>
                  <p>Belum ada file yang diupload</p>
                </div>
                
                <!-- Template for file item (hidden by default) -->
                <div id="fileItemTemplate" class="file-item hidden bg-gray-50 rounded-lg p-3 border border-gray-200">
                  <div class="flex items-start justify-between">
                    <div class="flex items-start gap-3">
                      <div class="text-blue-600 mt-1">
                        <i class="fas fa-file-pdf text-xl"></i>
                      </div>
                      <div>
                        <p class="font-medium text-gray-800 file-name">Nama File.pdf</p>
                        <p class="text-xs text-gray-500 file-size">0 KB</p>
                        <div class="file-progress mt-2 w-full">
                          <div class="file-progress-bar"></div>
                        </div>
                      </div>
                    </div>
                    <button type="button" class="file-remove text-red-500 hover:text-red-700">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Form Input -->
            <div class="space-y-4">
              <div>
                <label for="moduleTitle" class="block text-sm font-medium text-gray-700 mb-1">Judul Modul*</label>
                <input type="text" id="moduleTitle" name="judul" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600" placeholder="Masukkan judul modul" required>
              </div>
              
              <div>
                <label for="departmentSelect" class="block text-sm font-medium text-gray-700 mb-1">Departemen*</label>
                <div class="relative">
                  <select id="departmentSelect" name="departemen_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 appearance-none" required>
                    <option value="" disabled selected>Pilih Departemen</option>
                    @foreach($departemens as $departemen)
                      <option value="{{ $departemen->id }}">{{ $departemen->nama }}</option>
                    @endforeach
                  </select>
                  <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <i class="fas fa-chevron-down text-gray-400"></i>
                  </div>
                </div>
              </div>

              <div>
                <label for="moduleDescription" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea id="moduleDescription" name="deskripsi" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600" placeholder="Tambahkan deskripsi singkat"></textarea>
              </div>

              <button type="submit" id="saveBtn" class="w-full bg-blue-600 text-white py-2.5 rounded-lg hover:bg-blue-800 transition-colors font-medium mt-4 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                <i class="fas fa-save mr-2"></i> Simpan Modul
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>

  <!-- Success Modal -->
  <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
      <div class="text-center">
        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
          <i class="fas fa-check text-green-600 text-xl"></i>
        </div>
        <h3 class="text-lg font-medium text-gray-900 mt-3">Modul Berhasil Diupload!</h3>
        <div class="mt-2">
          <p class="text-sm text-gray-500">Modul Anda telah berhasil diupload ke sistem dan dapat diakses oleh pengguna yang berhak.</p>
        </div>
        <div class="mt-4">
          <button type="button" id="modalCloseBtn" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm">
            Tutup
          </button>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/upload-modul.js') }}"></script>
</body>
</html>