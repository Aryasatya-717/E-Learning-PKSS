@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar Modul</h1>

    <a href="{{ route('admin.materi.form') }}" 
      class="flex items-center space-x-2 p-2 rounded-lg transition-colors
      {{ Request::routeIs('admin.course*') ? 'bg-blue-50 text-[#1d4ed8]' : 'text-gray-600 hover:bg-gray-100' }}">
      <div class="w-10 h-10 rounded-lg grid place-items-center 
        {{ Request::routeIs('admin.course*') ? 'bg-[#1d4ed8] text-white' : 'bg-gray-200' }}">
        +
      </div>
      <span>Upload Materi</span>
    </a>

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
                    <th class="px-6 py-3 text-left">Nama File</th>
                    <th class="px-6 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($moduls as $modul)
                <tr>
                    <td class="px-6 py-4">{{ $modul->judul }}</td>
                    <td class="px-6 py-4 capitalize">{{ $modul->departemen->nama ?? '-' }}</td>
                    <td class="px-6 py-4">{{ Str::limit($modul->deskripsi, 50) }}</td>
                    <td class="px-6 py-4">{{ $modul->file_name }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.modul.preview', $modul->id) }}" class="w-full text-center inline-block px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-colors">
                            Lihat
                        </a>
                        <form action="{{ route('modul.destroy', $modul->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-400">Belum ada modul</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
