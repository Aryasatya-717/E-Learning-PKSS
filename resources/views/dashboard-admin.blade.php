<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard PKSS</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f1f5f9] font-sans">
  <div class="min-h-screen flex flex-col md:flex-row">
    <!-- Sidebar kiri -->
    <aside class="w-full md:w-64 bg-white p-4 space-y-8 shadow-md md:h-screen">
      <div class="text-center">
        <img src="/img/logo-1.png" alt="PKSS Logo" class="mx-auto w-[150px] mb-10">
        <h1 class="font-bold text-[#1d4ed8] text-xl"></h1>
        <p class="text-xs text-gray-500"></p>
      </div>
      <nav class="space-y-4">
        <a href="#" class="flex items-center space-x-2 text-[#1d4ed8] font-medium">
          <div class="w-10 h-10 bg-[#1d4ed8] text-white rounded grid place-items-center">🏠</div>
          <span>Dashboard</span>
        </a>
        <a href="#" class="flex items-center space-x-2 text-gray-600">
          <div class="w-10 h-10 bg-gray-200 rounded grid place-items-center">📘</div>
          <span>Course</span>
        </a>
        <a href="#" class="flex items-center space-x-2 text-gray-600">
          <div class="w-10 h-10 bg-gray-200 rounded grid place-items-center">📝</div>
          <span>Test</span>
        </a>
        <a href="#" class="flex items-center space-x-2 text-gray-600">
          <div class="w-10 h-10 bg-gray-200 rounded grid place-items-center">📜</div>
          <span>Certificates</span>
        </a>
        <a href="#" class="flex items-center space-x-2 text-gray-600">
          <div class="w-10 h-10 bg-gray-200 rounded grid place-items-center">📅</div>
          <span>Schedule</span>
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-4 space-y-6">
      <!-- Top Section -->
      <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-lg font-medium text-blue-600">Selamat Pagi, <span class="font-bold">joshua</span></p>
        <p class="text-sm text-gray-500 mb-2">don’t miss your examination today!</p>
        <div class="text-center my-4">
          <p class="text-md text-black font-semibold">Live Watch</p>
          <div id="clock" class="text-5xl font-semibold tracking-widest">00 : 00 : 00</div>
          <div id="date" class="text-md mt-2">Hari, DD Bulan YYYY</div>
        </div>
      </div>

      <div class="bg-blue-700 rounded-xl p-4 flex justify-around text-white">
        <div class="text-center">
          <div class="text-3xl mb-1">📘</div>
          <p>Course</p>
        </div>
        <div class="text-center">
          <div class="text-3xl mb-1">📝</div>
          <p>Test</p>
        </div>
        <div class="text-center">
          <div class="text-3xl mb-1">📜</div>
          <p>Certificate</p>
        </div>
      </div>

      <section>
        <h2 class="font-bold text-blue-700 text-lg mb-2">Pengumuman</h2>
        <div class="space-y-3">
          <div class="bg-white rounded-xl p-3 flex items-start shadow">
            <img src="https://i.ibb.co/fXxGqZN/komunikasi.png" class="w-12 h-12 mr-3 rounded">
            <p class="text-sm">Kamu telah menyelesaikan test komunikasi efektif dari Keterampilan dasar & soft skill, sertifikat <a href="#" class="text-blue-600 underline">klik disini</a></p>
          </div>
          <div class="bg-white rounded-xl p-3 flex items-start shadow">
            <img src="https://i.ibb.co/x8XbnsS/stress-test.png" class="w-12 h-12 mr-3 rounded">
            <p class="text-sm">Test stress manajemen telah ditambahkan, untuk mengerjakan <a href="#" class="text-blue-600 underline">klik disini</a></p>
          </div>
          <div class="bg-white rounded-xl p-3 flex items-start shadow">
            <img src="https://i.ibb.co/PGd8kQ0/pengembangan-karir.png" class="w-12 h-12 mr-3 rounded">
            <p class="text-sm">Kamu telah menyelesaikan test pengembangan karir, sertifikat <a href="#" class="text-blue-600 underline">klik disini</a></p>
          </div>
        </div>
      </section>
    </main>

    <!-- Sidebar kanan -->
    <aside class="w-full md:w-64 p-4 space-y-4">
      <div class="text-center">
        <img src="/img/pp.png" alt="joshua" class="w-20 h-20 mx-auto rounded-full">
        <p class="text-blue-600 font-semibold mt-1">joshua</p>
        <p class="text-sm text-gray-500">IT staff</p>
      </div>
      <button class="w-full bg-orange-500 text-white py-2 rounded-xl font-semibold">Edit Profile</button>

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

      <div class="bg-white rounded-xl p-4 shadow">
        <h3 class="font-bold mb-2">🔔 Reminders</h3>
        <div class="text-sm space-y-2">
          <div class="bg-gray-200 p-2 rounded">Test Keterampilan Dasar & Soft Skills<br><span class="text-xs text-gray-500">5 Maret 2025 – 10:30</span></div>
          <div class="bg-gray-200 p-2 rounded">Test Pelatihan Teknis & Keahlian Profesi<br><span class="text-xs text-gray-500">14 Maret 2025 – 11:00</span></div>
        </div>
      </div>
    </aside>
  </div>

  <!-- Clock Script -->
  <script>
    function updateClock() {
      const now = new Date();
      const hours = String(now.getHours()).padStart(2, '0');
      const minutes = String(now.getMinutes()).padStart(2, '0');
      const seconds = String(now.getSeconds()).padStart(2, '0');
      document.getElementById('clock').textContent = `${hours} : ${minutes} : ${seconds}`;

      const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
      const months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
      const day = days[now.getDay()];
      const date = now.getDate();
      const month = months[now.getMonth()];
      const year = now.getFullYear();

      document.getElementById('date').textContent = `${day}, ${date} ${month} ${year}`;
    }
    setInterval(updateClock, 1000);
    updateClock();
  </script>

  <!-- Calendar Script -->
  <script>
    const calendarTitle = document.getElementById('calendar-title');
    const calendarDays = document.getElementById('calendar-days');
    let currentDate = new Date();

    function renderCalendar(date) {
      const year = date.getFullYear();
      const month = date.getMonth();
      const firstDay = new Date(year, month, 1).getDay();
      const lastDate = new Date(year, month + 1, 0).getDate();

      const monthNames = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
      calendarTitle.textContent = `${monthNames[month]} ${year}`;

      calendarDays.innerHTML = '';
      let startDay = (firstDay + 6) % 7;
      for (let i = 0; i < startDay; i++) {
        calendarDays.innerHTML += `<div></div>`;
      }

      for (let i = 1; i <= lastDate; i++) {
        const isToday = new Date().toDateString() === new Date(year, month, i).toDateString();
        calendarDays.innerHTML += `
          <div class="${isToday ? 'bg-orange-500 text-white font-bold rounded-full' : ''}">${i}</div>
        `;
      }
    }

    function prevMonth() {
      currentDate.setMonth(currentDate.getMonth() - 1);
      renderCalendar(currentDate);
    }

    function nextMonth() {
      currentDate.setMonth(currentDate.getMonth() + 1);
      renderCalendar(currentDate);
    }

    renderCalendar(currentDate);
  </script>
</body>
</html>
