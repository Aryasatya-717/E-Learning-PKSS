<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Soal;
use App\Models\Departemen;
use App\Models\HasilUjian;

class Ujian extends Model
{
    use HasFactory;

    protected $table = 'ujian';
    protected $fillable = ['judul', 'deskripsi', 'batas_waktu', 'departemen_id', 'durasi'];
    public function setDeadlineAttribute($value)
    {
        $this->attributes['batas_waktu'] = $value;
    }

    public function soals()
    {
        return $this->hasMany(Soal::class);
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function hasilUjian()
    {
        return $this->hasMany(HasilUjian::class);
    }

    public function departemens()
    {
        return $this->belongsToMany(Departemen::class, 'departemen_ujian');
    }
}
