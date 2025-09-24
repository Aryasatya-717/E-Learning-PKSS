@extends('layouts.app')

@section('content')
@section('title', 'Daftar Ujian')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Daftar Ujian Tersedia</h1>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div>
                <div>
                    <p class="font-bold">Berhasil</p>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if($ujians->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($ujians as $ujian)
                @php
                    $hasil = $hasilUjianUser[$ujian->id] ?? null;
                    $batasWaktu = \Carbon\Carbon::parse($ujian->batas_waktu);
                    $isExpired = \Carbon\Carbon::now()->gt($batasWaktu);
                @endphp
                
                <div class="bg-white shadow-lg rounded-xl flex flex-col overflow-hidden transition-transform transform hover:-translate-y-1">
                    <div class="p-6 flex-grow">
                        <div class="flex justify-between items-start mb-2">
                            <h2 class="text-xl font-bold text-gray-900">{{ $ujian->judul }}</h2>
                            @if ($hasil)
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full {{ $hasil->status == 'Lulus' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">{{ $hasil->status }}</span>
                            @elseif($isExpired)
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Kedaluwarsa</span>
                            @else
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Tersedia</span>
                            @endif
                        </div>

                        <p class="text-gray-600 text-sm mt-2 mb-4 leading-relaxed">{{ Str::limit($ujian->deskripsi, 120) }}</p>

                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="h-4 w-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>Batas Waktu: {{ $batasWaktu->isoFormat('D MMM YY, HH:mm') }}</span>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-6 py-4">
                        @if ($hasil && $hasil->status == 'Lulus')
                            <a href="{{ route('ujian.sertifikat', $ujian->id) }}" class="block w-full text-center px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition-colors">
                                🎓 Lihat Sertifikat
                            </a>

                        @elseif ($hasil && $hasil->status != 'Lulus' && !$isExpired)
                            <a href="{{ route('user.ujian.mulai', $ujian->id) }}" class="block w-full text-center px-4 py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition-colors">
                                ↻ Ulangi Ujian
                            </a>

                        @elseif (!$hasil && !$isExpired)
                            <a href="{{ route('user.ujian.mulai', $ujian->id) }}" class="block w-full text-center px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-colors">
                                Kerjakan Sekarang
                            </a>

                        @else
                            <button class="block w-full text-center px-4 py-2 bg-gray-300 text-gray-500 font-semibold rounded-lg cursor-not-allowed" disabled>
                                Waktu Habis
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white shadow-md rounded-xl p-12 text-center">
            <h3 class="text-lg font-medium text-gray-900">Tidak Ada Ujian</h3>
            <p class="mt-2 text-sm text-gray-500">
                Saat ini belum ada ujian yang tersedia untuk Anda.
            </p>
        </div>
    @endif
</div>
@endsection