<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

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
