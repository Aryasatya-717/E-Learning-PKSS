<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Modul;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;


class ModulController extends Controller
{
    public function index(){
        $user = Auth::user();
        if ($user->role === 'admin') {
            $moduls = Modul::with('departemens')->latest()->get();
        } else {
            $moduls = Modul::with('departemens') 
                       ->whereHas('departemens', function ($query) use ($user) {
                           $query->where('departemens.id', $user->departemen_id);
                       })
                       ->latest()
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
                'departemen_ids' => 'required|array',
                'departemen_ids.*' => 'exists:departemens,id',
                'deskripsi' => 'nullable|string',
            ]);

            $uploadedFile = $request->file('file');
            $originalExtension = strtolower($uploadedFile->getClientOriginalExtension());
            $originalName = $uploadedFile->getClientOriginalName();

            $randomName = Str::random(40) . '.' . $originalExtension;
            $tempPath = $uploadedFile->storeAs('temp_upload', $randomName);

            $originalFullPath = storage_path('app/' . $tempPath);

            $convertedFileName = Str::random(40) . '.pdf';
            $convertedFullPath = storage_path('app/public/modul/' . $convertedFileName);

            if ($originalExtension !== 'pdf') {

                $tempUploadDir = public_path('temp_upload');
                $tempConvertedDir = public_path('temp_converted');

                if (!File::isDirectory($tempUploadDir)) {
                    File::makeDirectory($tempUploadDir, 0777, true, true);
                }
                if (!File::isDirectory($tempConvertedDir)) {
                    File::makeDirectory($tempConvertedDir, 0777, true, true);
                }

                $uploadedFile->move($tempUploadDir, $randomName);
                $sourceFilePath = $tempUploadDir . DIRECTORY_SEPARATOR . $randomName;

                $sofficePath = '"C:\Program Files\LibreOffice\program\soffice.exe"';
                $command = $sofficePath . ' --headless --convert-to pdf --outdir ' . escapeshellarg($tempConvertedDir) . ' ' . escapeshellarg($sourceFilePath);
                exec($command . ' 2>&1', $output, $result);

                $convertedPdfName = Str::replaceLast($originalExtension, 'pdf', $randomName);
                $convertedPdfPath = $tempConvertedDir . DIRECTORY_SEPARATOR . $convertedPdfName;

                if (File::exists($convertedPdfPath)) {
                    
                    $desiredFileName = Str::random(40) . '.pdf';
                    $pdfContents = File::get($convertedPdfPath);
                    Storage::disk('public')->put('modul/' . $desiredFileName, $pdfContents);

                    $finalFilePath = 'modul/' . $desiredFileName;

                    File::delete($sourceFilePath);
                    File::delete($convertedPdfPath);

                } else {
                    if(File::exists($sourceFilePath)){
                        File::delete($sourceFilePath);
                    }
                    return response()->json(['error' => 'Konversi gagal pada tahap final. Periksa log server.'], 500);
                }

            } else {
                $convertedFileName = Str::random(40) . '.pdf';
                $stored = $uploadedFile->storeAs('modul', $convertedFileName, 'public');
                $finalFilePath = $stored;
            }

            $modul = Modul::create([
                'judul' => $validated['judul'],
                'deskripsi' => $validated['deskripsi'] ?? null,
                'file_path' => $finalFilePath,
                'file_name' => $originalName,
            ]);

            if ($modul) {
                $modul->departemens()->sync($validated['departemen_ids']);
            }

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

        if (Storage::disk('public')->exists($modul->file_path)) {
            Storage::disk('public')->delete($modul->file_path);
        }

        $modul->delete();

        return redirect()->route('modul.index')->with('success', 'Modul berhasil dihapus.');
    }

    public function indexUser()
    {
        $userDepartemenId = Auth::user()->departemen_id;

        $moduls = Modul::whereHas('departemens', function ($query) use ($userDepartemenId) {
            $query->where('departemens.id', $userDepartemenId);
        })->get();

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

    public function edit(Modul $modul)
    {
        $modul->load('departemens'); // Eager load relasi
        $departemens = Departemen::all();
        $modulDepartemenIds = $modul->departemens->pluck('id')->toArray();

        return view('admin.modul.edit', compact('modul', 'departemens', 'modulDepartemenIds'));
    }

    public function update(Request $request, Modul $modul)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'departemen_ids' => 'required|array',
            'departemen_ids.*' => 'exists:departemens,id',
        ]);

        // Update data utama modul
        $modul->update([
            'judul' => $validatedData['judul'],
            'deskripsi' => $validatedData['deskripsi'],
        ]);

        // Sinkronkan relasi departemen
        $modul->departemens()->sync($validatedData['departemen_ids']);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('modul.index')->with('success', 'Modul berhasil diperbarui.');
    }

}