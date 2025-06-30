<?php

namespace App\Models;

use App\Models\Pertanyaan;
use App\Models\Soal;


use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    protected $table = 'ujian';

    protected $fillable = ['judul', 'deskripsi', 'batas_waktu', 'departemen_id', 'durasi'];
    public function soal()
    {
        return $this->hasMany(Soal::class);
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class);
    }

    public function hasilUjian()
    {
        return $this->hasMany(HasilUjian::class);
    }


}
