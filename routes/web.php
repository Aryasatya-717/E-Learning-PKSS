<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashBoardController;
use App\Http\Middleware\CheckRole;

Route::middleware('web')->group(function () {
    Route::get('/', fn() => redirect('/login'));

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'prosesLogin']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth'])->group(function () {
        Route::get('/admin/dashboard', [DashBoardController::class, 'admin'])->middleware(CheckRole::class . ':admin');
        Route::get('/user/dashboard', [DashBoardController::class, 'user'])->middleware(CheckRole::class . ':user');
        Route::get('/ujian-user', [DashBoardController::class, 'ujianUser'])->name('ujian.user');
        Route::get('/dashboard-user', [DashBoardController::class, 'user'])->name('dashboard.user');
    });
    
    
});
