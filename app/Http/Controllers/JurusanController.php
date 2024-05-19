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
        $request->validate([
            'kode_jurusan' => 'required|unique:App\Models\Jurusan,kode_jurusan',
            'jurusan' => 'required'
        ]);

        Jurusan::create($request->all());

        return redirect()->route('jurusan.index')
                        ->with('success', 'Jurusan berhasil ditambahkan!');
    }
    public function edit($kode_jurusan) {
        $data = Jurusan::where('kode_jurusan', $kode_jurusan)->first();
        return view('jurusan.edit',[
            'title' => 'Ubah Data Jurusan',
            'data' => $data
        ]);
    } 
    public function update(Request $request, $kode_jurusan) {
        $request->validate([
            'kode_jurusan' => 'required',
            'jurusan' => 'required'
        ]);

        $data = Jurusan::find($kode_jurusan);
        $data->update($request->all());

        return redirect()->route('jurusan.index')
                        ->with('success', 'Jurusan berhasil diubah!');
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
