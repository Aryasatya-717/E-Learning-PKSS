<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use App\Models\Ujian;
use App\Models\Soal;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;




class UjianController extends Controller
{
    public function index(){
        $ujians = Ujian::with('departemen')->get();
        return view('soal.index', compact('ujians'));
    }

    public function create()
    {
        // Ambil semua departemen yang digunakan oleh user
        $departemenIds = User::distinct()->pluck('departemen_id'); // Ambil ID yang unik

        $departemens = Departemen::whereIn('id', $departemenIds)
                        ->orderBy('nama')
                        ->get(['id', 'nama']);

        return view('soal.create', compact('departemens'));
    }

    public function store(Request $request)
    {
 
        try {
            $validated = $request->validate([
                'judul' => 'required|string',
                'deskripsi' => 'nullable|string',
                'batas_waktu' => 'required|date',
                'departemen_id' => 'required|exists:departemens,id',
                'durasi' => 'required|integer',
                'pertanyaan' => 'required|array',
                'pertanyaan.*.isi' => 'required|string',
                'pertanyaan.*.opsi' => 'nullable|array',
                'pertanyaan.*.jawaban_benar' => 'nullable|string',
                'pertanyaan.*.poin' => 'required|integer|min:1'
            ]);

            $ujian = Ujian::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'batas_waktu' => $request->batas_waktu,
                'departemen_id' => $request->departemen_id,
                'durasi' => $request->durasi,
            ]);

            foreach ($request->pertanyaan as $q) {
                $soal = Soal::create([
                    'ujian_id' => $ujian->id,
                    'pertanyaan' => $q['isi'],
                    'opsi' => !empty($q['opsi']) ? json_encode($q['opsi']) : null,
                    'jawaban_benar' => $q['jawaban_benar'] ?? null,
                    'poin' => $q['poin']
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Ujian berhasil disimpan!',
                'ujian_id' => $ujian->id
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan ujian: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $ujian = Ujian::findOrFail($id);
            $ujian->delete(); 
            
            return redirect()->route('soal.index')
                ->with('success', 'Ujian berhasil dihapus');
                    
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus ujian: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $ujian = Ujian::with('soal')->findOrFail($id);
        $departemen = Departemen::all();
        return view('soal.edit', compact('ujian', 'departemen'));
    }

    public function update(Request $request, $id)
    {
        $ujian = Ujian::findOrFail($id);

        $ujian->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'batas_waktu' => $request->batas_waktu,
            'departemen_id' => $request->departemen_id,
            'durasi' => $request->durasi,
        ]);

        $ujian->soal()->delete();

        foreach ($request->pertanyaan as $i => $pertanyaan) {
            $soal = $ujian->soal()->create([
                'pertanyaan' => $pertanyaan,               
                'opsi' => isset($request->opsi[$i]) ? json_encode($request->opsi[$i]) : null,
                'jawaban_benar' => $request->jawaban_benar[$i] ?? null,
                'poin' => $request->poin[$i] ?? 1,
            ]);
        }

        return redirect()->route('soal.index', $id)->with('success', 'Ujian berhasil diperbarui.');
    }



    public function indexUser()
    {
        $user = Auth::user();
        $userId = $user->id;
        $departemenId = $user->departemen_id;

        // Ambil semua ujian yang sesuai dengan departemen user
        // Saya menghapus filter tanggal agar ujian yang lewat tetap tampil (untuk melihat status Gagal/Lulus)
        $ujians = Ujian::where('departemen_id', $departemenId)->get();

        // Ambil hasil ujian user dan kelompokkan berdasarkan ujian_id untuk pengecekan mudah di view
        $hasilUjianUser = DB::table('hasil_ujian')
            ->where('user_id', $userId)
            ->get()
            ->keyBy('ujian_id');
            
        return view('user.ujian.index', compact('ujians', 'hasilUjianUser'));
    }


    public function mulai($id)
    {
        $ujian = Ujian::with('soal')->findOrFail($id);
        $user = Auth::user();

        DB::table('hasil_ujian')
            ->where('user_id', $user->id)
            ->where('ujian_id', $ujian->id)
            ->delete();

        DB::table('jawaban_user')
            ->where('user_id', $user->id)
            ->where('ujian_id', $ujian->id)
            ->delete();

        return view('user.ujian.mulai', compact('ujian'));
    }


    public function submit(Request $request, $id)
    {
        $ujian = Ujian::with('soal')->findOrFail($id);
        $jawabanUser = $request->input('jawaban', []);
        $userId = Auth::id();

        $skorTotal = 0;
        $skorMaks = 0;

        foreach ($ujian->soal as $soal) {
            $jawabanBenar = $soal->jawaban_benar;
            $jawabanPengguna = $jawabanUser[$soal->id] ?? null;

            $skorMaks += $soal->poin;

            if (!is_null($jawabanPengguna)) {
                DB::table('jawaban_user')->insert([
                    'user_id' => $userId,
                    'ujian_id' => $id,
                    'pertanyaan_id' => $soal->id,
                    'jawaban' => $jawabanPengguna,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            if ($jawabanPengguna == $jawabanBenar) {
                $skorTotal += $soal->poin;
            }
        }

        $persentase = $skorMaks > 0 ? round(($skorTotal / $skorMaks) * 100, 2) : 0;
        $status = $persentase >= 70 ? 'Lulus' : 'Tidak Lulus';

        // Simpan hasil ke tabel hasil_ujian
        DB::table('hasil_ujian')->insert([
            'user_id' => $userId,
            'ujian_id' => $id,
            'skor' => $skorTotal,
            'skor_maks' => $skorMaks,
            'persentase' => $persentase,
            'status' => $status,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('user.ujian.index')
            ->with('success', "Ujian berhasil disubmit. Skor Anda: $skorTotal dari $skorMaks ($persentase%). Status: $status.");
    }

    /**
     * Menampilkan sertifikat jika pengguna lulus.
     */
    public function tampilkanSertifikat($id)
    {
        $userId = Auth::id();

        $hasil = DB::table('hasil_ujian')
            ->where('user_id', $userId)
            ->where('ujian_id', $id)
            ->first();

        if (!$hasil || $hasil->status !== 'Lulus') {
            abort(403, 'Sertifikat hanya tersedia untuk peserta yang lulus.');
        }

        $ujian = Ujian::findOrFail($id);

        return view('user.sertifikat', compact('hasil', 'ujian'));
    }
}
