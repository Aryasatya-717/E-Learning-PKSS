<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function index() {

        $ujian = Ujian::with('departemen')->latest()->get();

        return view('admin/nilaikaryawan', compact('ujian'));
        
    }

    public function lihatnilai($id) {
        $ujian = Ujian::findOrFail($id);

        // Ambil peserta yang Lulus
        $peserta_lolos = DB::table('hasil_ujian')
            ->join('users', 'hasil_ujian.user_id', '=', 'users.id')
            ->select('users.name', 'hasil_ujian.*')
            ->where('hasil_ujian.ujian_id', $id)
            ->where('hasil_ujian.status', 'Lulus')
            ->get();

        // Ambil peserta yang Tidak Lulus
        $peserta_tidak = DB::table('hasil_ujian')
            ->join('users', 'hasil_ujian.user_id', '=', 'users.id')
            ->select('users.name', 'hasil_ujian.*')
            ->where('hasil_ujian.ujian_id', $id)
            ->where('hasil_ujian.status', 'Tidak Lulus')
            ->get();

        return view('admin.nilaikaryawan2', compact('ujian', 'peserta_lolos', 'peserta_tidak'));
    }



    
}
