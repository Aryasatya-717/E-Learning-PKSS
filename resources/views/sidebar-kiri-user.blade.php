<aside class="w-full md:w-64 bg-white p-4 space-y-8 shadow-md md:h-screen">
  <div class="text-center">
    <img class="w-full h-full object-contain" src="/pkss/img/logo-1.png" alt="Logo" />
  </div>
  <nav class="space-y-4">
    <!-- Dashboard -->
    <a href="{{ route('dashboard.user') }}"
       class="flex items-center space-x-2 font-medium
       {{ Request::routeIs('dashboard.user') ? 'text-[#1d4ed8]' : 'text-gray-600' }}">
      <div class="w-10 h-10 rounded grid place-items-center 
        {{ Request::routeIs('dashboard.user') ? 'bg-[#1d4ed8] text-white' : 'bg-gray-200' }}">
        🏠
      </div>
      <span>Dashboard</span>
    </a>

    <!-- Ujian -->
    <a href="{{ route('ujian.user') }}"
       class="flex items-center space-x-2 font-medium
       {{ Request::routeIs('ujian.user') ? 'text-[#1d4ed8]' : 'text-gray-600' }}">
      <div class="w-10 h-10 rounded grid place-items-center 
        {{ Request::routeIs('ujian.user') ? 'bg-[#1d4ed8] text-white' : 'bg-gray-200' }}">
        📘
      </div>
      <span>Ujian</span>
    </a>

    <!-- Sertifikat -->
    <a href=""
       class="flex items-center space-x-2 font-medium
       {{ Request::routeIs('sertifikat') ? 'text-[#1d4ed8]' : 'text-gray-600' }}">
      <div class="w-10 h-10 rounded grid place-items-center 
        {{ Request::routeIs('sertifikat') ? 'bg-[#1d4ed8] text-white' : 'bg-gray-200' }}">
        📜
      </div>
      <span>Sertifikat</span>
    </a>

    <!-- Jadwal -->
    <a href=""
       class="flex items-center space-x-2 font-medium
       {{ Request::routeIs('jadwal') ? 'text-[#1d4ed8]' : 'text-gray-600' }}">
      <div class="w-10 h-10 rounded grid place-items-center 
        {{ Request::routeIs('jadwal') ? 'bg-[#1d4ed8] text-white' : 'bg-gray-200' }}">
        📆
      </div>
      <span>Jadwal</span>
    </a>
  </nav>
</aside>
