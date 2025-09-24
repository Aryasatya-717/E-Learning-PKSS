let currentQuestion = 0;
const answers = {};

// Initialize
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
    const buttons = document.querySelectorAll(`.question-btn[data-question-id="${questionId}"]`);
    buttons.forEach(btn => {
        btn.classList.add('answered'); // hijau kalau sudah dijawab
    });
}


function renderQuestion(index) {
    const q = questions[index];
    document.getElementById('questionText').textContent = `${index + 1}. ${q.pertanyaan}`;
    document.getElementById('current-question').textContent = index + 1;

    const optionsContainer = document.getElementById('options-container');
    optionsContainer.innerHTML = '';

    const options = q.opsi_acak_baru;

    Object.entries(options).forEach(([originalIndex, optionText]) => {
        const isSelected = answers[q.id] === originalIndex;

        const div = document.createElement('div');
        div.className = `option-item flex items-center p-4 border rounded-lg cursor-pointer transition-colors duration-200
                         ${isSelected ? 'bg-blue-50 border-blue-400' : 'border-gray-200 hover:bg-gray-50'}`;

        div.onclick = function() {
            document.querySelectorAll('.option-item').forEach(item => {
                item.classList.remove('bg-blue-50', 'border-blue-400');
                item.querySelector('input[type="radio"]').checked = false;
            });
            this.classList.add('bg-blue-50', 'border-blue-400');
            this.querySelector('input[type="radio"]').checked = true;
            saveAnswer(q.id, originalIndex);
        };

        div.innerHTML = `
            <input type="radio" name="current_option_${q.id}"
                   value="${originalIndex}" ${isSelected ? 'checked' : ''}
                   class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 pointer-events-none">
            <label class="ml-3 text-gray-700 cursor-pointer flex-1">
                ${optionText}
            </label>
        `;
        optionsContainer.appendChild(div);
    });

   document.querySelectorAll('.question-btn').forEach(btn => {
    btn.classList.remove('active');
    });
    document.querySelectorAll(`.question-btn[data-question-id="${questions[index].id}"]`)
    .forEach(btn => btn.classList.add('active'));


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

// Timer
let timeLeft = 0;
document.addEventListener('DOMContentLoaded', function() {
    initQuestionNavigation();
    renderQuestion(currentQuestion);

    timeLeft = parseInt(document.getElementById('timer').dataset.timeleft);
    const timerEl = document.getElementById('timer');

    const timer = setInterval(function () {
        timeLeft--;
        if (timeLeft <= 0) {
            clearInterval(timer);
            alert("Waktu habis!");
            document.getElementById('examForm').submit();
        }

        const h = String(Math.floor(timeLeft / 3600)).padStart(2, '0');
        const m = String(Math.floor((timeLeft % 3600) / 60)).padStart(2, '0');
        const s = String(timeLeft % 60).padStart(2, '0');
        timerEl.textContent = `${h}:${m}:${s}`;

        // warna dinamis
        if (timeLeft <= 30) {
            timerEl.className = "text-lg lg:text-xl font-mono font-bold text-red-600";
        } else if (timeLeft <= 120) {
            timerEl.className = "text-lg lg:text-xl font-mono font-bold text-orange-500";
        } else {
            timerEl.className = "text-lg lg:text-xl font-mono font-bold text-blue-600";
        }
    }, 1000);
});

// Warning belum dijawab
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

// Modal
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

// Navigasi keyboard
document.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowRight') nextQuestion();
    else if (e.key === 'ArrowLeft') prevQuestion();
});
