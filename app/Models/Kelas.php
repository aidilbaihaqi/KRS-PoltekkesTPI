<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $primaryKey = 'kode_kelas';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'kode_kelas',
        'nama_kelas',
        'jmlh_mahasiswa'
    ];

    
}
