<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ujian;
use App\Models\HasilUjian;


class DashBoardController extends Controller
{
    public function admin() {
        return view ('/admin/dashboard');
    }

    public function user() {
        $user = Auth::user();

        // Ambil semua ujian yang ditujukan ke departemen user atau semua departemen
        $ujianSiap = Ujian::where(function ($query) use ($user) {
            $query->where('departemen_id', $user->departemen_id)
                ->orWhereNull('departemen_id') // jika ada ujian umum
                ->orWhere('departemen_id', 'all'); // jika kamu pakai string 'all'
        })->get();

        return view('user.dashboard', compact('ujianSiap'));
    }
    
    public function ujianUser() {
        return view('user.ujian');
    }
    
    public function sertifikat() {
        return view('user.sertifikat');
    }
    
    public function jadwal() {
        return view('user.jadwal');
    }
    
    public function ujianUserTest() {
        return view('user.ujian-test');
    }


}
