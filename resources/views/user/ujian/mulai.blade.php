<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKSS e-learning - {{ $ujian->judul }}</title>
    
    <!-- External Resources -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/exam.css') }}">
</head>
<body class="font-sans">
    <!-- Header Section -->
    <header class="bg-white shadow-sm px-6 py-4 flex justify-between items-center sticky top-0 z-10">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('img/logo-1.png') }}" alt="PKSS Logo" class="w-28 object-contain">
            <div>
                <h1 class="text-xl font-semibold text-gray-800">{{ $ujian->judul }}</h1>
                <div class="flex items-center mt-1">
                    <span class="text-sm text-gray-600">Soal: </span>
                    <div id="question-counter" class="ml-1 text-sm font-medium">
                        <span id="current-question">1</span>/<span id="total-questions">{{ count($ujian->soal) }}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex items-center space-x-4">
            <div class="flex flex-col items-end">
                <span class="text-sm font-medium text-gray-600">Sisa Waktu</span>
                <div id="timer" data-timeleft="{{ $ujian->durasi * 60 }}"
                    class="text-xl font-mono font-bold text-blue-600">
                    {{ gmdate('H:i:s', $ujian->durasi * 60) }}
                </div>


            </div>
            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                <i class="fas fa-clock text-blue-600 text-xl"></i>
            </div>
        </div>
    </header>

    <!-- Progress Bar -->
    <div class="bg-gray-200 h-2 w-full">
        <div id="progress" class="progress-bar bg-blue-500" 
             style="width: {{ 100/count($ujian->soal) }}%"></div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 max-w-5xl">
        <form action="{{ route('user.ujian.submit', $ujian->id) }}" method="POST" id="examForm"
            class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            @csrf

            <!-- KONTEN UTAMA -->
            <div class="lg:col-span-3">
                <!-- Question Container -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-6 animate__animated animate__fadeIn">
                    <p class="font-semibold text-gray-800 text-lg" id="questionText"></p>
                    <div id="options-container" class="space-y-3 mt-4"></div>
                </div>

                <!-- Hidden input untuk semua jawaban -->
                <div id="hiddenAnswers"></div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-6">
                    <button type="button" id="prevBtn" 
                            class="nav-btn px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-medium"
                            onclick="prevQuestion()">
                        <i class="fas fa-arrow-left mr-2"></i>Sebelumnya
                    </button>
                    <button type="button" id="nextBtn" 
                            class="nav-btn px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-medium"
                            onclick="nextQuestion()">
                        Berikutnya<i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>

                <!-- Submit Button -->
                <div class="mt-8 bg-white rounded-xl shadow-sm p-4">
                    <button type="submit" id="submitBtn" 
                            class="w-full px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-lg font-semibold
                                hover:from-blue-700 hover:to-blue-600 transition-all shadow-md hover:shadow-lg">
                        <i class="fas fa-paper-plane mr-2"></i>Kumpulkan Jawaban
                    </button>
                    
                    <div class="mt-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg text-yellow-800 text-sm hidden" id="warning-message">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <span id="unanswered-count">0</span> soal belum dijawab. Pastikan Anda sudah memeriksa semua soal sebelum mengumpulkan.
                    </div>
                </div>

                <!-- Navigasi Soal untuk MOBILE -->
                <div class="block lg:hidden mt-8">
                    <div class="bg-white rounded-xl shadow-sm p-4">
                        <h3 class="font-medium text-gray-700 mb-3">Navigasi Soal</h3>
                        <div class="flex flex-wrap gap-2" id="question-navigation-mobile">
                            @foreach($ujian->soal as $index => $question)
                                <button type="button" 
                                        class="question-btn w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center
                                            {{ $loop->first ? 'active' : '' }}"
                                        onclick="goToQuestion({{ $index }})"
                                        data-question-id="{{ $question->id }}">
                                    {{ $index + 1 }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigasi Soal untuk DESKTOP -->
            <div class="hidden lg:block lg:col-span-1">
                <div class="bg-white rounded-xl shadow-sm p-4 sticky top-24">
                    <h3 class="font-medium text-gray-700 mb-3">Navigasi Soal</h3>
                    <div class="flex flex-wrap gap-2" id="question-navigation-desktop">
                        @foreach($ujian->soal as $index => $question)
                            <button type="button" 
                                    class="question-btn w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center
                                        {{ $loop->first ? 'active' : '' }}"
                                    onclick="goToQuestion({{ $index }})"
                                    data-question-id="{{ $question->id }}">
                                {{ $index + 1 }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </form>
    </main>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4 animate__animated animate__fadeInDown">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-xl font-semibold text-gray-800">Konfirmasi Pengumpulan</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="mb-6">
                <p class="text-gray-600 mb-2">Anda yakin ingin mengumpulkan jawaban?</p>
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                    <div class="flex items-center text-blue-800">
                        <i class="fas fa-info-circle mr-2"></i>
                        <span id="answered-info">0</span> dari <span>{{ count($ujian->soal) }}</span> soal terjawab
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3">
                <button onclick="closeModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                    Batal
                </button>
                <button onclick="submitForm()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Ya, Kumpulkan
                </button>
            </div>
        </div>
    </div>

    <script>
        const questions = @json($ujian->soal);
        const totalQuestions = questions.length;
        document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('timer').dataset.timeleft = {{ $ujian->durasi * 60 }};
    });
    </script>
    <script>
    // Masuk ke Fullscreen saat ujian dimulai
        document.addEventListener("DOMContentLoaded", () => {
            const docElm = document.documentElement;
            if (docElm.requestFullscreen) {
                docElm.requestFullscreen();
            } else if (docElm.mozRequestFullScreen) {
                docElm.mozRequestFullScreen();
            } else if (docElm.webkitRequestFullScreen) {
                docElm.webkitRequestFullScreen();
            } else if (docElm.msRequestFullscreen) {
                docElm.msRequestFullscreen();
            }
        });

        // Deteksi jika user keluar tab / minimize (blur)
        window.onblur = function () {
            alert("Anda meninggalkan halaman ujian! Ujian akan dibatalkan.");
            window.location.href = "{{ route('user.dashboard') }}"; // redirect keluar
        };

        // Nonaktifkan klik kanan
        document.addEventListener('contextmenu', event => event.preventDefault());

        // Nonaktifkan tombol tertentu (Ctrl+U, F12, Ctrl+Shift+I, dll)
        document.addEventListener('keydown', function (e) {
            if (
                e.ctrlKey && (e.key === 'u' || e.key === 'U') || // View source
                e.key === 'F12' ||                              // Developer tools
                (e.ctrlKey && e.shiftKey && e.key === 'I') ||   // Inspect
                (e.ctrlKey && e.shiftKey && e.key === 'J') ||   // Console
                (e.ctrlKey && e.key === 'S')                    // Save
            ) {
                e.preventDefault();
            }
        });
    </script>

    <script src="{{ asset('js/exam.js') }}"></script>

</body>
</html>