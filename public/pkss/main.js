// Clock Script
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
  
  // Calendar Script
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
  
  function login() {
    const nik = document.getElementById("nik").value;
    const password = document.getElementById("password").value;

    if (nik && password) {
      window.location.href = "dashboard.html";
    } else {
      alert("Silakan isi NIK dan Password terlebih dahulu.");
    }
  }


// jawaban soal
// Data options (bisa dari API/database nanti)

