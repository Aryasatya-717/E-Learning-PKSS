<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Departemen;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $departemen = Departemen::firstOrCreate(
            ['nama' => $row['jabatan']]
        );

        return new User([
            'name'          => $row['nama_pekerja'],
            'email'         => $row['nip_pekerja'],
            'password'      => Hash::make($row['password']),
            'unit_kerja'    => $row['unit_kerja'],
            'departemen_id' => $departemen->id,
            'role'          => 'user',
        ]);
    }
}