<?php

namespace App\Http\Controllers;

use App\Imports\SoalImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Auth\User;
use App\Models\Ujian;
use App\Models\Soal;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; 
use Throwable;
use App\Exports\SoalTemplateExport; 
use App\Exports\HasilUjianExport;


class UjianController extends Controller
{
    public function index(){
        $ujians = Ujian::with('departemens')->latest()->get();
        return view('soal.index', compact('ujians'));
    }

    public function create()
    {
        $departemenIds = User::distinct()->pluck('departemen_id');
        $departemens = Departemen::whereIn('id', $departemenIds)
                        ->orderBy('nama')
                        ->get(['id', 'nama']);

        return view('soal.create', compact('departemens'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'batas_waktu' => 'required|date',
            'departemen_ids' => 'required|array',
            'departemen_ids.*' => 'exists:departemens,id',
            'durasi' => 'required|integer|min:1',
            'excel_soal' => 'nullable|json',
            'pertanyaan' => 'nullable|array',
            'pertanyaan.*' => 'required_with:pertanyaan|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Validasi gagal.', 'errors' => $validator->errors()], 422);
        }

        DB::beginTransaction();
        try {
            $ujian = Ujian::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'batas_waktu' => $request->batas_waktu,
                //'departemen_id' => $request->departemen_id,
                'durasi' => $request->durasi,
            ]);

            $ujian->departemens()->sync($request->departemen_ids);
            
            $soalData = [];

            if ($request->filled('excel_soal')) {
                $soalData = array_merge($soalData, json_decode($request->excel_soal, true));
            }

            if ($request->has('pertanyaan')) {
                foreach ($request->pertanyaan as $index => $isiPertanyaan) {
                    $soalData[] = [
                        'pertanyaan' => $isiPertanyaan,
                        'opsi' => $request->opsi[$index] ?? [],
                        'jawaban_benar' => $request->jawaban_benar[$index] ?? null,
                        'poin' => $request->poin[$index] ?? 1,
                    ];
                }
            }

            foreach ($soalData as $data) {
                if (empty($data['pertanyaan']) || empty($data['opsi'])) continue;

                Soal::create([
                    'ujian_id' => $ujian->id,
                    'pertanyaan' => $data['pertanyaan'],
                    'opsi' => $data['opsi'],
                    'jawaban_benar' => $data['jawaban_benar'],
                    'poin' => $data['poin'],
                ]);
            }
            
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Ujian berhasil dibuat!'], 201);

        } catch (Throwable $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan fatal saat menyimpan ujian.',
                'error' => ['message' => $e->getMessage(), 'line' => $e->getLine()]
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
        $ujian = Ujian::with('soals', 'departemens')->findOrFail($id);
        
        $departemens = Departemen::all(); 
        
        $ujianDepartemenIds = $ujian->departemens->pluck('id')->toArray();

        return view('soal.edit', compact('ujian', 'departemens', 'ujianDepartemenIds'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'batas_waktu' => 'required|date',
            'departemen_ids' => 'required|array', 
            'departemen_ids.*' => 'exists:departemens,id',
            'durasi' => 'required|integer|min:1',
            'pertanyaan' => 'required|array',
        ]);

        $ujian = Ujian::findOrFail($id);

        // 1. Update data utama Ujian (tanpa departemen_id)
        $ujian->update([
            'judul' => $validatedData['judul'],
            'deskripsi' => $validatedData['deskripsi'],
            'batas_waktu' => $validatedData['batas_waktu'],
            'durasi' => $validatedData['durasi'],
        ]);

        // 2. Sinkronkan (update) relasi dengan departemen yang baru
        $ujian->departemens()->sync($validatedData['departemen_ids']);

        // 3. Hapus soal lama dan buat ulang (logika Anda sudah benar)
        $ujian->soals()->delete();

        if ($request->has('pertanyaan')) {
            foreach ($request->pertanyaan as $i => $pertanyaan) {
                $ujian->soals()->create([
                    'pertanyaan' => $pertanyaan,
                    'opsi' => isset($request->opsi[$i]) ? json_encode($request->opsi[$i]) : null,
                    'jawaban_benar' => $request->jawaban_benar[$i] ?? null,
                    'poin' => $request->poin[$i] ?? 1,
                ]);
            }
        }

        return redirect()->route('soal.index')->with('success', 'Ujian berhasil diperbarui.');
    }



    public function indexUser()
    {
        $user = Auth::user();
        $userId = $user->id;
        $departemenId = $user->departemen_id;

        $ujians = Ujian::whereHas('departemens', function ($query) use ($departemenId) {
            $query->where('departemens.id', $departemenId);
            })
            ->latest() // Menambahkan urutan agar yang terbaru di atas
            ->get();

        $hasilUjianUser = DB::table('hasil_ujian')
            ->where('user_id', $userId)
            ->get()
            ->keyBy('ujian_id');
            
        return view('user.ujian.index', compact('ujians', 'hasilUjianUser'));
    }


    public function mulai($id)
    {
        $ujian = Ujian::with('soals')->findOrFail($id);
        $user = Auth::user();

        DB::table('hasil_ujian')->where('user_id', $user->id)->where('ujian_id', $ujian->id)->delete();
        DB::table('jawaban_user')->where('user_id', $user->id)->where('ujian_id', $ujian->id)->delete();

        $soalAcak = $ujian->soals->shuffle();

        $soalAcak->transform(function ($soal) {
            $opsi = json_decode($soal->opsi, true);
            if (!is_array($opsi)) {
                $opsi = [];
            }

            $opsiAsosiatif = $opsi;

            $keys = array_keys($opsiAsosiatif);
            shuffle($keys);
            
            $opsiAcakBaru = [];
            foreach ($keys as $key) {
                $opsiAcakBaru[$key] = $opsiAsosiatif[$key];
            }

            $soal->opsi_acak_baru = $opsiAcakBaru; 
            
            return $soal;
        });

        $ujian->setRelation('soals', $soalAcak);

        return view('user.ujian.mulai', compact('ujian'));
    }


    public function submit(Request $request, $id)
    {
        $ujian = Ujian::with('soals')->findOrFail($id);
        $jawabanUser = $request->input('jawaban', []);
        $userId = Auth::id();

        DB::beginTransaction();
        try {
            $skorTotal = 0;
            $skorMaks = 0;

            foreach ($ujian->soals as $soal) {
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

            DB::commit();
            return redirect()->route('user.ujian.index')
                ->with('success', "Ujian berhasil disubmit. Skor Anda: $skorTotal dari $skorMaks ($persentase%). Status: $status.");

        } catch (\Exception $e) {

            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan jawaban: ' . $e->getMessage());
        }
    }


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

    public function importSoal(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:2048',
            'ujian_id' => 'required|exists:ujians,id',
        ]);

        try {
            Excel::import(new SoalImport($request->ujian_id), $request->file('file'));

            return redirect()->back()->with('success', 'Soal berhasil diimport.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengimpor soal: ' . $e->getMessage());
        }
    }

    public function downloadTemplate()
    {
        return Excel::download(new SoalTemplateExport, 'template_soal_ujian.xlsx');
    }

    public function exportHasil($id)
    {
        $ujian = Ujian::findOrFail($id);
        $namaFile = 'hasil-ujian-' . \Illuminate\Support\Str::slug($ujian->judul) . '.xlsx';

        return Excel::download(new HasilUjianExport($id), $namaFile);
    }
}
