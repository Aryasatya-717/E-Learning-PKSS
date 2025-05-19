<aside class="w-full md:w-64 bg-white px-4 pt-4 pb-6 space-y-8 shadow-md md:h-screen">
  <div class="w-40 h-20 object-contain mx-auto mb-0">
    <img class="w-full h-full object-contain" src="/pkss/img/logo-1.png" alt="Logo" />
  </div>
  <nav class="space-y-4">
    @auth
      @if(auth()->user()->role === 'admin')
        <!-- Sidebar Admin -->
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center space-x-2 p-2 rounded-lg transition-colors
           {{ Request::routeIs('admin.dashboard') ? 'bg-blue-50 text-[#1d4ed8]' : 'text-gray-600 hover:bg-gray-100' }}">
          <div class="w-10 h-10 rounded-lg grid place-items-center 
            {{ Request::routeIs('admin.dashboard') ? 'bg-[#1d4ed8] text-white' : 'bg-gray-200' }}">
            🏠
          </div>
          <span>Dashboard</span>
        </a>

       <!-- admin.materi.form-->
        <a href="{{ route('modul.index') }}" 
           class="flex items-center space-x-2 p-2 rounded-lg transition-colors
           {{ Request::routeIs('admin.course*') ? 'bg-blue-50 text-[#1d4ed8]' : 'text-gray-600 hover:bg-gray-100' }}">
          <div class="w-10 h-10 rounded-lg grid place-items-center 
            {{ Request::routeIs('admin.course*') ? 'bg-[#1d4ed8] text-white' : 'bg-gray-200' }}">
            📘
          </div>
          <span>Upload Materi</span>
        </a>

        <a href="{{ route('soal.index') }}" 
           class="flex items-center space-x-2 p-2 rounded-lg transition-colors
           {{ Request::routeIs('admin.soal*') ? 'bg-blue-50 text-[#1d4ed8]' : 'text-gray-600 hover:bg-gray-100' }}">
          <div class="w-10 h-10 rounded-lg grid place-items-center 
            {{ Request::routeIs('admin.soal*') ? 'bg-[#1d4ed8] text-white' : 'bg-gray-200' }}">
            📝
          </div>
          <span>Buat Ujian</span>
        </a>

        <a href="#" 
           class="flex items-center space-x-2 p-2 rounded-lg transition-colors
           {{ Request::routeIs('admin.karyawan*') ? 'bg-blue-50 text-[#1d4ed8]' : 'text-gray-600 hover:bg-gray-100' }}">
          <div class="w-10 h-10 rounded-lg grid place-items-center 
            {{ Request::routeIs('admin.karyawan*') ? 'bg-[#1d4ed8] text-white' : 'bg-gray-200' }}">
            📊
          </div>
          <span>Management Karyawan</span>
        </a>

      @else
        <!-- Sidebar User -->
        <a href="{{ route('user.dashboard') }}"
           class="flex items-center space-x-2 p-2 rounded-lg transition-colors
           {{ Request::routeIs('user.dashboard') ? 'bg-blue-50 text-[#1d4ed8]' : 'text-gray-600 hover:bg-gray-100' }}">
          <div class="w-10 h-10 rounded-lg grid place-items-center 
            {{ Request::routeIs('user.dashboard') ? 'bg-[#1d4ed8] text-white' : 'bg-gray-200' }}">
            🏠
          </div>
          <span>Dashboard</span>
        </a>

        <a href="{{ route('user.modul.index') }}" 
           class="flex items-center space-x-2 p-2 rounded-lg transition-colors
           {{ Request::routeIs('admin.course*') ? 'bg-blue-50 text-[#1d4ed8]' : 'text-gray-600 hover:bg-gray-100' }}">
          <div class="w-10 h-10 rounded-lg grid place-items-center 
            {{ Request::routeIs('admin.course*') ? 'bg-[#1d4ed8] text-white' : 'bg-gray-200' }}">
            📘
          </div>
          <span>download Materi</span>
        </a>

        <a href="{{ route('user.ujian.index') }}"
           class="flex items-center space-x-2 p-2 rounded-lg transition-colors
           {{ Request::routeIs('ujian.user') ? 'bg-blue-50 text-[#1d4ed8]' : 'text-gray-600 hover:bg-gray-100' }}">
          <div class="w-10 h-10 rounded-lg grid place-items-center 
            {{ Request::routeIs('ujian.user') ? 'bg-[#1d4ed8] text-white' : 'bg-gray-200' }}">
            📘
          </div>
          <span>Ujian</span>
        </a>

        <a href="{{ route('user.sertifikat') }}"
           class="flex items-center space-x-2 p-2 rounded-lg transition-colors
           {{ Request::routeIs('sertifikat') ? 'bg-blue-50 text-[#1d4ed8]' : 'text-gray-600 hover:bg-gray-100' }}">
          <div class="w-10 h-10 rounded-lg grid place-items-center 
            {{ Request::routeIs('sertifikat') ? 'bg-[#1d4ed8] text-white' : 'bg-gray-200' }}">
            📜
          </div>
          <span>Sertifikat</span>
        </a>

        <a href="#"
           class="flex items-center space-x-2 p-2 rounded-lg transition-colors
           {{ Request::routeIs('jadwal') ? 'bg-blue-50 text-[#1d4ed8]' : 'text-gray-600 hover:bg-gray-100' }}">
          <div class="w-10 h-10 rounded-lg grid place-items-center 
            {{ Request::routeIs('jadwal') ? 'bg-[#1d4ed8] text-white' : 'bg-gray-200' }}">
            📆
          </div>
          <span>Jadwal</span>
        </a>
      @endif
    @endauth
  </nav>
</aside>