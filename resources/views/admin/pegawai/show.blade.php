@extends('layouts.app')

@section('title', 'Detail Pegawai: ' . $pegawai->name)

@section('content')
    <div>
        <div class="mb-6">
            <a href="{{ route('admin.nilai') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-blue-600 font-medium transition-colors">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali ke Daftar Pegawai</span>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1 space-y-8">
                <div class="bg-white shadow-md rounded-xl p-6 text-center">
                    <img src="{{ $pegawai->profile_photo_url }}" alt="{{ $pegawai->name }}" class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-gray-200">
                    <h2 class="mt-4 text-2xl font-bold text-gray-900">{{ $pegawai->name }}</h2>
                    {{-- <p class="text-sm text-gray-500">{{ $pegawai->jabatan ?? 'Jabatan Belum Diatur' }}</p> --}}
                    
                   <a href="{{ route('admin.pegawai.edit', $pegawai->id) }}" 
   class="px-4 py-2 bg-blue-600 text-white text-xs font-semibold rounded-lg hover:bg-blue-700">
   Edit Profil
</a>

                </div>

                <div class="bg-white shadow-md rounded-xl p-6">
                  <h3 class="text-lg font-semibold text-gray-800 border-b pb-3 mb-4">Detail Kontak</h3>
                  <div class="space-y-3 text-sm">

                    <div class="flex">
                        <dt class="w-1/3 text-gray-500 font-medium">NIP</dt>
                        <dd class="w-2/3 text-gray-800">{{ $pegawai->email }}</dd>
                    </div>
                    <div class="flex">
                        <dt class="w-1/3 text-gray-500 font-medium">Unit Kerja</dt>
                        <dd class="w-2/3 text-gray-800">{{ $pegawai->unit_kerja ?? '-' }}</dd>
                    </div>
                    <div class="flex">
                        <dt class="w-1/3 text-gray-500 font-medium">Departemen</dt>
                        <dd class="w-2/3 text-gray-800">{{ $pegawai->departemen->nama ?? '-' }}</dd>
                    </div>
                    <div class="flex">
                        <dt class="w-1/3 text-gray-500 font-medium">Bergabung</dt>
                        <dd class="w-2/3 text-gray-800">{{ $pegawai->created_at->format('d F Y') }}</dd>
                    </div>
                  </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white shadow-md rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-800 border-b pb-3 mb-4">Riwayat Ujian</h3>
                    <div class="space-y-4">
                        @forelse($pegawai->hasilUjian as $hasil)
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $hasil->ujian->judul ?? 'Ujian Dihapus' }}</p>
                                    <p class="text-xs text-gray-500">Diselesaikan pada: {{ $hasil->created_at->format('d M Y, H:i') }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-xl @if($hasil->status == 'Lulus') text-green-600 @else text-red-600 @endif">
                                        {{ $hasil->skor }}
                                    </p>
                                    @if($hasil->status == 'Lulus')
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Lulus</span>
                                    @else
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Tidak Lulus</span>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8 text-gray-500">
                                <i class="fas fa-folder-open fa-2x mb-2"></i>
                                <p>Pegawai ini belum pernah mengikuti ujian.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection