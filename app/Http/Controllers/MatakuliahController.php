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

    }
    public function store(Request $request) {

    }
    public function edit() {

    } 
    public function update(Request $request) {

    }
    public function show($primary_key_nya) {

    } 
}
