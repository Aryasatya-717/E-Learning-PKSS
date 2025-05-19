document.addEventListener('DOMContentLoaded', function() {
    // DOM Elements
    const timerElement = document.getElementById('timer');
    const currentQuestionElement = document.getElementById('current-question');
    const questionTextElement = document.getElementById('question-text');
    const optionsContainer = document.getElementById('options-container');
    const questionPointsElement = document.getElementById('question-points');
    const progressBar = document.getElementById('progress-bar');
    const answeredCountElement = document.getElementById('answered-count');
    const questionButtons = document.querySelectorAll('.question-btn');
    const prevButtons = document.querySelectorAll('#prev-btn, #prev-btn-mobile');
    const nextButtons = document.querySelectorAll('#next-btn, #next-btn-mobile');
    const submitButton = document.getElementById('submit-btn');
    const confirmationModal = document.getElementById('confirmation-modal');
    const cancelSubmitButton = document.getElementById('cancel-submit');
    const confirmSubmitButton = document.getElementById('confirm-submit');

    // Timer functionality
    let remainingTime = examData.duration;
    const timerInterval = setInterval(updateTimer, 1000);

    function updateTimer() {
        remainingTime--;
        
        if (remainingTime <= 0) {
            clearInterval(timerInterval);
            submitExam();
            return;
        }
        
        const hours = Math.floor(remainingTime / 3600);
        const minutes = Math.floor((remainingTime % 3600) / 60);
        const seconds = remainingTime % 60;
        
        timerElement.textContent = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        
        // Change color when time is running out
        if (remainingTime <= 300) { // 5 minutes
            timerElement.classList.add('bg-red-500');
            timerElement.classList.remove('bg-blue-500');
        }
    }

    // Load question
    function loadQuestion(questionNumber) {
        const questionIndex = questionNumber - 1;
        const question = examData.questions[questionIndex];
        
        // Update current question display
        currentQuestionElement.textContent = questionNumber;
        questionTextElement.textContent = question.pertanyaan;
        questionPointsElement.innerHTML = `Poin: <span class="font-bold text-blue-600">${question.poin}</span>`;
        
        // Update options
        let optionsHtml = '';
        const options = question.opsi ? JSON.parse(question.opsi) : [];
        
        if (question.tipe === 'essay') {
            optionsHtml = `
                <div class="relative">
                    <textarea id="essay-answer" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition min-h-[120px]" 
                        placeholder="Tulis jawaban Anda disini...">${examData.answers[questionNumber]?.answer || ''}</textarea>
                </div>
            `;
        } else {
            options.forEach((option, index) => {
                const isChecked = examData.answers[questionNumber]?.answer.includes(index.toString());
                optionsHtml += `
                    <div class="flex items-start">
                        <input 
                            type="${question.tipe === 'checkbox' ? 'checkbox' : 'radio'}" 
                            name="answer" 
                            id="option-${index}"
                            value="${index}"
                            class="mt-1 h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300"
                            ${isChecked ? 'checked' : ''}
                        >
                        <label for="option-${index}" class="ml-3 block text-gray-700">
                            <span class="text-gray-700">${option}</span>
                        </label>
                    </div>
                `;
            });
        }
        
        optionsContainer.innerHTML = optionsHtml;
        
        // Update question buttons
        questionButtons.forEach(btn => {
            const btnQuestionNum = parseInt(btn.dataset.question);
            btn.classList.remove('bg-blue-100', 'text-blue-800', 'border-blue-300');
            
            if (btnQuestionNum === questionNumber) {
                btn.classList.add('bg-blue-100', 'text-blue-800', 'border', 'border-blue-300');
            } else if (examData.answers[btnQuestionNum]) {
                btn.classList.add('bg-green-100', 'text-green-800', 'border', 'border-green-300');
            } else {
                btn.classList.add('bg-gray-100', 'hover:bg-gray-200');
            }
        });
        
        // Update navigation buttons
        updateNavigationButtons(questionNumber);
    }

    // Save answer
    function saveAnswer(questionNumber) {
        const question = examData.questions[questionNumber - 1];
        let answer = [];
        
        if (question.tipe === 'essay') {
            const textarea = document.getElementById('essay-answer');
            if (textarea && textarea.value.trim()) {
                answer = [textarea.value];
            }
        } else {
            const inputs = optionsContainer.querySelectorAll('input[type="radio"], input[type="checkbox"]:checked');
            inputs.forEach(input => {
                answer.push(input.value);
            });
        }
        
        if (answer.length > 0) {
            examData.answers[questionNumber] = {
                answer: answer,
                questionId: question.id
            };
        } else {
            delete examData.answers[questionNumber];
        }
        
        updateProgress();
    }

    // Update progress
    function updateProgress() {
        const answeredCount = Object.keys(examData.answers).length;
        const progressPercentage = (answeredCount / examData.totalQuestions) * 100;
        
        answeredCountElement.textContent = answeredCount;
        progressBar.style.width = `${progressPercentage}%`;
    }

    // Update navigation buttons
    function updateNavigationButtons(currentQuestion) {
        const prevDisabled = currentQuestion <= 1;
        const nextDisabled = currentQuestion >= examData.totalQuestions;
        
        prevButtons.forEach(btn => {
            btn.disabled = prevDisabled;
            btn.classList.toggle('opacity-50', prevDisabled);
            btn.classList.toggle('cursor-not-allowed', prevDisabled);
        });
        
        nextButtons.forEach(btn => {
            btn.disabled = nextDisabled;
            btn.classList.toggle('opacity-50', nextDisabled);
            btn.classList.toggle('cursor-not-allowed', nextDisabled);
        });
        
        submitButton.style.display = nextDisabled ? 'block' : 'none';
    }

    // Navigation functions
    function goToQuestion(questionNumber) {
        saveAnswer(examData.currentQuestion);
        examData.currentQuestion = questionNumber;
        loadQuestion(questionNumber);
    }

    function goToPrevQuestion() {
        if (examData.currentQuestion > 1) {
            goToQuestion(examData.currentQuestion - 1);
        }
    }

    function goToNextQuestion() {
        if (examData.currentQuestion < examData.totalQuestions) {
            goToQuestion(examData.currentQuestion + 1);
        }
    }

    // Submit exam
    function submitExam() {
        saveAnswer(examData.currentQuestion);
        
        // Calculate time spent
        const endTime = new Date().getTime();
        const timeSpent = Math.floor((endTime - examData.startTime) / 1000);
        
        // Prepare data for submission
        const submission = {
            ujian_id: examData.ujianId, // Gunakan nilai yang sudah di-pass dari Blade
            answers: examData.answers,
            time_spent: timeSpent
        };
        
        // Send data to server
        fetch(examData.submitUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': examData.csrfToken
            },
            body: JSON.stringify(submission)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = data.redirect_url;
            } else {
                alert('Terjadi kesalahan saat mengumpulkan ujian.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengumpulkan ujian.');
        });
    }

    // Event listeners
    questionButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const questionNumber = parseInt(btn.dataset.question);
            goToQuestion(questionNumber);
        });
    });

    prevButtons.forEach(btn => {
        btn.addEventListener('click', goToPrevQuestion);
    });

    nextButtons.forEach(btn => {
        btn.addEventListener('click', goToNextQuestion);
    });

    submitButton.addEventListener('click', () => {
        confirmationModal.classList.remove('hidden');
    });

    cancelSubmitButton.addEventListener('click', () => {
        confirmationModal.classList.add('hidden');
    });

    confirmSubmitButton.addEventListener('click', submitExam);

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            goToPrevQuestion();
        } else if (e.key === 'ArrowRight') {
            goToNextQuestion();
        }
    });

    // Initialize
    loadQuestion(1);
    updateProgress();
});