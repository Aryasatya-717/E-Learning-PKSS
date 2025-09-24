@extends('layouts.app')

@section('title', 'Import Pegawai dari Excel')

@section('content')
<div class="max-w-4xl mx-auto">
    
    <div class="mb-6">
        <a href="{{ route('admin.nilai') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-blue-600 font-medium transition-colors">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali ke Daftar Pegawai</span>
        </a>
    </div>

    <div class="bg-white shadow-md rounded-xl p-6 sm:p-8">
        
        <div class="mb-6 pb-6 border-b border-gray-200">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-green-100 text-green-600 flex items-center justify-center rounded-full">
                    <i class="fas fa-file-excel text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Import Pegawai dari Excel</h2>
                    <p class="mt-1 text-sm text-gray-500">Upload file untuk menambahkan banyak pegawai sekaligus.</p>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <strong class="font-bold">Gagal!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
            <h3 class="font-semibold text-blue-800 mb-2"><i class="fas fa-info-circle mr-2"></i>Petunjuk Penggunaan</h3>
            <ol class="list-decimal list-inside text-sm text-blue-700 space-y-1">
                <li>Pastikan file Anda berformat `.xlsx` atau `.xls`.</li>
                <li>Gunakan template di bawah ini untuk memastikan format kolom sudah benar.</li>
                <li>Pastikan tidak ada baris kosong di antara data pegawai.</li>
            </ol>
            <div class="mt-4">
                <a href="{{ asset('templates/template-pegawai.xlsx') }}" class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-gray-700 font-medium px-4 py-2 rounded-lg border border-gray-300 shadow-sm transition-all">
                    <i class="fas fa-download"></i>
                    <span>Unduh Template Excel</span>
                </a>
            </div>
        </div>
        
        <form action="{{ route('users.import.store') }}" method="POST" enctype="multipart/form-data" id="importForm">
            @csrf
            <div>
                <label for="file-upload" class="block text-sm font-medium text-gray-700 mb-2">Pilih File untuk Diupload</label>
                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                    <div class="flex items-center justify-center w-full px-6 py-10 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                            <div class="flex text-sm text-gray-600">
                                <p class="pl-1">Klik untuk memilih file atau tarik dan letakkan di sini</p>
                            </div>
                            <p class="text-xs text-gray-500" id="file-name">Belum ada file yang dipilih</p>
                        </div>
                    </div>
                    <input id="file-upload" name="file" type="file" class="sr-only" required>
                </label>
            </div>

            <div class="flex items-center justify-end space-x-4 pt-6">
                <button type="submit" class="inline-flex items-center justify-center gap-2 py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all">
                    <span id="button-text">
                        <i class="fas fa-rocket mr-2"></i>Mulai Proses Import
                    </span>
                    <span id="loading-spinner" class="hidden">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>Memproses...</span>
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('file-upload');
    const fileNameDisplay = document.getElementById('file-name');
    const importForm = document.getElementById('importForm');
    const buttonText = document.getElementById('button-text');
    const loadingSpinner = document.getElementById('loading-spinner');

    fileInput.addEventListener('change', function() {
        if (this.files && this.files.length > 0) {
            fileNameDisplay.textContent = this.files[0].name;
        } else {
            fileNameDisplay.textContent = 'Belum ada file yang dipilih';
        }
    });

    importForm.addEventListener('submit', function() {
        buttonText.classList.add('hidden');
        loadingSpinner.classList.remove('hidden');
        this.querySelector('button[type="submit"]').disabled = true;
    });
});
</script>
@endpush