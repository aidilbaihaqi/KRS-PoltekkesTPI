<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index() {
        $data = Jurusan::all();
        return view('jurusan.index', [
            'title' => 'Data Jurusan',
            'data' => $data
        ]);
    }
    public function create() {
        return view('jurusan.create', [
            'title' => 'Tambah Data Jurusan'
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
    public function destroy($kode_jurusan) {
        $data = Jurusan::where('kode_jurusan', $kode_jurusan);
        $data->delete();

        return redirect()->route('jurusan.index')
                        ->with('success', 'Jurusan berhasil dihapus!');
    }
}
