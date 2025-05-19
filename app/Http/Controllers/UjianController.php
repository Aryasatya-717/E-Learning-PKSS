<?php

namespace App\Http\Controllers;


use App\Models\Ujian;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UjianController extends Controller
{
    public function index(){
        $ujians = Ujian::latest()->get();
        return view('soal.index', compact('ujians'));
    }

    public function create()
    {
        return view('soal.create'); 
    }
    public function store(Request $request)
    {
 
        try {
            $validated = $request->validate([
                'judul' => 'required|string',
                'deskripsi' => 'nullable|string',
                'batas_waktu' => 'required|date',
                'departemen' => 'required|string',
                'durasi' => 'required|integer',
                'pertanyaan' => 'required|array',
                'pertanyaan.*.isi' => 'required|string',
                //'pertanyaan.*.tipe' => 'required|string|in:pilihan_ganda,essay,checkbox',
                'pertanyaan.*.opsi' => 'nullable|array',
                'pertanyaan.*.jawaban_benar' => 'nullable|string',
                'pertanyaan.*.poin' => 'required|integer|min:1'
            ]);

            $ujian = Ujian::create($request->only(['judul', 'deskripsi', 'batas_waktu', 'departemen', 'durasi']));

            foreach ($request->pertanyaan as $q) {
                $soal = Soal::create([
                    'ujian_id' => $ujian->id,
                    'pertanyaan' => $q['isi'],
                    //'tipe' => $q['tipe'],
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
            $ujian->delete(); // Soal akan otomatis terhapus karena CASCADE
            
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
        return view('soal.edit', compact('ujian'));
    }

    public function update(Request $request, $id)
    {
        $ujian = Ujian::findOrFail($id);

        $ujian->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'batas_waktu' => $request->batas_waktu,
            'departemen' => $request->departemen,
            'durasi' => $request->durasi,
        ]);

        $ujian->soal()->delete();

        foreach ($request->pertanyaan as $i => $pertanyaan) {
            $soal = $ujian->soal()->create([
                'pertanyaan' => $pertanyaan,
                //'tipe' => $request->tipe[$i],
                'opsi' => isset($request->opsi[$i]) ? json_encode($request->opsi[$i]) : null,
                'jawaban_benar' => $request->jawaban_benar[$i] ?? null,
                'poin' => $request->poin[$i] ?? 1,
            ]);
        }

        return redirect()->route('soal.index', $id)->with('success', 'Ujian berhasil diperbarui.');
    }

    public function indexUser()
    {
        $ujians = Ujian::all();
        return view('user.ujian.index', compact('ujians'));
    }

    public function mulai($id)
    {
        $ujian = Ujian::with('soal')->findOrFail($id);
        return view('user.ujian.mulai', compact('ujian'));
    }

    public function submit(Request $request, $id)
    {
        $ujian = Ujian::findOrFail($id);
        $jawaban = $request->input('jawaban', []);

        // Simpan jawaban ke database, contoh logika sederhana:
        foreach ($jawaban as $pertanyaan_id => $isi_jawaban) {
            DB::table('jawaban_user')->insert([
                'user_id' => Auth::id(),
                'ujian_id' => $id,
                'pertanyaan_id' => $pertanyaan_id,
                'jawaban' => $isi_jawaban,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect()->route('user.ujian.index')->with('success', 'Ujian berhasil disubmit.');
    }



}
