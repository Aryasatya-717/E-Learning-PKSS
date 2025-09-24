@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <nav class="mb-6">
        <a href="{{ route('soal.index') }}" class="inline-flex items-center text-gray-600 hover:text-blue-700 transition-colors font-medium">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali ke Daftar Ujian
        </a>
    </nav>

    <form id="ujianForm">
        @csrf 
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg ring-1 ring-gray-900/5 p-6 md:p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Informasi Ujian</h2>
                <div class="space-y-6">
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Ujian</label>
                        <input type="text" id="judul" name="judul" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" placeholder="Contoh: Ujian Evaluasi Karyawan Q3 2023" required/>
                    </div>
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Ujian</label>
                        <textarea id="deskripsi" name="deskripsi" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" placeholder="Berikan deskripsi singkat tentang ujian ini"></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="deadline" class="block text-sm font-medium text-gray-700 mb-1">Batas Waktu</label>
                            <div class="relative">
                                <input id="deadline" name="batas_waktu" type="text" class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" placeholder="Pilih tanggal dan waktu" required />
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i class="far fa-calendar-alt text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="departemen_ids" class="block text-sm font-medium text-gray-700 mb-1">Departemen</label>
                            <select id="departemen_ids" name="departemen_ids[]" class="w-full" multiple="multiple" required>
                                @foreach($departemens as $departemen)
                                    <option value="{{ $departemen->id }}">{{ $departemen->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="durasi" class="block text-sm font-medium text-gray-700 mb-1">Durasi Ujian (menit)</label>
                            <input type="number" id="durasi" name="durasi" min="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" placeholder="60" required/>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Soal</label>
                            <input type="number" min="1" class="w-full px-4 py-2 border border-gray-200 bg-gray-100 rounded-lg cursor-not-allowed" placeholder="0" disabled />
                            <p class="text-xs text-gray-500 mt-1">Akan terisi otomatis berdasarkan soal yang dibuat.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg ring-1 ring-gray-900/5 p-6 md:p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Metode Input Soal</h2>
                <p class="text-gray-600 mb-6">Pilih salah satu atau gabungkan kedua metode di bawah ini.</p>
                
                <div id="excel-upload-section" class="mb-8 p-4 border border-blue-100 rounded-lg bg-blue-50">
                    <h3 class="text-xl font-semibold text-gray-700 mb-3">1. Upload dari Excel</h3>
                    <p class="text-gray-500 mb-4">Gunakan template untuk memastikan format sudah benar.</p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 items-center">
                        <input type="file" id="excelFile" accept=".xlsx, .xls" class="flex-grow block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-white file:text-blue-700 hover:file:bg-blue-100 border border-gray-200 rounded-full p-1"/>
                        
                        <a href="{{ route('ujian.download-template') }}" class="w-full sm:w-auto flex-shrink-0 inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-full transition-all font-semibold">
                            <i class="fas fa-download"></i>
                            <span>Unduh Template</span>
                        </a>
                    </div>
                </div>


                <hr class="border-t border-gray-200 my-8">

                <div id="manual-creation-section">
                    <h3 class="text-xl font-semibold text-gray-700 mb-3"> Buat Soal </h3>
                    <div id="all-questions" class="space-y-8 mb-6"></div>
                    <button id="add-manual-question-btn" type="button" class="w-full flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-800 px-6 py-3 rounded-lg transition-all border border-gray-300 font-semibold">
                        <i class="fas fa-plus"></i>
                        Tambah Soal Manual
                    </button>
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit" id="submitButton" class="flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-lg transition-all shadow-lg hover:shadow-xl font-semibold text-lg">
                    <i class="fas fa-check-circle"></i>
                    Submit & Publikasikan Ujian
                </button>
            </div>
        </div>
    </form>
</div>

<template id="question-template">
    <div class="question-card bg-gray-50 rounded-xl shadow-sm p-6 border border-gray-200 relative">
        <div class="flex justify-between items-start mb-4">
            <h4 class="font-bold text-lg text-gray-700 question-number">Soal</h4>
            <button type="button" class="delete-question text-gray-400 hover:text-red-500 hover:bg-red-50 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>
        
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pertanyaan</label>
                <textarea name="pertanyaan[]" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" placeholder="Tulis pertanyaan di sini..." required></textarea>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Opsi Jawaban</label>
                <div class="options-container space-y-3"></div>
                <button type="button" class="add-option mt-3 text-sm font-semibold text-blue-600 hover:text-blue-800 flex items-center gap-2">
                    <i class="fas fa-plus-circle"></i>
                    Tambah Opsi
                </button>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Poin untuk soal ini:</label>
                <input type="number" name="poin[]" min="1" value="1" class="w-24 px-3 py-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" required />
            </div>
        </div>
    </div>
</template>


<div id="success-modal" class="hidden fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-xl shadow-2xl p-8 max-w-md w-full mx-4 text-center transform transition-all scale-95 opacity-0" id="modal-content">
        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-5 ring-4 ring-green-50">
            <i class="fas fa-check text-green-500 text-4xl"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-2">Ujian Berhasil Dibuat!</h3>
        <p class="text-gray-600 mb-8">Ujian Anda telah berhasil disimpan dan siap untuk dibagikan kepada peserta.</p>
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('soal.index') }}" id="modal-close" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-semibold w-full sm:w-auto">
                Kembali ke Daftar Ujian
            </a>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $('#departemen_ids').select2({
            placeholder: "Pilih satu atau lebih departemen",
            allowClear: true,
            width: '100%' 
        });

        flatpickr("#deadline", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true
        });

        const form = document.getElementById("ujianForm");
        const submitButton = document.getElementById("submitButton");

        form.addEventListener("submit", async function (e) {
            e.preventDefault();
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';

            const formData = new FormData(form);

            const fileInput = document.getElementById("excelFile");
            const file = fileInput.files[0];

            if (file) {
                try {
                    const soalDariExcel = await parseExcel(file);
                    formData.append("excel_soal", JSON.stringify(soalDariExcel));
                } catch (error) {
                    alert("Gagal memproses file Excel: " + error.message);
                    submitButton.disabled = false;
                    submitButton.innerHTML = '<i class="fas fa-check-circle"></i> Submit & Publikasikan Ujian';
                    return;
                }
            }

            try {
                const response = await fetch("{{ route('ujian.store') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                });

                const result = await response.json();

                if (!response.ok) {
                    if (result.errors) {
                        let errorMessages = "Harap perbaiki kesalahan berikut:\n";
                        for (const key in result.errors) {
                            errorMessages += `- ${result.errors[key].join(', ')}\n`;
                        }
                        alert(errorMessages);
                    } else {
                        alert("Gagal menyimpan ujian: " + (result.message || "Terjadi kesalahan fatal saat menyimpan ujian."));
                        console.error("Error response:", result);
                    }
                    return;
                }

                showSuccessModal();

            } catch (error) {
                console.error("Fetch error:", error);
                alert("Terjadi kesalahan koneksi saat mencoba menyimpan ujian.");
            } finally {
                submitButton.disabled = false;
                submitButton.innerHTML = '<i class="fas fa-check-circle"></i> Submit & Publikasikan Ujian';
            }
        });

        async function parseExcel(file) {
            const data = await file.arrayBuffer();
            const workbook = XLSX.read(data, { type: "array" });
            const sheet = workbook.Sheets[workbook.SheetNames[0]];
            const rows = XLSX.utils.sheet_to_json(sheet, { header: 1 });

            rows.shift();

            const soalList = [];
            rows.forEach((row, index) => {
                if (row.length === 0) return;

                if (!row[0] || !row[1] || row[5] === undefined || row[5] === null) {
                    console.warn(`Baris ke-${index + 2} dilewati (data tidak lengkap: Pertanyaan, Opsi A, atau Jawaban Benar kosong).`);
                    return;
                }

                soalList.push({
                    pertanyaan: row[0],
                    opsi: [row[1], row[2], row[3], row[4]].filter(Boolean),
                    jawaban_benar: parseInt(row[5], 10),
                    poin: parseInt(row[6], 10) || 1,
                });
            });

            return soalList;
        }

        const successModal = document.getElementById('success-modal');
        const modalContent = document.getElementById('modal-content');
        function showSuccessModal() {
            successModal.classList.remove('hidden');
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
            }, 10);
        }

        const addManualQuestionBtn = document.getElementById('add-manual-question-btn');
        const allQuestionsContainer = document.getElementById('all-questions');
        const questionTemplate = document.getElementById('question-template');
        let questionCounter = 0;

        addManualQuestionBtn.addEventListener('click', () => {
            const newQuestion = questionTemplate.content.cloneNode(true);
            const questionCard = newQuestion.querySelector('.question-card');
            
            questionCounter++;
            questionCard.querySelector('.question-number').textContent = `Soal Manual #${questionCounter}`;

            const optionsContainer = questionCard.querySelector('.options-container');
            for (let i = 0; i < 4; i++) {
                addOption(optionsContainer, questionCounter - 1);
            }
            
            allQuestionsContainer.appendChild(newQuestion);
        });

        function addOption(container, questionIndex) {
            const optionIndex = container.children.length;
            const optionHTML = `
                <div class="flex items-center gap-3">
                    <input type="text" name="opsi[${questionIndex}][]" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg" placeholder="Tulis opsi jawaban" required />
                    <input type="radio" name="jawaban_benar[${questionIndex}]" value="${optionIndex}" class="form-radio h-5 w-5 text-green-500 cursor-pointer" title="Tandai sebagai jawaban benar" required>
                    <button type="button" class="remove-option text-gray-400 hover:text-red-500 w-8 h-8 flex items-center justify-center">&times;</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', optionHTML);
        }

        allQuestionsContainer.addEventListener('click', (e) => {
            if (e.target.closest('.delete-question')) {
                e.target.closest('.question-card').remove();
            }
            if (e.target.closest('.add-option')) {
                const optionsContainer = e.target.closest('.question-card').querySelector('.options-container');
                const questionIndex = Array.from(allQuestionsContainer.children).indexOf(e.target.closest('.question-card'));
                addOption(optionsContainer, questionIndex);
            }
            if (e.target.closest('.remove-option')) {
                e.target.closest('.flex').remove();
            }
        });
    });
</script>
@endpush

