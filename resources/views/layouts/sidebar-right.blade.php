<aside class="w-full md:w-64 p-6 bg-white shadow-md space-y-6">
  <div class="text-center">
    <div class="w-24 h-24 mx-auto rounded-full overflow-hidden mb-4">
      <img src="/pkss/img/pp.png" alt="Profile" class="w-full h-full object-cover">
    </div>
    <h1>{{ Auth::user()->name }}</h1>
    <p>{{ Auth::user()->role }}</p>
  </div>

  <div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
      <button type="button" onclick="confirmLogout()" class="w-full bg-red-500 text-white py-2 rounded-xl font-semibold">
        Log out
      </button>
    </form>
  </div>

  <div class="bg-white rounded-lg shadow p-4">
    <div class="flex justify-between items-center mb-4">
      <h2 id="month-year" class="text-lg font-semibold text-gray-800">Bulan Tahun</h2>
      <div>
        <button id="prev-month" type="button" class="text-blue-500 hover:text-blue-700 px-2">&lt;</button>
        <button id="next-month" type="button" class="text-blue-500 hover:text-blue-700 px-2">&gt;</button>
      </div>
    </div>
    <div class="grid grid-cols-7 gap-2 text-center text-sm font-semibold text-gray-600">
      <div>S</div> <div>S</div> <div>R</div> <div>K</div> <div>J</div> <div>S</div> <div>M</div>
    </div>
    <div id="calendar-days" class="grid grid-cols-7 gap-2 mt-2 text-center text-sm text-gray-800"></div>
  </div>
</aside>

@push('scripts')
<script src="{{ asset('js/calendar.js') }}"></script>
@endpush
