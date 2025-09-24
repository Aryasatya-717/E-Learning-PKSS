@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p class="mt-1 text-gray-600">Tetap semangat dan terus tingkatkan kemampuan Anda.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Ujian Tersedia</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $ujianTersedia->count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Ujian Diikuti</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalUjianDiikuti ?? 0 }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9a9.75 9.75 0 0 1 0-19.5h9m0 19.5a9.75 9.75 0 0 0 0-19.5h-9M16.5 18.75L18 17.25m-1.5 1.5L15 17.25m3 1.5V14.25m-4.5 4.5v-6.75m0 0L10.5 6.75m-1.5 1.5L7.5 6.75m1.5 1.5v6.75m0 0H6m4.5-6.75H6" /></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Ujian Lulus</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalLulus ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 mb-8">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Ujian yang Harus Dikerjakan</h3>
        <div class="space-y-4">
            @forelse($ujianTersedia as $ujian)
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 rounded-lg border border-gray-200 hover:bg-gray-50 transition-colors">
                    <div class="mb-3 sm:mb-0">
                        <p class="font-semibold text-gray-900">{{ $ujian->judul }}</p>
                        <p class="text-sm text-gray-500 mt-1">
                            <span class="mr-4">Durasi: {{ $ujian->durasi }} menit</span>
                            <span>Deadline: {{ \Carbon\Carbon::parse($ujian->batas_waktu)->format('d M Y, H:i') }}</span>
                        </p>
                    </div>
                    <a href="{{ route('user.ujian.mulai', $ujian->id) }}" class="flex-shrink-0 inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg shadow-sm transition-all">
                        <span>Mulai Kerjakan</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" /></svg>
                    </a>
                </div>
            @empty
                <div class="text-center py-8 text-gray-500 border-2 border-dashed border-gray-200 rounded-lg">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15L15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <h3 class="mt-2 text-sm font-semibold text-gray-900">Tidak Ada Ujian Aktif</h3>
                    <p class="mt-1 text-sm text-gray-500">Anda sudah menyelesaikan semua ujian yang ditugaskan. Kerja bagus!</p>
                </div>
            @endforelse
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Riwayat Ujian Terbaru</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <tbody class="divide-y divide-gray-200">
                    @forelse($riwayatUjian as $hasil)
                        <tr>
                            <td class="py-3 pr-4 font-medium text-gray-900">{{ $hasil->ujian->judul ?? 'Ujian Dihapus' }}</td>
                            <td class="py-3 px-4 text-gray-600">{{ $hasil->created_at->format('d M Y') }}</td>
                            <td class="py-3 px-4 text-gray-600">Skor: {{ $hasil->skor }}/{{ $hasil->skor_maks }}</td>
                            <td class="py-3 pl-4 text-right">
                                @if($hasil->status == 'Lulus')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Lulus
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Tidak Lulus
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="4" class="py-8 text-gray-500">Anda belum pernah mengikuti ujian.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
<script src="/pkss/main.js"></script>

