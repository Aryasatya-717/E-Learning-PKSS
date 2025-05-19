@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Modul Pelatihan</h1>

    <div class="overflow-x-auto bg-white shadow-md rounded-xl">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 text-gray-700 font-semibold">
                <tr>
                    <th class="px-6 py-3 text-left">Judul</th>
                    <th class="px-6 py-3 text-left">Departemen</th>
                    <th class="px-6 py-3 text-left">Deskripsi</th>
                    <th class="px-6 py-3 text-left">Download</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($moduls as $modul)
                <tr>
                    <td class="px-6 py-4">{{ $modul->judul }}</td>
                    <td class="px-6 py-4 capitalize">{{ $modul->departemen }}</td>
                    <td class="px-6 py-4">{{ Str::limit($modul->deskripsi, 50) }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ asset('storage/' . $modul->file_path) }}" 
                           target="_blank" class="text-blue-600 hover:underline">
                            Download
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-400">Belum ada modul</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
