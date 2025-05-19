document.addEventListener('DOMContentLoaded', function() {
    let soalIndex = document.querySelectorAll('.soal').length;

    // Add new question
    document.getElementById('tambah-soal').addEventListener('click', function() {
        const container = document.getElementById('soal-container');
        const soal = document.createElement('div');
        soal.className = 'soal bg-gray-50 rounded-xl shadow-sm p-6 border border-gray-200 relative';
        soal.setAttribute('data-index', soalIndex);

        soal.innerHTML = `
            <button type="button" class="hapus-soal absolute top-4 right-4 text-red-500 hover:text-red-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>

            <div class="space-y-4">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                    <textarea name="pertanyaan[]" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition min-h-[80px]"
                        placeholder="Masukkan pertanyaan"></textarea>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Tipe Soal</label>
                    <select name="tipe[]" class="tipe-soal w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        <option value="pilihan_ganda">Pilihan Ganda</option>
                        <option value="essay">Essay</option>
                        <option value="checkbox">Checkbox</option>
                    </select>
                </div>

                <div class="opsi-wrapper space-y-3">
                    ${[0,1,2,3].map((j) => `
                        <div class="flex items-start space-x-3">
                            <input type="text" name="opsi[${soalIndex}][]" 
                                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                placeholder="Opsi jawaban">
                            <div class="flex items-center h-full pt-2">
                                <input type="radio" name="jawaban_benar[${soalIndex}]" value="${j}"
                                    class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300">
                                <span class="ml-2 text-sm text-gray-600">Benar</span>
                            </div>
                        </div>`).join('')}
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Poin</label>
                    <input type="number" name="poin[]" 
                        class="w-24 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        placeholder="Poin">
                </div>
            </div>
        `;

        container.appendChild(soal);
        soalIndex++;
    });

    // Delete question
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('hapus-soal') || e.target.closest('.hapus-soal')) {
            const button = e.target.classList.contains('hapus-soal') ? e.target : e.target.closest('.hapus-soal');
            button.closest('.soal').remove();
        }
    });

    // Handle question type changes
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('tipe-soal')) {
            const wrapper = e.target.closest('.soal').querySelector('.opsi-wrapper');
            if (e.target.value === 'essay') {
                wrapper.innerHTML = `
                    <div class="bg-blue-50 p-3 rounded-lg text-sm text-blue-800">
                        Tidak perlu opsi jawaban untuk soal essay
                    </div>
                `;
            } else {
                const index = e.target.closest('.soal').dataset.index;
                wrapper.innerHTML = [0,1,2,3].map((j) => `
                    <div class="flex items-start space-x-3">
                        <input type="text" name="opsi[${index}][]" 
                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            placeholder="Opsi jawaban">
                        <div class="flex items-center h-full pt-2">
                            <input type="${e.target.value === 'checkbox' ? 'checkbox' : 'radio'}" 
                                name="jawaban_benar[${index}]" value="${j}"
                                class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <span class="ml-2 text-sm text-gray-600">Benar</span>
                        </div>
                    </div>
                `).join('');
            }
        }
    });
});