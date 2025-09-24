<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Departemen;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        $departemens = Departemen::orderBy('nama')->get();

        $query = User::where('role', 'user')->with('departemen');

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('departemen_id')) {
            $query->where('departemen_id', $request->departemen_id);
        }
        $pegawai = $query->latest()->paginate(10);
        return view('admin.nilaikaryawan', compact('pegawai', 'departemens'));
    }

    public function create()
    {
        $departemens = Departemen::orderBy('nama')->get();
        return view('admin.pegawai.create', compact('departemens')); // Arahkan ke view baru
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'departemen_id' => ['required', 'exists:departemens,id'],
            'unit_kerja' => 'required|string|max:255'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', 
            'departemen_id' => $request->departemen_id,
            'unit_kerja' => $request->unit_kerja,
        ]);

        return redirect()->route('admin.nilai')->with('success', 'Pegawai baru berhasil ditambahkan!');
    }

    public function lihatnilai($id) {
        $ujian = Ujian::findOrFail($id);

        $peserta_lolos = DB::table('hasil_ujian')
            ->join('users', 'hasil_ujian.user_id', '=', 'users.id')
            ->select('users.name', 'hasil_ujian.*')
            ->where('hasil_ujian.ujian_id', $id)
            ->where('hasil_ujian.status', 'Lulus')
            ->get();

        $peserta_tidak = DB::table('hasil_ujian')
            ->join('users', 'hasil_ujian.user_id', '=', 'users.id')
            ->select('users.name', 'hasil_ujian.*')
            ->where('hasil_ujian.ujian_id', $id)
            ->where('hasil_ujian.status', 'Tidak Lulus')
            ->get();

        return view('admin.nilaikaryawan2', compact('ujian', 'peserta_lolos', 'peserta_tidak'));
    }
}
