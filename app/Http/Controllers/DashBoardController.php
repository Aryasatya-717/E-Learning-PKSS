<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ujian;
use App\Models\HasilUjian;
use App\Models\User;
use App\Models\Modul;


class DashBoardController extends Controller
{
    public function admin() {
        $totalPegawai = User::where('role', 'user')->count();
        $totalUjian = Ujian::count();
        $totalMateri = Modul::count();
        $ujianTerbaru = Ujian::with('departemen')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPegawai',
            'totalUjian',
            'totalMateri',
            'ujianTerbaru'
        ));
    }

    public function user() 
    {
        $user = Auth::user();

        $ujianTersedia = Ujian::whereHas('departemens', function ($query) use ($user) {
                $query->where('departemens.id', $user->departemen_id);
            })
            ->where('batas_waktu', '>', now())
            ->whereDoesntHave('hasilUjian', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->latest()
            ->get();

        $riwayatUjian = HasilUjian::where('user_id', $user->id)
            ->with('ujian') 
            ->latest()
            ->take(5)
            ->get();
            
        $totalUjianDiikuti = HasilUjian::where('user_id', $user->id)->count();
        $totalLulus = HasilUjian::where('user_id', $user->id)->where('status', 'Lulus')->count();

        return view('user.dashboard', compact(
            'ujianTersedia',
            'riwayatUjian',
            'totalUjianDiikuti',
            'totalLulus'
        ));
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
