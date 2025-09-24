<?php

echo "<h1>Memulai Tes Konversi...</h1>";

// Direktori tempat kita bekerja
$publicPath = __DIR__; // Ini akan menunjuk ke C:\xampp\htdocs\e-learning\public
$outputDir = $publicPath . DIRECTORY_SEPARATOR . 'modul_test';

// Pastikan direktori output ada, jika tidak, buat
if (!is_dir($outputDir)) {
    mkdir($outputDir, 0777, true);
    echo "Membuat direktori output di: " . $outputDir . "<br>";
}

// Path ke file DOCX yang sudah kita siapkan
$sourceFile = $publicPath . DIRECTORY_SEPARATOR . 'test.docx';

// Path ke file PDF yang kita harapkan akan dibuat
$expectedPdfFile = $outputDir . DIRECTORY_SEPARATOR . 'test.pdf';

echo "File Sumber: " . $sourceFile . "<br>";
echo "File PDF Harapan: " . $expectedPdfFile . "<br>";

// Periksa apakah file sumber ada
if (!file_exists($sourceFile)) {
    die("<strong>ERROR: File test.docx tidak ditemukan! Pastikan Anda sudah membuatnya di folder public.</strong>");
}

// Perintah konversi yang sama persis
$sofficePath = '"C:\Program Files\LibreOffice\program\soffice.exe"';
$command = $sofficePath . ' --headless --convert-to pdf --outdir ' . escapeshellarg($outputDir) . ' ' . escapeshellarg($sourceFile);

echo "<hr>Menjalankan Perintah:<br><pre>" . htmlspecialchars($command) . "</pre><hr>";

// Jalankan perintah
exec($command . ' 2>&1', $output, $result);

echo "<h2>Hasil Eksekusi:</h2>";
echo "<strong>Kode Hasil (Result):</strong> " . $result . "<br>";
echo "<strong>Pesan (Output):</strong><br><pre>";
print_r($output);
echo "</pre><hr>";

// Pemeriksaan final
echo "<h2>Pemeriksaan File:</h2>";
if (file_exists($expectedPdfFile)) {
    echo "<h2 style='color:green;'>KONVERSI SUKSES! File PDF Ditemukan.</h2>";
    echo "<a href='/modul_test/test.pdf' target='_blank'>Lihat PDF</a>";
} else {
    echo "<h2 style='color:red;'>KONVERSI GAGAL! File PDF TIDAK Ditemukan.</h2>";
    echo "<p>Ini mengkonfirmasi masalahnya ada di level interaksi PHP dengan LibreOffice, bukan di kode Laravel Anda.</p>";
}

?>