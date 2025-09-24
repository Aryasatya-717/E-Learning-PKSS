@extends('layouts.app')

@section('title', 'Upload Materi Baru')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .file-progress {
            height: 6px;
            background-color: #e5e7eb;
            border-radius: 9999px;
            overflow: hidden;
        }
        .file-progress-bar {
            height: 100%;
            background-color: #3B82F6;
            border-radius: 9999px;
            transition: width 0.3s ease;
        }
        .drag-over {
            border-color: #3B82F6 !important;
            background-color: #EFF6FF;
        }
        /* Style agar Select2 sesuai dengan tema Tailwind */
        .select2-container .select2-selection--multiple {
            border: 1px solid #d1d5db !important;
            border-radius: 0.5rem !important; /* rounded-lg */
            padding: 0.5rem !important;
            min-height: 42px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #3B82F6;
            border-color: #2563EB;
            color: white;
            border-radius: 0.375rem; /* rounded-md */
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: white;
        }
    </style>
@endsection

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="bg-white shadow-md rounded-xl p-6 sm:p-8">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-6 pb-6 border-b border-gray-200">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Upload Materi Baru</h2>
                    <p class="mt-1 text-sm text-gray-500">Pilih file materi, lengkapi detailnya, lalu simpan.</p>
                </div>
                <a href="{{ route('modul.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-4 py-2 rounded-lg transition-all">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali ke Daftar</span>
                </a>
            </div>

            <form id="uploadForm" action="{{ route('admin.materi.store') }}" method="POST" enctype="multipart/form-data" data-redirect-url="{{ route('modul.index') }}">
                @csrf
                <div class="grid lg:grid-cols-2 gap-8">
                    
                    <div id="uploadBox" class="border-2 border-dashed border-gray-300 rounded-xl p-8 flex flex-col items-center justify-center transition-all hover:border-blue-500 hover:bg-blue-50 cursor-pointer h-full">
                        <div class="text-5xl mb-4 text-blue-500">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <p class="text-center mb-2 text-lg font-medium text-gray-800">Seret & lepas file disini</p>
                        <p class="text-center mb-4 text-gray-500">Atau</p>
                        <button type="button" id="browseBtn" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium flex items-center">
                            <i class="fas fa-folder-open mr-2"></i>
                            Pilih File
                        </button>
                        <p class="text-xs text-gray-500 mt-4">Format: PDF, DOCX, PPTX (Max. 50MB)</p>
                        <input type="file" id="fileInput" name="file" class="hidden" accept=".pdf,.doc,.docx,.ppt,.pptx">
                    </div>

                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">File Terpilih</h3>
                            <div id="uploadedFiles" class="space-y-3">
                                <div id="noFiles" class="text-center py-8 text-gray-400 border border-dashed rounded-lg">
                                    <i class="fas fa-file-alt text-3xl mb-2"></i>
                                    <p>Belum ada file yang dipilih</p>
                                </div>
                                
                                <div id="fileItemTemplate" class="file-item hidden bg-gray-50 rounded-lg p-3 border border-gray-200">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3 overflow-hidden">
                                            <div class="text-blue-600 text-xl flex-shrink-0"><i class="fas fa-file-pdf"></i></div>
                                            <div class="overflow-hidden">
                                                <p class="font-medium text-gray-800 file-name truncate">Nama File.pdf</p>
                                                <p class="text-xs text-gray-500 file-size">0 KB</p>
                                            </div>
                                        </div>
                                        <button type="button" class="file-remove text-gray-400 hover:text-red-600 p-2 rounded-full hover:bg-red-50 transition-colors flex-shrink-0">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 pt-6 border-t border-gray-200">
                            <div>
                                <label for="moduleTitle" class="block text-sm font-medium text-gray-700">Judul Modul*</label>
                                <input type="text" id="moduleTitle" name="judul" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <div>
                                <label for="departmentSelect" class="block text-sm font-medium text-gray-700">Departemen*</label>
                                <select id="departmentSelect" name="departemen_ids[]" class="mt-1 w-full" multiple="multiple" required>
                                    @foreach($departemens as $departemen)
                                        <option value="{{ $departemen->id }}">{{ $departemen->nama }}</option>
                                    @endforeach
                                </select>
                                </div>
                            <div>
                                <label for="moduleDescription" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                <textarea id="moduleDescription" name="deskripsi" rows="3" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
                    <button type="submit" id="saveBtn" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg shadow-sm transition-all disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                        <i class="fas fa-save"></i>
                        <span>Simpan Modul</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
