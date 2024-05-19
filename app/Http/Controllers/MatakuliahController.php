<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;

class MatakuliahController extends Controller
{
    public function index() {
        $data = Matakuliah::all();
        return view('matakuliah.index', [
            'title' => 'Data Mata Kuliah',
            'data' => $data
        ]);
    }
    public function create() {
        return view('matakuliah.create', [
            'title' => 'Tambah Data Mata Kuliah'
        ]);
    }
    public function store(Request $request) {
        $request->validate([
            'kode_mk' => 'required|unique:App\Models\Matakuliah,kode_mk',
            'nama_mk' => 'required',
            'semester_mk' => 'required',
            'sks' => 'required'
        ]);

        Matakuliah::create($request->all());

        return redirect()->route('matakuliah.index')
                        ->with('success', 'Matakuliah berhasil ditambahkan!');
    }
    public function edit($kode_mk) {
        $data = MataKuliah::where('kode_mk', $kode_mk)->first();
        return view('matakuliah.edit', [
            'title' => 'Ubah Mata Kuliah',
            'data' => $data
        ]);
    } 
    public function update(Request $request, $kode_mk) {
        $request->validate([
            'kode_mk' => 'required',
            'nama_mk' => 'required',
            'semester_mk' => 'required',
            'sks' => 'required'
        ]);

        $data = Matakuliah::find($kode_mk);
        $data->update($request->all());

        return redirect()->route('matakuliah.index')
                        ->with('success', 'Matakuliah berhasil diubah!');
    }
    public function destroy($kode_mk) {
        $data = Matakuliah::where('kode_mk', $kode_mk);
        $data->delete();

        return redirect()->route('matakuliah.index')
                        ->with('success', 'Mata kuliah berhasil dihapus!');
    }
}
