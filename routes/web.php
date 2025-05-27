<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\RawatInapController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\CommentController;

Route::resource('comments', CommentController::class);
Route::get('/', [CommentController::class, 'index'])->name('home');

Route::get('/jadwalDokter', [JadwalController::class, 'index'])->name('jadwalDokter');

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');
});
Route::get('/pasiens', [PasienController::class, 'pasien'])->name('pasien');
Route::get('/about', [DokterController::class, 'about'])->name('about');
Route::get('/jadwal', [JadwalDokterController::class, 'jadwal'])->name('jadwal');
Route::get('/dokters', [DokterController::class, 'dokters'])->name('dokters');
Route::get('/ruangan', [RawatInapController::class, 'ruangan'])->name('ruangan');

Route::resource('dokter', DokterController::class);
Route::resource('pasien', PasienController::class);
Route::resource('rawatinap', RawatInapController::class);
Route::resource('jadwal', JadwalDokterController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::put('/rawatinap/{rawatinap}', [RawatInapController::class, 'update'])->name('rawatinap.update');

require __DIR__.'/auth.php';