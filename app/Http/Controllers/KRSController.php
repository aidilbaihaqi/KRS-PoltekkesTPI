<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KRS;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;

class KRSController extends Controller
{
    public function index() {
        $data = KRS::all();
        return view('krs.index', [
            'title' => 'Kartu Rencana Studi Mahasiswa',
            'data' => $data
        ]);
    }
    public function search(Request $request) {
        $data = KRS::where('nim', $request->search)->get();
        return view('krs.index', [
            'title' => 'Kartu Rencana Studi Mahasiswa',
            'data' => $data
        ]);
    }
    public function create(){
        $mhs = Mahasiswa::all();
        $mk = MataKuliah::all();
        return view('krs.create', [
            'title' => 'Tambah Data KRS',
            'mhs' => $mhs,
            'mk' => $mk
        ]);
    }
    public function store(Request $request) {
        $request->validate([
            'kode_krs' => 'required|unique:App\Models\KRS,kode_krs',
            'nim' => 'required',
            'kode_mk' => 'required',
            'status' => 'default:0'
        ]);

        $data = KRS::create($request->all());

        return redirect()->route('krs.index')
                        ->with('success', 'KRS berhasil ditambahkan!');
    }
    public function edit($kode_krs){
        $data = KRS::where('kode_krs', $kode_krs)->first();
        $mhs = Mahasiswa::all();
        $mk = MataKuliah::all();
        return view('krs.edit', [
            'title' => 'Ubah Data KRS',
            'data' => $data,
            'mhs' => $mhs,
            'mk' => $mk
        ]);
    }
    public function update(Request $request, $kode_krs) {
        $data = KRS::find($kode_krs);
        $data->update($request->all());

        return redirect()->route('krs.index')
                        ->with('success', 'KRS berhasil diubah!');
    }
    public function destroy($kode_krs) {
        $data = KRS::find($kode_krs);
        $data->delete();

        return redirect()->route('krs.index')
                        ->with('success', 'KRS berhasil dihapus!');
    }
}
