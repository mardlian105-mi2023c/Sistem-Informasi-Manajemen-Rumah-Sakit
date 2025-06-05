<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\RawatInapController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin', [AdminController::class, 'store'])->name('chat.store');
});


Route::get('/', [HomeController::class, 'index']);

Route::post('/testimoni', [TestimoniController::class, 'store'])->middleware('auth')->name('testimoni.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');
});

Route::get('/jadwalDokter', [JadwalController::class, 'index'])->name('jadwalDokter');

Route::get('/about', function () {
    return view('about');
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
Route::put('/jadwal/{jadwal}', [JadwalDokterController::class, 'update'])->name('jadwal.update');

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