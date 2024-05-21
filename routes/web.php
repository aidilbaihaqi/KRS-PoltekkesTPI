<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KRSController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return Redirect::to('login');
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(KRSController::class)->group(function (){
        Route::get('/krs', 'index')->name('krs.index');
        Route::get('/krs/search', 'search')->name('krs.search');
        Route::get('/krs/tambah', 'create')->name('krs.create');
        Route::post('/krs/tambah', 'store')->name('krs.store');
        Route::get('/krs/ubah/{kode_krs}', 'edit')->name('krs.edit');
        Route::post('/krs/ubah/{kode_krs}', 'update')->name('krs.update');
        Route::get('/krs/{kode_krs}', 'destroy')->name('krs.destroy');
    });

    Route::controller(MahasiswaController::class)->group(function() {
        Route::get('/mahasiswa/search', 'search')->name('mahasiswa.search');
        Route::get('/mahasiswa', 'index')->name('mahasiswa.index');
        Route::get('/mahasiswa/detail/{nim}', 'show')->name('mahasiswa.show');
        Route::get('/mahasiswa/tambah', 'create')->name('mahasiswa.create');
        Route::post('/mahasiswa/tambah', 'store')->name('mahasiswa.store');
        Route::get('/mahasiswa/ubah/{nim}', 'edit')->name('mahasiswa.edit');
        Route::post('/mahasiswa/ubah/{nim}', 'update')->name('mahasiswa.update');
        Route::get('/mahasiswa/{nim}', 'destroy')->name('mahasiswa.destroy');
    });

    Route::controller(KelasController::class)->group(function() {
        Route::get('/kelas', 'index')->name('kelas.index');
        Route::get('/kelas/tambah', 'create')->name('kelas.create');
        Route::post('/kelas/tambah', 'store')->name('kelas.store');
        Route::get('/kelas/ubah/{kode_kelas}', 'edit')->name('kelas.edit');
        Route::post('/kelas/update/{kode_kelas}', 'update')->name('kelas.update');
        Route::get('/kelas/{kode_kelas}', 'destroy')->name('kelas.destroy');
    });
    
    Route::controller(MatakuliahController::class)->group(function() {
        Route::get('/matakuliah', 'index')->name('matakuliah.index');
        Route::get('/matakuliah/tambah', 'create')->name('matakuliah.create');
        Route::post('/matakuliah/tambah', 'store')->name('matakuliah.store');
        Route::get('/matakuliah/ubah/{kode_mk}', 'edit')->name('matakuliah.edit');
        Route::post('/matakuliah/ubah/{kode_mk}', 'update')->name('matakuliah.update');
        Route::get('/matakuliah/{kode_mk}', 'destroy')->name('matakuliah.destroy');
    });

    Route::controller(JurusanController::class)->group(function() {
        Route::get('/jurusan', 'index')->name('jurusan.index');
        Route::get('/jurusan/tambah', 'create')->name('jurusan.create');
        Route::post('/jurusan/tambah', 'store')->name('jurusan.store');
        Route::get('/jurusan/ubah/{kode_jurusan}', 'edit')->name('jurusan.edit');
        Route::post('/jurusan/ubah/{kode_jurusan}', 'update')->name('jurusan.update');
        Route::get('/jurusan/{kode_jurusan}', 'destroy')->name('jurusan.destroy');
    });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
