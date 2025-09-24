@extends('layouts.app')

@section('title', 'Edit Profil Karyawan: ' . $pegawai->name)

@section('content')
    <div>
        {{-- Tombol Kembali --}}
       

        <div class="bg-white shadow-md rounded-xl p-6 sm:p-8">
            <div class="max-w-xl">
                <h2 class="text-lg font-medium text-gray-900">Informasi Profil Karyawan</h2>
                <p class="mt-1 text-sm text-gray-600">
                    Perbarui informasi profil untuk karyawan <strong>{{ $pegawai->name }}</strong>.
                </p>

                <form method="post" action="{{ route('admin.pegawai.update', $pegawai->id) }}" class="mt-6 space-y-6">
                    @csrf
                    @method('PATCH')

                    {{-- Nama (Read-only untuk referensi) --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Karyawan</label>
                        <input id="name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed" value="{{ $pegawai->name }}" disabled />
                        <p class="mt-1 text-xs text-gray-500">Nama tidak dapat diubah dari halaman ini.</p>
                    </div>

                    {{-- NIP (Email) --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">NIP (Email)</label>
                        <input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('email', $pegawai->email) }}" required autocomplete="email" />
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Unit Kerja --}}
                    <div>
                        <label for="unit_kerja" class="block text-sm font-medium text-gray-700">Unit Kerja</label>
                        <input id="unit_kerja" name="unit_kerja" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('unit_kerja', $pegawai->unit_kerja) }}" />
                        @error('unit_kerja')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Departemen (Dropdown) --}}
                    <div>
                        <label for="departemen_id" class="block text-sm font-medium text-gray-700">Departemen</label>
                        <select id="departemen_id" name="departemen_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">Pilih Departemen</option>
                            @foreach($departemens as $departemen)
                                <option value="{{ $departemen->id }}" {{ old('departemen_id', $pegawai->departemen_id) == $departemen->id ? 'selected' : '' }}>
                                    {{ $departemen->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('departemen_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tombol Simpan & Notifikasi Sukses --}}
                    <div class="flex items-center gap-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Simpan Perubahan
                        </button>

                        @if (session('status') === 'profile-updated-by-admin')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 3000)"
                                class="text-sm text-green-600"
                            >Profil berhasil diperbarui.</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection