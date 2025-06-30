<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Modul;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;


use Illuminate\Support\Facades\Response;


class ModulController extends Controller
{
    public function index(){
        $user = Auth::user();
        if ($user->role === 'admin') {
            $moduls = Modul::with('departemen')->get();
        } else {
            $moduls = Modul::with('departemen')
                        ->where('departemen_id', $user->departemen_id)
                        ->get();
        }

        return view('admin.modul.index', compact('moduls'));
    }

    public function create()
    {
        $departemens = Departemen::all();
        return view('admin.Materi', compact('departemens'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'file' => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:51200',
                'judul' => 'required|string|max:225',
                'departemen_id' => 'required|exists:departemens,id',
                'deskripsi' => 'nullable|string',
            ]);

            $uploadedFile = $request->file('file');
            $originalExtension = strtolower($uploadedFile->getClientOriginalExtension());
            $originalName = $uploadedFile->getClientOriginalName();

            // Simpan file sementara di storage/app/temp_upload
            $randomName = Str::random(40) . '.' . $originalExtension;
            $tempPath = $uploadedFile->storeAs('temp_upload', $randomName);

            $originalFullPath = storage_path('app/' . $tempPath);

            // Tentukan nama PDF hasil konversi
            $convertedFileName = Str::random(40) . '.pdf';
            $convertedFullPath = storage_path('app/public/modul/' . $convertedFileName);

            // Konversi ke PDF jika bukan PDF
            if ($originalExtension !== 'pdf') {
                $command = 'soffice --headless --convert-to pdf --outdir ' . escapeshellarg(storage_path('app/public/modul')) . ' ' . escapeshellarg($originalFullPath);
                exec($command . ' 2>&1', $output, $result);

                Log::info("Konversi Command: $command");
                Log::info("Output: " . implode("\n", $output));
                Log::info("Result: $result");

                // Pastikan hasil konversi berhasil
                $convertedBaseName = Str::replaceLast('.' . $originalExtension, '.pdf', basename($originalFullPath));
                $convertedFullPath = storage_path('app/public/modul/' . $convertedBaseName);

                if (!file_exists($convertedFullPath)) {
                    return response()->json(['error' => 'Gagal mengonversi file.'], 500);
                }

                // Hapus file sementara
                Storage::delete($tempPath);

                $finalFilePath = 'modul/' . $convertedBaseName;
            } else {
                // Jika sudah PDF, langsung simpan ke direktori tujuan
                $stored = $uploadedFile->storeAs('modul', $convertedFileName, 'public');
                $finalFilePath = $stored;
            }

            // Simpan data ke database
            $modul = Modul::create([
                'judul' => $validated['judul'],
                'departemen_id' => $validated['departemen_id'],
                'deskripsi' => $validated['deskripsi'] ?? null,
                'file_path' => $finalFilePath,
                'file_name' => $originalName,
            ]);

            // Response untuk AJAX
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Modul berhasil diupload dan dikonversi',
                    'data' => $modul
                ]);
            }

            return redirect()->route('admin.modul.index')->with('success', 'Modul berhasil diupload');

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $e->errors()
                ], 422);
            }
            return redirect()->back()->withErrors($e->errors());

        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $modul = Modul::findOrFail($id);

        // Hapus file
        if (Storage::disk('public')->exists($modul->file_path)) {
            Storage::disk('public')->delete($modul->file_path);
        }

        $modul->delete();

        return redirect()->route('modul.index')->with('success', 'Modul berhasil dihapus.');
    }

    public function indexUser()
    {
        $user = Auth::user(); // pastikan user login

    // Ambil hanya modul yang sesuai dengan departemen user
        $moduls = Modul::with('departemen')
            ->where('departemen_id', $user->departemen_id)
            ->get();
        return view('user.modul.index', compact('moduls'));
    }


    public function preview($id)
    {
        $modul = Modul::findOrFail($id);

        return view('user.modul.preview', [
            'modul' => $modul,
            'extension' => 'pdf',
            'fileUrl' => asset('storage/' . $modul->file_path)
        ]);
    }

    public function preview1($id)
    {
        $modul = Modul::findOrFail($id);

        return view('admin.modul.preview-admin', [
            'modul' => $modul,
            'extension' => 'pdf',
            'fileUrl' => asset('storage/' . $modul->file_path)
        ]);
    }
}