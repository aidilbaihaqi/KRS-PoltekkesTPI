<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();

        return view('mahasiswa.create', [
            'title' => 'Tambah Data Mahasiswa',
            'kelas' => $kelas,
            'jurusan' => $jurusan
        ]);
    }
    public function store(Request $request) {
        $request->validate([
            'nim' => 'required|unique:App\Models\Mahasiswa,nim',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'semester' => 'required',
            'jenis_kelamin' => 'required',
            'tahun_akademik' => 'required',
            'kode_kelas' => 'required',
            'kode_jurusan' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,svg'
        ]);

        $foto = $request->foto->getClientOriginalName();
        $request->foto->move(public_path('storage/images/mahasiswa'), $foto);

        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'semester' => $request->semester,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_akademik' => $request->tahun_akademik,
            'kode_kelas' => $request->kode_kelas,
            'kode_jurusan' => $request->kode_jurusan,
            'foto' => $foto
        ]);

        return redirect()->route('mahasiswa.index')     
                        ->with('success', 'Mahasiswa berhasil ditambahkan!');
    }
    public function edit($nim) {
        $data = Mahasiswa::where('nim', $nim)->first();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('mahasiswa.edit', [
            'title' => 'Ubah Data Mahasiswa',
            'data' => $data,
            'kelas' => $kelas,
            'jurusan' => $jurusan
        ]);
    } 
    public function update(Request $request, $nim) {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'semester' => 'required',
            'jenis_kelamin' => 'required',
            'tahun_akademik' => 'required',
            'kode_kelas' => 'required',
            'kode_jurusan' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,svg'
        ]);

        $data = Mahasiswa::find($nim);
        
        if($request->has('foto')) {
            Storage::delete('public/images/mahasiswa/'.basename($data->foto));
            $foto = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('storage/images/mahasiswa'), $foto);
        }
        
        
        $data->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'semester' => $request->semester,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_akademik' => $request->tahun_akademik,
            'kode_kelas' => $request->kode_kelas,
            'kode_jurusan' => $request->kode_jurusan,
            'foto' => $foto
        ]);

        return redirect()->route('mahasiswa.index')
                        ->with('success', 'Mahasiswa berhasil diubah!');
    }
    public function destroy($nim) {
        $data = Mahasiswa::where('nim', $nim)->first();
        Storage::delete('public/images/mahasiswa/'.basename($data->foto));
        $data->delete();

        return redirect()->route('mahasiswa.index')
                        ->with('success', 'Mahasiswa berhasil dihapus!');
    }
}
