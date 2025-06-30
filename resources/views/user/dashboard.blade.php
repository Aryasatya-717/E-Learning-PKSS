@extends('layouts.app')

@section('content')

    <!-- Main Content -->
    <main class="content">
      <div>
        <p class="text-lg font-medium text-blue-600">Selamat Pagi, <span class="font-bold">{{ Auth::user()->name }}</span></p>
        <p class="text-sm text-gray-500 mb-2">don’t miss your examination today!</p>
        <div class="text-center my-4">
          <p class="text-md text-black font-semibold">Live Watch</p>
          <div id="clock" class="text-5xl font-semibold tracking-widest">00 : 00 : 00</div>
          <div id="date" class="text-md mt-2">Hari, DD Bulan YYYY</div>
          <div>
          </div>
        </div>
        <div class="mt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-2">Ujian yang Tersedia</h3>
          @if($ujianSiap->isEmpty())
            <p class="text-gray-500">Tidak ada ujian yang tersedia saat ini.</p>
          @else
            <ul class="space-y-2">
              @foreach($ujianSiap as $ujian)
                <li class="p-4 border rounded shadow-sm">
                  <div class="flex justify-between items-center">
                    <div>
                      <p class="font-semibold text-gray-700">{{ $ujian->judul }}</p>
                      <p class="text-sm text-gray-500">Deadline: {{ $ujian->batas_waktu }}</p>
                    </div>
                    <a href="{{ route('user.ujian.index') }}" class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700">Kerjakan</a>
                  </div>
                </li>
              @endforeach
            </ul>
          @endif
        </div>
      </div>
    </main>
@endsection

<script src="/pkss/main.js"></script>
</body>
</html>
