@extends('layouts.app')

@section('content')
    <style>
        @media print {
            body * {
                visibility: hidden !important; /* Pastikan semua elemen disembunyikan secara paksa */
            }
            .certificate-print-area,
            .certificate-print-area * {
                visibility: visible !important; /* Pastikan area sertifikat dan isinya terlihat paksa */
            }
            .certificate-print-area {
                position: fixed !important; /* Penting agar menutupi seluruh halaman cetak */
                top: 0 !important;
                left: 0 !important;
                width: 100% !important;
                height: 100% !important;
                display: flex !important; /* Gunakan flex untuk mengatur tata letak di tengah */
                flex-direction: column !important;
                justify-content: center !important; /* Pusatkan vertikal */
                align-items: center !important; /* Pusatkan horizontal */
                background-color: white !important; /* Pastikan latar belakang putih */
                z-index: 9999 !important; /* Pastikan berada di atas elemen lain */
            }

            .certificate-print-area img {
                max-width: 90% !important; /* Atur lebar maksimum gambar */
                max-height: 80% !important; /* Atur tinggi maksimum gambar */
            }

            /* Sembunyikan elemen lain dengan lebih spesifik */
            aside.w-full.md\:w-64.bg-white.p-4.space-y-8.shadow-md.md\:h-screen,
            .right-sidebar,
            body > *:not(main),
            main > :not(.certificate-container), / Sembunyikan container utama sertifikat */
            .certificate-container > :not(.certificate-print-area) / Sembunyikan elemen di dalam container selain area cetak */
            {
                display: none !important;
            }
        }

        /* Style untuk area sertifikat yang terlihat (di luar @media print) */
        .certificate-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .certificate-print-area {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
        }

        .certificate-image {
            max-width: 100%;
            margin-bottom: 1rem;
            border-radius: 0.25rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .certificate-actions {
            display: flex;
            justify-content: center;
            space-x: 1rem;
            margin-top: 1rem;
        }
    </style>
<body class="bg-gray-50 font-[Inter]">
    <div class="flex h-screen">
        <main class="flex-1 p-8 overflow-y-auto">
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-bold text-gray-800"><strong>Sertifikat Anda</strong></h2>
                <p class="text-gray-600 mt-2"><strong>Berikut adalah sertifikat yang telah Anda peroleh.</strong></p>
            </div>

            <div class="certificate-container">
                <div class="certificate-print-area">
                    <img src="{{ url('/pkss/img/sertif.png') }}" alt="Sertifikat" class="mx-auto max-w-full mb-4 rounded shadow certificate-image">
                </div>
                <div class="certificate-actions">
                    <a href="{{ url('/pkss/img/sertif.png') }}" download class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">Download</a>
                </div>
            </div>
        </main>

        @endsection