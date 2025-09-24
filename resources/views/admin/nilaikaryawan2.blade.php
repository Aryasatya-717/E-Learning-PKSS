<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Hasil Ujian: {{ $ujian->judul }} | PKSS E-Learning</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .tab-btn.active {
            border-color: #3B82F6;
            color: #3B82F6;
            background-color: #EFF6FF;
        }
    </style>
</head>
<body class="bg-gray-100 font-inter">

    <header class="flex items-center justify-between px-6 py-4 bg-white shadow-sm">
        <div class="flex items-center gap-4">
            <img src="/pkss/img/logo-1.png" alt="PKSS Logo" class="h-12" />
        </div>
    </header>

    <main class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mb-6">
            <a href="{{ route('soal.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-blue-600 font-medium transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                Kembali ke Daftar Ujian
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-200">
            <div class="border-b border-gray-200 p-6">
                <h1 class="text-2xl font-bold text-gray-900">{{ $ujian->judul }}</h1>
                <p class="text-gray-500 mt-1">Rekapitulasi hasil ujian untuk departemen: <strong>{{ $ujian->departemen->nama ?? 'Semua Departemen' }}</strong></p>
            </div>

            @php
                $totalPeserta = $peserta_lolos->count() + $peserta_tidak->count();
                $persentaseLulus = $totalPeserta > 0 ? round(($peserta_lolos->count() / $totalPeserta) * 100) : 0;
                $skorRataRata = $totalPeserta > 0 ? round(($peserta_lolos->sum('skor') + $peserta_tidak->sum('skor')) / $totalPeserta) : 0;
            @endphp
            <div class="grid grid-cols-1 md:grid-cols-3 gap-px bg-gray-200">
                <div class="bg-white p-4 text-center">
                    <p class="text-sm font-medium text-gray-500">Total Peserta</p>
                    <p class="mt-1 text-3xl font-bold text-gray-900">{{ $totalPeserta }}</p>
                </div>
                <div class="bg-white p-4 text-center">
                    <p class="text-sm font-medium text-gray-500">Persentase Kelulusan</p>
                    <p class="mt-1 text-3xl font-bold text-green-600">{{ $persentaseLulus }}%</p>
                </div>
                <div class="bg-white p-4 text-center">
                    <p class="text-sm font-medium text-gray-500">Skor Rata-rata</p>
                    <p class="mt-1 text-3xl font-bold text-blue-600">{{ $skorRataRata }}</p>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div class="flex border-b border-gray-200">
                        <button onclick="tampilkanTab('lolos', this)" class="tab-btn active -mb-px border-b-2 px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-600">
                            Lulus <span class="ml-2 bg-green-100 text-green-800 text-xs px-2 py-0.5 rounded-full">{{ $peserta_lolos->count() }}</span>
                        </button>
                        <button onclick="tampilkanTab('tidak', this)" class="tab-btn -mb-px border-b-2 border-transparent px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-600">
                            Tidak Lulus <span class="ml-2 bg-red-100 text-red-800 text-xs px-2 py-0.5 rounded-full">{{ $peserta_tidak->count() }}</span>
                        </button>
                    </div>
                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <div class="relative flex-grow sm:flex-grow-0">
                            <input type="text" id="search-input" placeholder="Cari nama karyawan..." 
                                class="w-full sm:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                        
                        <a href="{{ route('ujian.hasil.export', $ujian->id) }}" 
                        class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors">
                            <i class="fas fa-file-excel"></i>
                            <span>Export</span>
                        </a>
                    </div>
                </div>
            </div>

            <div>
                <div id="lolos" class="tab-content">
                    @include('admin.partials.hasil-table', ['pesertas' => $peserta_lolos])
                </div>
                <div id="tidak" class="tab-content hidden">
                    @include('admin.partials.hasil-table', ['pesertas' => $peserta_tidak])
                </div>
            </div>
        </div>
    </main>


<script>
    function tampilkanTab(id, el) {
        document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
        document.getElementById(id).classList.remove('hidden');

        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
        el.classList.add('active');
    }

    document.addEventListener('DOMContentLoaded', () => {
        tampilkanTab('lolos', document.querySelector('.tab-btn'));
        
        const searchInput = document.getElementById('search-input');
        const tables = document.querySelectorAll('.tab-content table');

        searchInput.addEventListener('keyup', function() {
            const filter = searchInput.value.toLowerCase();
            
            tables.forEach(table => {
                const rows = table.getElementsByTagName('tr');
                for (let i = 1; i < rows.length; i++) { // Mulai dari 1 untuk skip header
                    const nameCell = rows[i].getElementsByTagName('td')[0];
                    if (nameCell) {
                        const nameText = nameCell.textContent || nameCell.innerText;
                        if (nameText.toLowerCase().indexOf(filter) > -1) {
                            rows[i].style.display = "";
                        } else {
                            rows[i].style.display = "none";
                        }
                    }
                }
            });
        });
    });
</script>
</body>
</html>
