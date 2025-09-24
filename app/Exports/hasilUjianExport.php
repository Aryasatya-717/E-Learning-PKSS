<?php

namespace App\Exports;

use App\Models\Ujian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class hasilUjianExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $ujianId;

    public function __construct(int $ujianId)
    {
        $this->ujianId = $ujianId;
    }

    public function collection()
    {
        $ujian = Ujian::findOrFail($this->ujianId);

        $peserta_lolos = $ujian->hasilUjian()->where('status', 'Lulus')->with('user')->get();
        $peserta_tidak = $ujian->hasilUjian()->where('status', 'Tidak Lulus')->with('user')->get();

        return $peserta_lolos->merge($peserta_tidak);
    }

    public function headings(): array
    {
        return [
            'Nama Karyawan',
            'Departemen',
            'Skor',
            'Persentase',
            'Status',
            'Waktu Mengerjakan'
        ];
    }

    public function map($hasil): array
    {
        return [
            $hasil->user->name ?? 'N/A',
            $hasil->user->departemen->nama ?? 'N/A',
            $hasil->skor,
            $hasil->persentase . '%',
            $hasil->status,
            \Carbon\Carbon::parse($hasil->created_at)->format('d F Y, H:i'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
}