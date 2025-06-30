<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\NilaiController;
use App\Http\Middleware\CheckRole;

Route::middleware('web')->group(function () {
    Route::get('/', fn() => redirect('/login'));

    // Authentication Routes
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'prosesLogin']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Routes
    Route::prefix('admin')->middleware(['auth', CheckRole::class . ':admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
        Route::get('/course', [DashboardController::class, 'course'])->name('admin.course');
        //Route::get('/karyawan', [DashboardController::class, 'karyawan'])->name('admin.karyawan');
        // Route untuk menampilkan form
        Route::get('admin/ujian/create', [UjianController::class, 'create'])->name('ujian.create');
        Route::get('/uploadmateri', [ModulController::class, 'create'])->name('admin.materi.form');

        // Route Ujian
        Route::get('/ujian', [UjianController::class, 'index'])->name('soal.index');
        Route::post('/ujian', [UjianController::class, 'store'])->name('ujian.store');
        Route::post('/admin/modul', [ModulController::class, 'store'])->name('admin.materi.store');
        Route::delete('/ujian/{id}', [UjianController::class, 'destroy'])->name('ujian.destroy');
        Route::get('/ujian/{id}/edit', [UjianController::class, 'edit'])->name('ujian.edit');
        Route::put('/ujian/{id}', [UjianController::class, 'update'])->name('ujian.update');

        // Route Modul
        Route::get('/admin/modul', [ModulController::class, 'index'])->name('modul.index');
        Route::delete('/admin/modul/{id}', [ModulController::class, 'destroy'])->name('modul.destroy');

        // Route manajemen
        Route::get('/nilaikaryawan', [NilaiController::class, 'index'])->name('admin.nilai');
        Route::get('/nilaikaryawan2/{id}', [NilaiController::class, 'lihatnilai'])->name('admin.nilaikaryawan2');
        
        // route lihat
        Route::get('/modul/{id}/preview', [ModulController::class, 'preview1'])->name('admin.modul.preview');
    });

    // User Routes
    Route::middleware(['auth', CheckRole::class . ':user'])->group(function () {
        Route::get('/user/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');
        Route::get('/user/modul', [App\Http\Controllers\ModulController::class, 'indexUser'])->name('user.modul.index');
        Route::get('/user/ujian', [App\Http\Controllers\UjianController::class, 'indexUser'])->name('user.ujian.index');
        Route::get('/user/ujian/{id}/mulai', [App\Http\Controllers\UjianController::class, 'mulai'])->name('user.ujian.mulai');
        Route::post('/user/ujian/{id}/submit', [App\Http\Controllers\UjianController::class, 'submit'])->name('user.ujian.submit');

        Route::get('/modul/{id}/preview', [ModulController::class, 'preview'])->name('modul.preview');
        Route::get('/modul/viewer/{id}/{hash}', [ModulController::class, 'viewer'])->name('modul.viewer');

        Route::get('/modul/converted/{filename}', function ($filename) {
            $path = storage_path('app/converted/' . $filename);
            if (!file_exists($path)) {
                abort(404);
            }
            return response()->file($path);
        })->name('modul.converted');


        Route::get('/ujian/{id}/sertifikat', [UjianController::class, 'tampilkanSertifikat'])->name('ujian.sertifikat');
        

    });

});