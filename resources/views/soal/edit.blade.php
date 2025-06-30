@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-6xl">
    <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Ujian: {{ $ujian->judul }}</h1>

        <form method="POST" action="{{ route('ujian.update', $ujian->id) }}" id="form-ujian" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Judul Ujian</label>
                    <input type="text" name="judul" placeholder="Judul Ujian"
                        value="{{ $ujian->judul }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        required>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Departemen</label>
                    <select name="departemen_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        required>
                        <option value="">Pilih Departemen</option>
                        @foreach($departemen as $dept)
                            <option value="{{ $dept->id }}" {{ $ujian->departemen_id == $dept->id ? 'selected' : '' }}>
                                {{ $dept->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Batas Waktu</label>
                    <input type="datetime-local" name="batas_waktu" 
                        value="{{ \Carbon\Carbon::parse($ujian->batas_waktu)->format('Y-m-d\TH:i') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        required>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Durasi (menit)</label>
                    <input type="number" name="durasi" placeholder="Durasi"
                        value="{{ $ujian->durasi }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        required>
                </div>

                <div class="md:col-span-2 space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" placeholder="Deskripsi"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition min-h-[100px]">{{ $ujian->deskripsi }}</textarea>
                </div>
            </div>

            <hr class="my-6 border-gray-200">

            <div class="space-y-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Soal Ujian</h2>
                <div id="soal-container" class="space-y-6">
                    @foreach($ujian->soal as $i => $soal)
                        <div class="soal bg-gray-50 rounded-xl shadow-sm p-6 border border-gray-200 relative" data-index="{{ $i }}">
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
                                        placeholder="Masukkan pertanyaan">{{ $soal->pertanyaan }}</textarea>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Tipe Soal</label>
                                    <select name="tipe[]" class="tipe-soal w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                        <option value="pilihan_ganda" {{ $soal->tipe == 'pilihan_ganda' ? 'selected' : '' }}>Pilihan Ganda</option>
                                        <option value="essay" {{ $soal->tipe == 'essay' ? 'selected' : '' }}>Essay</option>
                                        <option value="checkbox" {{ $soal->tipe == 'checkbox' ? 'selected' : '' }}>Checkbox</option>
                                    </select>
                                </div>

                                <div class="opsi-wrapper space-y-3">
                                    @php $opsi = $soal->opsi ? json_decode($soal->opsi, true) : []; @endphp
                                    @foreach($opsi as $j => $opt)
                                        <div class="flex items-start space-x-3">
                                            <input type="text" name="opsi[{{ $i }}][]" value="{{ $opt }}"
                                                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                                placeholder="Opsi jawaban">
                                            <div class="flex items-center h-full pt-2">
                                                <input type="radio" name="jawaban_benar[{{ $i }}]" value="{{ $j }}"
                                                    {{ $soal->jawaban_benar == $j ? 'checked' : '' }}
                                                    class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300">
                                                <span class="ml-2 text-sm text-gray-600">Benar</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Poin</label>
                                    <input type="number" name="poin[]" value="{{ $soal->poin }}" 
                                        class="w-24 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                        placeholder="Poin">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" id="tambah-soal" class="flex items-center justify-center w-full py-3 px-4 border border-dashed border-gray-300 rounded-lg hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Tambah Soal
                </button>
            </div>

            <div class="flex justify-end space-x-4 pt-6">
                <a href="{{ route('soal.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/ujian-edit.js') }}"></script>
@endpush