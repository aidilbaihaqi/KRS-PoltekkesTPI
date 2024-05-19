<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $primaryKey = 'kode_jurusan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_jurusan',
        'jurusan'
    ];
}
