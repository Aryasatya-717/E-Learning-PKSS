document.addEventListener('DOMContentLoaded', function() {

  const prevButton = document.getElementById('prev-month');
    const nextButton = document.getElementById('next-month');
    
    if (prevButton && nextButton) {
        prevButton.addEventListener('click', prevMonth);
        nextButton.addEventListener('click', nextMonth);
    } else {
        console.error('Tombol kalender tidak ditemukan!');
    }

  let currentDate = new Date();
  let currentMonth = currentDate.getMonth();
  let currentYear = currentDate.getFullYear();

  // Tambahkan event listener untuk tombol
  document.getElementById('prev-month').addEventListener('click', prevMonth);
  document.getElementById('next-month').addEventListener('click', nextMonth);

  function renderCalendar() {
    const monthYearElement = document.getElementById('month-year');
    const daysElement = document.getElementById('calendar-days');
    
    // Nama bulan dalam bahasa Indonesia
    const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", 
                       "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    
    monthYearElement.textContent = `${monthNames[currentMonth]} ${currentYear}`;
    daysElement.innerHTML = '';

    const firstDay = new Date(currentYear, currentMonth, 1).getDay();
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
    const today = new Date();

    // Adjust for Indonesian day order (Monday first)
    const adjustedFirstDay = (firstDay + 6) % 7;

    // Tambah sel kosong untuk hari-hari sebelum hari pertama bulan
    for (let i = 0; i < adjustedFirstDay; i++) {
      const emptyDay = document.createElement('div');
      emptyDay.classList.add('h-8');
      daysElement.appendChild(emptyDay);
    }

    // Tambah hari-hari dalam bulan
    for (let day = 1; day <= daysInMonth; day++) {
      const dayElement = document.createElement('div');
      dayElement.classList.add('h-8', 'flex', 'items-center', 'justify-center', 'rounded-full');
      
      // Highlight hari ini
      if (day === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear()) {
        dayElement.classList.add('bg-blue-500', 'text-white');
      }
      
      dayElement.textContent = day;
      daysElement.appendChild(dayElement);
    }
  }

  function prevMonth() {
    currentMonth--;
    if (currentMonth < 0) {
      currentMonth = 11;
      currentYear--;
    }
    renderCalendar();
  }

  function nextMonth() {
    currentMonth++;
    if (currentMonth > 11) {
      currentMonth = 0;
      currentYear++;
    }
    renderCalendar();
  }

  // Render kalender pertama kali
  renderCalendar();
});