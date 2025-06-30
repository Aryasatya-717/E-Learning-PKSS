document.addEventListener('DOMContentLoaded', function() {
  // Variabel global dalam scope DOMContentLoaded
  let questionCounter = 0;
  const questionsContainer = document.getElementById('all-questions');
  const questionTemplate = document.getElementById('question-template');
  const addButton = document.getElementById('add-btn');

  // Inisialisasi flatpickr
  flatpickr("#deadline", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    minDate: "today",
    time_24hr: true
  });

  // Tambah pertanyaan baru
  addButton.addEventListener('click', function(e) {
    e.preventDefault();
    addNewQuestion();
  });

  // Submit form
  document.getElementById('submitButton').addEventListener('click', submitForm);

  // Fungsi untuk menambah soal baru
  function addNewQuestion() {
    const questionId = questionCounter++;
    const clone = questionTemplate.content.cloneNode(true);
    const questionCard = clone.querySelector('.question-card');
    questionCard.dataset.questionId = questionId;
    
    // Setup elemen-elemen dalam card
    setupQuestionCard(questionCard, questionId);
    
    questionsContainer.appendChild(clone);
  }

  // Fungsi untuk setup card pertanyaan
  function setupQuestionCard(card, questionId) {
    const correctAnswerInput = card.querySelector('.correct-answer-input');
    const optionsContainer = card.querySelector('.options-container');
    
    // Tombol hapus pertanyaan
    card.querySelector('.delete-question').addEventListener('click', function() {
      card.remove();
    });

    // Tambah opsi jawaban
    card.querySelector('.add-option').addEventListener('click', function(e) {
      e.preventDefault();
      addOptionToQuestion(questionId, optionsContainer, correctAnswerInput);
    });

    // Setup opsi yang sudah ada
    const existingOptions = card.querySelectorAll('.option-item');
    existingOptions.forEach((option, index) => {
      option.dataset.optionIndex = index;
      const radio = option.querySelector('input[type="radio"]');
      radio.name = `correct-answer-${questionId}`;
      radio.value = index;
      
      radio.addEventListener('change', function() {
        correctAnswerInput.value = this.value;
      });
      
      option.querySelector('.remove-option').addEventListener('click', function() {
        option.remove();
        if (correctAnswerInput.value === index.toString()) {
          correctAnswerInput.value = '';
        }
        reindexOptions(questionId, optionsContainer, correctAnswerInput);
      });
    });
  }

  // Fungsi untuk menambah opsi jawaban
  function addOptionToQuestion(questionId, optionsContainer, correctAnswerInput) {

    const optionCount = optionsContainer.querySelectorAll('.option-item').length;
    
    // Buat elemen div baru untuk opsi
    const newOption = document.createElement('div');
    newOption.className = 'option-item flex items-center gap-3 mb-2';
    newOption.dataset.optionIndex = optionCount;
    
    // Isi dengan konten opsi
    newOption.innerHTML = `
      <input type="radio" name="correct-answer-${questionId}" class="form-radio text-blue-600" value="${optionCount}" />
      <input type="text" name="opsi[${questionId}][]" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Opsi jawaban" required />
      <button class="text-red-500 hover:text-red-700 remove-option">
        <i class="fas fa-times"></i>
      </button>
    `;
    
    // Tambahkan event listener untuk radio button
    const radio = newOption.querySelector('input[type="radio"]');
    radio.addEventListener('change', function() {
      correctAnswerInput.value = this.value;
    });
    
    // Tambahkan event listener untuk tombol hapus
    const removeBtn = newOption.querySelector('.remove-option');
    removeBtn.addEventListener('click', function() {
      newOption.remove();
      if (correctAnswerInput.value === newOption.dataset.optionIndex) {
        correctAnswerInput.value = '';
      }
      reindexOptions(questionId, optionsContainer, correctAnswerInput);
    });
    
    optionsContainer.appendChild(newOption);
  }

  // Fungsi untuk reindex opsi
  function reindexOptions(questionId, optionsContainer, correctAnswerInput) {
    const options = optionsContainer.querySelectorAll('.option-item');
    let newCorrectAnswer = '';
    
    options.forEach((option, newIndex) => {
      const oldIndex = option.dataset.optionIndex;
      option.dataset.optionIndex = newIndex;
      
      // Update radio button
      const radio = option.querySelector('input[type="radio"]');
      radio.name = `correct-answer-${questionId}`;
      radio.value = newIndex;
      
      // Jika ini adalah jawaban yang benar sebelumnya, update nilai yang baru
      if (correctAnswerInput.value === oldIndex) {
        newCorrectAnswer = newIndex;
      }
    });
    
    // Update nilai jawaban benar jika diperlukan
    if (newCorrectAnswer !== '') {
      correctAnswerInput.value = newCorrectAnswer;
    } else if (correctAnswerInput.value !== '') {
      correctAnswerInput.value = '';
    }
  }

  async function submitForm(e) {
    e.preventDefault();
    
    if (!validateForm()) return;

    const submitBtn = document.getElementById('submitButton');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';

    try {
      const formData = prepareFormData();
      console.log('Data yang dikirim:', formData);

      const response = await fetch(STORE_ROUTE, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': CSRF_TOKEN,
          'Accept': 'application/json'
        },
        body: JSON.stringify(formData)
      });

      const result = await response.json();
      
      if (!response.ok) throw new Error(result.message || 'Server error');
      if (!result.success) throw new Error(result.message || 'Gagal menyimpan');

      showSuccessModal();
    } catch (error) {
      console.error('Error:', error);
      alert(`Error: ${error.message}`);
    } finally {
      submitBtn.disabled = false;
      submitBtn.innerHTML = '<i class="fas fa-check-circle"></i> Submit Ujian';
    }
  }

  function validateForm() {
    const getValue = (selector) => {
      const el = document.querySelector(selector);
      if (!el) throw new Error(`Field ${selector} tidak ditemukan`);
      return el.value?.trim();
    };

    try {
      const fields = [
        { selector: 'input[name="judul"]', message: 'Judul ujian harus diisi' },
        { selector: 'input[name="durasi"]', message: 'Durasi ujian harus diisi' },
        { selector: 'input[name="deadline"]', message: 'Batas waktu harus diisi' },
        { selector: 'select[name="departemen_id"]', message: 'Departemen harus dipilih' }
      ];

      fields.forEach(({ selector, message }) => {
        if (!getValue(selector)) throw new Error(message);
      });

      // Validasi pertanyaan
      const questions = document.querySelectorAll('.question-card');
      if (questions.length === 0) throw new Error('Harus ada minimal 1 soal');

      questions.forEach((question, index) => {
        const questionText = question.querySelector('[contenteditable]')?.innerText?.trim() || 
                            question.querySelector('textarea[name="pertanyaan[]"]')?.value?.trim();
        if (!questionText) throw new Error(`Pertanyaan #${index + 1} tidak boleh kosong`);

        const options = question.querySelectorAll('.option-item');
        if (options.length < 2) throw new Error(`Pertanyaan #${index + 1} harus memiliki minimal 2 opsi`);

        let hasCorrectAnswer = false;
        options.forEach(opt => {
          if (!opt.querySelector('input[type="text"]')?.value?.trim()) {
            throw new Error(`Opsi jawaban pada pertanyaan #${index + 1} tidak boleh kosong`);
          }
          if (opt.querySelector('input[type="radio"]')?.checked) {
            hasCorrectAnswer = true;
          }
        });
        
        if (!hasCorrectAnswer) throw new Error(`Pilih jawaban benar untuk pertanyaan #${index + 1}`);
      });

      return true;
    } catch (error) {
      alert(error.message);
      return false;
    }
  }

  function prepareFormData() {
    const formData = {
      judul: document.querySelector('input[name="judul"]').value,
      deskripsi: document.querySelector('textarea[name="deskripsi"]').value,
      batas_waktu: document.querySelector('input[name="deadline"]').value,
      departemen_id: document.querySelector('select[name="departemen_id"]').value,
      durasi: document.querySelector('input[name="durasi"]').value,
      pertanyaan: []
    };

    document.querySelectorAll('.question-card').forEach((card, qIndex) => {
      const question = {
        isi: card.querySelector('[contenteditable]')?.innerHTML || 
             card.querySelector('textarea[name="pertanyaan[]"]')?.value || '',
        poin: parseInt(card.querySelector('input[type="number"]')?.value) || 1,
        opsi: [],
        jawaban_benar: card.querySelector('.correct-answer-input')?.value || null
      };

      // Proses opsi jawaban
      card.querySelectorAll('.option-item').forEach((opt, index) => {
        const optionText = opt.querySelector('input[type="text"]')?.value;
        if (optionText) {
          question.opsi.push(optionText);
        }
      });

      formData.pertanyaan.push(question);
    });

    return formData;
  }

 
  function showSuccessModal() {
    document.getElementById('success-modal').classList.remove('hidden');
    
    // Tombol tutup modal
    document.getElementById('modal-close').addEventListener('click', function() {
      window.location.href = "/admin/dashboard";
    });
  }

  addNewQuestion();
});