<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SoalTemplateExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return collect([
            [
                'pertanyaan' => 'Ibu kota negara Indonesia adalah?',
                'opsi_a' => 'Jakarta',
                'opsi_b' => 'Bandung',
                'opsi_c' => 'Surabaya',
                'opsi_d' => 'Medan',
                'jawaban_benar' => 0,
                'poin' => 1
            ]
        ]);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Pertanyaan',
            'Opsi A',
            'Opsi B',
            'Opsi C',
            'Opsi D',
            'Jawaban Benar (Index 0-3)',
            'Poin'
        ];
    }
}