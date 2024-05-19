<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function index() {
        $data = Kelas::all();
        return view('kelas.index', [
            'title' => 'Data Kelas',
            'data' => $data
        ]);
    }
    public function create() {
        return view('kelas.create', [
            'title' => 'Tambah Data Kelas'
        ]);
    }
    public function store(Request $request) {
        $request->validate([
            'kode_kelas' => 'required|unique:App\Models\Kelas,kode_kelas',
            'nama_kelas' => 'required|unique:App\Models\Kelas,nama_kelas',
            'jmlh_mahasiswa' => 'required'
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')
                        ->with('success', 'Kelas berhasil ditambahkan!');
    }
    public function edit($kode_kelas) {
        $data = Kelas::where('kode_kelas', $kode_kelas)->first();
        return view('kelas.edit', [
            'title' => 'Ubah Data Kelas',
            'data' => $data
        ]);
    } 
    public function update(Request $request, $kode_kelas) {
        $request->validate([
            'kode_kelas' => 'required',
            'nama_kelas' => 'required',
            'jmlh_mahasiswa' => 'required'
        ]);

        $data = Kelas::find($kode_kelas);
        $data->update($request->all());

        return redirect()->route('kelas.index')
                        ->with('success', 'Kelas berhasil diubah!');
    }
    public function destroy($kode_kelas) {
        $data = Kelas::where('kode_kelas', $kode_kelas);
        $data->delete();

        return redirect()->route('kelas.index')
                        ->with('success', 'Kelas berhasil dihapus!');
    }
}
