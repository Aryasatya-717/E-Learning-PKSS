@extends('layouts.app')

@section('head')
    <link href="{{ asset('dflip/css/dflip.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dflip/css/themify-icons.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-xl font-bold mb-4">Preview Modul</h2>

    <div class="_df_book" 
        height="600" 
        webgl="true" 
        backgroundcolor="#f3f4f6"
        source="{{ $fileUrl }}" 
        id="df_manual_book">
    </div>

    <div class="mt-4">
        <a href="{{ route('user.modul.index') }}" class="text-blue-600 hover:underline">← Kembali</a>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('dflip/js/libs/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dflip/js/dflip.min.js') }}" type="text/javascript"></script>
@endsection
