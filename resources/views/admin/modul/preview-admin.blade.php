@extends('layouts.app')

@section('title', 'Preview Materi')

@section('head')
    <link href="{{ asset('dflip/css/dflip.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dflip/css/themify-icons.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        .df-container .df-book-container {
            background: transparent !important;
        }
    </style>
@endsection

@section('content')
    <div class="max-w-5xl mx-auto">
        
        <div class="mb-6">
            <a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-blue-600 font-medium transition-colors text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                Kembali
            </a>
            
            <div class="mt-4">
                <h1 class="text-3xl font-bold text-gray-900">{{ $modul->judul }}</h1>
                <div class="flex items-center gap-4 mt-2 text-sm text-gray-500">
                    <span>Dibuat pada: {{ $modul->created_at->format('d M Y') }}</span>
                    <span class="h-4 border-l border-gray-300"></span>
                    <span>Departemen: 
                        <span class="font-semibold text-gray-700">{{ $modul->departemen->nama ?? 'N/A' }}</span>
                    </span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4 sm:p-6">
            
            @if($modul->deskripsi)
            <div class="mb-6 p-4 bg-gray-50 border-l-4 border-blue-400 text-gray-700">
                <h3 class="font-semibold">Deskripsi Modul:</h3>
                <p class="text-sm">{{ $modul->deskripsi }}</p>
            </div>
            @endif

            <div class="bg-gray-100 rounded-lg overflow-hidden">
                <div class="_df_book" 
                     height="600" 
                     webgl="true" 
                     source="{{ $fileUrl }}" 
                     id="df_manual_book">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts') 
    {{-- dflip.js scripts --}}
    <script src="{{ asset('dflip/js/libs/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dflip/js/dflip.min.js') }}" type="text/javascript"></script>
@endsection
