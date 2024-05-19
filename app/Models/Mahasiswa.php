<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $primary_key = 'nim';
    public $incrementing = false;
    protected $key_type = 'string';
}
