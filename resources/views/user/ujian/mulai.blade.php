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
  <link rel="stylesheet" href="{{ asset('css/exam.css') }}">

  
</head>
<body class="font-inter bg-gray-50">

  <!-- Header -->
  <header class="bg-white shadow px-4 py-3 sticky top-0 z-10">
    <div class="flex items-center justify-between">
      <!-- Logo -->
      <div class="flex items-center space-x-3">
        <img src="{{ asset('/pkss/img/Logo-BAS.png') }}" alt="PKSS Logo" class="w-20 lg:w-24 object-contain">
      </div>

      <!-- Judul & Soal -->
      <div class="text-center flex-1">
        <h1 class="text-base lg:text-lg font-semibold text-gray-800">{{ $ujian->judul }}</h1>
        <p class="text-xs lg:text-sm text-gray-600">
          Soal: <span id="current-question" class="font-medium">1</span>/<span id="total-questions">{{ count($ujian->soals) }}</span>
        </p>
      </div>

      <!-- Timer -->
      <div class="flex flex-col items-end">
        <span class="text-xs lg:text-sm font-medium text-gray-600">Sisa Waktu</span>
        <div id="timer" data-timeleft="{{ $ujian->durasi * 60 }}"
             class="text-lg lg:text-xl font-mono font-bold text-blue-600">
          {{ gmdate('H:i:s', $ujian->durasi * 60) }}
        </div>
      </div>
    </div>
  </header>

  <!-- Progress Bar -->
  <div class="bg-gray-200 h-2 w-full">
    <div id="progress" class="bg-blue-500 h-2 transition-all duration-300"
         style="width: {{ 100/count($ujian->soals) }}%"></div>
  </div>

  <!-- Main -->
  <main class="container mx-auto px-4 py-8 max-w-5xl">
    <form action="{{ route('user.ujian.submit', $ujian->id) }}" method="POST" id="examForm"
          class="grid grid-cols-1 lg:grid-cols-4 gap-6">
      @csrf

      <!-- Kolom Soal -->
      <div class="lg:col-span-3">
        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
          <p class="font-semibold text-gray-800 text-lg" id="questionText"></p>
          <div id="options-container" class="space-y-3 mt-4"></div>
        </div>

        <!-- Hidden Input untuk jawaban -->
        <div id="hiddenAnswers"></div>

        <!-- Navigasi Soal Mobile -->
        <div class="block lg:hidden mt-6">
          <div class="bg-white rounded-xl shadow-sm p-4">
            <h3 class="font-medium text-gray-700 mb-3">Navigasi Soal</h3>
            <div class="flex flex-wrap gap-2 justify-center" id="question-navigation-mobile">
              @foreach($ujian->soals as $index => $question)
                <button type="button"
                        class="question-btn w-10 h-10 rounded-full border flex items-center justify-center text-sm
                               {{ $loop->first ? 'active border-blue-500 bg-blue-100' : 'border-gray-300 bg-white' }}"
                        onclick="goToQuestion({{ $index }})"
                        data-question-id="{{ $question->id }}">
                  {{ $index + 1 }}
                </button>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Tombol Navigasi -->
        <div class="flex justify-between mt-6">
          <button type="button" id="prevBtn" onclick="prevQuestion()"
                  class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200">
            <i class="fas fa-arrow-left mr-2"></i>Sebelumnya
          </button>
          <button type="button" id="nextBtn" onclick="nextQuestion()"
                  class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200">
            Berikutnya<i class="fas fa-arrow-right ml-2"></i>
          </button>
        </div>

        <!-- Tombol Submit -->
        <div class="mt-8 bg-white rounded-xl shadow-sm p-4">
          <button type="submit"
                  class="w-full px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-lg font-semibold
                         hover:from-blue-700 hover:to-blue-600 transition-all shadow-md hover:shadow-lg">
            <i class="fas fa-paper-plane mr-2"></i>Kumpulkan Jawaban
          </button>
          <div id="warning-message"
               class="hidden mt-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg text-yellow-800 text-sm">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <span id="unanswered-count">0</span> soal belum dijawab.
          </div>
        </div>
      </div>

      <!-- Navigasi Soal Desktop -->
      <div class="hidden lg:block lg:col-span-1">
        <div class="bg-white rounded-xl shadow-sm p-4 sticky top-24">
          <h3 class="font-medium text-gray-700 mb-3">Navigasi Soal</h3>
          <div class="flex flex-wrap gap-2" id="question-navigation-desktop">
            @foreach($ujian->soals as $index => $question)
              <button type="button"
                      class="question-btn w-10 h-10 rounded-full border flex items-center justify-center text-sm
                             {{ $loop->first ? 'active border-blue-500 bg-blue-100' : 'border-gray-300 bg-white' }}"
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

  <!-- Modal -->
  <div id="confirmationModal"
       class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
      <div class="flex justify-between items-start mb-4">
        <h3 class="text-xl font-semibold text-gray-800">Konfirmasi Pengumpulan</h3>
        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600"><i class="fas fa-times"></i></button>
      </div>
      <div class="mb-6 text-gray-600">
        <p>Anda yakin ingin mengumpulkan jawaban?</p>
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 mt-2">
          <span id="answered-info">0</span> dari <span>{{ count($ujian->soals) }}</span> soal terjawab
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
    const questions = @json($ujian->soals);
    const totalQuestions = questions.length;
  </script>
  <script src="{{ asset('js/exam.js') }}"></script>
</body>
</html>
