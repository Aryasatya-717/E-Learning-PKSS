<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];
    protected $table = 'departemens';

    public function ujians()
    {
        return $this->belongsToMany(Ujian::class, 'departemen_ujian');
    }
}
