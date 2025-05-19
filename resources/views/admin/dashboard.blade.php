@extends('layouts.app')

@section('content')
  <p class="text-lg font-medium text-blue-600">Selamat Pagi, <span class="font-bold">{{ Auth::user()->name }}</span></p>
  <p class="text-sm text-gray-500 mb-2">don’t miss your examination today!</p>

  <div class="text-center my-4">
    <p class="text-md text-black font-semibold">Live Watch</p>
    <div id="clock" class="text-5xl font-semibold tracking-widest">00 : 00 : 00</div>
    <div id="date" class="text-md mt-2">Hari, DD Bulan YYYY</div>
  </div>

  <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-xl shadow-sm text-center">
      <div class="text-3xl mb-1">📘</div>
      <h3 class="font-semibold text-lg">Materi</h3>
      <p class="text-gray-600 mt-2">Upload Materi</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-sm text-center">
      <div class="text-3xl mb-1">📝</div>
      <h3 class="font-semibold text-lg">Ujian</h3>
      <p class="text-gray-600 mt-2">Buat Soal Ujian</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-sm text-center">
      <div class="text-3xl mb-1">📊</div>
      <h3 class="font-semibold text-lg">Management</h3>
      <p class="text-gray-600 mt-2">Nilai Karyawan</p>
    </div>
  </section>

  <section class="bg-white rounded-xl shadow-sm p-6">
    <h3 class="text-xl font-semibold mb-4">Pengumuman</h3>
    <div class="space-y-4">
      <!-- Pengumuman -->
    </div>
  </section>
@endsection

<!-- Clock Script -->
<script src="/pkss/main.js"></script>
