<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $fillable = [
        'judul',
        'departemen_id',
        'deskripsi',
        'file_path',
        'file_name',
    ];
    public function departemen(){
        return $this->belongsTo(Departemen::class);
    }
}
