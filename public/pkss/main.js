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

// di nilai-karyawan2
// Tab System
function tampilkanTab(tabId, element = null) {
  // Hide all tab contents
  document.querySelectorAll('.tab-content').forEach(tab => {
    tab.classList.add('hidden');
  });
  
  // Show selected tab
  document.getElementById(tabId)?.classList.remove('hidden');

  // Update tab button styles
  document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.classList.remove(
      'ring-2', 'ring-offset-2', 
      'ring-primary', 'ring-success', 
      'ring-danger', 'ring-warning'
    );
  });

  // Highlight active tab button
  if (element) {
    const colorMap = {
      'lolos': 'ring-success',
      'tidak': 'ring-danger',
      'belum': 'ring-warning'
    };
    element.classList.add('ring-2', 'ring-offset-2', colorMap[tabId] || 'ring-primary');
  }
}

// Table Sorting
function sortTable(columnIndex) {
  const table = document.querySelector('.tab-content:not(.hidden) table');
  const tbody = table.querySelector('tbody');
  const rows = Array.from(tbody.querySelectorAll('tr'));
  
  rows.sort((a, b) => {
    const aValue = a.cells[columnIndex].textContent.trim();
    const bValue = b.cells[columnIndex].textContent.trim();
    return aValue.localeCompare(bValue);
  });

  // Clear and re-append sorted rows
  while (tbody.firstChild) {
    tbody.removeChild(tbody.firstChild);
  }
  rows.forEach(row => tbody.appendChild(row));
}

// Search Functionality
function setupSearch() {
  const searchInput = document.getElementById('search-input');
  searchInput.addEventListener('input', (e) => {
    const keyword = e.target.value.toLowerCase();
    document.querySelectorAll('.tab-content:not(.hidden) tbody tr').forEach(row => {
      const rowText = row.textContent.toLowerCase();
      row.classList.toggle('hidden', !rowText.includes(keyword));
    });
  });
}

// Pagination
function setupPagination() {
  document.addEventListener('click', (e) => {
    if (e.target.closest('.pagination button')) {
      const btn = e.target.closest('button');
      if (!btn.classList.contains('bg-primary')) {
        document.querySelector('.pagination .bg-primary')?.classList.remove('bg-primary', 'text-white');
        btn.classList.add('bg-primary', 'text-white');
        // Add your pagination logic here
        console.log('Pagination changed');
      }
    }
  });
}

// Action Buttons
function setupActionButtons() {
  document.addEventListener('click', (e) => {
    // Detail button
    if (e.target.closest('.btn-detail')) {
      const row = e.target.closest('tr');
      const nama = row.querySelector('td:nth-child(1) span').textContent;
      alert(`Menampilkan detail hasil ujian: ${nama}`);
    }
    
    // Reminder button
    if (e.target.closest('.btn-ingatkan')) {
      if (confirm('Kirim pengingat ke karyawan ini?')) {
        const karyawanId = e.target.closest('button').dataset.id;
        alert(`Pengingat dikirim untuk karyawan ID: ${karyawanId}`);
      }
    }
  });
}

// Initialize everything
function init() {
  // Show first tab by default
  tampilkanTab('lolos', document.querySelector('.tab-btn'));
  
  // Setup all functionalities
  setupSearch();
  setupPagination();
  setupActionButtons();
  
  // Add loading state simulation
  const mainContent = document.querySelector('main');
  mainContent.classList.add('opacity-0');
  setTimeout(() => {
    mainContent.classList.remove('opacity-0');
  }, 300);
}

// Run when DOM is loaded
document.addEventListener('DOMContentLoaded', init);

// search di nilai-karyawan
document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById('searchInput');
  const rows = document.querySelectorAll('#examTableBody tr');

  searchInput.addEventListener('input', function () {
    const keyword = this.value.toLowerCase();

    rows.forEach(row => {
      const firstCell = row.querySelector('td'); // Ambil <td> pertama (Nama Ujian)
      const text = firstCell ? firstCell.textContent.toLowerCase() : '';
      row.style.display = text.includes(keyword) ? '' : 'none';
    });
  });
});

tailwind.config = {
  theme: {
    extend: {
      colors: {
        primary: '#2563eb',
        success: '#10b981',
        danger: '#ef4444',
        warning: '#f59e0b',
        dark: '#1f2937',
      },
    },
  },
};

import('https://cdn.tailwindcss.com').then(() => {
  console.log('Tailwind loaded with custom config');
});

function confirmLogout() {
  Swal.fire({
    title: 'Konfirmasi Logout',
    text: 'Apakah Anda yakin ingin logout?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Ya, Logout',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById('logout-form').submit();
    }
  });
}
