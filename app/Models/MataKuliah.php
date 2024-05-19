<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $primary_key = 'kode_mk';
    public $incrementing = false;
    protected $key_type = 'string';
}
