<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index() {
        $data = Mahasiswa::all();
        return view('mahasiswa.index', [
            'title' => 'Data Mahasiswa',
            'data' => $data
        ]);
    }
    public function create() {
        return view('mahasiswa.create', [
            'title' => 'Tambah Data Mahasiswa'
        ]);
    }
    public function store(Request $request) {

    }
    public function edit() {

    } 
    public function update(Request $request) {

    }
    public function show($primary_key_nya) {

    } 
    public function destroy($nim) {
        $data = Mahasiswa::where('nim', $nim);
        $data->delete();

        return redirect()->route('mahasiswa.index')
                        ->with('success', 'Mahasiswa berhasil dihapus!');
    }
}
