@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar Ujian</h1>

    <a href="{{ route('ujian.create') }}" 
      class="flex items-center space-x-2 p-2 rounded-lg transition-colors
      {{ Request::routeIs('ujian.create') ? 'bg-blue-50 text-[#1d4ed8]' : 'text-gray-600 hover:bg-gray-100' }}">
      <div class="w-10 h-10 rounded-lg grid place-items-center 
        {{ Request::routeIs('ujian.create') ? 'bg-[#1d4ed8] text-white' : 'bg-gray-200' }}">
        +
      </div>
      <span>Buat Ujian Baru</span>
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
                    <th class="px-6 py-3 text-left">Batas Waktu</th>
                    <th class="px-6 py-3 text-left">Durasi</th>
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
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($ujian->batas_waktu)->format('d M Y H:i') }}</td>
                    <td class="px-6 py-4">{{ $ujian->durasi }} menit</td>
                    <td class="px-6 py-4">{{ $ujian->pertanyaan_count ?? 0 }}</td>
                    <td class="px-6 py-4 flex gap-2">
                        <a href="{{ route('ujian.edit', $ujian->id) }}" class="text-blue-500 hover:text-blue-700">
                          <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('ujian.destroy', $ujian->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus ujian ini? Semua pertanyaan terkait juga akan dihapus.')">
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
                    <td colspan="7" class="px-6 py-4 text-center text-gray-400">Belum ada ujian</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    {{-- @if($ujian->hasPages())
        <div class="mt-6">
            {{ $ujian->links() }}
        </div>
    @endif --}}
</div>
@endsection