@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <header class="bg-white shadow-sm px-4 sm:px-6 py-3 flex flex-col sm:flex-row justify-between items-center sticky top-0 z-10">
        <div class="flex items-center space-x-2 sm:space-x-4 mb-3 sm:mb-0">
            <img src="{{ asset('img/logo-1.png') }}" alt="PKSS Logo" class="w-24 sm:w-28 object-contain">
            <h1 class="text-lg sm:text-xl font-semibold border border-gray-300 rounded-xl px-3 sm:px-4 py-1 bg-gray-50">
                {{ $ujian->judul }}
            </h1>
        </div>
        
        <div class="flex items-center space-x-2 sm:space-x-3">
            <span class="text-sm sm:text-base font-semibold text-gray-700">SISA WAKTU</span>
            <div id="timer" class="bg-blue-500 text-white px-3 sm:px-4 py-1 rounded-lg font-mono shadow text-sm sm:text-base">
                {{ gmdate("H:i:s", $ujian->durasi * 60) }}
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-6">
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Question Section -->
            <section class="flex-1 bg-white p-4 sm:p-6 rounded-lg shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="font-bold text-lg border border-gray-300 px-4 py-2 rounded-lg bg-gray-50">
                        SOAL NO. <span id="current-question">1</span>
                    </h2>
                    <div id="question-points" class="text-sm font-medium text-gray-500">
                        Poin: <span class="font-bold text-blue-600">5</span>
                    </div>
                </div>
                
                <article class="mb-6">
                    <p id="question-text" class="text-gray-700 leading-relaxed">
                        {{ $soals[0]->pertanyaan }}
                    </p>
                </article>
                
                <hr class="border-gray-200 mb-6">
                
                <!-- Options Container -->
                <div id="options-container" class="space-y-3">
                    @php
                        $options = $soals[0]->opsi ? json_decode($soals[0]->opsi, true) : [];
                    @endphp
                    
                    @if($soals[0]->tipe == 'essay')
                        <div class="relative">
                            <textarea id="essay-answer" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition min-h-[120px]" placeholder="Tulis jawaban Anda disini..."></textarea>
                        </div>
                    @else
                        @foreach($options as $index => $option)
                            <div class="flex items-start">
                                <input 
                                    type="{{ $soals[0]->tipe == 'checkbox' ? 'checkbox' : 'radio' }}" 
                                    name="answer" 
                                    id="option-{{ $index }}"
                                    value="{{ $index }}"
                                    class="mt-1 h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300"
                                >
                                <label for="option-{{ $index }}" class="ml-3 block text-gray-700">
                                    <span class="text-gray-700">{{ $option }}</span>
                                </label>
                            </div>
                        @endforeach
                    @endif
                </div>
                
                <!-- Navigation Buttons (Mobile) -->
                <div class="flex justify-between mt-8 lg:hidden">
                    <button id="prev-btn-mobile" class="nav-btn flex items-center space-x-1 text-gray-600 font-medium px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <i class="fas fa-chevron-left"></i>
                        <span>Sebelumnya</span>
                    </button>
                    <button id="next-btn-mobile" class="nav-btn flex items-center space-x-1 text-gray-600 font-medium px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <span>Selanjutnya</span>
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </section>

            <!-- Question Navigation -->
            <aside class="w-full lg:w-64 bg-white p-4 sm:p-6 rounded-lg shadow-sm border border-gray-100">
                <h3 class="font-semibold text-gray-800 mb-4">Navigasi Soal</h3>
                
                <!-- Question Grid -->
                <div class="grid grid-cols-5 gap-2 mb-6">
                    @foreach($soals as $index => $soal)
                        <button 
                            data-question="{{ $index + 1 }}"
                            class="question-btn w-10 h-10 rounded-lg text-sm font-medium flex items-center justify-center transition-colors
                                   @if($loop->first) bg-blue-100 text-blue-800 border border-blue-300 @else bg-gray-100 hover:bg-gray-200 @endif">
                            {{ $index + 1 }}
                        </button>
                    @endforeach
                </div>
                
                <!-- Progress Info -->
                <div class="mb-6">
                    <div class="flex justify-between text-sm text-gray-600 mb-1">
                        <span>Status:</span>
                        <span><span id="answered-count">0</span>/{{ count($soals) }} terjawab</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div id="progress-bar" class="bg-blue-600 h-2.5 rounded-full" style="width: 0%"></div>
                    </div>
                </div>
                
                <!-- Navigation Buttons -->
                <div class="flex justify-between items-center">
                    <button id="prev-btn" class="nav-btn flex items-center space-x-1 text-gray-600 font-medium px-3 py-1.5 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <i class="fas fa-chevron-left"></i>
                        <span class="hidden sm:inline">Sebelumnya</span>
                    </button>
                    <button id="submit-btn" class="px-4 py-1.5 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                        Selesai
                    </button>
                    <button id="next-btn" class="nav-btn flex items-center space-x-1 text-gray-600 font-medium px-3 py-1.5 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <span class="hidden sm:inline">Selanjutnya</span>
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </aside>
        </div>
    </main>

    <!-- Confirmation Modal -->
    <div id="confirmation-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Konfirmasi Pengumpulan</h3>
            <p class="text-gray-600 mb-6">Anda yakin ingin mengumpulkan ujian ini? Pastikan semua soal telah terjawab.</p>
            <div class="flex justify-end space-x-3">
                <button id="cancel-submit" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                    Batal
                </button>
                <button id="confirm-submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Ya, Kumpulkan
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const examData = {
        duration: {{ $ujian->durasi * 60 }}, // in seconds
        totalQuestions: {{ count($soals) }},
        questions: @json($soals),
        answers: {},
        currentQuestion: 1,
        startTime: new Date().getTime(),
        ujianId: {{ $ujian->id }},
    };
</script>
<script src="{{ asset('js/ujian.js') }}"></script>
@endpush