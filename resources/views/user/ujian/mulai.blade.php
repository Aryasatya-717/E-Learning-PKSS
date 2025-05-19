@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ $ujian->judul }}</h1>

    <form action="{{ route('user.ujian.submit', $ujian->id) }}" method="POST">
        @csrf

        @if($ujian->soal && count($ujian->soal) > 0)
            @foreach($ujian->soal as $index => $soal)
                <div class="mb-6">
                    <p class="font-semibold mb-2">{{ $index + 1 }}. {{ $soal->pertanyaan }}</p>

                    @php
                        $opsi = json_decode($soal->opsi, true);
                    @endphp

                    @if(is_array($opsi))
                        @foreach($opsi as $i => $opsiJawaban)
                            <div class="flex items-center mb-2">
                                <input type="radio" 
                                       name="jawaban[{{ $soal->id }}]" 
                                       id="soal{{ $soal->id }}_{{ $i }}" 
                                       value="{{ $i }}"
                                       class="mr-2" required>
                                <label for="soal{{ $soal->id }}_{{ $i }}">{{ $opsiJawaban }}</label>
                            </div>
                        @endforeach
                    @else
                        <p class="text-red-500">Opsi tidak valid atau belum diatur.</p>
                    @endif
                </div>
            @endforeach

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Kumpulkan Jawaban
            </button>
        @else
            <p class="text-gray-500">Belum ada soal pada ujian ini.</p>
        @endif
    </form>
</div>
@endsection
