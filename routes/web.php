<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect::to('login');
});


Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/tambah', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/tambah', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/kelas/tambah', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/ubah/{kode_kelas}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::post('/kelas/update/{kode_kelas}', [KelasController::class, 'update'])->name('kelas.update');
    Route::get('/kelas/{kode_kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy');
    Route::get('/matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah.index');
    Route::get('/matakuliah/tambah', [MatakuliahController::class, 'create'])->name('matakuliah.create');
    Route::post('/matakuliah/tambah', [MatakuliahController::class, 'store'])->name('matakuliah.store');
    Route::get('/matakuliah/ubah/{kode_mk}', [MatakuliahController::class, 'edit'])->name('matakuliah.edit');
    Route::post('/matakuliah/ubah/{kode_mk}', [MatakuliahController::class, 'update'])->name('matakuliah.update');
    Route::get('/matakuliah/{kode_mk}', [MatakuliahController::class, 'destroy'])->name('matakuliah.destroy');
    Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
    Route::get('/jurusan/tambah', [JurusanController::class, 'create'])->name('jurusan.create');
    Route::post('/jurusan/tambah', [JurusanController::class, 'store'])->name('jurusan.store');
    Route::get('/jurusan/ubah/{kode_jurusan}', [JurusanController::class, 'edit'])->name('jurusan.edit');
    Route::post('/jurusan/ubah/{kode_jurusan}', [JurusanController::class, 'update'])->name('jurusan.update');
    Route::get('/jurusan/{kode_jurusan}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
