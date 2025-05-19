<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $fillable = [
        'judul',
        'departemen',
        'deskripsi',
        'file_path',
        'file_name',
    ];
}
