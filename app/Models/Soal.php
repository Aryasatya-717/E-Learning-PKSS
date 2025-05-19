<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ujian;


class Soal extends Model
{
    protected $table = 'soal';
    //protected $casts = [
      //  'opsi' => 'array'
    //];

    protected $fillable = ['ujian_id', 'pertanyaan', 'tipe', 'opsi', 'jawaban_benar', 'poin'];
    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'ujian_id');
    }

}
