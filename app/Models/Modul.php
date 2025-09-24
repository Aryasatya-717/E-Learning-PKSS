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

    public function departemens()
    {
        return $this->belongsToMany(Departemen::class, 'departemen_modul', 'modul_id', 'departemen_id')->distinct();
    }
}
