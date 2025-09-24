@extends('layouts.app')

@section('content', )
@section('title', 'Materi')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Modul Pelatihan
        </h1>
    </div>

    @if($moduls->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($moduls as $modul)
                <div class="bg-white shadow-lg rounded-xl p-6 flex flex-col justify-between transition-transform transform hover:-translate-y-1">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $modul->judul }}</h2>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            {{ Str::limit($modul->deskripsi, 120) }} 
                        </p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('modul.preview', $modul->id) }}" class="w-full text-center inline-block px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-colors">
                            Mulai Belajar
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    @else
        <div class="bg-white shadow-md rounded-xl p-12 text-center">
            <h3 class="text-lg font-medium text-gray-900">Tidak Ada Modul</h3>
            <p class="mt-2 text-sm text-gray-500">
                Saat ini belum ada modul pelatihan yang tersedia. Silakan coba lagi nanti.
            </p>
        </div>
    @endif
</div>
@endsection