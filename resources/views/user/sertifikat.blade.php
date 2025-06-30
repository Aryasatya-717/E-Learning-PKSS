<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Kelulusan - {{ Auth::user()->name }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,700;1,400;1,700&family=Yellowtail&display=swap" rel="stylesheet">
    
    <style>
        @page {
            size: A4 landscape;
            margin: 0; /* Menghilangkan margin dari halaman itu sendiri */
        }

        /* --- PERBAIKAN UTAMA DI SINI --- */
        @media print {
            /* Menghilangkan semua margin dan padding dari body saat mencetak */
            body {
                margin: 0 !important;
                padding: 0 !important;
                box-shadow: none !important; /* Menghilangkan shadow juga */
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .no-print {
                display: none;
            }
            .certificate-container {
                box-shadow: none;
            }
        }

        body {
            font-family: 'EB Garamond', serif;
            background-color: #e0e0e0;
            margin: 0; /* Margin body sudah 0 */
            padding: 20px; /* Padding ini HANYA untuk tampilan di layar */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .certificate-container {
            width: 297mm;
            height: 210mm;
            background-color: #ffffff;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
        }

        /* ... Sisa CSS Anda tetap sama ... */
        .certificate-border {
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }

        .certificate-content {
            position: relative;
            z-index: 2;
            padding: 2.5cm 2cm;
            height: 100%;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
            color: #0d233f;
        }
        
        .certificate-header {
            flex-shrink: 0;
        }
        .company-logo {
            max-height: 80px;
            margin-bottom: 20px;
        }
        .main-title {
            font-family: 'EB Garamond', serif;
            font-size: 34pt;
            font-weight: 700;
            color: #b98d4a;
            margin: 0;
        }
        .subtitle {
            font-size: 14pt;
            margin-top: 5px;
        }

        .certificate-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .presented-to-text {
            font-size: 12pt;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .recipient-name {
            font-family: 'Yellowtail', cursive;
            font-style: normal;
            font-weight: normal; 
            font-size: 54pt; 
            color: #0d233f;
            margin: 10px 0;
            border-bottom: 2px solid #b98d4a;
            display: inline-block;
            padding-bottom: 5px;
        }

        .achievement-text {
            font-size: 14pt;
            margin: 20px auto 10px auto;
            max-width: 80%;
            line-height: 1.6;
        }
        .achievement-text strong {
            font-family: 'EB Garamond', serif;
            font-weight: 700;
            font-size: 16pt;
            color: #b98d4a;
        }

        .certificate-footer {
            display: flex;
            justify-content: space-around;
            align-items: flex-end;
            width: 100%;
            margin-top: 40px;
            flex-shrink: 0;
        }
        .signature-block {
            width: 40%;
        }
        .signature-line {
            border-top: 1px solid #0d233f;
            padding-top: 5px;
            margin-bottom: 5px;
        }
        .signer-name {
            font-weight: 700;
            font-size: 12pt;
        }
        .signer-title {
            font-size: 10pt;
            font-style: italic;
        }
        .completion-date {
            font-size: 11pt;
            margin-top: 15px;
        }

        .print-button {
            padding: 12px 25px;
            font-size: 16px;
            background-color: #b98d4a;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .print-button:hover {
            background-color: #8c6b3a;
        }
    </style>
</head>
<body>

    <div class="certificate-container">
        <img class="certificate-border" src="{{ asset('images/certificate-border.svg') }}" alt="Certificate Border">
        
        <div class="certificate-content">
            
            <header class="certificate-header">
                <img src="/pkss/img/logo-1.png" alt="Logo Perusahaan" class="company-logo">
                <h1 class="main-title">Certificate of Completion</h1>
            </header>
            
            <main class="certificate-body">
                <p class="presented-to-text">This Certificate is Proudly Presented To</p>
                <h2 class="recipient-name">{{ Auth::user()->name }}</h2>
                <p class="achievement-text">
                    For successfully completing the examination of <br><strong>"{{ $ujian->judul }}"</strong>
                </p>
                <p class="completion-date">
                    Completed on {{ \Carbon\Carbon::parse($hasil->created_at)->translatedFormat('d F Y') }}
                </p>
            </main>

            <footer class="certificate-footer">
                <div class="signature-block">
                    <div class="signature-line">
                        <p class="signer-name">Jane Doe, S.Kom., M.M.</p>
                        <p class="signer-title">Head of Training Department</p>
                    </div>
                </div>
                <div class="signature-block">
                    <div class="signature-line">
                        <p class="signer-name">John Smith, S.E.</p>
                        <p class="signer-title">General Manager</p>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    <div class="no-print" style="margin-top: 20px;">
        <button onclick="window.print()" class="print-button">
            Cetak atau Simpan sebagai PDF
        </button>
    </div>

</body>
</html>