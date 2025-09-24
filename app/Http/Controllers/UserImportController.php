<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;

class UserImportController extends Controller
{
    public function showForm()
    {
        return view('admin.users.import');
    }

    public function import(Request $request)
    {
        set_time_limit(300);
        
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new UserImport, $request->file('file'));
        
        return redirect()->back()->with('success', 'Data pegawai berhasil diimpor!');
    }
}