// INISIALISASI SELECT2
$(document).ready(function() {
    $('#departmentSelect').select2({
        placeholder: "Pilih satu atau lebih departemen",
        allowClear: true
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // ... (SEMUA KODE JAVASCRIPT LAMA ANDA TETAP DI SINI)
    // Tidak ada yang perlu diubah dari JavaScript Anda yang sudah ada
    // ...
    const uploadBox = document.getElementById('uploadBox');
    const fileInput = document.getElementById('fileInput');
    const browseBtn = document.getElementById('browseBtn');
    const uploadedFiles = document.getElementById('uploadedFiles');
    const noFiles = document.getElementById('noFiles');
    const fileItemTemplate = document.getElementById('fileItemTemplate');
    const saveBtn = document.getElementById('saveBtn');
    const uploadForm = document.getElementById('uploadForm');
    
    let currentFile = null;

    browseBtn.addEventListener('click', () => fileInput.click());
    fileInput.addEventListener('change', handleFileSelect);

    uploadBox.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadBox.classList.add('drag-over');
    });

    uploadBox.addEventListener('dragleave', () => {
        uploadBox.classList.remove('drag-over');
    });

    uploadBox.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadBox.classList.remove('drag-over');
        if (e.dataTransfer.files.length) {
            fileInput.files = e.dataTransfer.files;
            handleFileSelect({ target: fileInput });
        }
    });

    uploadForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (!currentFile) {
            Swal.fire('Oops...', 'Silakan pilih file terlebih dahulu!', 'error');
            return;
        }

        Swal.fire({
            title: 'Konfirmasi Penyimpanan',
            text: "Apakah Anda yakin ingin menyimpan modul ini?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3B82F6',
            cancelButtonColor: '#6B7280',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                performUpload();
            }
        });
    });

    async function performUpload() {
        saveBtn.disabled = true;
        saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Menyimpan...';
        
        try {
            const formData = new FormData(uploadForm);
            // Tambahan untuk mengirim data dari Select2 dengan benar
            $('#departmentSelect').val().forEach(function(value) {
                formData.append('departemen_ids[]', value);
            });
            
            const response = await fetch(uploadForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            const data = await response.json();
            
            if (!response.ok) {
                let errorMsg = data.message || 'Upload gagal';
                if(data.errors) {
                    errorMsg = Object.values(data.errors).flat().join('\n');
                }
                throw new Error(errorMsg);
            }

            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Modul Anda telah berhasil diunggah.',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = uploadForm.dataset.redirectUrl;
            });

        } catch (error) {
            Swal.fire('Upload Gagal', error.message, 'error');
        } finally {
            saveBtn.disabled = false;
            saveBtn.innerHTML = '<i class="fas fa-save mr-2"></i> Simpan Modul';
        }
    }

    function handleFileSelect(event) {
      const file = event.target.files[0];
      if (!file) return;
      
      const validTypes = [
        'application/pdf',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation'
      ];
      
      if (!validTypes.includes(file.type)) {
        alert('Format file tidak didukung. Harap upload file PDF, DOCX, atau PPTX.');
        return;
      }
      
      if (file.size > 50 * 1024 * 1024) {
        alert('Ukuran file terlalu besar. Maksimal 50MB.');
        return;
      }
      
      currentFile = file;
      displayFileInfo(file);
      saveBtn.disabled = false;
    }

    function displayFileInfo(file) {
      noFiles.classList.add('hidden');
      
      const fileItem = fileItemTemplate.cloneNode(true);
      fileItem.classList.remove('hidden');
      fileItem.id = '';

      const fileName = fileItem.querySelector('.file-name');
      const fileSize = fileItem.querySelector('.file-size');
      const fileIcon = fileItem.querySelector('.fas'); // Lebih general
      
      fileName.textContent = file.name;
      fileSize.textContent = formatFileSize(file.size);
      
      // Reset classes
      fileIcon.className = 'fas text-xl flex-shrink-0';

      if (file.type.includes('wordprocessingml')) {
        fileIcon.classList.add('fa-file-word', 'text-blue-600');
      } else if (file.type.includes('presentationml')) {
        fileIcon.classList.add('fa-file-powerpoint', 'text-orange-600');
      } else { // Default to PDF
        fileIcon.classList.add('fa-file-pdf', 'text-red-600');
      }
      
      fileItem.querySelector('.file-remove').addEventListener('click', () => {
        fileItem.remove();
        currentFile = null;
        fileInput.value = '';
        saveBtn.disabled = true;
        if (uploadedFiles.children.length <= 2) { // Cek jika hanya ada noFiles dan template
          noFiles.classList.remove('hidden');
        }
      });
      
      // Bersihkan list file sebelum menambah yang baru
      const existingItems = uploadedFiles.querySelectorAll('.file-item:not(.hidden)');
      existingItems.forEach(item => item.remove());

      uploadedFiles.appendChild(fileItem);
    }

    function formatFileSize(bytes) {
      if (bytes === 0) return '0 Bytes';
      const k = 1024;
      const sizes = ['Bytes', 'KB', 'MB', 'GB'];
      const i = Math.floor(Math.log(bytes) / Math.log(k));
      return parseFloat((bytes / Math.pow(k, i))).toFixed(1) + ' ' + sizes[i];
    }
});
</script>
@endpush