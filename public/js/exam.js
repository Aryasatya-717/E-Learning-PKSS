let currentQuestion = 0;
const answers = {};

// Initialize question navigation
function initQuestionNavigation() {
    document.getElementById('total-questions').textContent = totalQuestions;
}

function saveAnswer(questionId, answerKey) {
    answers[questionId] = answerKey;
    updateQuestionButton(questionId);

    let hiddenInput = document.querySelector(`#hiddenAnswers input[name="jawaban[${questionId}]"]`);
    if (!hiddenInput) {
        hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = `jawaban[${questionId}]`;
        hiddenInput.id = `jawaban_${questionId}`;
        document.getElementById('hiddenAnswers').appendChild(hiddenInput);
    }
    hiddenInput.value = answerKey;
    updateWarningMessage();
}

function updateQuestionButton(questionId) {
    const questionButtons = document.querySelectorAll('.question-btn');
    questionButtons.forEach(btn => {
        const btnQuestionId = parseInt(btn.getAttribute('data-question-id'));
        btn.classList.remove('answered');
        if (btnQuestionId === questionId && answers[questionId] !== undefined) {
            btn.classList.add('answered');
        }
    });
}

function renderQuestion(index) {
    const q = questions[index];
    document.getElementById('questionText').textContent = `${index + 1}. ${q.pertanyaan}`;
    document.getElementById('current-question').textContent = index + 1;

    const optionsContainer = document.getElementById('options-container');
    optionsContainer.innerHTML = '';

    const options = JSON.parse(q.opsi);
    Object.entries(options).forEach(([key, value]) => {
        const div = document.createElement('div');
        div.className = `option-item flex items-center p-4 border border-gray-200 rounded-lg cursor-pointer
                         ${answers[q.id] == key ? 'bg-blue-50 border-blue-300' : ''}`;
        div.onclick = function() {
            const radio = this.querySelector('input[type="radio"]');
            radio.checked = true;
            saveAnswer(q.id, key);
            document.querySelectorAll('.option-item').forEach(item => {
                item.classList.remove('bg-blue-50', 'border-blue-300');
            });
            this.classList.add('bg-blue-50', 'border-blue-300');
        };
        div.innerHTML = `
            <input type="radio" name="current_option" id="soal${q.id}_${key}" 
                value="${key}" ${answers[q.id] == key ? 'checked' : ''} 
                class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300"
                onchange="saveAnswer(${q.id}, ${key})">
            <label for="soal${q.id}_${key}" class="ml-3 text-gray-700 cursor-pointer flex-1">
                <span class="font-medium">${String.fromCharCode(65 + parseInt(key))}.</span> ${value}
            </label>
        `;
        optionsContainer.appendChild(div);
    });

    document.querySelectorAll('.question-btn').forEach((btn, i) => {
        btn.classList.remove('active');
        if (i === index) btn.classList.add('active');
    });

    document.getElementById('prevBtn').disabled = index === 0;
    document.getElementById('nextBtn').disabled = index === questions.length - 1;

    const progressPercent = ((index + 1) / totalQuestions) * 100;
    document.getElementById('progress').style.width = `${progressPercent}%`;
}

function nextQuestion() {
    if (currentQuestion < questions.length - 1) {
        currentQuestion++;
        renderQuestion(currentQuestion);
    }
}

function prevQuestion() {
    if (currentQuestion > 0) {
        currentQuestion--;
        renderQuestion(currentQuestion);
    }
}

function goToQuestion(index) {
    currentQuestion = index;
    renderQuestion(currentQuestion);
}

let timeLeft = 0;

document.addEventListener('DOMContentLoaded', function() {
    initQuestionNavigation();
    renderQuestion(currentQuestion);

    timeLeft = parseInt(document.getElementById('timer').dataset.timeleft);
    const timer = setInterval(function () {
        timeLeft--;
        if (timeLeft <= 0) {
            clearInterval(timer);
            document.getElementById('examForm').submit();
        }

        const h = String(Math.floor(timeLeft / 3600)).padStart(2, '0');
        const m = String(Math.floor((timeLeft % 3600) / 60)).padStart(2, '0');
        const s = String(timeLeft % 60).padStart(2, '0');
        document.getElementById('timer').textContent = `${h}:${m}:${s}`;

        if (timeLeft <= 300) {
            document.getElementById('timer').classList.add('text-red-600');
            document.getElementById('timer').classList.remove('text-blue-600');
        }
    }, 1000);
});

function updateWarningMessage() {
    const answeredCount = Object.keys(answers).length;
    const unansweredCount = totalQuestions - answeredCount;
    
    if (unansweredCount > 0) {
        document.getElementById('warning-message').classList.remove('hidden');
        document.getElementById('unanswered-count').textContent = unansweredCount;
    } else {
        document.getElementById('warning-message').classList.add('hidden');
    }
}

document.getElementById('examForm').addEventListener('submit', function(e) {
    e.preventDefault();
    showConfirmationModal();
});

function showConfirmationModal() {
    const answeredCount = Object.keys(answers).length;
    document.getElementById('answered-info').textContent = answeredCount;
    document.getElementById('confirmationModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('confirmationModal').classList.add('hidden');
}

function submitForm() {
    document.getElementById('examForm').submit();
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowRight') {
        nextQuestion();
    } else if (e.key === 'ArrowLeft') {
        prevQuestion();
    }
});

