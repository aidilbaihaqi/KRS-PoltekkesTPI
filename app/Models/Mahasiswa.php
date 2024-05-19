<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nim',
        'nama',
        'tgl_lahir',
        'alamat',
        'semester',
        'jenis_kelamin',
        'tahun_akademik',
        'kode_kelas',
        'kode_jurusan',
        'foto'
    ];
}
