<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Ujian;

class HasilUjian extends Model
{
    protected $table = 'hasil_ujian';

    protected $fillable = [
        'user_id',
        'ujian_id',
        'skor',
        'skor_maks',
        'persentase',
    ];

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke tabel ujian
    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
}
