<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sertifikat</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Google -->
  <link href="https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap" rel="stylesheet">
  <style>
    .font-protest {
      font-family: 'Protest Riot', cursive;
    }
  </style>
</head>
<body class="bg-gray-100 text-center p-5">

<!-- Sertifikat -->
<div id="sertifikat" 
     class="relative w-[1123px] h-[794px] mx-auto bg-white shadow-lg overflow-hidden">

  <!-- Background -->
  <img src="{{ asset('pkss/img/A4-7.png') }}" 
       alt="Background Sertifikat" 
       class="absolute inset-0 w-full h-full z-0">

  <!-- Konten Sertifikat -->
  <div class="absolute top-[200px] w-full text-center z-10">
    <h1 class="font-protest text-[64px] font-bold text-gray-800">SERTIFIKAT</h1>
  </div>

  <div class="absolute top-[290px] w-full text-center z-10">
    <p class="text-lg text-gray-700">Dengan ini diberikan kepada</p>
  </div>

  <div class="absolute top-[315px] w-full text-center z-10">
    <p class="text-3xl font-bold text-black">{{ Auth::user()->name }}</p>
  </div>

  <div class="absolute top-[360px] w-full text-center z-10">
    <p class="text-lg text-gray-700">Atas partisipasi dan pencapaian dalam mengikuti kegiatan</p>
  </div>

  <div class="absolute top-[400px] w-full text-center z-10">
    <p class="text-xl font-bold text-gray-800">{{ $ujian->judul ?? 'E-Learning PKSS' }}</p>
  </div>

  <div class="absolute top-[450px] w-full text-center z-10">
    <p class="text-lg text-gray-700">yang diselenggarakan oleh PT BAKTI AMANAH SEJAHTERA</p>
  </div>

  <div class="absolute top-[490px] w-full text-center z-10">
    <p class="text-lg text-black">Tanggal: {{ $hasil->created_at ?? '...........' }}</p>
  </div>

  <!-- Tanda Tangan -->
  <div class="absolute bottom-[150px] w-full flex justify-around z-10">
    <!-- Signature 1 -->
    <div class="w-[300px] text-center">
      <img src="{{ asset('pkss/img/tanda-tangan-1.png') }}" 
           alt="Tanda Tangan Ketua" 
           class="h-16 mx-auto mb-2">
      <p class="font-bold mt-1">{{ $event->penandatangan1 ?? 'Gading Widodo, S.Kom., M.M.' }}</p>
      <p class="text-sm italic">Ketua</p>
    </div>  

    <!-- Signature 2 -->
    <div class="w-[300px] text-center">
      <img src="{{ asset('pkss/img/tanda-tangan-2.png') }}" 
           alt="Tanda Tangan Sekretaris"
           class="h-16 mx-auto mb-2">
      <p class="font-bold mt-1">{{ $event->penandatangan2 ?? 'Erick ade, S.E.' }}</p>
      <p class="text-sm italic">Sekretaris</p>
    </div>
  </div>
</div> <!-- 🚀 penutup sertifikat -->

<!-- Tombol Download -->
<div class="text-center mt-8">
  <button onclick="downloadPDF()" 
          class="px-6 py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
    Download PDF
  </button>
</div>

<script>
  function downloadPDF() {
    const element = document.getElementById('sertifikat');
    const opt = {
      margin: [0, 0, 0, 0],
      filename: 'sertifikat-{{ Auth::user()->name }}.pdf',
      image: { type: 'jpeg', quality: 1 },
      html2canvas: { scale: 2, useCORS: true },
      jsPDF: { unit: 'px', format: [1123, 794], orientation: 'landscape' }
    };
    html2pdf().set(opt).from(element).save();
  }
</script>

</body>
</html>
