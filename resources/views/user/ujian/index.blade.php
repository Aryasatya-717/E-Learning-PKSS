@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar Ujian Tersedia</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-md rounded-xl">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 text-gray-700 font-semibold">
                <tr>
                    <th class="px-6 py-3 text-left">Judul</th>
                    <th class="px-6 py-3 text-left">Departemen</th>
                    <th class="px-6 py-3 text-left">Deskripsi</th>
                    <th class="px-6 py-3 text-left">Jumlah Soal</th>
                    <th class="px-6 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($ujians as $ujian)
                <tr>
                    <td class="px-6 py-4">{{ $ujian->judul }}</td>
                    <td class="px-6 py-4 capitalize">{{ $ujian->departemen }}</td>
                    <td class="px-6 py-4">{{ Str::limit($ujian->deskripsi, 50) }}</td>
                    <td class="px-6 py-4">{{ $ujian->pertanyaan_count }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('user.ujian.mulai', $ujian->id) }}" class="text-blue-600 hover:underline">
                            Mulai Ujian
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-400">Belum ada ujian</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
