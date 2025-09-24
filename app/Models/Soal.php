<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ujian;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soal';
    protected $fillable = ['ujian_id', 'pertanyaan', 'opsi', 'jawaban_benar', 'poin'];

    protected $casts = [
        'opsi' => 'array',
    ];

    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'ujian_id');
    }
}
