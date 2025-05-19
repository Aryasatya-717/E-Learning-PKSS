<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Modul;

class ModulController extends Controller
{
    public function index(){
        $moduls = Modul::latest()->get();
        return view('admin.modul.index', compact('moduls'));
    }

    public function create()
    {
        return view('admin.Materi');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'file' => 'required|file|mimes:pdf,docx,pptx|max:51200',
                'judul' => 'required|string|max:225',
                'departemen' => 'required|string',
                'deskripsi' => 'nullable|string',
            ]);

            $path = $request->file('file')->store('modul', 'public');
            
            $modul = Modul::create([
                'judul' => $validated['judul'],
                'departemen' => $validated['departemen'],
                'deskripsi' => $validated['deskripsi'] ?? null,
                'file_path' => $path,
                'file_name' => $request->file->getClientOriginalName(),
            ]);

            // Response untuk AJAX
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Modul berhasil diupload',
                    'data' => $modul
                ]);
            }

            return redirect('/admin/modul')->back()->with('success', 'Modul berhasil diupload');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Untuk error validasi
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $e->errors()
                ], 422);
            }
            return redirect()->back()->withErrors($e->errors());

        } catch (\Exception $e) {
            // Untuk error lainnya
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->back()
                   ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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
        $moduls = Modul::latest()->get();
        return view('user.modul.index', compact('moduls'));
    }


}