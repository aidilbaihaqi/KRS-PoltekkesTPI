<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()  {
        $dm = Mahasiswa::all()->count();
        $dk = Kelas::all()->count();
        $dj = Jurusan::all()->count();
        $dmk = MataKuliah::all()->count();

        return view('dashboard', [
            'title' => 'Dashboard',
            'dm' => $dm,
            'dk' => $dk,
            'dj' => $dj,
            'dmk' => $dmk
        ]);
    }
}
