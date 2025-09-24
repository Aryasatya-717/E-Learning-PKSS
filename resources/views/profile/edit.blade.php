@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <div class="space-y-8">

        <div class="bg-white shadow-md rounded-xl p-6 sm:p-8">
            <div class="max-w-xl">
                <h2 class="text-lg font-medium text-gray-900">Foto Profil</h2>
                <p class="mt-1 text-sm text-gray-600">
                    Perbarui foto profil Anda.
                </p>

                <div class="mt-6 flex items-center gap-6">
                    <img id="photo-preview" class="h-24 w-24 rounded-full object-cover" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">

                    <div>
                        <form action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-4">
                            @csrf
                            <label for="photo" class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <span>Pilih Foto Baru</span>
                                <input type="file" id="photo" name="photo" class="sr-only" onchange="this.form.submit()" required>
                            </label>
                        </form>

                        @if ($user->profile_photo_path)
                            <form action="{{ route('profile.photo.destroy') }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-600 hover:text-red-800 transition duration-150 ease-in-out">
                                    Hapus Foto
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

                @error('photo')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                
                @if (session('status') === 'photo-updated' || session('status') === 'photo-deleted')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-green-600 mt-4"
                    >Foto berhasil diperbarui.</p>
                @endif
            </div>
        </div>

        <div class="bg-white shadow-md rounded-xl p-6 sm:p-8">
            <div class="max-w-xl">
                <h2 class="text-lg font-medium text-gray-900">Informasi Profil</h2>
                <p class="mt-1 text-sm text-gray-600">
                    Perbarui informasi profil dan alamat email akun Anda.
                </p>

                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input id="name" name="name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('email', $user->email) }}" required autocomplete="email" />
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Simpan
                        </button>

                        @if (session('status') === 'profile-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-green-600"
                            >Tersimpan.</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-xl p-6 sm:p-8">
            <div class="max-w-xl">
                <h2 class="text-lg font-medium text-gray-900">Ganti Kata Sandi</h2>
                <p class="mt-1 text-sm text-gray-600">
                    Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.
                </p>

                <form method="post" action="{{ route('profile.password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700">Kata Sandi Saat Ini</label>
                        <input id="current_password" name="current_password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" autocomplete="current-password" />
                        @error('current_password', 'updatePassword') {{-- Menargetkan error bag spesifik --}}
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi Baru</label>
                        <input id="password" name="password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" autocomplete="new-password" />
                        @error('password', 'updatePassword')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Kata Sandi</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" autocomplete="new-password" />
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Simpan
                        </button>

                        @if (session('status') === 'password-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-green-600"
                            >Tersimpan.</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection