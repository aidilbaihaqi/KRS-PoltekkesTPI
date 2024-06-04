<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $data = User::all();
        return view('user.index', [
            'title' => 'Data User',
            'data' => $data
        ]);
    }
    public function create(){
        $mhs = Mahasiswa::all();
        return view('user.create', [
            'title' => 'Tambah Data User',
            'mhs' => $mhs
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nim' => 'required|unique:App\Models\User,nim',
            'isAdmin' => 'required',
            'password' => 'required'
        ]);

        $pw = Hash::make($request->nim);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
            'isAdmin' => $request->isAdmin,
            'password' => $pw // fitur default password
        ]);

        return redirect()->route('user.index')
                        ->with('success', 'User berhasil ditambahkan!');
    }
    public function edit($id) {
        $mhs = Mahasiswa::alL();
        $data = User::where('id', $id)->first();
        return view('user.edit', [
            'title' => 'Ubah Data User',
            'data' => $data,
            'mhs' => $mhs
        ]);
    }
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nim' => 'required',
            'isAdmin' => 'required'
        ]);

        $data = User::find($id);
        $data->update($request->all());
        
        return redirect()->route('user.index')
                        ->with('success', 'User berhasil diubah!');
    }
    public function destroy($id) {
        $data = User::where('id', $id);
        $data->delete();

        return redirect()->route('user.index')
                        ->with('success', 'User berhasil dihapus!');
    }
}
