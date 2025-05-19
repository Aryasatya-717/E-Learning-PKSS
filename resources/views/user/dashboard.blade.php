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
        </div>
      </div>

    </main>

    <!-- Right Sidebar -->

@endsection


<!-- Clock Script -->
<script src="/pkss/main.js"></script>
</body>
</html>
