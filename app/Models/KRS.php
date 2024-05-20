<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KRS extends Model
{
    protected $primaryKey = 'kode_krs';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_krs',
        'nim',
        'kode_mk',
        'status'
    ];
}
