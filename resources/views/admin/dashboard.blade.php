@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-start gap-4 mb-8">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Selamat Datang Kembali, {{ Auth::user()->name }}! 👋</h2>
            <p class="mt-1 text-gray-600">Berikut adalah ringkasan aktivitas di platform e-learning Anda.</p>
        </div>
        <div class="text-right bg-white px-4 py-2 rounded-lg shadow-sm border">
            <div id="clock" class="text-2xl font-bold text-gray-800">00:00:00</div>
            <div id="date" class="text-sm text-gray-500">Hari, DD Bulan YYYY</div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 flex items-center gap-5">
            <div class="flex-shrink-0 w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center">
                <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m-7.5-2.962A3.375 3.375 0 0 1 12 15.75v-1.5a3.375 3.375 0 0 1 3.375-3.375H15.75m-1.5-1.5A3.375 3.375 0 0 1 12 5.625v1.5a3.375 3.375 0 0 1-3.375 3.375H5.25l-1.5-1.5m3.375-3.375l1.5-1.5m-1.5 1.5l-1.5-1.5m1.5 1.5v-1.5m3.375 3.375H5.25l-1.5-1.5m1.5 1.5v-1.5m12 3.375l-1.5-1.5M15 7.5h3.375a3.375 3.375 0 0 1-3.375 3.375v-1.5Z" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Pegawai</p>
                <p class="text-3xl font-bold text-gray-900">{{ $totalPegawai ?? 0 }}</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 flex items-center gap-5">
            <div class="flex-shrink-0 w-14 h-14 rounded-full bg-green-100 flex items-center justify-center">
                <svg class="w-8 h-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Ujian Dibuat</p>
                <p class="text-3xl font-bold text-gray-900">{{ $totalUjian ?? 0 }}</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 flex items-center gap-5">
            <div class="flex-shrink-0 w-14 h-14 rounded-full bg-yellow-100 flex items-center justify-center">
                <svg class="w-8 h-8 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Materi</p>
                <p class="text-3xl font-bold text-gray-900">{{ $totalMateri ?? 0 }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md border border-gray-200">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Ujian Terbaru</h3>
                <a href="{{ route('soal.index') }}" class="text-sm font-medium text-blue-600 hover:underline">Lihat Semua</a>
            </div>
            <div class="space-y-4">
                @forelse($ujianTerbaru as $ujian)
                    <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50">
                        <div>
                            <p class="font-semibold text-gray-900">{{ $ujian->judul }}</p>
                            <p class="text-sm text-gray-500">
                                Dept: {{ $ujian->departemen->nama ?? 'Semua' }} | Deadline: {{ \Carbon\Carbon::parse($ujian->batas_waktu)->format('d M Y') }}
                            </p>
                        </div>
                        <a href="{{ route('ujian.edit', $ujian->id) }}" class="text-sm font-medium text-blue-600 hover:text-blue-800">
                            Kelola
                        </a>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-500">
                        <p>Belum ada ujian yang dibuat.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="space-y-8">
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Akses Cepat</h3>
                <div class="space-y-3">
                    <a href="{{ route('soal.index') }}" class="w-full flex items-center gap-3 p-4 rounded-lg bg-blue-50 hover:bg-blue-100 transition-colors">
                        <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" /></svg>
                        <span class="font-semibold text-gray-800">Buat Ujian Baru</span>
                    </a>
                    <a href="{{ route('modul.index') }}" class="w-full flex items-center gap-3 p-4 rounded-lg bg-green-50 hover:bg-green-100 transition-colors">
                        <svg class="w-6 h-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
                        <span class="font-semibold text-gray-800">Upload Materi</span>
                    </a>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Pengumuman</h3>
                <div class="text-center py-6 text-gray-500">
                    <p>Fitur pengumuman akan datang.</p>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
<script>
    function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;

        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        const dayName = days[now.getDay()];
        const day = now.getDate();
        const monthName = months[now.getMonth()];
        const year = now.getFullYear();
        document.getElementById('date').textContent = `${dayName}, ${day} ${monthName} ${year}`;
    }

    setInterval(updateClock, 1000);
    updateClock();
</script>
@endpush