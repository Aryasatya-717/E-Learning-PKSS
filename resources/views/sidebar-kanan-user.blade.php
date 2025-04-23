<!-- resources/views/components/right-sidebar.blade.php -->
<aside class="right-sidebar">
    <div class="text-center mb-10">
      <div class="profile-img w-24 h-24 mx-auto rounded-full overflow-hidden mb-4">
        <img src="/pkss/img/pp.png" alt="Profile" class="w-full h-full object-cover">
      </div>
      <h1>{{ Auth::user()->name }}</h1>
      <p>{{ Auth::user()->role }}</p>
    </div>
    <div class="mb-6">
      <a href="{{ route('logout') }}">
        <button class="w-full bg-red-500 text-white py-2 rounded-xl font-semibold">Log out</button>
      </a>
    </div>
    <div class="bg-white rounded-lg shadow p-4">
      <div class="flex justify-between items-center mb-4">
        <button onclick="prevMonth()" class="text-blue-500">&lt;</button>
        <h2 id="calendar-title" class="font-semibold text-lg">Maret 2025</h2>
        <button onclick="nextMonth()" class="text-blue-500">&gt;</button>
      </div>
      <div class="grid grid-cols-7 gap-2 text-center text-sm font-semibold text-gray-600">
        <div>S</div><div>S</div><div>S</div><div>R</div><div>K</div><div>J</div><div>S</div>
      </div>
      <div id="calendar-days" class="grid grid-cols-7 gap-2 mt-2 text-center text-sm text-gray-800"></div>
    </div>
    <div>
      <h3 class="font-semibold mb-4">Exam Reminders</h3>
      <div class="space-y-4">
        <div class="bg-red-50 p-3 rounded-lg">
          <div class="flex items-center text-red-800 mb-2">
            <i class="fas fa-clock mr-2"></i><span class="font-medium">Today</span>
          </div>
          <p class="text-sm">Mathematics Final Exam</p>
          <p class="text-xs text-red-600 mt-1">09:00 AM - 11:00 AM</p>
        </div>
        <div class="bg-gray-50 p-3 rounded-lg">
          <div class="flex items-center text-gray-800 mb-2">
            <i class="fas fa-clock mr-2"></i><span class="font-medium">Tomorrow</span>
          </div>
          <p class="text-sm">Physics Mid-term</p>
          <p class="text-xs text-gray-600 mt-1">02:00 PM - 04:00 PM</p>
        </div>
      </div>
    </div>
  </aside>
  