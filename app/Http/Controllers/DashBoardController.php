<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function admin() {
        return view ('/admin/dashboard');
    }

    public function user() {
        return view('user.dashboard');
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

    //public function uploadMateri(){
      //  return view('admin.Materi');
    //}
}
