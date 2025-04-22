<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function admin() {
        return view ('dashboard-admin');
    }

    public function user() {
        return view ('dashboard-user');
    }

    public function ujianUser() {
        return view('ujian-user');
    }
    public function materi() {
        return view('ujian-user-materi');
    }
}
