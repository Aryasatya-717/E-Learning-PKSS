@extends('layouts.app')

@section('content')
    {{-- Konten Utama --}}
    <main class="max-w-7xl mx-auto mt-10 sm:mt-16 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-xl p-6 sm:p-8">

            {{-- Header: Judul dan Pencarian --}}
            <div class="mb-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">
                    Daftar Ujian Karyawan
                </h1>
                <div class="relative w-full sm:w-72">
                    <input id="searchInput" type="text" placeholder="Cari nama ujian..."
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-300" />
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        {{-- Heroicon: search --}}
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Tabel Data Ujian --}}
            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="bg-green-600 text-white">
                        <tr>
                            <th class="whitespace-nowrap px-6 py-3 text-left font-semibold">Nama Ujian</th>
                            <th class="whitespace-nowrap px-6 py-3 text-left font-semibold">Departemen</th>
                            <th class="whitespace-nowrap px-6 py-3 text-left font-semibold">Tanggal Upload</th>
                            <th class="whitespace-nowrap px-6 py-3 text-left font-semibold">Deadline</th>
                            <th class="px-6 py-3"></th> {{-- Kolom Aksi --}}
                        </tr>
                    </thead>
                    <tbody id="examTableBody" class="divide-y divide-gray-200">
                        @forelse($ujian as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">{{ $item->judul }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-gray-700">
                                    @if($item->departemen_id === 'all')
                                        <span class="font-semibold text-blue-600">Semua Departemen</span>
                                    @elseif($item->departemen)
                                        {{ $item->departemen->nama }}
                                    @else
                                        <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Tidak Ditemukan
                                        </span>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-gray-700">{{ $item->created_at->format('d M Y') }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-gray-700">{{ \Carbon\Carbon::parse($item->batas_waktu)->format('d M Y, H:i') }}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <a href="{{ route('admin.nilaikaryawan2', $item->id) }}"
                                       class="inline-block rounded bg-blue-600 px-4 py-2 text-xs font-medium text-white hover:bg-blue-700 transition-transform duration-300 ease-in-out hover:scale-105">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                    <p class="font-semibold">Belum ada data ujian.</p>
                                    <p class="text-sm mt-1">Silakan tambahkan data ujian baru.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            {{-- <div class="mt-6"> --}}
                {{-- Pastikan Anda telah mengkonfigurasi pagination Laravel untuk menggunakan Tailwind --}}
                {{-- Di App\Providers\AppServiceProvider.php, tambahkan: Paginator::useTailwind(); --}}
                {{-- {{ $ujian->links() }} --}}
            {{-- </div> --}}
        </div>
    </main>

    {{-- Script JS dapat diletakkan di sini atau di layout utama --}}
    {{-- <script src="main.js"></script> --}}
@endsection